<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Memo extends Model
{
  use AutoNumberTrait;
  /**/
  protected $fillable = [
    'kode',
  ];

  protected $table = 'memo';

  /**
   * Return the autonumber configuration array for this model.
   *
   * @return array
   */
  public function getAutoNumberOptions()
  {
    // if ($key == 'PROD') {
    return [
      'auto_kode' => [
        'format' => 'PROD-?', // autonumber format. '?' will be replaced with the generated number.
        'length' => 4 // The number of digits in an autonumber
      ]
    ];
    // } else {
    //      return [
    //           'auto_number' => [
    //                'format' => 'INS-?', // autonumber format. '?' will be replaced with the generated number.
    //                'length' => 4 // The number of digits in an autonumber
    //           ]
    //      ];
    // }
  }
  public static function getNumber($char)
  {
    $query = DB::table('memo')
      ->select(DB::raw('MAX(RIGHT(auto_kode,4)) AS mID'))
      ->first();
    $code =  $query->mID;
    $get = (int) $code;
    $get++;
    return  $char . sprintf("%04s", $get);
  }

  public static function getMemoTiket($id)
  {
    $user = User::where('role_id', 4)->firstOrFail();

    $data = [];
    $query = DB::table('memo')
      ->join('mstiket', 'memo.tiket_id', '=', 'mstiket.id')
      ->select(
        "memo.id",
        "mstiket.id AS tiket_id",
        "memo.kode",
        "memo.auto_kode",
        "memo.pesan",
        "mstiket.category",
        "mstiket.jenis_complain",
        DB::raw("'P' AS kind_id ")
      )
      ->where([
        ['memo.id', $id], ['memo.to_user_id', $user->id]
      ])
      ->get();
    foreach ($query as $key) {
      $data['id'] = $key->id;
      $data['tiket_id'] = $key->tiket_id;
      $data['kode'] = $key->kode;
      $data['auto_kode'] = $key->auto_kode;
      $data['pesan'] = $key->pesan;
      $data['category'] = $key->category;
      $data['jenis_complain'] = $key->jenis_complain;
      $data['kind_id'] = $key->kind_id;
    }
    return $data;
  }
  public static function getMemo($id)
  {
    $user = Auth::user()->id;

    $data = [];
    $query = DB::table('memo')
      ->join('mstiket', 'memo.tiket_id', '=', 'mstiket.id')
      ->select(
        "memo.id",
        "mstiket.id AS tiket_id",
        "memo.kode",
        "memo.auto_kode",
        "memo.pesan",
        "mstiket.category",
        "mstiket.jenis_complain"
      )
      ->where([
        ['memo.id', $id], ['memo.to_user_id', $user]
      ])
      ->get();
    foreach ($query as $key) {
      $data['id'] = $key->id;
      $data['tiket_id'] = $key->tiket_id;
      $data['kode'] = $key->kode;
      $data['auto_kode'] = $key->auto_kode;
      $data['pesan'] = $key->pesan;
      $data['category'] = $key->category;
      $data['jenis_complain'] = $key->jenis_complain;
      $data['kind_id'] = null;
    }
    return $data;
  }
}