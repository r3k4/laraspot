<template>
	<div class="alert alert-success" role="alert">
		<slot></slot>
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log("alert mounted...");
		}
	}
</script>