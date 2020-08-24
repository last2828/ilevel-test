<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = [
    'title',
    'description',
    'model',
    'category_id'
    ];

  public function category()
  {
    return $this->belongsToMany(
      Category::class,
      'product_categories',
      'product_id',
      'category_id'
    );
  }

  public function productCategory()
  {
    return $this->hasMany(
      ProductCategory::class
      );
  }

}
