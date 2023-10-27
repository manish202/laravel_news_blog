<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function getUsers(){
        $res = DB::table("users")->orderBy('uid','desc')->simplePaginate(5);
        return view("admin.users",["data" => $res]);
    }
    public function addUser(Request $request){
        $isValid = $request->validate([
            "fname" => "required|string|max:50",
            "lname" => "required|string|max:50",
            "uname" => "required|string|max:50",
            "pword" => "required|string|max:50",
            "role"  => "required|integer|in:1,2",
        ]);
        if($isValid){
            $res = DB::table("users")
            ->insert([
                "fname" => $request->fname,
                "lname" => $request->lname,
                "uname" => $request->uname,
                "pword" => md5($request->pword),
                "role" => $request->role,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            if($res){
                return redirect()->route('admin.users');
            }else{
                return redirect($request->fullUrl());
            }
        }else{
            return redirect($request->fullUrl());
        }
    }
    public function editUserForm(int $id=null){
        if(is_numeric($id)){
            $res = DB::table('users')->where('uid',$id)->get();
            if(count($res) == 1){
                return view("admin.edit_user",["data" => $res]);
            }else{
                return redirect()->route('admin.users');
            }
        }else{
            return redirect()->route('admin.users');
        }
    }
    public function editUserData(Request $request){
        $isValid = $request->validate([
            "uid" => "required|integer",
            "fname" => "required|string|max:50",
            "lname" => "required|string|max:50",
            "uname" => "required|string|max:50",
            "role"  => "required|integer|in:1,2"
        ]);
        if($isValid){
            $res = DB::table("users")->where('uid',$request->uid)
            ->update([
                "fname" => $request->fname,
                "lname" => $request->lname,
                "uname" => $request->uname,
                "role" => $request->role,
                "updated_at" => now()
            ]);
            if($res){
                return redirect()->route('admin.users');
            }else{
                return redirect($request->fullUrl());
            }
        }else{
            return redirect($request->fullUrl());
        }
    }
    public function deleteUser(int $id=null){
        if(is_numeric($id)){
            $user = DB::table('users')->where('uid', $id)->first();
            if($user){
                if($user->post_under_user == 0){
                    DB::table('users')->where('uid', $id)->delete();
                }
                return redirect()->route('admin.users');
            }
            return redirect()->route('admin.users');
        }
        return redirect()->route('admin.users');
    }
}