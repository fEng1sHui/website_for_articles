<?php
namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
		public function getArticles()
	{
		$articles = Article::orderBy('created_at', 'desc')->get();
		return view('articles', [
			'articles' => $articles
		]);
	}

	public function postCreateArticle(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:200',
			'body' => 'required|min:300|max:9999'
		]);

		$article = new Article();
		$article->title = $request['title'];
		$article->body = $request['body'];

		$message = 'There was an error';
		if ($request->user()->articles()->save($article)) 
		{
			$message = 'Article successfully created!';
		}

		return redirect()->route('articles')->with(['message' => $message]);;
	}

	public function getDeleteArticle($article_id)
	{
		$article = Article::where('id', $article_id)->first();

		if (Auth::user() != $article->user) 
		{
			return redirect()->back();
		}

		$article->delete();
		return redirect()->route('articles')->with(['message' => 'Successfully deleted!']);
	}

	public function postEditArticle(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:200',
			'body' => 'required|min:300|max:9999'
		]);

		if (Auth::user() != $article->user) 
		{
			return redirect()->back();
		}

		$article = Article::find($request['articleId']);
		$article->title = $request['title'];
		$article->body = $request['body'];
		$article->update();
		return response()->json(['new_title' => $article->title, 'new_body' => $article->body], 200);
	}
}