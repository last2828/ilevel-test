<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['title'];

  public function product()
  {
   return $this->belongsToMany(
     Product::class,
     'product_categories',
     'category_id',
     'product_id'
   );
  }

  public function productCategory()
  {
    return $this->hasMany(
      ProductCategory::class
      );
  }

}
