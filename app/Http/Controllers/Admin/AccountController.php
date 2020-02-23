<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\User;

//Account Controller Backend
class AccountController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  //employee Database
  public function employee_list()
  {
    $data = User::all();
    return view('admin/employee_list', compact('data'));
  }
  //admin list
  public function admin_list()
  {
    $data = Admin::all();
    return view('admin/admin_list',compact('data'));
  }
  //add new user view
  public function add_user()
  {
    return view('admin/add_user');
  }
//delete employee_list
  public function destroy(User $id)
  {
    $data = User::where('id','=', $id->id)->first();
    $data->delete();
    return response()->json();
  }
  //edit user profile
  public function update(User $id)
  {
    $data = User::where('id', '=', $id->id)->first();
    $data->name = request('name');
    $data->email = request('email');
    $data->number = request('number');
    $data->address = request('address');
    $data->sss = request('sss');
    $data->tin = request('tin');
    $data->philhealth = request('philhealth');
    $data->hdmf = request('hdmf');
    $data->birthdate = request('birthdate');
    $data->employment_date = request('employment_date');
    $data->nationality = request('nationality');
    $data->civil_status = request('civil_status');
    $data->save();
    return response()->json();
  }
  //delete admin
  public function destroy_admin(Admin $id)
  {
    $data = Admin::where('id', '=' , $id->id)->first();
    $data->delete();
    return response()->json();
  }
  //update admin
   public function update_admin(Admin $id)
  {
    $data = Admin::where('id', '=', $id->id)->first();
    $data->name = request('name');
    $data->email = request('email');
    $data->number = request('number');
    $data->address = request('address');
    $data->sss = request('sss');
    $data->tin = request('tin');
    $data->philhealth = request('philhealth');
    $data->hdmf = request('hdmf');
    $data->birthdate = request('birthdate');
    $data->employment_date = request('employment_date');
    $data->nationality = request('nationality');
    $data->civil_status = request('civil_status');
    $data->save();
    return response()->json();
  }
  //add user backend
  public function register_user()
  {
    $this->validate(request(),
      [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);
    User::create([
      'name' => request('name'),
      'email' => request('email'),
      'password' => bcrypt(request('password')),
    ]);
return back()->with('status','User added!');
  }
}
