<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategories(){
        $res = DB::table("category")->orderBy('cid','desc')->simplePaginate(5);
        return view("admin.categories",["data" => $res]);
    }
    public function addCategory(Request $request){
        $isValid = $request->validate([
            "cname" => "required"
        ]);
        if($isValid){
            $res = DB::table("category")->insert(["cname" => $request->cname,"created_at" => now(),"updated_at" => now()]);
            if($res){
                return redirect()->route('admin.categories');
            }else{
                return redirect($request->fullUrl());
            }
        }else{
            return redirect($request->fullUrl());
        }
    }
    public function editCategoryForm(int $id=null){
        if(is_numeric($id)){
            $res = DB::table('category')->where('cid',$id)->get();
            if(count($res) == 1){
                return view("admin.edit_cat",["data" => $res]);
            }else{
                return redirect()->route('admin.categories');
            }
        }else{
            return redirect()->route('admin.categories');
        }
    }
    public function editCategoryData(Request $request){
        $isValid = $request->validate([
            "cname" => "required",
            "cid" => "numeric"
        ]);
        if($isValid){
            $res = DB::table("category")->where('cid',$request->cid)->update(["cname" => $request->cname,"updated_at" => now()]);
            if($res){
                return redirect()->route('admin.categories');
            }else{
                return redirect($request->fullUrl());
            }
        }else{
            return redirect($request->fullUrl());
        }
    }
    public function deleteCategory(int $id=null){
        if(is_numeric($id)){
            $cat = DB::table('category')->where('cid', $id)->first();
            if($cat){
                if($cat->post_under_cat == 0){
                    DB::table('category')->where('cid', $id)->delete();
                }
                return redirect()->route('admin.categories');
            }
            return redirect()->route('admin.categories');
        }
        return redirect()->route('admin.categories');
    }
}
