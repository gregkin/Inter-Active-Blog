<?php

namespace App;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Routing\asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
		use SoftDeletes;
		protected $fillable = [
        'title','content','category_id','featured','slug'
    ];
    // allows us to obtain the complete path.
    public function getFeaturedAttribute($featured)
    {
    			return asset($featured);
    }

    protected $dates = ['deleted_at'];

   	public function category()
   	{
   			return $this->belongsTo('App\Category');
   	}
    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }
}
