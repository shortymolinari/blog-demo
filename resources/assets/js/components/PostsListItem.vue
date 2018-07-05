<template>
	<article class="post w-gallery"> <!-- no-image -->
                
            <!-- @include( $post->viewType('home') ) -->

            <div class="content-post">

                <post-header :post="post"></post-header>

                <p v-html="post.excerpt"></p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                       <post-link  class="text-uppercase c-green" :post="post"> 
                            Leer más 
                        </post-link>
                    </div>
                        
                    <div class="tags container-flex">
                            <span class="tag c-gray-1" v-for="tag in post.tags">
                               <tag-link :tag="tag" /> 
                                <!-- <router-link :to="{name: 'tags_posts', params: {tag: tag.url}}">
                                    #{{ tag.name }}
                                </router-link> --> 
                            </span>
                    </div>
                </footer>
            </div>
        </article>
</template>

<script type="text/javascript">
	export default {
		props: ['post']
	}
</script>
