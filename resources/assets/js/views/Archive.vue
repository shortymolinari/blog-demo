<template>
	<section class="pages container">
		<div class="page page-archive">
			<h1 class="text-capitalize">archive</h1>
			<p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
			<div class="divider-2" style="margin: 35px 0;"></div>
			<div class="container-flex space-between">
				<div class="authors-categories">
					<h3 class="text-capitalize">Autores</h3>
					<ul class="list-unstyled">
						<li v-for="author in writers" v-text="author.name"></li>
					</ul>
					<h3 class="text-capitalize">Categorias</h3>
					<ul class="list-unstyled">
						<li v-for="category in categories" class="text-capitalize">
							<category-link :category="category" />
						</li>
					</ul>
				</div>
				<div class="latest-posts">
					<h3 class="text-capitalize">Últimos posts</h3>
					<p v-for="post in posts">
						<post-link :post="post"> {{ post.title }} </post-link>
					</p>

					<h3 class="text-capitalize">Posts por mes</h3>
					<ul class="list-unstyled">
						<li class="text-capitalize" v-for="date in archive">
							{{ date.monthname }} - {{ date.year }} ({{ date.posts }})
							<!-- <a href="{{ route('pages.home', ['month' => $date->month, 'year' => $date->year]) }}"> -->
									<!-- {{ $date->monthname }} - {{ $date->year }} ({{ $date->posts }}) </a>-->
							
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				writers : [],
				categories : [],
				posts : [],
				archive : []
			}
		},
		mounted(){
			axios.get('api/archivo')
			.then( response => {
				this.writers = response.data.writers;
				this.categories = response.data.categories;
				this.posts = response.data.posts;
				this.archive = response.data.archive;
			})
			.catch( error => {
				comsole.log(error);
			});
		}
	}
</script>