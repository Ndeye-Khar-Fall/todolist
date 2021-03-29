<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product;

class category extends Model
{
    protected $fillable=['name'];

    public function products()
    {
        return $this->hasMany(product::class);
    }
     
}
