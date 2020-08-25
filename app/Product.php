<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    'title', 'description', 'model'
    ];

  public function categories()
  {
    return $this->belongsToMany(
      Category::class,
      'product_categories',
      'product_id',
      'category_id'
    );
  }

}
