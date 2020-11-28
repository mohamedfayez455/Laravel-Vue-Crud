<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                posts
            </div>
            <div class="card-body p-0">
                <table v-if="posts.length > 0" class="table">
                    <thead>
                    <tr >
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">body</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="post in posts">
                        <th scope="row">{{post.id}}</th>
                        <td>{{post.title}}</td>
                        <td>{{post.body}}</td>
                        <td>
                            <router-link class="text-secondary" :to="'/post/edit/'+ post.id " >Edit</router-link>
                            <a href="#" class="text-danger" @click="postDelete(post.id , post.title)" >Delete</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <p v-else class="text-center p-5">
                    no posts
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:'create',
        data(){
            return{
                posts:{},
            }
        },
        methods:{
            getPosts(){
                axios.get('/api/post').then((response)=>{
                   this.posts =  response.data.data ;
                }).catch((error)=>{

                });
            },
            postDelete(id , title){
                if (confirm('are you sure you need delete this ' + title)){
                    axios.delete('api/post/' + id).then((response)=>{
                       this.getPosts();
                    }).catch((error)=>{
                        alert(error.response.data.message);
                    });
                }
            }
        },
        created() {
            this.getPosts();
        }
    }
</script>
