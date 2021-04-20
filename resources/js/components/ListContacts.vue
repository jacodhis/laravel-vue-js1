<template>
    <div> 
        <div class="container">
            <!-- <createnew /> -->
        <button class="btn btn-success" @click="addNewContact()">add new contact</button>
            <div class="row">

                
            <div class="col-md-4"  >
                <table class="table">
                    <thead class="thead-dark">
                        <tr >
                            <td>id</td>
                            <td>email</td>
                        
                            <td>show</td>
                            <td>delete</td>
                            <td>edit</td>
                        </tr>
                    </thead>
                    <tbody v-for="contact in contacts" :key="contact.id">
                        <tr>
                            <td>{{contact.id}}</td>
                            <td>{{contact.email}} </td>
                            <td><button class="btn btn-primary" @click="showcontact(contact.id)"> show</button></td>
                            <td><button class="btn btn-danger" @click="del(contact.id)"> x</button></td>
                            <td><button class="btn btn-secondary" @click="editcontact(contact.id)">edit</button></td>
                        </tr>
                    </tbody>
                </table>
                  
            </div>
                </div>     
                <show-contact :singlecontact="singlecontact" />
                <do-edit :doedit="doedit" />
           
        </div>
        
    </div>
</template>


<script>

import ShowContact from './ShowContact'
import DoEdit from './DoEdit'

export default {
    components:{
        ShowContact,
        DoEdit
    },
  data(){
      return {
          displaydata:true,
          singlecontact:'',
          doedit:'',
          contacts:[],
          createnew:''

      }
  },
  methods:{
      addNewContact(){
                     axios.get('http://127.0.0.1:8000/api/contacts/create/')
            .then(response => this.createnew = response.data)
            .then((response) =>{
                       console.log(response)
            });
      },
      editcontact(id){
        //   alert(id);
         axios.get('http://127.0.0.1:8000/api/contacts/edit/'+id)
         .then(response => this.doedit = response.data)
         .then((response) => {
                console.log(response)});
           
      },
      showcontact(id){
        axios.get('http://127.0.0.1:8000/api/contacts/'+id).then(response => this.singlecontact = response.data)
           
      },
      del(id){
          //using an API 
        //    axios.delete('http://127.0.0.1:8000/api/delete', {params: {contact_id :id}}).then((response) => {
        //         console.log(response)
        //     }, (error) => {
        //         // error callback
        //     })
           
            //    or
          axios.delete('/api/delete/', {params: {contact_id :id}}).then((response) => {
                console.log(response)
            }, (error) => {
                // error callback
            })
            
      }
  },
  created(){
      axios.get('/api/contacts').then(response => this.contacts = response.data);
      
    //   .then(function (response){this.contacts = response.data});
               
  }
}

</script>