<template>
	<div class="buttons-social-media-share">
		<ul class="share-buttons">
		   <li>
		    	<a :href="`https://www.facebook.com/sharer/sharer.php?u=${url}&title=${description}`" title="Compartir en Facebook" target="_blank">
		     		<img alt="Share on Facebook" src="/img/flat_web_icon_set/Facebook.png">
		    	</a>
		   </li>

		   <li>
		    	<a :href="`https://twitter.com/intent/tweet?url=${url}&text=${description}&via=ShortyMolinari&hashtags=Zendero`" target="_blank" title="Tweet">
		     		<img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png">
		    	</a>
		   </li>
		   <li>
		    	<a :href="`https://plus.google.com/share?url=${url}&text=${description}&hl=ES_es`" target="_blank" title="Compartir en Google+">
		     		<img alt="Share on Google+" src="/img/flat_web_icon_set/Google+.png">
		    	</a>
		   </li>
		   <li>
		    	<a :href="`http://pinterest.com/pin/create/button/?url=${url}`" target="_blank" title="Pin it">
		     		<img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png">
		    	</a>
		   </li>
		</ul>
	</div>
</template>

<script type="text/javascript">
	export default {
		props: ['description'],
		computed:{
			url(){
				return document.URL;
			}
		}
	}
</script>