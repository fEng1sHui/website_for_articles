@extends('layouts.master')
@section('title')
Articles
@endsection

@section('content')
	<section class="row new-post">
		<div class="col-md-12 col-md-offset-12">
			@if (Route::has('login'))
				@auth
					<header><h3>Post an article:</h3></header>
					<form action="{{ route('article.create') }}" method="post">
						<div class="form-group">
							<input class="form-control" type="text" name="title" id="title" placeholder="Title" value="{{ Request::old('title') }}">
						</div>
						<div class="form-group">
							<textarea class="form-control" type="text" name="body" id="body" rows="5" placeholder="Description" value="{{ Request::old('new-post') }}"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Create Article</button>
						<input type="hidden" value="{{ Session::token() }}" name="_token">
					</form>
				@endauth
			@endif
		</div>
	</section>
	<section class="row posts">
		<div class="col-md-12 col-md-offset-12">
			<br />
			<header><h3>All articles</h3></header>
			@foreach($articles as $article)
				<article class="post" data-articleid="{{ $article->id }}">
					<h4>{{ $article->title }}</h4>
					<p>{{ $article->body }}</p>
					<div class="info">
						Posted by {{ $article->user->first_name }} on {{ $article->created_at }}
					</div>
					<div class="interaction">
						@if(Auth::user() == $article->user)
							<a href="#" class="edit">Edit</a> |
							<a href="{{ route('article.delete', ['article_id' => $article->id]) }}">Delete</a>
						@endif
					</div>
				</article>
				<div class="comment">
					<h6>MAX</h6>
					<p>Comment TEXT </p>
					<div class="info">
						Posted on 12 FEB 2019
					</div>
				</div>

				<div class="comment">
					<h6>Lara</h6>
					<p>Comment TEXT</p>
					<div class="info">
						Posted on 13 FEB 2019
					</div>
				</div>
				@if (Route::has('login'))
					@auth
						<div class="create_comment">
							<form action="{{ route('comment.create')}}" method="post">
								<div class="form-group">
									<textarea class="form-control" type="text" name="body-comment" id="body-comment" rows="2" placeholder="Leave a comment..."></textarea>
									<input type="hidden" value="{{ Session::token() }}" name="_token">
								</div>
								<button type="submit" class="btn btn-primary">Leave a comment</button>
								<input type="hidden" value="{{ Session::token() }}" name="_token">
							</form>
						</div>
					@endauth
				@endif
			@endforeach
		</div>
	</section>

	<div class="modal" tabindex="-1" role="dialog" id="edit-modal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Edit the Article</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      		<form>
	      			<div class="form-group">
	      				<input class="form-control" name="article-title" id="article-title"><br />
	      				<textarea class="form-control" name="article-body" id="article-body" rows="5"></textarea>
	      			</div>
	      		</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script>
		var token = '{{ Session::token() }}';
		var url = '{{ route('edit') }}';
	</script>
@endsection