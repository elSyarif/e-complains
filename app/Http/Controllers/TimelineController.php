<?php

namespace App\Http\Controllers;

use App\Mstiket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TimelineController extends Controller
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

  public function index($id)
  {
    $tiket = Mstiket::findOrfail($id);
    $timeline = DB::table('vtimeline AS A')
      ->join('users AS B', 'A.users', '=', 'B.id')
      ->select('A.*', 'B.name', 'b.avatar')
      ->where('A.id', $id)->get();
    return view('pages\timeline\index', ['timeline' => $timeline, 'title' => 'Timeline Tiket Complain', 'tiket' => $tiket, 'header' => 'Timeline']);
  }

  public function timeline()
  {
    return view('pages.timeline.list');
  }

  public function dataStatus()
  {
    $user_id = Auth::user()->id;
    $model = DB::table('mstiket AS A')
      ->select(
        'A.*',
        'A.kode AS name',
        'A.status AS mark'
      )
      ->where([['A.created_by', '=', $user_id]])->get();
    return DataTables::of($model)
      ->addColumn('action', function ($model) {
        return view('layouts._buttom', [
          'model' => $model,
          'url_show' => route('time.status', $model->id)
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