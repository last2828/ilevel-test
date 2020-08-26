<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product model",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 *
 */

class Product
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
   *      description="Title of the product",
   *      example="Plan"
   * )
   *
   * @var string
   */
  public $title;

  /**
   * @OA\Property(
   *      title="Description",
   *      description="Description of the product",
   *      example="This is product description"
   * )
   *
   * @var string
   */
  public $description;

  /**
   * @OA\Property(
   *      title="Model",
   *      description="Model of the product",
   *      example="Model"
   * )
   *
   * @var string
   */
  public $model;

  /**
   * @OA\Property(
   *     title="Category",
   *     description="Product category model"
   * )
   *
   * @var \App\Virtual\Models\Category[]
   */
  private $categories;
}
