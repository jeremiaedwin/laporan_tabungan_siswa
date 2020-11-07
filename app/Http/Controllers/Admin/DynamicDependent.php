<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DynamicDependent extends Controller
{
    function index(){
    	$users = DB::table('users')->groupBy('user')->get();
    	return view('admin.setor.create', compact('user'));
    }
}
