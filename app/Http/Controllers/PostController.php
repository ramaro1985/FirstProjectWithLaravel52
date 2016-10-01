<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function getDashboard()
    {
        $post = Post::orderBy('created_at', 'desc')->paginate(2);
        return view('backend/dashboard', ['posts' => $post]);
    }

    public function postCreate(Request $request)
    {

        $this->validate($request, [
            'body' => 'required|max:240'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = trans('en.error');
        if ($request->user()->posts()->save($post)) {
            $message = trans('en.success');
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => trans('en.deleted')]);
    }

    public function postEditPost(Request $request)
    {

        $id = $request['id'];
        $body = $request['body'];
        $post = Post::find($id);
        $post->body = $body;
        $post->update();
        return response()->json(['msg' => trans('en.success'), 'new_body' => $body]);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    public function postComment(Request $request)
    {

        $body = $request['body'];
        $post_id = $request['post_id'];

        $comment = new Comments();
        $comment->body = $body;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;
        $comment->save();
        return null;
    }
}