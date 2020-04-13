<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mstiket;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

use Illuminate\Support\Facades\DB;

class TiketController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {

    $tiket = Mstiket::where('created_by', Auth::user()->id)->paginate(10);

    return view('pages\tiket\index', ['tikets' => $tiket]);
    // return view('layouts/_element');
  }

  public function result()
  {
    return view('pages.tiket.result', ['title' => 'Hasil Inspek']);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $model = new Mstiket();
    // return $model;
    return view('pages.tiket.form', compact('model'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'category' => 'required|string', 'kode' => 'required|string', 'jenis_complain' => 'required', 'description' => 'required'
    ]);

    $tiket = new \App\Mstiket;
    $tiket->category = $request->get('category');
    $tiket->kode = $request->get('kode');
    $tiket->jenis_complain = $request->get('jenis_complain');
    if ($request->file('image')) {
      $file = $request->file('image')->store('images', 'public');
      $tiket->images = $file;
    }
    $tiket->description = $request->get('description');
    $tiket->status = 0;
    $tiket->created_by = Auth::user()->id;
    $tiket->updated_by = Auth::user()->id;
    $tiket->save();

    return redirect()->route('tiket.index')->with('status', 'Data has been create successfully');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $model = Mstiket::result($id);
    return view('pages.tiket.show', ['title' => $id, 'model' => $model]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $model = Mstiket::FindOrFail($id);
    return view('pages.tiket.formResult', ['model' => $model]);
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
    $tiket = Mstiket::FindOrFail($id);
    $status = 4;
    $notif = 4;

    $tiket->status = $status;
    $tiket->notif  = $notif;
    $tiket->updated_by = \Auth::user()->id;

    $tiket->update();

    return ['status' => 'Data has been Approved'];
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
    $model = Mstiket::query();
    return DataTables::of($model)
      ->addColumn('action', function ($model) {
        return view('layouts._action', [
          'model' => $model,
          'url_show' => route('tiket.show', $model->id),
          'url_edit' => route('tiket.edit', $model->id),
          'url_destroy' => route('tiket.destroy', $model->id)
        ]);
      })
      ->addIndexColumn()
      ->rawColumns(['action'])
      ->make(true);
  }

  public function resultTable()
  {
    $model = DB::table('mstiket AS A')
      ->join('users AS B', 'A.created_by', '=', 'B.id')
      ->join('msinspek AS C', 'A.id', '=', 'C.tiket_id')
      ->select(
        'A.id',
        'A.category',
        'A.kode',
        'A.kode AS name',
        'A.jenis_complain',
        'A.description AS complain',
        'B.name AS costumer',
        'C.description AS hasil',
        'C.result',
        'C.images'
      )->where('A.status', 3)->groupBy(['A.kode', 'A.category'])->get();

    return DataTables::of($model)
      ->addColumn('action', function ($model) {
        $btn = '<a href="' . route('result.show', $model->id) . '" class="btn-show" title="Detail : ' . $model->name . '"><i class="fas fa-eye"></i></a>';
        $btn = $btn . ' | <a href="' . route('result.insert', $model->id) . '" class="modal-show-result edit" title="Edit ' . $model->name . '"><i class="fas fa-check"></i></i></a>';
        return $btn;
      })
      ->addIndexColumn()
      ->rawColumns(['action'])
      ->make(true);
  }
}