<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.dashboard');
    }
    public function inactiveUser(){
        $users = User::where('role','user')->where('status','0')->latest()->get();
        return view('admin.inactive',compact('users'));

    }
    public function activeUser(){
        $users = User::where('role','user')->where('status','1')->latest()->get();
        return view('admin.active',compact('users'));

    }
    public function inactiveapprove($id){
        $approve = User::findOrFail($id);
        $approve->status = "1";
        $approve->update();
        return redirect()->route('active.user')->with('success','approved');

    }
    public function activeapprove($id){
        $inapprove = User::findOrFail($id);
        $inapprove ->status = "0";
        $inapprove->update();

        return redirect()->route('inactive.user')->with('success','inactive approved');

    }
}
