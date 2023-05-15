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

				<div class="col-sm-12">

					<div class="card-header">
						<a href="<?php echo site_url('admin/petshop/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="maps">
								<div id='map' style='padding:10px 10px; width: 400px; height: 400px;'></div>
								<!-- <pre id='info'></pre> -->
							</div>
						</div>

						<div class="col-sm-6">
							<div class="card-body">

								<form action="<?php base_url('admin/petshop/add') ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="nama">Nama Petshop*</label>
										<input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Petshop" />
										<div class="invalid-feedback">
											<?php echo form_error('nama') ?>
										</div>
									</div>

									<div class="col-md-15 mb-3">
										<label for="alamat">Alamat*</label>
										<div class="input-group">
											<textarea class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="alamat" placeholder="Alamat"></textarea>
											<!-- <div class="input-group-prepend">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mapsModal"><i class="fas fa-map-marked-alt"></i> Maps</button>
										</div> -->
											<div class="invalid-feedback">
												<?php echo form_error('alamat') ?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label for="lat">Latitude*</label>
											<input type="text" class="form-control <?php echo form_error('lat') ? 'is-invalid' : '' ?>" name="lat" placeholder="-6.345015128625363" id="latitude" />
											<div class="invalid-feedback">
												<?php echo form_error('lat') ?>
											</div>
										</div>
										<div class="col">
											<label for="long">Longitude*</label>
											<input type="text" class="form-control <?php echo form_error('long') ? 'is-invalid' : '' ?>" name="long" placeholder="106.84466718094751" id="longitude" />
											<div class="invalid-feedback">
												<?php echo form_error('long') ?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="nohp">Nomor Telephone*</label>
										<input type="text" class="form-control <?php echo form_error('long') ? 'is-invalid' : '' ?>" name="nohp" placeholder="Nomor Telephone " />
										<div class="invalid-feedback">
											<?php echo form_error('nohp') ?>
										</div>
									</div>
									<div class="form-group">
										<label for="nama">Logo*</label>
										<input class="form-control-file <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="file" name="images" />
										<div class="invalid-feedback">
											<?php echo form_error('images') ?>
										</div>
									</div>



									<input class="btn btn-success" type="submit" name="btn" value="Save" />
									<input class="btn btn-primary" type="reset" name="btn" value="Reset" />
								</form>

							</div>
						</div>
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
		<?php $this->load->view("admin/_partials/modal.php") ?>




</body>

</html>