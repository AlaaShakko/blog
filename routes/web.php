<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminsPostController;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Post;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('posts/{post:slug}',[PostController::class,'show']);

/*comments*/
Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);

Route::get('register',[RegisterController::class,'create'])->middleware('guest');;

Route::post('register',[RegisterController::class,'store'])->middleware('guest');;
/*Log in*/
Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('login',[SessionsController::class,'store'])->middleware('guest');
/*Log out*/
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');
/*Newsletter*/
Route::post('newsletter',\App\Http\Controllers\NewsletterController::class);
/*Admin*/
Route::middleware('can:admin')->group(function (){
    //Route::resource('admin/posts',AdminsPostController::class);
    Route::get('admin/posts/create',[PostController::class, 'create']);
    Route::post('admin/posts',[PostController::class, 'store']);

    Route::get('admin/posts',[AdminsPostController::class, 'index']);

    /*Edit Post*/
    Route::get('admin/posts/{post}/edit',[AdminsPostController::class, 'edit']);

    /*Update Post*/
    Route::patch('admin/posts/{post}',[AdminsPostController::class, 'update'])/*->middleware('can:admin')*/;

    /*Delete Post*/
    Route::delete('admin/posts/{post}',[AdminsPostController::class, 'destroy']);

});


//Route::post('newsletter',function(NewsletterC  $newsletter){
    /*//validation
    request()->validate(['email'=>'required|email']);

    try {
        //$newsletter = new \App\Services\Newsletter();
        $newsletter->subscribe(request('email'));

       /* $response = $mailchimp->lists->addListMember('dff4472fbc',[
            'email_address'=>request('email'),
            'status'=>'subscribed'
        ]);*/
    /*} catch (Exception $exception){ throw \Illuminate\Validation\ValidationException::withMessages([
        'email'=>'This email could not be added.'
    ]);
    }
    return redirect('/')->with('success','Thank you for subscription,You will receive our last news on your email');*/
    //members list
    //$response = $mailchimp->lists->getListMembersInfo('dff4472fbc');
    //
    /* $response = $mailchimp->lists->getList('dff4472fbc');*/
    //get total contacts
    /*$response = $mailchimp->lists->getAllLists();*/
    //ddd($response);
    /*$response = $mailchimp->ping->get();
    ddd($response);
    //print_r($response);*/
//});


/*Route::get('authors/{author:username}',function (\App\Models\User $author){
   // dd($author);
    return view('posts.index', [
        'posts' => $author->posts
        //,'categories'=>Category::all()
    ]);
});*/
    //->where('post', '[A-z_\-]+');
/*in postController.php*/
/*Route::get('categories/{category:slug}',function (Category $category){
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory'=>$category,
        'categories'=>\App\Models\Category::all()
    ]);
    /*giving this rote a name ==category
})->name('category');*/
