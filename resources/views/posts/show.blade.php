@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
	<article class="post container"> {{-- image-w-text --}}

		@include( $post->viewType() )

	    <div class="content-post">

	      	@include('posts.header')

	      	<h1>{{ $post->title }}</h1>
	        <div class="divider"></div>
	        <div class="image-w-text">
	          	<div>
		            {!! $post->body !!}
	          	</div>
	        </div>

	        <footer class="container-flex space-between">
	          	@include('partials.social-links', ['description' => $post->title])
	          	
	          	@include('posts.tags')
	      	</footer>
		    <div class="comments">
		     	<div class="divider"></div>
		      	<div id="disqus_thread"></div>
				@include('partials.disqus-script')
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>     		                    
		    </div><!-- .comments -->
	    </div>
  	</article>
@endsection

@push('styles')
	<link rel="stylesheet" href="/css/twitter-bootstrap.css">
@endpush

@push('scripts')
	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/js/twitter-bootstrap.js"></script>
@endpush