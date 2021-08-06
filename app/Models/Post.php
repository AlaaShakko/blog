<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; //any new Eloquent model have access to factory()

    protected $guarded = [];
    //protected $guarded = ['id'];
    //protected $fillable = ['title','excerpt','body'];

    protected $with =['category','author'];

    public function category(){
        //relations ex:one2one,many2many,belong2,belong2many......

        //each post belongs to 1 category only
        return $this ->belongsTo(Category::class);
    }
    public function author(){//should have author_id

        return $this->belongsTo(User::class,'user_id');
    }
}
