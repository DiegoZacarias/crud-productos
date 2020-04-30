<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $primaryKey = 'item_code';
     protected $fillable = [
        'title', 'image', 'description', 'specifications', 'dimensions', 'price', 'stock', 'flag',
    ];

    public function getGetExcerptAttribute()
    {
        return substr($this->description,0,10);  //para que muestre los primeros 50 caracteres del post
    }

    public function getGetImageAttribute()
    {
        if($this->image)
            return url("storage/$this->image");
    }
    
     public function getGetExcerptImgAttribute()
    {
        return substr($this->image,0,3);  //para que muestre los primeros 50 caracteres del post
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
