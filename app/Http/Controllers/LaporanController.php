<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mstiket;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{
  //
  public function index()
  {
    $user = Auth::user()->role_id;
    if ($user == 6) {
      $tiket = Mstiket::where(['created_by' => Auth::user()->id, 'status' => 4])->get();
      return  view('pages.laporan.user_pdf', ['title' => 'Laporan Komplain', 'tiket' => $tiket]);
    } else {
      return view('pages.laporan.index', ['title' => 'Laporan Komplain']);
    }
  }
  public function datasets()
  {
    $result = DB::table('msproduck AS A')
      ->select(
        'A.result',
        DB::raw('COUNT(A.result) AS count'),
        DB::raw('DATE_FORMAT(A.created_at, "%M") AS date')
      )
      ->groupBy(['A.result', DB::raw('DATE_FORMAT(A.created_at, "%Y%m")')])
      ->get();

    return response()->json($result);
  }
  public function chartData()
  {
    $result = DB::table('msproduck AS A')
      ->select(
        'A.result',
        DB::raw('COUNT(A.result) AS count'),
        DB::raw('DATE_FORMAT(A.created_at, "%M") AS date')
      )
      ->groupBy(['A.result', DB::raw('DATE_FORMAT(A.created_at, "%Y%m")')])
      ->get();

    return response()->json(collect([
      'labels' => ['january', 'february'],
      'datasets' => $result,
    ])->toJson());
  }
  public function chart()
  {
    //date
    $date = DB::table('msproduck AS A')
      ->select(
        DB::raw('DATE_FORMAT(A.created_at, "%M") AS date')
      )->where(DB::raw('DATE_FORMAT(A.created_at, "%Y")'), '=', DB::raw('YEAR(CURDATE())'))
      ->groupBy([DB::raw('DATE_FORMAT(A.created_at, "%Y%m")')])
      ->get()->toArray();
    $date = array_column($date, 'date');

    $assembling = DB::table('msproduck AS A')
      ->select(
        'A.result',
        DB::raw('COUNT(A.result) AS count'),
        DB::raw('DATE_FORMAT(A.created_at, "%M") AS date')
      )->where('A.result', '=', 'Assembling')
      ->where(DB::raw('DATE_FORMAT(A.created_at, "%Y")'), '=', DB::raw('YEAR(CURDATE())'))
      ->groupBy(['A.result', DB::raw('DATE_FORMAT(A.created_at, "%Y%m")')])
      ->get()->toArray();
    $assembling = array_column($assembling, 'count');

    $cutting = DB::table('msproduck AS A')
      ->select(
        'A.result',
        DB::raw('COUNT(A.result) AS count'),
        DB::raw('DATE_FORMAT(A.created_at, "%M") AS date')
      )->where('A.result', '=', 'Cutting')
      ->where(DB::raw('DATE_FORMAT(A.created_at, "%Y")'), '=', DB::raw('YEAR(CURDATE())'))
      ->groupBy(['A.result', DB::raw('DATE_FORMAT(A.created_at, "%Y%m")')])
      ->get()->toArray();
    $cutting = array_column($cutting, 'count');

    $sewing = DB::table('msproduck AS A')
      ->select(
        'A.result',
        DB::raw('COUNT(A.result) AS count'),
        DB::raw('DATE_FORMAT(A.created_at, "%M") AS date')
      )->where('A.result', '=', 'Sewing')
      ->where(DB::raw('DATE_FORMAT(A.created_at, "%Y")'), '=', DB::raw('YEAR(CURDATE())'))
      ->groupBy(['A.result', DB::raw('DATE_FORMAT(A.created_at, "%Y%m")')])
      ->get()->toArray();
    $sewing = array_column($sewing, 'count');

    $stockfit = DB::table('msproduck AS A')
      ->select(
        'A.result',
        DB::raw('COUNT(A.result) AS count'),
        DB::raw('DATE_FORMAT(A.created_at, "%M") AS date')
      )->where('A.result', '=', 'Stockfit')
      ->where(DB::raw('DATE_FORMAT(A.created_at, "%Y")'), '=', DB::raw('YEAR(CURDATE())'))
      ->groupBy(['A.result', DB::raw('DATE_FORMAT(A.created_at, "%Y%m")')])
      ->get()->toArray();
    $stockfit = array_column($stockfit, 'count');

    return view('pages.laporan.chart')
      ->with('title', 'Rekapitulasi Data komplain')
      ->with('date', json_encode($date, JSON_INVALID_UTF8_IGNORE))
      ->with('cutting', json_encode($cutting, JSON_NUMERIC_CHECK))
      ->with('sewing', json_encode($sewing, JSON_NUMERIC_CHECK))
      ->with('stockfit', json_encode($stockfit, JSON_NUMERIC_CHECK))
      ->with('assembling', json_encode($assembling, JSON_NUMERIC_CHECK));
  }

  public function tiketPdf()
  {
    $model = DB::table('mstiket AS A')
      ->join('users AS B', 'A.created_by', '=', 'B.id')
      ->join('msinspek AS C', 'A.id', '=', 'C.tiket_id')
      ->leftJoin('msproduck AS D', 'A.id', '=', 'D.tiket_id')
      ->select(
        DB::raw('DISTINCT A.id AS id'),
        'A.category',
        'A.kode',
        'A.jenis_complain',
        'A.images AS before',
        'A.description AS complain',
        'B.name AS costumer',
        'C.description AS hasil',
        'D.description AS hasil_produksi',
        'D.result',
        'C.images AS after'
      )->where('A.status', 4)->groupBy(['A.kode', 'A.category'])->get();

    $pdf = PDF::loadView('pages.laporan.tiket_pdf', ['model' => $model])
      ->setPaper('A4', 'potrait');;
    return $pdf->stream();
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function exportPdf(Request $request)
  {
    $id = $request->get('TiketComplain');
    $model = Mstiket::export($id);
    $pdf = PDF::loadView('pages.laporan.export', ['model' => $model])
      ->setPaper('A4', 'potrait');;
    return $pdf->stream();
  }

  public function downloadPdf()
  {
    $filename = 'Laporan-tiket-' . date('YmdHis') . '.pdf';
    $model = DB::table('mstiket AS A')
      ->join('users AS B', 'A.created_by', '=', 'B.id')
      ->join('msinspek AS C', 'A.id', '=', 'C.tiket_id')
      ->leftJoin('msproduck AS D', 'A.id', '=', 'D.tiket_id')
      ->select(
        'A.id',
        'A.category',
        'A.kode',
        'A.jenis_complain',
        'A.images AS before',
        'A.description AS complain',
        'B.name AS costumer',
        'C.description AS hasil',
        'D.description AS hasil_produksi',
        'C.result',
        'C.images AS after'
      )->where('A.status', 4)->groupBy(['A.kode', 'A.category'])->get();

    $pdf = PDF::loadView('pages.laporan.tiket_pdf', ['model' => $model])
      ->setPaper('A4', 'potrait');;
    return $pdf->download($filename);
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
      )->where('A.status', 4)->groupBy(['A.kode', 'A.category'])->get();

    return DataTables::of($model)
      // ->addColumn('action', function ($model) {
      //   $btn = '<a href="' . route('result.show', $model->id) . '" class="btn-show" title="Detail : ' . $model->name . '"><i class="fas fa-eye"></i></a>';
      //   $btn = $btn . ' | <a href="' . route('result.insert', $model->id) . '" class="modal-show-result edit" title="Edit ' . $model->name . '"><i class="fas fa-check"></i></i></a>';
      //   return $btn;
      // })
      ->addIndexColumn()
      // ->rawColumns(['action'])
      ->make(true);
  }
}