<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function getPosts(){
        $user_obj = session("user_data");
        $res = DB::table("posts")->select("posts.pid","posts.ptitle","posts.pdesc","posts.pimage","posts.created_at","posts.updated_at","category.cname","users.fname","users.lname")
        ->when($user_obj->role == 2,
        function($query){
            $query->where('pauthor',session("user_data")->uid);
        })
        ->join("category","posts.pcat","=","category.cid")
        ->join("users","posts.pauthor","=","users.uid")
        ->orderBy('pid','desc')->simplePaginate(5);
        return view("admin.blog_posts",["data" => $res]);
    }
    public function addPostWithCat(){
        $res = DB::table("category")->orderBy('cid','desc')->get();
        return view("admin.add_post",["categories" => $res]);
    }
    public function addPost(Request $request){
        $isValid = $request->validate([
            "title" => "required|string|max:100",
            "desc" => "required|string|max:1000",
            "thumb" => "required|image|mimes:jpeg,png,gif|max:2048",
            "cat"  => "required|integer",
        ]);
        if($isValid){
            try{
                DB::beginTransaction();
                $new_name = time().".".$request->file('thumb')->getClientOriginalExtension();
                $user_obj = session("user_data");
                DB::table("posts")
                ->insert([
                    "ptitle" => $request->title,
                    "pdesc" => $request->desc,
                    "pimage" => $new_name,
                    "pcat" => $request->cat,
                    "pauthor" => $user_obj->uid,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                DB::table("category")->where('cid',$request->cat)->increment('post_under_cat');
                DB::table("users")->where('uid',$user_obj->uid)->increment('post_under_user');
                DB::commit();
                $request->file('thumb')->storeAs('public/images',$new_name);
                return redirect()->route('admin.blog_posts');
            }catch(Exception $e){
                DB::rollBack();
                return redirect($request->fullUrl());
            }
        }else{
            return redirect($request->fullUrl());
        }
    }
    public function editPostForm(int $id=null){
        if(is_numeric($id)){
            $user_obj = session("user_data");
            $res = DB::table('posts')->when($user_obj->role == 2,function($query){
                $query->where('pauthor',session("user_data")->uid);
            })->where('pid',$id)->get();
            if(count($res) == 1){
                $categories = DB::table("category")->orderBy('cid','desc')->get();
                return view("admin.edit_post",["data" => $res[0],"categories" => $categories]);
            }else{
                return redirect()->route('admin.blog_posts');
            }
        }else{
            return redirect()->route('admin.blog_posts');
        }
    }
    public function editPostData(Request $request){
        $isValid = $request->validate([
            "pid" => "required|integer",
            "old_img" => "required|string|max:100",
            "old_cat" => "required|integer",
            "title" => "required|string|max:100",
            "desc" => "required|string|max:1000",
            "thumb" => $request->thumb ? "required|image|mimes:jpeg,png,gif|max:2048":"",
            "cat"  => "required|integer"
        ]);
        if($isValid){
            try{
                DB::beginTransaction();
                $oldImagePath = storage_path('app/public/images/').$request->old_img;
                $movepath = storage_path('app/public/img_bkp/').$request->old_img;
                $new_name = $request->old_img;
                if($request->thumb){
                    $new_name = time().".".$request->file('thumb')->getClientOriginalExtension();
                    $request->file('thumb')->storeAs('public/images',$new_name);
                    if(file_exists($oldImagePath)){
                        rename($oldImagePath,$movepath);
                    }
                }
                if($request->cat != $request->old_cat){
                    DB::table("category")->where('cid',$request->cat)->increment('post_under_cat');
                    DB::table("category")->where('cid',$request->old_cat)->decrement('post_under_cat');
                }
                $user_obj = session("user_data");
                DB::table("posts")->when($user_obj->role == 2,function($query){
                    $query->where('pauthor',session("user_data")->uid);
                })->where('pid',$request->pid)
                ->update([
                    "ptitle" => $request->title,
                    "pdesc" => $request->desc,
                    "pimage" => $new_name,
                    "pcat" => $request->cat,
                    "updated_at" => now()
                ]);
                DB::commit();
                return redirect()->route('admin.blog_posts');
            }catch(Exception $e){
                DB::rollBack();
                return redirect($request->fullUrl());
            }
        }else{
            return redirect($request->fullUrl());
        }
    }
    public function deletePost(int $id=null){
        if(is_numeric($id)){
            $user_obj = session("user_data");
            $post = DB::table("posts")->select("pcat","pimage")->when($user_obj->role == 2,function($query){
                $query->where('pauthor',session("user_data")->uid);
            })->where("pid",$id)->first();
            if(!empty($post->pcat)){
                try{
                    DB::beginTransaction();
                    DB::table('posts')->when($user_obj->role == 2,function($query){
                        $query->where('pauthor',session("user_data")->uid);
                    })->where('pid',$id)->delete();
                    DB::table("category")->where('cid',$post->pcat)->decrement('post_under_cat');
                    DB::table("users")->where('uid',$user_obj->uid)->decrement('post_under_user');
                    $postImgPath = storage_path('app/public/images/').$post->pimage;
                    $movepath = storage_path('app/public/img_bkp/').$post->pimage;
                    if(file_exists($postImgPath)){
                        rename($postImgPath,$movepath);
                    }
                    DB::commit();
                    return redirect()->route('admin.blog_posts');
                }catch(Exception $e){
                    DB::rollBack();
                    return redirect()->route('admin.blog_posts');
                }
            }else{
                return redirect()->route('admin.blog_posts');
            }
        }
        return redirect()->route('admin.blog_posts');
    }
}
