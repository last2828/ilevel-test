<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\ProductCategory;
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
        'categories' => $categories
      ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        'message' => 'category was created',
        'newCategory' => $newCategory
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
      $categoryWithProducts = Category::with('products')->find($id);

      return response()->json([
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
        'message' => 'category was updated',
        'category' => Category::find($id)
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deleting a category
        Category::destroy($id);

        //remove category relationships with products and response
//        ProductCategory::where('category_id', $id)->delete();

        return response()->json([
          'message' => 'deletion successful'
        ], 200);
    }
}
