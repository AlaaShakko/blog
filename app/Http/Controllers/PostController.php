<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function index(){

        //dd(request(['search'])); ==//dd(request()->only('search'));

        return view('posts', [

            'posts' => Post::latest()->filter(request(['search']))->get(),
            'categories'=>Category::all()
            //latest('published_at') sort according to the post published date
            //add 'author' to avoid n+1 since we have @foreach
            //'posts' => Post::latest()->get(),
        ]);
    }
    /*to show the post*/
    public function show(Post  $post){
        // $post = Post::findOrFail($id);
        return view('post', [
            'post' => $post
        ]);
    }


/*    protected function getPosts(){

        //return Post::latest()->filter()->get();

        $posts = Post::latest();
        if(request('search')){
            $posts->where('title','like','%' . request('search') . '%')
                ->orWhere('body','like','%' . request('search') . '%');
        }return $posts->get();

    }*/
}
