<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
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
        'description' => 'max:255',
        'category_id' => 'required|integer'
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
      Product::find($id)->update($data);

      return response()->json([
        'message' => 'product was updated',
        'product' => Product::find($id)
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
      //deleting a product
      Product::destroy($id);

      //remove product relationships with categories and response
      ProductCategory::where('product_id', $id)->delete();

      return response()->json([
        'message' => 'deletion successful'
      ], 200);
    }
}
