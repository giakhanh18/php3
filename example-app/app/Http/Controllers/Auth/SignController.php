<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{

    //list account
    public function index(Request $request){
        $account = DB::table('users')
        ->whereNull('deleted_at')
        ->get();
        return view('auth.index',compact('account'));
    }
    // edit account
    public function edit(Request $request,$id){
        $account = User::find($id);
        if($request->isMethod('POST')){
            $parmas = $request->except('_token');
            DB::table('users')->where('id',$id)->update($parmas);
        }
        return view('auth.edit',compact('account'));
    }
    //delete account
    public function delete($id){
        User::where('id',$id)->delete();
        Session::flash('success','xóa thanh cong sv'.$id);
        return redirect()->route('route_account');
    }
}