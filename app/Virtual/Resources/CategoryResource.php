<?php

namespace App\Virtual\Models\Resources;

/**
 * @OA\Schema(
 *     title="CategoryResource",
 *     description="Category resource",
 *     @OA\Xml(
 *         name="CategoryResource"
 *     )
 * )
 */

class CategoryResource
{
  /**
   * @OA\Property(
   *     title="Data",
   *     description="Data wrapper"
   * )
   *
   * @var \App\Virtual\Models\Category[]
   */
  private $data;
}
