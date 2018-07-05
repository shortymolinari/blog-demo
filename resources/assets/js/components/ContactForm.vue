<template>
	<div class="form-contact">
		<transition name="fade" mode="out-in">
			<p v-if="sent"> Tu mensaje ha sido recibido, te contactaremos pronto.</p>
			<form v-else @submit.prevent="submit">
				<div class="input-container container-flex space-between">
					<input v-model="form.name" type="text" placeholder="Tu nombre" class="input-name" required="required">
					<input v-model="form.email" type="email" placeholder="Email" class="input-email" required="required">
				</div>
				<div class="input-container">
					<input v-model="form.subject" type="text" placeholder="Asunto" class="input-subject" required="required">
				</div>
				<div class="input-container">
					<textarea v-model="form.message" cols="30" rows="10" placeholder="Tu mensaje" required="required"></textarea>
				</div>
				<div class="send-message">
					<button class="text-uppercase c-green" :disabled="working">
						<span v-if="working">Enviando...</span>
						<span v-else>Enviar mensaje</span>
					</button>
				</div>
			</form>
		</transition>
	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				sent: false,
				working: false,
				form: {
					name: 'Edwin Rincón',
					email: 'shortymolinari@gmail.com',
					subject: 'Pruena desde zendero',
					message: 'Pruebas de correo desde el blog de zendero'
				}
			}
		},
		methods:{
			submit(){
				this.working = true;
				axios.post('api/messages', this.form)
					.then( response => {
						this.sent = true;
						this.working = false;
					}).
					catch( error => {
						this.sent = false;
						this.working = false;
					});
			}
		}
	}
</script>