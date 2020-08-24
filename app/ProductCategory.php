<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
  protected $fillable = [
    'product_id', 'category_id'
  ];


  public function category()
  {
    return $this->belongsTo(
      Category::class,
      'category_id',
      'id'
    );
  }

  public function product()
  {
    return $this->belongsTo(
      Product::class,
      'product_id',
      'id'
    );
  }
}
