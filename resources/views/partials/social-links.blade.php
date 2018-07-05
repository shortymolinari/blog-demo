				<div class="buttons-social-media-share">
		            <ul class="share-buttons">
		              	<li>
		              		<a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}" title="Compartir en Facebook {{ $description }}" target="_blank">
		              			<img alt="Share on Facebook" src="/img/flat_web_icon_set/Facebook.png">
		              		</a>
		              	</li>

		              	<li>
		              		<a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $post->title }}&via=ShortyMolinari&hashtags=Zendero" target="_blank" title="Tweet">
		              			<img alt="Tweet" src="/img/flat_web_icon_set/Twitter.png">
		              		</a>
		              	</li>
		              	<li>
		              		<a href="https://plus.google.com/share?url={{ request()->fullUrl() }}&text={{ $post->title }}&hl=ES_es" target="_blank" title="Compartir en Google+">
		              			<img alt="Share on Google+" src="/img/flat_web_icon_set/Google+.png">
		              		</a>
		              	</li>
		              	<li>
		              		<a href="http://pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}" target="_blank" title="Pin it">
		              			<img alt="Pin it" src="/img/flat_web_icon_set/Pinterest.png">
		              		</a>
		              	</li>
		            </ul>
	          	</div>