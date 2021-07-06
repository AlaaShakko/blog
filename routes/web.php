<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\Post;
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


Route::get('/', function () {
    $posts = Post::all();
    return view('posts', [
        'posts' => $posts,
    ]);

});



Route::get('posts/{post}', function ($slug) {
    return view('post', [
        'post' => Post::find($slug),
    ]);
})->where('post', '[A-z_\-]+');

    //$files = File::files(resource_path("posts"));
    //$posts = collect(File::files(resource_path("posts")))
   //$posts = [];
  //  ->map (function ($file){
    //    return YamlFrontMatter::parseFile($file);
    //})
    //$posts = collect($document)
      //  ->map (function ($document){
           // $document = YamlFrontMatter::parseFile($file);
        //    return new Post(
          //      $document->title,
            //    $document ->slug,
              //  $document->excerpt,
                //$document->date,
                //$document->body()
           // );

       // });
   // $posts= array_map(function ($file){
     //    $document = YamlFrontMatter::parseFile($file);
       //  return new Post(
         //    $document->title,
           //  $document ->slug,
             //$document->excerpt,
             //$document->date,
             //$document->body()
        // );

    //},$files);

    //foreach ($files as $file) {
    //    $document = YamlFrontMatter::parseFile($file);
    //    $posts[] = new Post(
    //        $document->title,
     //       $document ->slug,
     //       $document->excerpt,
     //       $document->date,
     //       $document->body()
     //   );
   // }
    //ddd($posts);



       // ddd($documents);

    //   $posts[] = new Post(
    //        $document -> title,
   //         $document->excerpt,
    //        $document->date,
    //        $document->body()
   //    );


    //ddd($posts);
    //ddd($posts[0]->body)

    //return view('posts',['posts' => $posts]);

   // $document = YamlFrontMatter::parseFile(resource_path('posts/Third_post.html'));
   // $document = YamlFrontMatter::parseFile(
     //        resource_path('posts/Third_POST.html')
       //  );
         //ddd($document->date);





    //call all() from Post class
    //$posts = Post::all();

    //dumb
    //ddd($posts);//all posts
    //ddd($posts[0]);//first post info
    //ddd($posts[0]->getPathname());//to gate the name === ddd((string)$posts[0]);
    //ddd($posts[0]->getContents());//get file contents depend on the chosen file from [array]


    //return view('posts',['posts' => $posts]);




//find view by its slug and add post to a view called post (I,II)

//II. find view by its slug
    //Post is the class (classes should be in app ->Models)
//$post = Post::find($slug);


// 1. Is this the hardcode way! "First step" when things are seen raw
    // $post = file_get_contents(__DIR__ . '/../resources/posts/First_post.html');
    // $post = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");

// 2. "Second step" separate the path to check if exist or not
    // $path = __DIR__ . "/../resources/posts/{$slug}.html";

    // ddd($path);

    // if( ! file_exists($path)) {
        //dd show a small error message on the web -> quick debugging
        //ddd show a entire page of error message on the web - > ddd("File doesn't exist");
        // abort(404); // shows message 404 NOT FOUND
    //     return redirect('/');
    // }

    // To cache and see the path (traditional way)
    // 5 is TTL or instead we can use now()->addDay() or now()->addMinutes()
    // (old version of function structure) ===
    // $post = cache()->remember("post.{$slug}", 5, function () use ($path) {
    //     var_dump('file_get_content');
    //     return  file_get_contents($path);
    // });
    // (arrow function, new version) ===
    // fn() => file_get_content($path)

    // $post = file_get_contents($path);

    //if the file not exists redirect to home page
  //if(! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) { return redirect('/');}

//add the post to cache ...the number is in seconds // we can did now()->addMinute(20)/addHour()/addDay()
//$post = cache()->remember("post.{$slug}", 3600, fn() => file_get_contents($path));

//I.to find a view and pass it to the view named post
//return view('post', [ 'post' => $post ]);

// Below in where we are saying that in our url should be any letter
// from A to Z upper or lower case ->whereAlpha('post');

//->whereAlpha('post') == ->where('post', '[A-z_\-]+')

