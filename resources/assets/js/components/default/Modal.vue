<template>
 
	<div class="modal fade" :id="idModal" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">
						 {{ modalTitle }}
					</h4>
				</div>
				<div class="modal-body">
					<slot></slot>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
	export default{
		data() {
			return {
				// modalTitle : ""
			}
		},
		props: [
			'modalTitle',
			'idModal'
		]
	}
</script>