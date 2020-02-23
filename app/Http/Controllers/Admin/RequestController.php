<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Requisition;

//request backend
class RequestController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function get_request()
    {
 	$data = Requisition::select('requisitions.id as req_id', 'requisitions.*','users.id', 'users.name')->join('users','requisitions.user_id', '=', 'users.id')->orderBy('requisitions.created_at', 'DESC')->paginate(7);
    	return view('admin/request', compact('data'));
    }
//request join table
    public function accept_request(Requisition $id)
    {
    	$data = Requisition::where('id', '=', $id->id)->first();
    	$data->status = 1;
    	$data->save();
    	$response = ['msg' => 'Request Accepted'];
    	return response()->json($response);
    }
    public function decline_request(Requisition $id)
    {
    	$data = Requisition::where('id', '=', $id->id)->first();
    	$data->status = 2;
    	$data->note = request('note');
    	$data->save();
    	$response = ['msg' => 'Request Declined'];
    	return response()->json($response);
    }
}
