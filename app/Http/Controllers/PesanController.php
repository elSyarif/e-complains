<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;
use \App\Mstiket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  /**
   * get pesan tiket yang baru saja di buat oleh costumer dan di tampilkan pada notif pesan
   * dengan status 0 ketika dibuatkan memo akan berubah ke notif 1
   *
   * membuat memo
   */
  public function getTiket()
  {
    $user = Auth::user()->role_id;
    $tiket = Mstiket::where('notif', 0)->get();
    if ($user != 6) {
      return ['status' => true, 'message' => $tiket, 'role' => $user, 'count' => count($tiket)];
    } else {
      return ['status' => false, 'message' => 'access denied'];
    }
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\odel  $odel
   * @return \Illuminate\Http\Response
   */
  public function update_status(Request $request)
  {
    $id = $request->get('id');
    $tiket = Mstiket::findOrfail($id);
    $tiket->status = '1';

    $tiket->save();

    return (['status' => 'success']);
    // return $cari;
  }
  /*
        get memo dengan status 0
        Notofikasi kememo yang di tuju untuk di tundak lanjuti
    */
  public function getMemo()
  {
    $user = Auth::user()->role_id;
    $tiket = Memo::where(['notif' => 0, 'to_user_id' => Auth::user()->id])->get();
    if ($user != 6) {
      return ['status' => true, 'message' => $tiket, 'role' => $user, 'count' => count($tiket)];
    } else {
      return ['status' => false, 'message' => 'access denied'];
    }
  }
  /**
   * get final inspek untuk persetujua direktur / Manager Produksi
   */
  public function getAproval()
  {
    $user = Auth::user()->role_id;
    $tiket = Mstiket::where(['status' => 3, 'notif' => 3])->get();

    if ($user == 2 or $user == 3) {
      return ['status' => true, 'message' => $tiket, 'role' => $user, 'count' => count($tiket)];
    } else {
      return ['status' => false, 'message' => 'access denied'];
    }
  }
  public function getProduct()
  {
    $user = Auth::user()->role_id;
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
        'B.description AS pesan',
        'B.images',
        'B.status AS mark',
        'B.created_at'
      )->where('A.notif', '=', '2')->get();

    if ($user == 5) {
      return ['status' => true, 'message' => $model, 'role' => $user, 'count' => count($model)];
    } else {
      return ['status' => false, 'message' => 'access denied'];
    }
  }
}