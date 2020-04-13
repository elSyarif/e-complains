<?php

namespace App\Http\Controllers;

use App\Memo;
use App\Mstiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MemoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.memo.index');
  }

  public function list()
  {
    return view('pages.memo.list', ['title' => 'List Tiket Komplain']);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function create()
  {
    return view('pages\memo\create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   *
   * Buat memo yang di jukan kepada tiap bagaian dengan set status 0 sebagai sedang di porses untuk costumer
   * dan notif 0 untuk di tujuakan ke internal bagian
   */
  public function store(Request $request)
  {

    $insert = new \App\Memo;
    foreach ($request->get('to') as $value) {
      $row = [
        'kode' => $request->get('kode'),
        'auto_kode' => Memo::getNumber('PROD'),
        'tiket_id' => $request->get('tiket'),
        'pesan' => $request->get('pesan'),
        'to_user_id' => $value, 'status' => 0,
        'notif' => 0,
        'created_by' =>  Auth::user()->id,
        'created_at' =>  date('Y-m-d H:i:s')
      ];
      $data[] = $row;
    }
    $tiket =  Mstiket::findOrfail($request->get('tiket'));
    $tiket->notif = 1; // kode 1 set tikert sedang di porses dan di tujukan ke bagaian terkait
    $tiket->updated_at = date('Y-m-d H:i:s');
    $tiket->save();

    $insert->insert($data);
    return ['message' => 'Berhasil Tersimpan', 'status' => 'success'];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $role = Auth::user()->role_id;

    if ($role == 5) {
      $user_id = Auth::user()->id;
      $memo = Memo::getMemo($id);
      $title = 'PMQA Cek Inspek';
      return view('pages.pmqa.edit', ['memo' => $memo, 'title' => $title]);
    } else if ($role == 4) {
      $user_id = Auth::user()->id;
      $memo = Memo::getMemo($id);
      $title = 'Product Inspek';
      return view('pages.inspek.edit', ['memo' => $memo, 'title' => $title]);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $memo = \App\Mstiket::findOrfail($id);
    return view('pages\memo\edit', ['memo' => $memo]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
  public function dataTable()
  {
    $user_id = Auth::user()->id;
    $model = DB::table('mstiket')
      ->join('users', 'mstiket.created_by', '=', 'users.id')
      ->select(
        'mstiket.id',
        'mstiket.category',
        'mstiket.kode',
        'mstiket.description',
        'users.name',
        'mstiket.status AS mark',
        DB::raw('CASE mstiket.Status WHEN 0 THEN "On Process" WHEN 1 THEN "Process" WHEN 2 THEN "Cencel" END AS remark')
      )->get();

    return DataTables::of($model)
      ->addColumn('action', function ($model) {
        return view('layouts._action', [
          'model' => $model,
          'url_edit' => route('tiket.store', $model->id)
        ]);
      })
      ->addColumn('status', function ($model) {
        return view('layouts._status', [
          'model' => $model
        ]);
      })
      ->addIndexColumn()
      ->rawColumns(['action', 'status'])
      ->make(true);
  }
  public function dataTableList()
  {
    $user_id = Auth::user()->id;
    $model = DB::table('mstiket')
      ->join('users', 'mstiket.created_by', '=', 'users.id')
      ->select(
        'mstiket.id',
        'mstiket.category',
        'mstiket.jenis_complain',
        'mstiket.kode',
        'mstiket.description',
        'users.name',
        'mstiket.status AS mark',
        DB::raw('CASE mstiket.Status WHEN 0 THEN "On Process" WHEN 1 THEN "Process" WHEN 2 THEN "Cencel" END AS remark')
      )->where('mstiket.notif', '=', '0')->get();

    return DataTables::of($model)
      ->addColumn('action', function ($model) {
        return view('layouts._action', [
          'model' => $model,
          'url_edit' => route('memo.edit', $model->id)
        ]);
      })
      ->addColumn('status', function ($model) {
        return view('layouts._status', [
          'model' => $model
        ]);
      })
      ->addIndexColumn()
      ->rawColumns(['action', 'status'])
      ->make(true);
  }
}