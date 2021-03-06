<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','slug' ,'description', 'image', 'category_id','user_id'];
//delete view
    protected $dates = ['deleted_at'];
    public function getImageAttribute($image){
        return asset($image);//generate link for image in application
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
