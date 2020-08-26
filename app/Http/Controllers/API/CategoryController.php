<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
   * @OA\Get(
   *     path="/api/categories",
   *     summary="Get all categories",
   *     tags={"Categories"},
   *     description="Get all categories",
   *
   *     @OA\Response(
   *         response=200,
   *         description="Successful operation",
   *        @OA\JsonContent(ref="#/components/schemas/CategoryResource")
   *     ),
   *
   *   @OA\Response(
   *          response=403,
   *          description="Forbidden"
   *      ),
   *
   * )
   */
    public function index()
    {
      //get list of all categories and response
      $categories = Category::all();

      if(!$categories){
        return response()->json([
          'error' => 'bad request'
        ], 400);
      }

      return response()->json([
        'message' => 'Successful operation',
        'categories' => $categories
      ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  /**
   * @OA\POST(
   *     path="/api/categories",
   *     summary="Create a new category",
   *     tags={"Categories"},
   *     description="Create a new category",
   *      @OA\Parameter(
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
   *          @OA\JsonContent(ref="#/components/schemas/StoreCategoryRequest")
   *      ),
   *
   *     @OA\Response(
   *          response=201,
   *          description="Successful operation",
   *          @OA\JsonContent(ref="#/components/schemas/Category")
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
      $rules = ['title' => 'required|unique:categories'];

      $validator = Validator::make($data, $rules);

      //error output
      if($validator->fails())
      {
        return response()->json([
          'error' => $validator->errors()
        ], 400);
      }

      //creating a new category and response
      $newCategory = Category::create($data);

      return response()->json([
        'message' => 'Successful operation',
        'newCategory' => $newCategory
      ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
   * @OA\Get(
   *     path="/api/categories/{category_id}",
   *     summary="Get category by id",
   *     tags={"Categories"},
   *     description="Get category by id with all products",
   *     @OA\Parameter(
   *         name="category_id",
   *         required=true,
   *         in="path",
   *         description="1",
   *          @OA\Schema(
   *         type="integer"
   *          )
   *      ),
   *
   *      @OA\Response(
   *          response=200,
   *          description="Successful operation",
   *          @OA\JsonContent(ref="#/components/schemas/Category")
   *       ),
   *      @OA\Response(
   *          response=400,
   *          description="Bad Request"
   *      ),
   *
   * )
   */
    public function show($id)
    {
      $categoryWithProducts = Category::with('products')->find($id);

      return response()->json([
        'message' => 'Successful operation',
        'categoryWithProducts' => $categoryWithProducts,
      ], 200);
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
     *     path="/api/categories/{category_id}",
     *     summary="Update category by id",
     *     tags={"Categories"},
     *     description="Update category by id with all relations",
     *     @OA\Parameter(
     *         name="category_id",
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
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateCategoryRequest")
     *      ),
     *
     *     @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Category")
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
      $rules = ['title' => ['required', Rule::unique('categories')->ignore($id)]];

      $validator = Validator::make($data, $rules);

      //error output
      if($validator->fails())
      {
        return response()->json([
          'error' => $validator->errors()
        ], 400);
      }

      //updating category and response
      Category::find($id)->update($data);

      return response()->json([
        'message' => 'Successful operation',
        'category' => Category::find($id)
      ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  /**
   * @OA\DELETE(
   *     path="/api/categories/{category_id}",
   *     summary="Delete category by id",
   *     tags={"Categories"},
   *     description="Delete category by id with all relations",
   *     @OA\Parameter(
   *         name="category_id",
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
   *
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
        //deleting a category
        $category = Category::find($id);
        $category->product()->detach();
        $category->delete();


        return response()->json([
          'message' => 'Successful operation'
        ], 204);
    }
}
