<div class="agileits">
	<h1>NUANSA KUCING</h1>
	<div class="w3-agileits-info">
		<form class='form animate-form' id='form1' action="#" method="post">
			<p class="w3agileits">Login Admin</p>
			<?= $this->session->flashdata('message'); ?>
			<div class='form-group has-feedback wthree'>
				<label class='control-label sr-only' for='email'>Email address</label>
				<input class='form-control' id='email' name='email' placeholder='Email address' type='text'><span class='glyphicon glyphicon-ok form-control-feedback'></span>
			</div>
			<div class='form-group has-feedback agile'>
				<label class='control-label sr-only' for='password'>Password</label>
				<input class='form-control w3l' id='password' name='password' placeholder='Password' type='password'><span class='glyphicon glyphicon-ok form-control-feedback'></span>
			</div>
			<div class='submit w3-agile'>
				<input class='btn btn-lg' type='submit' value='LOGIN'>
			</div>
		</form>
	</div>
</div>