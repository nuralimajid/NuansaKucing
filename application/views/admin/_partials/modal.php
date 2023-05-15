<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout</a>
      </div>
    </div>
  </div>
</div>


<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- kategorimodel -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Kategori</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/Kategori/add'); ?>" method="post">
          <div class="form-group">
            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Kategori*" required />
            <div class="invalid-feedback">
              <?php echo form_error('nama') ?>
            </div>
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>
      </div>
      <div class="modal-footer">
        <div class=" small text-muted">
          * required fields
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit Kategori -->
<!-- 
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Tambah Kategori</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/Kategori/edit'); ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $kat->id_kategori; ?>" />
          <div class="form-group">
            <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" placeholder="Nama Kategori*" value="<?php echo $kat['nama']; ?>" required />
            <div class="invalid-feedback">
              <?php echo form_error('nama') ?>
            </div>
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>
      </div>

      <div class="modal-footer">
        <div class=" small text-muted">
          * required fields
        </div>
      </div>
    </div>
  </div>
</div> -->