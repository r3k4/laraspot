<template>
      <div class="row">
           <div class="form-group col-md-7">
                <input type="text" class="form-control" placeholder="search..." name="search" @keydown.13="$emit('pressEnter')" v-model="search_value">                
           </div>
           <div class="form-group col-md-5">
                <button  v-show="search_value!=''" class="btn btn-danger pull-right" @click="$emit('reset')">
                    <i class="fa fa-refresh"></i> reset  
                </button>            
                <button @click="$emit('search')" class="btn btn-info pull-right">
                    <i class="fa fa-search"></i> Search 
                </button>               
           </div>
    </div> 
</template>

<script>
  export default{
    props: [
      'search_value'
    ]
  }
</script>