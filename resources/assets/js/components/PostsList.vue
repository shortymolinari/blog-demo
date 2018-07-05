<template>
	<section class="posts container">
        <!--  @if(isset($title))
            <h3>{{ $title }}</h3>
        @endif -->
		
		<posts-list-item 
			v-for="post in items" 
			:post="post" 
			:key="post.id" 
		/>

        <article v-if="! items.length" class="post w-gallery">
            <div class="content-post">
                <h1>No hay publicaciones todavía.</h1>
            </div>
        </article>
    </section>
    <!-- {{ $posts->appends(request()->all())->links() }} -->
</template>

<script type="text/javascript">
	export default {
		props: ['items']
	}
</script>