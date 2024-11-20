<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Exception;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Request $request,$postId){
        try{
            $userId = $request->header('id');
            $isLiked = $request->input("is_like");
        if(!in_array($isLiked,[true,false],true)){
            return response()->json(["status"=>"error","message"=>"invalid like"],400);
        }
            $like = Like::where("user_id",$userId)->where("post_id",$postId)->first();
            if($like){
                $like->update(["is_like"=>$isLiked]);
            }else{
                $like = Like::create([
                    "user_id"=>$userId,
                    "post_id"=>$postId,
                    "is_like"=>$isLiked
                ]);
            }
            return response()->json([
                "status"=>"success",
                "message"=>"Liked post",
                "like"=>$like
            ]);
        }catch (Exception $e){
            return response()->json([
                "status"=>"error",
                "message"=>$e->getMessage()
            ],500);
        }
    }
    //get Like Post
    public function likeGet($postId){
        $likeCount = Like::where('post_id',$postId)->where('is_like',true)->count();
        return response()->json([
            "status"=>"success",
            "likeCount"=>$likeCount
        ],200);
    }
}
