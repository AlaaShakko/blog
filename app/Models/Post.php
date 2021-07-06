<?php

namespace App\Models;



use Exception;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use  Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Facade;

class Post{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;


    public function __construct($title,$slug ,$excerpt, $date, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }


    public static function all(){
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post(
                        $document->title,
                        $document->slug,
                        $document->excerpt,
                        $document->date,
                        $document->body()
                    );
                })->sortByDesc('date');
        });
    }
                //  return collect(File::files(resource_path("posts")))
                //$posts = [];
                //    ->map (function ($file){
                //        return YamlFrontMatter::parseFile($file);})
                //$posts = collect($document)
                //->map (function ($document){
                // $document = YamlFrontMatter::parseFile($file);
                //        return new Post(
                //            $document->title,
                //            $document ->slug,
                //            $document->excerpt,
                //            $document->date,
                //            $document->body());
                // return File::files(resource_path("posts/"));
                //$files = File::files(resource_path("/posts/"));

                //looks like loop which return a new loop
                // return array_map(function ($file) {
                //    return $file->getContents();
                // },$files);

    public static function find($slug){
    // all the blog posts , find the slug which match the requested post
        $post= static::all()->firstWhere('slug',$slug);
        if(!$post){
            throw new ModelNotFoundException();
        }
        return $post;
        // return static::all()->firstWhere('slug', $slug);
        //$posts = static::all();
        //dd($posts ->firstWhere('slug',$slug));
    }
}

        //if the file not exists redirect to home page
        //base_path();

        //if(! file_exists($path =resource_path("posts/$slug.html"))) {
          //  throw new ModelNotFoundException();
            //return redirect('/');}

    //add the post to cache ...the number is in seconds // we can did now()->addMinute(20)/addHour()/addDay()
        //return cache()->remember("posts.{$slug}'", 3600, function () use ($path) {
        //return file_get_contents($path);});

        //I.to find a view and pass it to the view named post
        //return view('post', [ 'post' => $post ]);


