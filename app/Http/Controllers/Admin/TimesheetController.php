<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Timesheet;
use App\User;
use App\Adminlogs;

//Timesheet Backend
class TimesheetController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function timesheet()
    {
       $today = Carbon::today();
        $yesterday = Carbon::yesterday(); 
        $entry = request('entry');
        if (request('entry') == 'today') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->where('date', '=', $today)->orderBy('timesheets.created_at','DESC')->get();
        }
        elseif (request('entry') == 'yesterday') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->where('date', '=', $yesterday)->orderBy('timesheets.created_at','DESC')->get();
        }
        elseif (request('entry') == 'all') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->orderBy('timesheets.created_at','DESC')->get();
        }
        elseif (request('entry') == 'last entries') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->orderBy('timesheets.created_at','DESC')->limit(100)->get();
        }
        else {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->orderBy('timesheets.created_at','DESC')->get();
        }
        return view('admin/timesheet', compact('data','entry'));
    }
     public function admin_timesheet()
    {  
            $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $entry = request('entry');
        if (request('entry') == 'today') {
          $data = Adminlogs::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->where('date', '=', $today)->orderBy('adminlogs.created_at','DESC')->get();
        }
        elseif (request('entry') == 'yesterday') {
          $data = Adminlogs::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->where('date', '=', $yesterday)->orderBy('adminlogs.created_at','DESC')->get();
        }
        elseif (request('entry') == 'all') {
          $data = Adminlogs::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->orderBy('adminlogs.created_at','DESC')->get();
        }
        elseif (request('entry') == 'last entries') {
          $data = Adminlogs::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->orderBy('adminlogs.created_at','DESC')->limit(100)->get();
        }
        else {
          $data = Adminlogs::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->orderBy('adminlogs.created_at','DESC')->get();
        }
        return view('admin/admin_timesheet', compact('data','entry'));
    }
    public function filter_date()
    {
        
      }
    public function truncate()
    {
        $data = Timesheet::truncate();
        return response()->json();
    }
     public function truncate_admin()
    {
        $data = Adminlogs::truncate();
        return response()->json();
    }
}
  