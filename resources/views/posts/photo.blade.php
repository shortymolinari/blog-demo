 <figure>
 	<img src="{{ url('storage/'.$post->photos->first()->url) }}" 
 	alt="Foto: {{ $post->title }}" 
 	class="img-responsive" />
 </figure>