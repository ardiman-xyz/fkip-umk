
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url("assets/back-end/") ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
		<script type="text/javascript">
	
	$(document).ready(function(){

		$('#show').on('click', function(){
			if ($(this).is(':checked')) {
				$('#password').attr('type', 'text');
			} else {
				$('#password').attr('type', 'password');
			}
		});

		$('#formLoginMhs').on('submit', function(e){
			e.preventDefault();
			const me = $(this),
				  url = me.attr('action'),
				  data = me.serialize();
			const btn_submit = $('#btn-submit').text('process...');
			btn_submit.attr('disabled', true);

			$.ajax({
				url: url,
				type: 'post',
				dataType: 'json',
				data: data,
				success: callback => {
					
					if (callback.status == true) {
						$('#msg').html(`<div class="alert alert-success">`+callback.message+`</div>`);
						window.location.href = callback.url
					} else {
						$('#msg').html(`<div class="alert alert-danger">`+callback.message+`</div>`);
						btn_submit.attr('disabled', false);
						btn_submit.text('Login');
					}

				},
				error: xhr =>{
					alert('Something wrong on Your network, Please try again!');
					btn_submit.attr('disabled', false);
					btn_submit.text('Login');
				}
			});

		});

	});
</script>
	</body>
</html>