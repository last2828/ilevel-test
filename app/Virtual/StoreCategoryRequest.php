<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Category request",
 *      description="Store Category request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreCategoryRequest
{
  /**
   * @OA\Property(
   *      title="name",
   *      description="Name of the new category",
   *      example="Plans and Cars"
   * )
   *
   * @var string
   */
  public $title;

}
