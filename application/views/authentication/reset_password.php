<div class="login-box">
	<div class="login-logo">
		<h1 style="font-weight:bold">
			<center>RESET PASSWORD</center>
		</h1>
	</div>
	<?php $code = $this->session->flashdata('inikode'); ?>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg text-bold"> Masukkan password baru anda</p>
		<form method="post" action="<?php echo base_url('auth/reset_password'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="password" name="passBaru" class="form-control" required minlength="5" placeholder="Password Baru" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<?php echo form_error('passBaru','<div class="text-danger small" ml-3>') ?>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="passKonf" class="form-control" required minlength="5" placeholder="Ketik Ulang Password Baru" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<?php echo form_error('passKonf','<div class="text-danger small" ml-3>') ?>
			</div>
			<input type="hidden" name="code" class="form-control" value="<?php echo $code ?>">

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Reset Password</button>
				</div>
			</div>
		</form>
	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true) ?>
	</div>
	<br>
	<!-- <div class="box box-solid box-info">
		<div class="box-header">
				<h3 class="box-title">User Login</h3>
		</div>
		<div class="box-body">
			<b>E-mail</b> : admin@mail.com (administrator) <br>
			<b>E-mail</b> : member@mail.com (member)<br>
			<b>Password</b> : password
	</div>  -->
</div>

<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>