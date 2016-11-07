<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;
use App\Like;


class PostController extends Controller
{   
    
	public function getDashboard(){
        $users = User::all();
		$posts = Post::orderBy('created_at', 'desc')->get();

		return view('dashboard', ['posts' => $posts, 'users'=> $users]);
	}
    public function postCreatePost(Request $request)
    {
    	//Validation
    	$this->validate($request,[
    		'post_body' => 'required|max:1000'
    		]);

    	$post = new Post();
    	$post->post_body = $request['post_body'];
    	$message = 'There was an Error.!';
    	if($request->user()->posts()->save($post))
    	{
    		$message = 'Post Successfully Created.!';
    	}

    	return redirect()->route('dashboard')->with(['message' => $message, 'users'=>$users]);
    }
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user)
        {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Post has been deleted.!', 'users'=>'$users']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
            ]);
        
        $post = Post::find($request['postId']);
        $post->post_body = $request['body'];
        $post->update();
        return response()->json(['edited_post' => $post->post_body], 200);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $isLike = $request['isLike'] === 'true' ? true:false;
        //$update = false;

        //$post = Post::find($post_id);
        /*if(!post)
        {
            return null;
        }
        */
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if($like)
        {
            $like->delete();
            //return null;
            $likeStatus = 'Like';
            
        }
        else{
            $like = new Like();
            $like->user_id = $user->id;
            $like->post_id = $post_id;
            $like->like = $isLike;
            $like->save();
            $likeStatus = 'Liked';

            //return null;
        }
        return response()->json(['likeStatus' => $likeStatus], 200);

    }

   /* public function postUpdateAccount()
    {

    }
    */
}
