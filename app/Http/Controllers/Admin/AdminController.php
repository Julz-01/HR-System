<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\Adminlogs;
use App\Admin;
use App\Announcement;

//Admin Controller Backend
class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  //admin home page
  public function direct()
  {
    $data = Adminlogs::where('admin_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(4);
    $last = Adminlogs::where('admin_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
    $total_rows = count(Adminlogs::where('id', '=', Auth::user()->id)->get());
    $time_total = Adminlogs::selectRaw('SUM(time_total) as sum')->where('id', '=', Auth::user()->id)->first();
    $total_mins = ($time_total->sum) - ($total_rows);
    $formatted_total = number_format($total_mins);
    $announce = Announcement::all();
    return view('admin/home', compact('data','last','total_rows','total_mins','formatted_total','announce'));
  }
  //time in
  public function timein()
  {
    Adminlogs::create([
      'time_in' => Carbon::now(),
      'date' => Carbon::today(),
      'admin_id' => Auth::user()->id,
      'admin_name' => Auth::user()->name,
    ]);
    return back();
  }
  //time-out
  public function timeout(Adminlogs $id)
  {
    $data = Adminlogs::where('id', '=', $id->id)->first();
    $data->time_out = Carbon::now();
    $date_total = Carbon::now()->diffInHours($data->time_in);
    $data->time_total = $date_total;
    $data->save();
    return back();
  }

}
