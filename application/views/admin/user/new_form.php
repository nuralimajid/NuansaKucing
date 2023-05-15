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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/user/add') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama">Nama Lengkap*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Lengkap" id="nama-lengkap" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nama">Username*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="namal" readonly placeholder="Username" id="username" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="email" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="nohp">Nomor Handphone*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="nohp" placeholder="08xxxxxxxxxx" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="nama">Password*</label>
								<input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" name="password" placeholder="Password" id="password" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
							<div class="form-group">
								<input class="form-checkbox" type="checkbox"> Show Password

							</div>



							<div class="form-group">
								<label for="nama">Photo</label>
								<input class="form-control-file <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="file" name="images" />
								<div class="invalid-feedback">
									<?php echo form_error('images') ?>
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