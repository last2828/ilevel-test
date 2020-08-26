<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Update Category request",
 *      description="Update Category request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateCategoryRequest
{
  /**
   * @OA\Property(
   *      title="name",
   *      description="New name of the current category",
   *      example="Plans and Cars"
   * )
   *
   * @var string
   */
  public $title;
}
