<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("admin/user/edit"); ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $user->user_id ?>" />

							<div class="form-group">
								<label for="nama">Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="nama" value="<?php echo $user->nama_lengkap ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="user">Username*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="namal" readonly value="<?php echo $user->username ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="Email" value="<?php echo $user->email ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nohp">Nomor Handphoe*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="nohp" value="<?php echo $user->no_hp ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="password">Password*</label>
								<input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" name="password" placeholder="Password" value="<?php echo $user->password ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="foto">Foto*</label>
								<input class="form-control-file <?php echo form_error('images') ? 'is-invalid' : '' ?>" type="file" name="foto" />
								<input type="hidden" name="old_image" value="<?php echo $user->foto ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>




							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>