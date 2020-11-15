<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at']; // important if you are using tinker
    protected $guarded = [
        'id'
    ];

    /*
     This function executes automatically in post index ( get"AttributeName"Attribute) read about it - check documentation
     Well this is called an Accessor, or mutators not like in "Java", they allow you to change the data when it is retrieved from a model and set it in the way
    or format you like to see it in before it gets displayed in the view which is quite useful same as using pipeline in Angular 10 value | date(format)
    */
//    public function featured_field_name_only(){
//        return $this->featured;
//    }
    public function getFeaturedAttribute($featured){
        return asset('upload/posts/'.$featured);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
