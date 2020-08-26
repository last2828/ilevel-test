<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="Category",
 *     description="Category model",
 *     @OA\Xml(
 *         name="Category"
 *     )
 * )
 */
class Category
{
  /**
   * @OA\Property(
   *     title="ID",
   *     description="ID",
   *     format="int64",
   *     example=1
   * )
   *
   * @var integer
   */
  private $id;

  /**
   * @OA\Property(
   *      title="Title",
   *      description="Title of the category",
   *      example="Plans and Cars"
   * )
   *
   * @var string
   */
  public $title;

  /**
   * @OA\Property(
   *     title="Product",
   *     description="Product category model"
   * )
   *
   * @var \App\Virtual\Models\Product[]
   */
  private $products;

}
