<template>
        <default-modal modalTitle="User Hotspot" idModal="idModal"> 

            <table v-if="dataUser != null" class="table">
                <tr>
                    <td width="150px">
                        Nama 
                    </td>
                    <td width="15px">:</td>
                    <td>{{ dataUser.username }}</td>
                </tr>
                <tr>
                    <td>
                        Password
                    </td>
                    <td>:</td>
                    <td>{{ dataUser.value }}</td>
                </tr>
                <tr>
                    <td width="150px">
                        Profile
                    </td>
                    <td>:</td>
                    <td>{{ dataUser.fk__radusergroup }}</td>
                </tr>                

            </table>

        </default-modal>    
</template>

<script>
export default{
    props: [
        'dataUser',
        'idModal'
    ]    
}
</script>