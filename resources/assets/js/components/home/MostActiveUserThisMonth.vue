<template>
	<div>
  
		<table class="table table-hover text-danger" >
			<thead>
		    	<tr>
		    		<th class="alert-danger text-center" style="font-weight: bold;" colspan="3">
		    			<i class="fa fa-list"></i> Most Active user this month
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
		            <td> {{ Fungsi.size(user.jml) }} </td>
		        </tr>		
	        </tbody>  
		</table>	
	</div>	
</template>

<script>
import Radacct from "../../Models/Radacct.js";


	export default{

		mounted(){
			this.fetchData();
		},
		data(){
			return {
				users : [],
				Radacct : new Radacct,
				 Fungsi : new Fungsi,
			}
		},
		methods: {
			fetchData(){
                this.Radacct.getMostActiveUserThisMonth()
                    .then(response => {
                        this.users = response.data;
                        // this.showLoader = false;
                 })
                 .catch(function (error) {
                    console.log(error);
                 });    				
			}
		}
	}
</script>