<template>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center" width="10px">No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Profile</th>
                <th>Usage</th>
                <th class="text-center" width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        <tr v-for="(user, index) in users.data">
                <td class="text-center">{{ users.from + index }} </td>
                <td>{{ user.nama }}</td>
                <td>{{ user.username }}</td>
                <td>{{ user.radusergroup.groupname }}</td>
                <td>
                    {{ Fungsi.size(user.c__total_usage) }}
                </td>
                <td class="text-center">
                    <i style="cursor:pointer;" @click="$emit('getDetail', [user.username])" class="fa fa-eye"></i>

                </td>
            </tr>
        </tbody>
    </table>      
</template>

<script>
    export default{

        props: [
            'users',
            'Fungsi'
        ]

    }
</script>