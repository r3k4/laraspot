<template>

<table class="table text-info table-hover" >
		<thead>
	    	<tr>
	    		<th class="alert-info text-center" style="font-weight: bold;" colspan="3">
	    			<i class="fa fa-list"></i> Most Online user
	    		</th>
	    	</tr>			
		</thead>
		<tbody>			
	        <tr v-for="user in users">
	            <td width="230px">
	                <span data-toggle='tooltip' v-bind:title="user.username">
	                    {{ user.fk__mst_data_user }}
	                </span>
	            </td>
	            <td width="10px">:</td>
	            <td> 
	                 {{ Fungsi.size(user.acctoutputoctets + user.acctinputoctets)  }}
	            </td>
	        </tr>
  		</tbody>
</table>
	
</template>
<script>
import Radacct from "../../Models/Radacct.js";


	export default{

		mounted(){
			this.fetchData();
		},
		data(){
			return {
				title_username : '',
				users : [],
				Radacct : new Radacct,
				Fungsi : new Fungsi,
			}
		},
		methods: {
			fetchData(){
                this.Radacct.getMostUserOnlineThisMonth()
                    .then(response => {
                        this.users = response.data;
                 })
                 .catch(function (error) {
                    console.log(error);
                 });    				
			}
		}
	}
</script>