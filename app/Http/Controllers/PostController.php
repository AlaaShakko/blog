<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller{

    public function index(){

        //$this->authorize('admin');

       //dd(Gate::allows('admin'))=== dd(request()->user()->can('admin'));;
        //dd(\request()->user()->cannot('admin'));

        //dd(request(['search'])); ==//dd(request()->only('search'));

        return view('posts.index', [
                    'posts' => Post::latest()->filter(
                        request(['search','category','author']))
                ->paginate(6)->withQueryString()
                //->simplePaginate(6)//Only shows next & previous without number of pages
            //'categories'=>Category::all(),
            //'currentCategory'=>category::firstWhere('slug',request('category'))
            /* 'currentCategory'=>category::where('slug',\request('category'))->first()*/
        ]);
        /*return Post::latest()->filter(
            request(['search','category','author']))
        ->paginate();*/
    }
    /*to show the post*/
    public function show(Post  $post){
        // $post = Post::findOrFail($id);
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /*creating a post*/
    public function create(){
        /*everyone registered will consider as an admin*/
        //if (auth()->guest()){abort(Response::HTTP_FORBIDDEN);//abort(403);}

        /*in case we have one admin only*/
/*       if(auth()->user()?->username !== 'AlaShakko'){abort(Response::HTTP_FORBIDDEN);//abort(403);}*/

        return view('admin.posts.create');
    }

    /*storing the created post*/
    public function store(){
        $post = new Post();
        //ddd(\request()->all());
        $attributes = request()->validate(['thumbnail'=> $post->exists ? ['image'] : ['required', 'image'],
            'title'=>'required',
            'excerpt'=>'required',
            'slug'=>['required', Rule::unique('posts','slug')->ignore($post)], //the slug should be unique, we can't have the slug if it's exists
            'body'=>'required',
            'category_id'=>['required',
                Rule::exists('categories','id')]]);

        $attributes['user_id']= auth()->id();

        $attributes['thumbnail']= request()->file('thumbnail')->store('public/thumbnails');
        Post::create($attributes);

        return redirect('/');
    }


   /*Comments*/
    /*public function addComment(){}*/



/*    protected function getPosts(){

        //return Post::latest()->filter()->get();

        $posts = Post::latest();
        if(request('search')){
            $posts->where('title','like','%' . request('search') . '%')
                ->orWhere('body','like','%' . request('search') . '%');
        }return $posts->get();

    }*/
}
