<?php

namespace App;

use App\Color;
use App\Application;
use App\SubCategory;
use App\Presentation;
use App\ProductPicture;
use App\VariableProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sub_category_id', 'name',  'description', 'order', 'extra', 'outstanding'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class);
    }

    public function presentations()
    {
        return $this->belongsToMany(Presentation::class);
    }
}
