<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Announcement;
use App\Admin;

//Announcement Backend
class AnnounceController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }
//announcement view
  public function announce()
  {
    $data = Announcement::all();
    return view('admin/announcement',compact('data'));
  }
//update announce
  public function up_announce()
  {
    $data = Announcement::where('id', '=', 1)->first();
    $data->posted_by = Auth::user()->name;
    $data->announce = request('announce');
    $data->event = request('event');
    $data->save();
    return back();
  }
}
