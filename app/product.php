<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;

class product extends Model
{
    protected $fillabe= ['title', 'price', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
  