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
                <div class="card mb-3">
                    <div class="card-header">
                        <a href="#" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add New</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($kategori as $kat) :  ?>
                                        <tr>
                                            <td width="150">
                                                <?php echo $kat->kat_nama ?>
                                            </td>
                                            <td width="250">
                                                <a data-toggle="collapse" href="#dadang" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-edit"></i> Edit</a>
                                                <a onclick="deleteConfirm('<?php echo site_url('admin/kategori/delete/' . $kat->kat_id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="collapse col-lg mx-auto" id="dadang">
                                <div class="card card-body">
                                    <form action="<?php echo base_url('admin/kategori/edit/'); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo $kat->kat_id ?>" />
                                        <div class="form-group">
                                            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" value="<?php echo $kat->kat_nama; ?>" required />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama') ?>
                                            </div>
                                        </div>
                                        <button class="btn btn-success mx-auto" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
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


<!-- <div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form action="<?php echo base_url('admin/Kategori/edit'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $kat->kat_id ?>" />
            <div class="form-group">
                <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Kategori*" value="<?php echo $kat->kat_nama; ?>" required />
                <div class="invalid-feedback">
                    <?php echo form_error('nama') ?>
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="btn">Save</button>
        </form>
    </div>
</div> -->