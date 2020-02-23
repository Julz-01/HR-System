<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Announcement;
use App\Timesheet;
use App\Requisition;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    
     public function index()
   {
    $data = Timesheet::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(4);
    $last = Timesheet::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
    $total_rows = count(Timesheet::where('id', '=', Auth::user()->id)->get());
    $time_total = Timesheet::selectRaw('SUM(time_total) as sum')->where('id', '=', Auth::user()->id)->first();
    $total_mins = ($time_total->sum) - ($total_rows);
    $formatted_total = number_format($total_mins);
    $announce = Announcement::all();
    return view('user/home', compact('data','last','total_rows','total_mins','formatted_total','announce'));
  }
  //time in
  public function timein()
  {
    Timesheet::create([
      'time_in' => Carbon::now(),
      'date' => Carbon::today(),
      'user_id' => Auth::user()->id,
      'user_name' => Auth::user()->name,
    ]);
    return back();
  }
  //time-out
  public function timeout(Timesheet $id)
  {
    $data = Timesheet::where('id', '=', $id->id)->first();
    $data->time_out = Carbon::now();
    $date_total = Carbon::now()->diffInHours($data->time_in);
    $data->time_total = $date_total;
    $data->save();
    return back();
  }
  //profile
  public function profile()
  {
  	$data = User::where('id', '=', Auth::user()->id)->get();
  	return view('user/profile',compact('data'));
  }
  //request
    public function request()
  {

$data = Requisition::select('requisitions.id', 'requisitions.*','users.id','users.*')->join('users', 'requisitions.user_id', '=', 'users.id')->where('users.id','=', Auth::user()->id)->orderBy('requisitions.created_at', 'DESC')->paginate(7);
      return view('user/request',compact('data'));
  }    
    public function send_request()
  {
        $this->validate(request(),[
        'date' => 'required',
        'reason' => 'required',
        'type' => 'required',
      ]);
      Requisition::create([
        'user_id' => Auth::user()->id,
        'date' => request('date'),
        'reason' => request('reason'),
        'status' => 0 ,
        'type' => request('type'),
      ]);
      return back();
   }
}
