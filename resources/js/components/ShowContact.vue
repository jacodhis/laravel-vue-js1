<template>
    <div>
        <table class="table">
            <tr>
                <td>email</td>
                <td>description</td>
            </tr>
            <tr>
                <td>{{singlecontact.email}}</td>
                <td>{{singlecontact.description}}</td>
            </tr>
 
        </table>

    </div>
</template>

<script>

export default{
    props:['singlecontact'],
    components:{
       
    }
}
</script>
