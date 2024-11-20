<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //add Comment
    public function addComment(Request $request,$postId){
        try{
            $userId = $request->header('id');
            $post = Post::findOrFail($postId);
            if(!$post){
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found'
                ]);
            }
            $comment = comment::create([
                'content' => $request->input('content'),
                'user_id' => $userId,
                'post_id' => $postId
            ]);
            return response()->json([
                'success' => true,
                'comment' => $comment,
                'message' => 'Comment added successfully!'
            ]);
        }catch (Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
    public function getComments($postId){
        try{
            $find = Post::findOrFail($postId);
            if(!$find){
                return response()->json([
                    'success' => false,
                    'message' => 'Post not found'
                ]);
            }
            //$result = Comment::where('post_id',$postId)->find();
            //get all
            $result = Comment::where('post_id',$postId)->get();
            return response()->json([
                'success' => true,
                'comments' => $result,
                'message' => 'Comments retrieved successfully!'
            ],200);
        }catch (Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ],500);
        }
    }
}
