<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Product request",
 *      description="Store Product request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreProductRequest
{
  /**
   * @OA\Property(
   *      title="name",
   *      description="Name of the new product",
   *      example="Plan"
   * )
   *
   * @var string
   */
  public $title;

  /**
   * @OA\Property(
   *      title="model",
   *      description="Model of the new product",
   *      example="Model"
   * )
   *
   * @var string
   */
  public $model;

  /**
   * @OA\Property(
   *      title="description",
   *      description="Description of the new product",
   *      example="This is product description"
   * )
   *
   * @var string
   */
  public $description;

  /**
   * @OA\Property(
   *      title="categories",
   *      description="Categories id for new product",
   *      example="[1,2,3]"
   * )
   *
   * @var string
   */
  public $categories;

}
