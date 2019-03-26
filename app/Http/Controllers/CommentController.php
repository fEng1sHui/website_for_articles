<?php
namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
		public function getComments()
	{
		$comments = Comment::orderBy('created_at', 'desc')->get();
		return view('articles', [
			'comments' => $comments
		]);
	}

	public function postCreateComment(Request $request)
	{
		// $this->validate($request, [
		// 	'body' => 'required|min:1|max:500'
		// ]);

		$comment = new Comment();
		$comment->body = $request['body-comment'];
		$comment->user_id = $request['user_id']

		$message = 'There was an error';
		if ($request->userComments()->articleComments()->save($comment)) 
		{
			$message = 'Comment successfully posted!';
		}

		return redirect()->route('articles')->with(['message' => $message]);;
	}
}