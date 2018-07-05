<template>
	 <paginator 
        :url="`/api/etiquetas/${this.tag}`" 
        component-name="posts-list"
    />
</template>
<script type="text/javascript">
    export default {
    	props: ['tag']
    }
</script>
<!-- <script type="text/javascript">
    export default{
        props: ['tag'],
        data(){//funciones en nueva version de javascript
            return{
                posts: []
            }
        },
        mounted(){
            this.getPosts();
        },
        beforeRouteUpdate(to, from, next){
        	//console.log(to.params.tag, from.params.tag);
        	this.tag = to.params.tag;
        	this.getPosts();
        	next();
        },
        methods: {
        	getPosts(){
        		return axios.get(`/api/etiquetas/${this.tag}`)
			            //promesa que se ejecuta si el llamado de ajax fue exitoso
			            .then( response => {//funciones con parametro en nueva version de javascript
			                    this.posts = response.data.data;
			            })
			            .catch( error => {
			                console.log(error)
			            }); 
        	}
        },
        // watch: {
        // 	//'$route'(){
        // 	tag(){
        // 		this.getPosts();
        // 	}
        // }
    }
</script> -->