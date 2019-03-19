<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  	<a class="navbar-brand" href="{{ route('articles') }}">WebsiteName</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  	</div>
	  	<form class="form-inline my-2 my-lg-0">
	  		@if (Route::has('login'))
	  			@auth
		  			<a class="navbar-brand" href="{{ route('logout') }}">Logout</a>
		  		@else
		  			<a class="navbar-brand" href="{{ route('login') }}">Login</a>
		  			<a class="navbar-brand" href="{{ route('registration') }}">Registration</a>
		  		@endauth
		  	@endif
    	</form>
	</nav>
</header>