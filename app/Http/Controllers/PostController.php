<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //create post
    public function createPost(Request $request){
        try{
            $user_id = $request->header('id');
            $image = $request->file('image');
            $t = time();
            $file_name = $image->getClientOriginalName();
            $image_name = "{$user_id}-{$t}-{$file_name}";
            $image_url = "uploads/{$image_name}";

            $image->move(public_path('uploads'), $image_url);
            $post = [
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'user_id'=>$user_id,
                'category_id'=>$request->input('category_id'),
                'image'=>$image_url
            ];
            $result = Post::create($post);
            return response()->json([
                'message'=>'Post created successfully',
                'post'=>$result,
                'status'=>'success'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message'=>'Something went wrong',
                'status'=>'error'
            ],500);
        }
    }
    //Get All Post
    public function getAllPosts(Request $request){
        try{
            $user_id = $request->header('id');
            $data = Post::where('user_id',$user_id)->get();
            return response()->json([
                'posts'=>$data,
                'status'=>'success',
                'message'=> 'Posts retrieved successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message'=>'Something went wrong',
                'status'=>'error'
            ],500);
        }
    }
    //single post get
    public function getSinglePost(Request $request, $id){
        try{
            $user_id = $request->header('id');
            $data = Post::where('user_id',$user_id)->find($id);
            if(!$data){
                return response()->json([
                    'message'=>'Post not found',
                    'status'=>'failed'
                ],404);
            }else{
                return response()->json([
                    'post'=>$data,
                    'status'=>'success',
                    'message'=> 'Post retrieved successfully'
                ],200);

            }

        }catch(Exception $e){
            return response()->json([
                'message'=>'Something went wrong',
                'status'=>'error'
            ],500);
        }
    }
    //Update Post
    public function updatePost(Request $request, $id){
        try{
            $user_id = $request->header('id');

           // print_r($image);
            if($request->hasFile('image')){
                //upload Image
                $image_name = $request->file('image');
                $t = time();
                $file_name = $image_name->getClientOriginalName();
                $image_file_name = "{$user_id}-{$t}-{$file_name}";
                $image_url = "uploads/{$image_file_name}";
                $image_name->move(public_path('uploads'), $image_url);

                //delete old file
                $file_path = $request->input('file_path');
                File::delete($file_path);

                $data = Post::where('id',$id)->where('user_id',$user_id)->update([
                    'title'=>$request->input('title'),
                    'description'=>$request->input('description'),
                    'category_id'=>$request->input('category_id'),
                    'image'=>$image_url
                ]);
                return response()->json([
                    'message'=>'Post updated successfully',
                    'post'=>$data,
                ],200);
            }else{
                return response()->json([
                    'message'=>'File upload failed',
                    'status'=>'error'
                ],404);
            }
        }catch (Exception $e){
            return response()->json([
                'message'=>'Something went wrong',
                'status'=>'error'
            ]);
        }
    }
    //Delete Post
    public function deletePost(Request $request, $id){
        try{
            $user_id = $request->header('id');
            $file_path = $request->input('file_path');
            File::delete($file_path);
            $deleteData = Post::where('id',$id)->where('user_id',$user_id)->delete();
            if($deleteData){
                return response()->json([
                    'message'=>'Post deleted successfully',
                    'status'=>'success'
                ],200);
            }else{
                return response()->json([
                    'message'=>'Something went wrong',
                    'status'=>'error'
                ],404);
            }
        }catch (Exception $e){
            return response()->json([
                'message'=>'Something went wrong',
                'status'=>'error'
            ],500);
        }
    }
}
