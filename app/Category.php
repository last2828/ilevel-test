<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
//  use SoftDeletes, CascadeSoftDeletes;

  protected $fillable = [
    'title'
  ];

//  protected $cascadeDeletes = ['comments'];
//
//  protected $dates = ['deleted_at'];

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
