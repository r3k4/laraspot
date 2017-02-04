<template>
    <div class="row" v-if="showModal">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{ oke }}
            </div>  
            <hr>
            <button @click="$emit('tampilkanModal')">
                Hide
            </button>          
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                oke: 'sip',
                showModal : false
            }
        },
        methods: {
            hideModal: function(){
                this.showModal = false;
            },
            tampilkanModal: function(){
                this.showModal = true;
            }
        }
    }
</script>
