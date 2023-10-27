<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MyCustomAuthController extends Controller
{
    public function isAlreadyLogin(){
        if(session('user_data')){
            return redirect()->route('admin.blog_posts');
        }else{
            return view('admin.login');
        }
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            "uname" => "required|string|max:50",
            "pword" => "required|string|max:50"
        ]);
        if($validator->fails()){
            $validator->errors()->add('uname', 'username or password is wrong');
            $validator->errors()->add('pword', 'username or password is wrong');
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $res = DB::table("users")->where(["uname" => $request->uname,"pword" => md5($request->pword)])->get();
            if(count($res) == 1){
                session()->put('user_data',$res[0]);
                return redirect()->route('admin.blog_posts');
            }else{
                $validator->errors()->add('uname', 'username or password is wrong');
                $validator->errors()->add('pword', 'username or password is wrong');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }
    public function logout(){
        session()->forget('user_data');
        return redirect()->route('admin.login');
    }
}
