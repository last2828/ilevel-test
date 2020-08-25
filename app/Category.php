<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $fillable = [
    'title'
  ];

  public function products()
  {
    return $this->belongsToMany(
      Product::class,
      'product_categories',
      'category_id',
      'product_id'
    );
  }

}
