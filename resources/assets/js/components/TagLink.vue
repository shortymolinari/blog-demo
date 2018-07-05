<template>
	<router-link :to="{name: 'tags_posts', params: {tag: tag.url}}">
        #{{ tag.name }}
    </router-link> 
</template>

<script type="text/javascript">
	export default {
		props: ['tag']
	}
</script>