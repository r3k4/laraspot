<template>

        <nav aria-label="...">
          <ul class="pager">
            <li class="previous">
                <a v-if="users.prev_page_url != null" 
                   @click.prevent=" $emit('getPrevPage')" 
                   href="#">
                    <i class="fa fa-arrow-left"></i> Previous
                </a>
            </li>
            <li class="next">
                <a v-if="users.next_page_url != null" 
                   @click.prevent="$emit('getNextPage')" 
                   href="#">
                    Next <i class="fa fa-arrow-right"></i>
                </a>
            </li>
          </ul>
        </nav> 
  
</template>

<script>
  export default{
    props: [
      'users'
    ]
  }
</script>