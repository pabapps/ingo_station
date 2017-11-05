<template>
	<div>
		<form method="POST" @submit.prevent="onSubmit" >
			<h3>Contact Us</h3>
			
			<div class="form-field">
				<label for="username-login">Name</label>
				<input type="text" name="name" v-model="name" >
			</div>


			<div class="form-field">
				<label for="username-login">Email</label>
				<input type="email" name="email" v-model="email"  >
			</div>

			<div class="form-field">
				<label for="username-password">Message</label>
				<div class="field">
					<textarea id="about-org" name="description" v-model="description" cols="4" rows="4" ></textarea>
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

			if(this.name.length == 0 || this.email.length == 0 || this.description.length ==0){
				alert("Please fill all the fields properly before submitting!");
			}else{

				axios.post('/contact_us', {
					name: this.name,
					email: this.email,
					description: this.description
				})
				.then(function (response) {
					

				})
				.catch(function (error) {
					
				});

			}
		},
		getData(){
			console.log("testing");
			axios.get('/contact_us/test_get')
			.then(function (response) {
				console.log(response.data["name"]);
				// console.log(obj);
			})
			.catch(function (error) {
				console.log(error);
			});
		}
	}

}
</script>

<style lang="css" scoped>
</style>