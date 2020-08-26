<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  /**
   * @OA\POST(
   *     path="/api/products",
   *     summary="Create a new product",
   *     tags={"Products"},
   *     description="Create a new product",
   *      @OA\RequestBody(
   *          required=true,
   *          @OA\JsonContent(ref="#/components/schemas/StoreProductRequest")
   *      ),
     *   @OA\Parameter(
     *         name="token",
     *         required=true,
     *         in="header",
     *         description="Bearer lbsiiejroiehfuwoefnelfiower2432420agfasdfsadfasdgrewgwergwergwergewrg",
     *          @OA\Schema(
     *         type="string"
     *          )
     *      ),
   *
   *     @OA\Response(
   *          response=201,
   *          description="Successful operation",
   *          @OA\JsonContent(ref="#/components/schemas/Product")
   *       ),
   *      @OA\Response(
   *          response=400,
   *          description="Bad Request"
   *      ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      )
   *
   * )
   */
    public function store(Request $request)
    {
      //data validation from request
      $data = $request->all();
      $rules = [
        'title' => 'required|max:255',
        'model' => 'required|unique:products',
        'description' => 'max:255',
        'categories' => 'required|array'
      ];

      $validator = Validator::make($data, $rules);

      //error output
      if($validator->fails())
      {
        return response()->json([
          'error' => $validator->errors()
        ], 400);
      }

      //creating a new product with relationships
      $newProduct = Product::create($data);
      $newProduct->categories()->sync($data['categories']);

      return response()->json([
        'message' => 'product was created',
        'newProduct' => Product::with('categories')->find($newProduct->id)
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  /**
   * @OA\PUT(
   *     path="/api/products/{product_id}",
   *     summary="Update product by id",
   *     tags={"Products"},
   *     description="Update category by id with all relations",
   *     @OA\Parameter(
   *         name="product_id",
   *         required=true,
   *         in="path",
   *         description="1",
   *          @OA\Schema(
   *         type="integer"
   *          )
   *      ),
     *   @OA\Parameter(
     *         name="token",
     *         required=true,
     *         in="header",
     *         description="Bearer lbsiiejroiehfuwoefnelfiower2432420agfasdfsadfasdgrewgwergwergwergewrg",
     *          @OA\Schema(
     *         type="string"
     *          )
     *      ),
   *      @OA\RequestBody(
   *          required=true,
   *          @OA\JsonContent(ref="#/components/schemas/UpdateProductRequest")
   *      ),
   *
   *     @OA\Response(
   *          response=202,
   *          description="Successful operation",
   *          @OA\JsonContent(ref="#/components/schemas/Product")
   *       ),
   *      @OA\Response(
   *          response=400,
   *          description="Bad Request"
   *      ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      ),
   *      @OA\Response(
   *          response=404,
   *          description="Resource Not Found"
   *      ),
   *
   * )
   */
    public function update(Request $request, $id)
    {
      //data validation from request
      $data = $request->all();
      $rules = [
        'title' => 'required|max:255',
        'model' => [
          'required',
          Rule::unique('products')->ignore($id)
        ],
        'description' => 'max:255'
      ];

      $validator = Validator::make($data, $rules);

      //error output
      if($validator->fails())
      {
        return response()->json([
          'error' => $validator->errors()
        ], 400);
      }

      //product update and response
      $product = Product::find($id);
      $product->update($data);
      $product->categories()->sync($data['categories']);

      return response()->json([
        'message' => 'product was updated',
        'product' => Product::with('categories')->find($id)
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  /**
   * @OA\DELETE(
   *     path="/api/products/{product_id}",
   *     summary="Delete product by id",
   *     tags={"Products"},
   *     description="Delete product by id with all relations",
   *     @OA\Parameter(
   *         name="product_id",
   *         required=true,
   *         in="path",
   *         description="1",
   *          @OA\Schema(
   *         type="integer"
   *          )
   *      ),
   *      @OA\Parameter(
   *         name="token",
   *         required=true,
   *         in="header",
   *         description="Bearer lbsiiejroiehfuwoefnelfiower2432420agfasdfsadfasdgrewgwergwergwergewrg",
   *          @OA\Schema(
   *         type="string"
   *          )
   *      ),
   *     @OA\Response(
   *          response=204,
   *          description="Successful operation"
   *       ),
   *      @OA\Response(
   *          response=401,
   *          description="Unauthenticated",
   *      ),
   *      @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      ),
   *      @OA\Response(
   *          response=404,
   *          description="Resource Not Found"
   *      )
   *
   * )
   */
    public function destroy($id)
    {
      //deleting a product
      $product = Product::find($id);
      $product->categories()->detach();
      $product->delete();

      return response()->json([
        'message' => 'deletion successful'
      ], 200);
    }
}
