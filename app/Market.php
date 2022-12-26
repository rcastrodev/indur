<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = ['order', 'name', 'content', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
