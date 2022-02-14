<div class="login-box">
	<div class="login-logo">
		<h1 style="font-weight:bold">
			<center>Form Code</center>
		</h1>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg text-bold"> Masukkan code yang dikirimkan pada email anda </p>
		<form method="post" action="<?php echo base_url('auth/form_code'); ?>">
			<div class="form-group has-feedback">
				<input type="code" name="code" class="form-control" required minlength="3" placeholder="Token" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="row">

				<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Next</button>
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