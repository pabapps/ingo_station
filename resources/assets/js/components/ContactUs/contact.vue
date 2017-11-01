<template>
	<div>
		<form method="POST" @submit.prevent="onSubmit" >
			<h3>Login</h3>

			<div class="form-field">
				<label for="username-login">Email</label>
				<input type="email" name="email" required>
			</div>

			<div class="form-field">
				<label for="username-password">asdasdnaslk;dnaskjdnbaksnd</label>
				<input type="password" name="password" required>
			</div>

			<div class="form-field">
				<label>
					<input type="checkbox" /> Remember me
				</label>
			</div>

			<div class="form-field">
				<button type="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</template>

<script>
export default {

	name: 'contact',

	data () {
		return {

		};
	},
	methods:{
		onSubmit(){
			console.log("testing");
		}
	}

}
</script>

<style lang="css" scoped>
</style>