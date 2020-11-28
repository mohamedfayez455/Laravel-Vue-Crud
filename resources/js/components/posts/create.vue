<template>
    <div class="container">

        <form @submit.prevent="onSubmit">
            <alert-success :form="form" message="Your post created successfully"></alert-success>
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
                }),
            }
        },
        methods:{
          onSubmit(){
              this.form.post('/api/post').then((response) =>{

              }).catch((error) =>{

              })
          }
        },
    }
</script>
