<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /*added to AppServiceProvider.php*/
    //protected $guarded =[];

    /*the comment is associated to a specific post and user"author"*/
    public function post(){ //laravel will thinks that column is post_id

        return $this ->belongsTo(Post::class);

    }
    public function author(){
        //laravel will think that the column name is author_id if we didn't define the column
        //if not same as the func. name we have to rewrite the column name
        return $this ->belongsTo(User::class, 'user_id');


    }
}
