<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Update Product request",
 *      description="Update Product request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class UpdateProductRequest
{
  /**
   * @OA\Property(
   *      title="name",
   *      description="name of the product",
   *      example="Plan"
   * )
   *
   * @var string
   */
  public $title;

  /**
   * @OA\Property(
   *      title="model",
   *      description="model of the product",
   *      example="Model"
   * )
   *
   * @var string
   */
  public $model;

  /**
   * @OA\Property(
   *      title="description",
   *      description="Description of the product",
   *      example="This is product description"
   * )
   *
   * @var string
   */
  public $description;

  /**
   * @OA\Property(
   *      title="categories",
   *      description="Categories id for product",
   *      example="[1,2,3]"
   * )
   *
   * @var string
   */
  public $categories;
}
