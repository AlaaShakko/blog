<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; //any new Eloquent model have access to factory()

    /*added to AppServiceProvider.php*/
    //protected $guarded = [];

    //protected $guarded = ['id'];
    //protected $fillable = ['title','excerpt','body'];

    protected $with =['category','author'];

    //Post::newQuery()->filter()
    public function scopeFilter($query ,array $filters){

        $query->when($filters['search'] ?? false,function ($query,$search){
           $query->where(fn($query)=>
               $query->where('title','like','%' . $search . '%')
               ->orWhere('body','like','%' . $search . '%')
           );
       });
       /* to search within a specific category*/
        $query->when($filters['category'] ?? false,function ($query,$category){
            /*give us the posts have a category whrere the category slug matches the user search */
            $query->whereHas('category',fn($query)=> $query->where('slug',$category));
                /*->whereExists(fn($query)=>$query->from('categories')->whereColumn('categories.id','posts.category_id')->
                where('categories.slug',$category));*/

        });
        /*Author filter*/
        $query->when($filters['author'] ?? false,function ($query,$author){
            $query->whereHas('author',fn($query)=> $query->where('username',$author));

        });

        /*        if($filters['search'] ?? false){
                    $query
                        ->where('title','like','%' . request('search') . '%')
                        ->orWhere('body','like','%' . request('search') . '%');
                }*/
    }
/*POST -----> COMMENTS */

    public function comments(){

        return $this ->hasMany(Comment::class);
    }
/*    public function author(){//should have author_id

        return $this->belongsTo(User::class,'user_id');
    }*/
    /*END SECTION*/

    public function category(){
        //relations ex:one2one,many2many,belong2,belong2many......

        //each post belongs to 1 category only
        return $this ->belongsTo(Category::class);
    }
    public function author(){//should have author_id

        return $this->belongsTo(User::class,'user_id');
    }
}
