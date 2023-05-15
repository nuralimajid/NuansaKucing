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


                <!-- DataTables -->
                <div class="card mb-3" style="max-width: 600px;">
                    <div class="row no-gutters">
                        <?php foreach ($profile as $user) : ?>
                        <!-- <div class="col-md-4">
                            <img src="<?= base_url('upload/user/') . $user->images ?>" class="card-img" style="max-width:150px">
                        </div> -->
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user->nama_lengkap; ?></h5>
                                <p class="card-text"><?= $user->email; ?></p>

                                <a class="btn btn-primary" href="<?= base_url('admin/profile/changepassword') ?>">Change Password</a>

                            </div>


                        </div>
                        <?php endforeach; ?>
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