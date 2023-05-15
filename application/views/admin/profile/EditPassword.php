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

                        <a href="<?php echo site_url('admin/profile/') ?>"><i class="fas fa-arrow-left"></i>
                            Back</a>
                    </div>

                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?php base_url(" admin/profile/changepassword") ?>" method="post" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id" value="<?php echo $profile->id ?>" /> -->
                            <div class="form-group">
                                <label for="password_lama">Password Lama*</label>
                                <input class="form-control <?php echo form_error('password_lama') ? 'is-invalid' : '' ?>" type="password" name="password_lama" id="password_lama" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('password_lama') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_baru">Password Baru*</label>
                                <input class="form-control <?php echo form_error('password_baru') ? 'is-invalid' : '' ?>" type="password" name="password_baru" id="password_baru" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('password_baru') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="verifikasi_password">verifikasi Password*</label>
                                <input type="password" class="form-control <?php echo form_error('verifikasi_password') ? 'is-invalid' : '' ?>" name="verifikasi_password" id="verifikasi_password" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('verifikasi_password') ?>
                                </div>
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Update" />
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