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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/petshop/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Petshop</th>
										<th>Alamat</th>
										<th>Latitude</th>
										<th>Longitude</th>
										<th>No Telephone</th>
										<th>Logo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($petshop as $pet) : ?>
									<tr>
										<td width="150">
											<?php echo $pet->nama ?>
										</td>
										<td>
											<?php echo $pet->alamat ?>
										</td>
										<td>
											<?php echo $pet->lat ?>
										</td>
										<td>
											<?php echo $pet->long ?>
										</td>
										<td>
											<?php echo $pet->nohp ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/user/' . $pet->logo) ?>" width="64" />
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/petshop/edit/' . $pet->id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/petshop/delete/' . $pet->id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>

</html>