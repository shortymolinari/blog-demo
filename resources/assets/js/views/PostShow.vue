<template>
	<section class="post container">

		<!-- @include( $post->viewType() ) -->

	    <div class="content-post">

	      	<post-header :post="post"></post-header>
	      	
	        <div class="image-w-text">
	          	<div v-html="post.body"></div>
	        </div>

	        <footer class="container-flex space-between">
	          	<social-links :description="post.title" />
	          	
	          	<div class="tags container-flex">
                    <span class="tag c-gray-1" v-for="tag in post.tags">
                        <tag-link :tag="tag" />        
                    </span>
                </div>
	      	</footer>
		    <div class="comments">
		     	<div class="divider"></div>
		      	<disqus-comments></disqus-comments>
				<!-- @include('partials.disqus-script') -->

				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>     		                    
		    </div>
	    </div>
  	</section>
</template>

<script type="text/javascript">
	export default {
		props: ['url'],
		data(){
			return {
				post: {
					owner: {},
					category: {}
				}
			}
		},
		mounted(){
			axios.get(`api/blog/${this.url}`)
				.then(response => {
					this.post = response.data;
				})
				.catch(error => {
					console.log(error.response.data)
				});
		}
	}
</script>