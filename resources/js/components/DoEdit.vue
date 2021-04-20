<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">contact us here</div>

                    <div class="card-body">
                   
                       <form method="POST" @submit.prevent="updatecontact()"> 
                          <div class="form-group">
                               <label for="">email</label>
                               <input type="email" name="email" v-model="doedit.email"  id="edit" class="form-control">   
                          </div>
                           <div class="form-group">
                               <label for="">description</label>
                               <textarea name="text" v-model="doedit.description" cols="30" rows="5" class="form-control"></textarea>
                         </div>
                          <div class="form-group">
                               <!-- <label for="">id</label> -->
                               <input type="hidden" v-model="doedit.id" class="form-control">
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

export default{
    props:['doedit'],
    methods:{
        updatecontact(){
             axios.patch('http://127.0.0.1:8000/api/contacts/update/'+this.doedit.id,{
               
                email: this.doedit.email,
                description:this.doedit.description
            })
            // .then(response => this.updatedcontact = response.data)
            .then(function (response) {
                // this.updatedcontact = response.data
                    console.log(response);
               })
            .catch(error =>{
                console.log(errror);
            })
            
        }
    },
    data(){
        return{
            
            id: '',
            email:'',
            description:'',
            updatedcontact:'',
        }
    },
    created(){
        
    }
}
</script>
