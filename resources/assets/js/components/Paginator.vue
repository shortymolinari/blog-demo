<template>
	<div>
		<component :is="componentName" :items="items"></component>
		<pagination-links :pagination="pagination" />
	</div>
</template>

<script type="text/javascript">
	export default {
		props: [
			'url', 
			'componentName'
		],
		data(){
			return{
				pagination: {},
				items: []
			}
		},
		mounted(){
            axios.get(`${this.url}?page=${this.$route.query.page || 1}`)
                //promesa que se ejecuta si el llamado de ajax fue exitoso
                .then( response => {//funciones con parametro en nueva version de javascript
                    this.items = response.data.data;
                    this.pagination = response.data;
                    delete this.pagination.data;
                })
                .catch( error => {
                    console.log(error)
                });
        }
	}
</script>

<style type="text/css" lang="scss">
    .pagination{
        a.active{
            background-color: #1abc9c;
            color: white;
        }
    }
</style>