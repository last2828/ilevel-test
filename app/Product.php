<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nyholm\Psr7\Request;

class Product extends Model
{

  protected $fillable = [
    'title', 'description', 'model'
    ];

  public function categories()
  {
    return $this->hasMany(
      ProductCategory::class,
    );
  }

}
