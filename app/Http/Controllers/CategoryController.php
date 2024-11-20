<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function CategoryList(Request $request)
    {
        $user_id = $request->header('id');
        return Category::where('user_id', $user_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user_id = $request->header('id');
        $data = [
            'user_id' => $user_id,
            'name' => $request->input('name'),
        ];
        $all_cat =  Category::create($data);
        return response()->json([
            'message' => 'Category created successfully',
            'data' => $all_cat,
            'status' => 201,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $user_id = $request->header('id');
        $result = Category::where('user_id', $user_id)->find($id);
        return response()->json([
            'data' => $result,
            'status' => 201,
            'message' => 'Category retrieved successfully',
        ],201);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        try{
            $user_id = $request->header('id');
            $result = Category::where('id', $id)->where('user_id',$user_id)->update([
                'name' => $request->input('name'),
            ]);
            if($result==1){
                return response()->json([
                    'message' => 'Category updated successfully',
                    'status' => 201,
                ],201);
            }else{
                return response()->json([
                    'message' => 'Category not found',
                    'status' => 404,
                ],404);
            }
        }catch(Exception $e){
            return response()->json([
                'message' => 'Something went wrong',
                'status' => 500,
            ],500);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        try{
            $user_id = $request->header('id');
            $result = Category::where('id', $id)->where('user_id',$user_id)->delete();
            if($result==1){
                return response()->json([
                    'message' => 'Category deleted successfully',
                    'status' => 201,
                ],201);
            }else{
                return response()->json([
                    'message' => 'Category not found',
                    'status' => 404,
                ],404);
            }
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 500,
            ],500);
        }
    }
}
