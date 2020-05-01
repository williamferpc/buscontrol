<template>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-body">
				<form>
					<div class="d-flex justify-content-center mt-3 login_container">
						<img src="images/buscontrol.png" class="img-logo" alt="Logo">
					</div><br>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Usuario">
						
					</div>					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control input_pass" placeholder="Contraseña">
					</div>
					<div class="d-flex justify-content-center mt-3 login_container">
				 		<input type="submit" value="Entrar" class="btn btn-primary regular-button">
				   </div>
				</form>
			</div>
		</div>
	</div>
</template>

<!-- <script>
	export default {
		mounted(){
			axios.get('/api/login')
			.then(res => {
				console.log(res);
			})
			.catch(err => console.log(err));
		}
	}
</script> -->