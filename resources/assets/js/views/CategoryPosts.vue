<template>
	<paginator 
        :url="`/api/categorias/${this.category}`" 
        component-name="posts-list"
    />
</template>
<script type="text/javascript">
    export default {
        props: ['category'],
        // data(){//funciones en nueva version de javascript
        //     return{
        //         posts: []
        //     }
        // },
        // mounted(){
        //     axios.get(`/api/categorias/${this.category}`)
        //         //promesa que se ejecuta si el llamado de ajax fue exitoso
        //         .then( response => {//funciones con parametro en nueva version de javascript
        //             this.posts = response.data.data;
        //         })
        //         .catch( error => {
        //             console.log(error)
        //         });
        // }
    }
</script>