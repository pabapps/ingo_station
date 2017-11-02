<template>
	<div>
		<form method="POST" @submit.prevent="onSubmit" >
			<h3>Contact Us</h3>
			
			<div class="form-field">
				<label for="username-login">Email</label>
				<input type="email" name="email" required>
			</div>


			<div class="form-field">
				<label for="username-login">Email</label>
				<input type="email" name="email" required>
			</div>

			<div class="form-field">
				<label for="username-password">Message</label>
				<div class="field">
					<textarea id="about-org" name="about_org" cols="4" rows="4" ></textarea>
				</div>
			</div>


			<div class="form-field">
				<button type="submit" class="btn">Submit</button>
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