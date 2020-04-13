<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mstiket;
//use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class HistoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('pages\tiket\history');
  }

  public function dataTable()
  {
    // $model = Mstiket::where('created_by', Auth::user()->id);
    $model = DB::table('mstiket')->select('id',  'category', 'kode', 'jenis_complain', 'images', 'description', DB::raw('CASE Status WHEN 0 THEN "On Process" WHEN 1 THEN "Process" WHEN 2 THEN "Cencel" WHEN 3 THEN "Approval" WHEN 4 THEN "Closed" END AS status'), 'created_at')->where('created_by', Auth::user()->id)->get();

    // return $model;
    return DataTables::of($model)
      ->make(true);
  }

  public function listHistory()
  {
    $user_id = Auth::user()->id;
    // $query = DB::table('memo AS A')
    //   ->leftJoin('mstiket AS B', 'A.tiket_id', '=', 'B.id')
    //   ->leftJoin('v_check AS C', 'A.id', '=', 'C.memo_id')
    //   ->select(
    //     'A.id',
    //     'A.kode',
    //     'A.kode AS name',
    //     'A.auto_kode',
    //     'C.tiket_id',
    //     'C.result',
    //     'B.jenis_complain',
    //     'B.category',
    //     'A.pesan',
    //     'C.description',
    //     'C.images',
    //     'A.status AS mark'
    //   )
    //   ->whereIn('A.status', ['1', '2'])->get();
    $query = DB::table('memo AS A')
      ->join('mstiket AS B', 'A.tiket_id', '=', 'B.id')
      ->select(
        'A.tiket_id As id',
        'b.category',
        'A.kode',
        'A.kode AS name',
        'A.pesan',
        'A.status AS mark'
      )->groupBy(['A.kode'])->get();
    return DataTables::of($query)
      ->addColumn('status', function ($model) {
        return view('layouts._status', [
          'model' => $model
        ]);
      })
      ->addColumn('action', function ($model) {
        return view('layouts._buttom', [
          'model' => $model,
          'url_show' => route('history.timememo', $model->id)
        ]);
      })
      ->addIndexColumn()
      ->rawColumns(['status', 'action'])
      ->make(true);
  }
  /**
   * for history kepala bagian, pmqa, inspeksi
   * index function
   */
  public function getHistory()
  {
    return view('pages.history.index');
  }
  public function historyMemo($id)
  {
    $tiket = Mstiket::findOrfail($id);
    $timeline = DB::table('vtimehistory AS A')
      ->join('users AS B', 'A.users', '=', 'B.id')
      ->select('A.*', 'B.name', 'b.avatar')
      ->where('A.id', $id)->orderBy('A.urutan')->get();
    return view('pages\timeline\index', ['timeline' => $timeline, 'title' => 'Detail History Memo', 'tiket' => $tiket, 'header' => 'History Memo']);
  }
}