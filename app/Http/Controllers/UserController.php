<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pages.user.index', ['title' => 'Data User']);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.user.form');
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
      'nama' => 'required|string',
      'email' => 'required|string|email|unique:users,email',
      'username' => 'required|unique:users,username'
    ]);
    $user = new \App\User;
    $user->name = $request->nama;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->role_id = $request->role;
    if ($request->file('avatar')) {
      $file = $request->file('avatar')->store('/avatar', 'public');
      $user->avatar = '/' . $file;
    }
    $user->status = $request->status;
    $user->save();

    return ['message' => 'Berhasil Tersimpan', 'pesan' => 'success'];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user = \App\user::findOrfail($id);
    return view('pages.user.edit', ['user' => $user]);
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
    $user = \App\user::findOrfail($id);

    if ($request->hasFile('avatar')) {
      $file = $request->file('avatar')->store('/avatar', 'public');
      $user->avatar = '/' . $file;
    }
    //
    if ($request->file('avatar')) {
      if ($user->avatar && file_exists(storage_path('avatar/public/' . $user->avatar))) {
        \Storage::delete('public/' . $user->avatar);
      }
      $file = $request->file('avatar')->store('/avatar', 'public');
      $user->avatar = $file;
    }
    $user->role_id = $request->get('role');
    $user->status = $request->get('status');
    $user->update();
    return ['message' => 'Berhasil Tersimpan', 'pesan' => 'success'];
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

  /**
   * profile user management
   * @param int
   * @return \Illuminate\Http\Response
   */
  public function profile()
  {
    $id = Auth::user()->id;
    $data = User::findOrfail($id);

    // return $data;
    return view('pages\user\profile');
  }

  public function load(Request $request)
  {
    $id = Auth::user()->role_id;
    if ($request->has('q')) {
      $find = $request->q;
      $data = DB::table('users')->select('id', 'name')->where('name', 'LIKE', '%' . $find . '%')->whereNotIn('role_id', ['1', '2', '6', $id])->get();
      return response()->json($data);
    }
  }

  public function dataTable()
  {
    $auth = Auth::user()->id;
    $query = User::whereNotIn('role_id', ['6'])->whereNotIn('id', [$auth])->get();
    return DataTables::of($query)
      ->addColumn('action', function ($model) {
        $btn = '<a href="' . route('edit.user', $model->id) . '" class="modal-show-edit edit" title="Edit ' . $model->name . '"><i class="fas fa-edit"></i></a>';
        return $btn;
      })
      ->addColumn('gambar', function ($model) {
        return view('layouts._images', [
          'model' => $model
        ]);
      })
      ->addIndexColumn()
      ->rawColumns(['action', 'gambar'])
      ->make(true);
  }
}