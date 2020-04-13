<?php

namespace App\Http\Controllers;

use \App\Inspek;
use App\Memo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PmqaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages\pmqa\index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  public function cekProduck()
  {
    return view('pages.pmqa.produck', ['title' => 'Produck Cek']);
  }

  public function getProduck($id)
  { }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'category' => 'required|string',
      'tiket_id' => 'required|string',
      'memo_id' => 'required',
      'description' => 'required'
    ]);
    $memo = new \App\Inspek;
    $memo->id = $request->get('id');
    $memo->tiket_id = $request->get('tiket_id');
    $memo->memo_id = $request->get('memo_id');
    $memo->category = $request->get('category');
    $memo->result = $request->get('result');
    $memo->description = $request->get('description');
    if ($request->file('image')) {
      $file = $request->file('image')->store('pmqa/images', 'public');
      $memo->images = $file;
    }
    $memo->status = 1;
    $memo->notif = 0;
    $memo->kind_id = $request->get('kind_id') ? $request->get('kind_id') : 'Q';
    $memo->created_by = \Auth::user()->id;
    $memo->created_at = date('Y-m-d H:i:s');
    $memo->updated_at = date('Y-m-d H:i:s');
    $memo->save();

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
    $memo = Memo::getMemoTiket($id);
    $title = 'PMQA Cek Inspek Produck';
    return view('pages.pmqa.edit', ['memo' => $memo, 'title' => $title]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
    $id = Auth::user()->id;
    $data = [];
    $model = DB::table('memo')
      ->join('users', 'memo.to_user_id', '=', 'users.id')
      ->join('mstiket', 'memo.tiket_id', '=', 'mstiket.id')
      ->select(
        DB::raw('DISTINCT(memo.kode)', 'CASE memo.Status WHEN 0 THEN "New" WHEN 1 THEN "Process" WHEN 2 THEN "Cencel" END AS remark'),
        'memo.id',
        'memo.auto_kode',
        'memo.pesan',
        'users.name',
        'mstiket.category',
        'mstiket.jenis_complain',
        'memo.status AS mark'
      )->where('memo.to_user_id', '=', $id)->get();
    foreach ($model as $key) {
      $data = $key->mark;
    }
    if ($data == 0) {
      return DataTables::of($model)
        ->addColumn('action', function ($model) {
          return view('layouts._action', [
            'model' => $model,
            'url_edit' => route('detail.memo', $model->id)
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
    } else {
      return DataTables::of($model)
        ->addColumn('action', function ($model) {
          return view('layouts._blank', [
            'model' => $model,
            'url_edit' => route('detail.memo', $model->id)
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

  public function pmqaProduck()
  {
    $model = DB::table('mstiket AS A')
      ->rightJoin('msproduck AS B', 'A.id', '=', 'B.tiket_id')
      ->select(
        'B.id AS id_porduk',
        'A.kode',
        'A.kode AS name',
        'B.tiket_id',
        'B.memo_id',
        'B.category',
        'B.result',
        'B.description',
        'B.images',
        'B.status AS mark'
      )->where('A.notif', '=', '2')->get();
    return DataTables::of($model)
      ->addColumn('action', function ($model) {
        return view('layouts._action', [
          'model' => $model,
          'url_edit' => route('pmqa.result', $model->memo_id)
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