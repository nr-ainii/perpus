<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Tambah Data Petugas</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- End Page Heading -->

<!-- Begin Main Content -->
        <form method="POST" action="<?php echo base_url('data_petugas/tambah_petugas_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama petugas</label>
                <input type="text" name="nama" class="form-control">
                <?php echo form_error('nama', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
                <?php echo form_error('email', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Password </label>
                <input type="password" name="password" class="form-control" placeholder="">
                <?php echo form_error('password', '<span class="text-sm text-danger">','</span>') ?>
            </div>
                    <button type="submit" class="btn btn-primary mt-4"> Simpan </button>
                    <button type="reset" class="btn btn-danger mt-4 ml-4"> Reset </button>
                
        </form>
<!-- End Main Content -->

<!-- end of page content -->
</div>
