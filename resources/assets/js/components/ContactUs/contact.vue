<template>
	<div>
		<form method="POST" @submit.prevent="onSubmit" >
			<h3>Contact Us</h3>
			
			<div class="form-field">
				<label for="username-login">Name</label>
				<input type="text" v-model="name" required>
			</div>


			<div class="form-field">
				<label for="username-login">Email</label>
				<input type="email" v-model="email"  required>
			</div>

			<div class="form-field">
				<label for="username-password">Message</label>
				<div class="field">
					<textarea id="about-org" v-model="description" cols="4" rows="4" ></textarea>
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
			name: "",
			email: "",
			description: ""
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