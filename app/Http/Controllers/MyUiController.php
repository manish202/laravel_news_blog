<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyUiController extends Controller
{
    private function getLayoutData(){
        $cat = DB::table("category")->select('cid','cname','post_under_cat')->orderBy('post_under_cat','desc')->limit(10)->get();
        $recent_posts = DB::table("posts")->select('pid','pimage','ptitle','cid','cname','posts.updated_at')
        ->join('category','posts.pcat','=','category.cid')->orderBy('posts.updated_at','desc')->limit(5)->get();
        return [$cat,$recent_posts];
    }
    public function getHomePage(){
        $layoutData = $this->getLayoutData();
        $data = DB::table("posts")->select('pid','pimage','ptitle','pdesc','cid','cname','uid','fname','posts.created_at')
        ->join('category','posts.pcat','=','category.cid')->join('users','posts.pauthor','=','users.uid')
        ->orderBy('posts.updated_at','desc')->simplePaginate(5);
        return view('home',["data" => $data,"categories" => $layoutData[0],"recent_posts" => $layoutData[1]]);
    }
    public function getCategoryPage(int $id){
        if(is_numeric($id)){
            $cur_cat = DB::table('category')->select('cid','cname')->where('cid',$id)->first();
            if(!empty($cur_cat->cid)){
                $layoutData = $this->getLayoutData();
                $data = DB::table("posts")->select('pid','pimage','ptitle','pdesc','cid','cname','uid','fname','posts.created_at')
                ->join('category','posts.pcat','=','category.cid')->join('users','posts.pauthor','=','users.uid')
                ->where('cid',$id)->orderBy('pid','desc')->simplePaginate(5);
                return view('category',["cur_cat" => $cur_cat,"data" => $data,"categories" => $layoutData[0],"recent_posts" => $layoutData[1]]);
            }
            return redirect('/');
        }
        return redirect('/');
    }
    public function getPostPage(int $id){
        if(is_numeric($id)){
            $data = DB::table("posts")->select('pid','pimage','ptitle','pdesc','cid','cname','uid','fname','lname','posts.created_at')
            ->join('category','posts.pcat','=','category.cid')->join('users','posts.pauthor','=','users.uid')->where('pid',$id)->first();
            if(!empty($data->pid)){
                $layoutData = $this->getLayoutData();
                return view('post',["data" => $data,"categories" => $layoutData[0],"recent_posts" => $layoutData[1]]);
            }
            return redirect('/');
        }
        return redirect('/');
    }
    public function getAuthorPage(int $id){
        if(is_numeric($id)){
            $cur_user = DB::table('users')->select('uid','fname','lname')->where('uid',$id)->first();
            if(!empty($cur_user->uid)){
                $layoutData = $this->getLayoutData();
                $data = DB::table("posts")->select('pid','pimage','ptitle','pdesc','cid','cname','uid','fname','posts.created_at')
                ->join('category','posts.pcat','=','category.cid')->join('users','posts.pauthor','=','users.uid')
                ->where('uid',$id)->orderBy('pid','desc')->simplePaginate(5);
                return view('author',["cur_user" => $cur_user,"data" => $data,"categories" => $layoutData[0],"recent_posts" => $layoutData[1]]);
            }
            return redirect('/');
        }
        return redirect('/');
    }
    public function getSerachPage(string $term){
        if(is_string($term) && strlen(trim($term)) < 50){
            $layoutData = $this->getLayoutData();
            $data = DB::table("posts")->select('pid','pimage','ptitle','pdesc','cid','cname','uid','fname','posts.created_at')
            ->join('category','posts.pcat','=','category.cid')->join('users','posts.pauthor','=','users.uid')
            ->where("ptitle","like","%$term%")->orWhere("pdesc","like","%$term%")->orderBy('pid','desc')->simplePaginate(5);
            return view('search',["term" => $term,"data" => $data,"categories" => $layoutData[0],"recent_posts" => $layoutData[1]]);
        }
        return redirect('/');
    }
}
