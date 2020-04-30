<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	 protected $fillable = [
        'product_code', 'src_img', 
    ];

    public function getGetImageAttribute()
    {
        if($this->src_img)
            return url("storage/$this->src_img");
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}
