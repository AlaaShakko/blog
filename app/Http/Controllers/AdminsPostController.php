<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminsPostController extends Controller{

    public function index(){
        return view('admin.posts.index',['posts'=>Post::paginate(50)]);
    }

    /*EDIT*/
    public function edit(Post $post){
        return view('admin.posts.edit', ['post' => $post]);
    }

    /*UPDATE*/
    public function update(Post $post){
        $attributes = $this->validationRules($post);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail']= request()->file('thumbnail')->store('public/thumbnails');
        }
        $post->update($attributes);
        return back()->with('success','Post has been updated successfully :)');
    }

    /*Delete a Post*/
    public function destroy(Post $post){

        $post->delete();
        return back()->with('success','Post has been Deleted successfully :)');

    }

    /*VALIDATION RULES*/
    /**
     * @param Post $post
     * @return array
     */
    public function validationRules(?Post $post=null): array{

        $post ??= new Post();
        $attributes = request()->validate(['thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'title' => 'required',
            'excerpt' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)], //the slug should be unique, we can't have the slug if it's exists
            'body' => 'required',
            'category_id' => ['required',
                Rule::exists('categories', 'id')]]);
        return $attributes;
    }
}
