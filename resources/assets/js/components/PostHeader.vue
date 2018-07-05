<template>
	<div>
		<header class="container-flex space-between">
	        <div class="date">
	            <span class="c-gris">
	                {{ post.published_date }} / {{ post.owner.name }}
	            </span>
	        </div>
	        <!-- @if($post->category) -->
	        <div class="post-category">
	            <span class="category">
	            	<category-link :category="post.category" />
	            </span>
	        </div>
	        <!-- @endif -->
	    </header>
	    <h1 v-text="post.title"></h1> <!-- //Fprma 2 de poner texto con Vue -->
	    <br/>
	    <div class="divider"></div>
	    <br/>
    </div>
</template>
<script type="text/javascript">
	export default {
		props:['post']
	}
</script>