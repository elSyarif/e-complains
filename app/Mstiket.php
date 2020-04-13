<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Mstiket extends Model
{
  /**/
  protected $table = 'mstiket';
  protected $fillable = ['images'];

  public function user()
  {
    return $this->belongsTo("App\User");
  }

  public static function result($id)
  {
    $data = [];
    $query = DB::table('mstiket AS A')
      ->join('users AS B', 'A.created_by', '=', 'B.id')
      ->join('msinspek AS C', 'A.id', '=', 'C.tiket_id')
      ->select(
        'A.id',
        'A.category',
        'A.kode',
        'A.jenis_complain',
        'A.images AS before',
        'A.description AS complain',
        'B.name AS costumer',
        'C.description AS hasil',
        'C.result',
        'C.images AS after'
      )->where([['A.status', 3], ['A.id', $id]])->groupBy(['A.kode', 'A.category'])->get();

    foreach ($query as $key) {
      $data['id'] = $key->id;
      $data['category'] = $key->category;
      $data['kode'] = $key->kode;
      $data['jenis_complain'] = $key->jenis_complain;
      $data['before'] = $key->before;
      $data['complain'] = $key->complain;
      $data['costumer'] = $key->costumer;
      $data['hasil'] = $key->hasil;
      $data['result'] = $key->result;
      $data['after'] = $key->after;
    }
    return $data;
  }
  public static function export($id)
  {
    $data = [];
    $query = DB::table('mstiket AS A')
      ->join('users AS B', 'A.created_by', '=', 'B.id')
      ->join('msinspek AS C', 'A.id', '=', 'C.tiket_id')
      ->leftJoin('msproduck AS D', 'A.id', '=', 'D.tiket_id')
      ->select(
        DB::raw('DISTINCT A.id as id'),
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
      )->where([['A.status', 4], ['A.id', $id]])->groupBy(['A.kode', 'A.category'])->get();

    foreach ($query as $key) {
      $data['id'] = $key->id;
      $data['category'] = $key->category;
      $data['kode'] = $key->kode;
      $data['jenis_complain'] = $key->jenis_complain;
      $data['before'] = $key->before;
      $data['complain'] = $key->complain;
      $data['costumer'] = $key->costumer;
      $data['hasil'] = $key->hasil;
      $data['hasil_produksi'] = $key->hasil_produksi;
      $data['result'] = $key->result;
      $data['after'] = $key->after;
    }
    return $data;
  }
}