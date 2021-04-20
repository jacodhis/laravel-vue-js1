<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" v-if="errors.length">contact us here</div>
                    <div class="text-center alert alert-danger" v-for="error in errors" :key="error">
                        {{error}}
                    </div>

                    <div class="card-body">
                       <form method="POST" @submit.prevent="addcontact()"> 
                          <div class="form-group">
                               <label for="">email</label>
                               <input type="email" name="email" v-model="email" class="form-control">   
                          </div>
                           <div class="form-group">
                               <label for="">description</label>
                               <textarea name="text" v-model="description" cols="30" rows="5" class="form-control"></textarea>
                          </div>
                          <div class="">
                              <input type="submit" class="btn btn-primary">
                          </div>
                          
                       </form>
                    </div>
                    
                </div>
                           
                            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{             
                email:'',
                description:'',
                errors:[],
                successmsg: ''
            }
        },
        
       
        methods:{
         
            addcontact(){
                if(this.name && this.description){
                    return true;
                }
                this.errors = [];

                if(!this.email){
                   this.errors.push('email field is empty');
                }
                if(!this.description){
                   this.errors.push('description field is empty');
                }
                
                axios.post('/api/contacts/store',{
                email: this.email,
                description:this.description
            })
            // .then(function (response) {
            //         console.log(response);
            //    })
            // .catch(error =>{
            //     console.log(errror);
            // })
           
            }
        },
       
    }
</script>
<style scoped>

</style>