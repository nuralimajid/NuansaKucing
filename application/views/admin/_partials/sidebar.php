<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/overview') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'User' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/user/add') ?>"> <i class="fas fa-fw fa-user-plus"></i> Tambah User</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/user') ?>"><i class="fas fa-fw fa-address-card"></i> List User</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'Petshop' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-paw"></i>
            <span>Petshop</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/petshop/add') ?>"><i class="fas fa-fw fa-map-pin"></i> Tambah Petshop</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/petshop') ?>"><i class="fas fa-fw fa-store-alt"></i> List Petshop</a>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/kategori') ?>">
            <i class="fas fa-fw fa-tags"></i>
            <span>Kategori</span></a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'Petshop' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-cog"></i>
            <span>Setting</span></a>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/profile/') ?>"><i class="fas fa-fw fa-address-card"></i> My Profil</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/petshop') ?>"><i class="fas fa-fw fa-store-alt"></i> apa ini ya</a>
        </div>
    </li>
</ul>