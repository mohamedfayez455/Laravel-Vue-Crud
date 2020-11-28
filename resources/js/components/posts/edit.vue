<template>
    <div class="container">

        <form @submit.prevent="onSubmit">
            <alert-success :form="form" message="Your post updated successfully"></alert-success>
            <div class="form-group">
                <label for="exampleInputTitle">title</label>
                <input type="text" v-model="form.title" name="title" class="form-control" id="exampleInputTitle" aria-describedby="emailHelp">
                <has-error :form="form" field="title"></has-error>
            </div>
            <div class="form-group">
                <label for="exampleInputBody">body</label>
                <textarea name="body" v-model="form.body" class="form-control"  id="exampleInputBody" aria-describedby="emailHelp"></textarea>
                <has-error :form="form" field="body"></has-error>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        name:'create',
        data(){
            return{
                form : new Form({
                    title : '',
                    body : '',
                    id : 0,
                }),
            }
        },
        methods:{
            onSubmit(){
                this.form.put('/api/post/'+this.id).then((response) =>{
                    this.getPosts();
                }).catch((error) =>{

                })
            },
            loadPost(){
                axios.get('/api/post/'+ this.id).then((response)=>{
                    this.form.fill(response.data.data);
                }).catch((error)=>{

                });
            }

        },
        created() {
             this.id = this.$route.params.id;
            console.log(this.$route);
            this.loadPost();
        }
    }
</script>
