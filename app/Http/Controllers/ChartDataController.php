<?php

namespace App\Http\Controllers;

use App\msproduck;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartDataController extends Controller
{

  function getDataSet()
  {
    $produk = [];
    $msproduck =  msproduck::select(
      'result'
    )
      ->groupBy(['result'])
      ->pluck('result');
    $msproduck = \json_decode($msproduck);
    if (!empty($msproduck)) {
      foreach ($msproduck as $key => $unDate) {
        $pas = $unDate;
        $produk[$key] = $pas;
      }
    }
    return $msproduck;
  }

  function getDataSetCount($result)
  {

    $datasets = msproduck::select(
      DB::raw('COUNT(result) AS count'),
      DB::raw('DATE_FORMAT(created_at, "%M") AS date')
    )->where('result', '=', $result)
      ->groupBy(['result', DB::raw('DATE_FORMAT(created_at, "%Y%m")')])
      ->get()->toArray();
    return $datasets;
  }

  function getMonth()
  {
    $month = [];
    $inspeckDate = msproduck::orderBy('created_at', 'ASC')->pluck('created_at');
    $inspeckDate = \json_decode($inspeckDate);
    if (!empty($inspeckDate)) {
      foreach ($inspeckDate as $unDate) {
        $date = new DateTime($unDate->date);
        $month_no = $date->format('m');
        $month_name = $date->format('M');
        $month[$month_no] = $month_name;
      }
    }
    return $month;
  }

  function getMonthCount($month)
  {
    $monthCount  = msproduck::whereMonth('created_at', $month)->get()->count();
    return $monthCount;
  }

  function getMonthData()
  {
    $monthCount = [];
    $month_name_ar = [];
    $month = $this->getMonth();
    if (!empty($month)) {
      foreach ($month as $month_no  => $month_name) {
        $monthCount_pos = $this->getMonthCount($month_no);
        array_push($monthCount, $monthCount_pos);
        array_push($month_name_ar, $month_name);
      }
    }
    // datasets
    $datasets_ar = [];
    $datasets_coun = [];
    $datasets = $this->getDataSet();
    if (!empty($datasets)) {
      foreach ($month as $data_key  => $datasets_co) {
        $datasets_count = $this->getDataSetCount($month_no);
        // array_push($datasets_ar, $datasets_co);
        // array_push($datasets_coun, $datasets_count);
        $datasets_ar['label'] = $datasets_count;
      }
    }


    $max_no = max($monthCount);
    $max    =  round(($max_no + 10 / 2) / 10) * 10;

    $result = [
      'labels' => $month_name_ar,
      'count'  => $monthCount,
      'datasets'  => [$datasets_ar, 'data' => $datasets_coun],
      'max'    => $max
    ];

    return $result;
  }
}