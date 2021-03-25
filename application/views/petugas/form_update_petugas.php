<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Update Data petugas</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- End Page Heading -->

<!-- Begin Main Content -->
    <?php foreach ($petugas as $ptg) : ?>
        <form method="POST" action="<?php echo base_url('data_petugas/update_petugas_aksi') ?>" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Nama petugas</label>
                <input type="hidden" name="id_petugas" value="<?php echo $ptg->id_petugas ?>">
                <input type="text" name="nama" class="form-control" value="<?php echo $ptg->nama ?>">
                <?php echo form_error('nama', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $ptg->email ?>">
                <?php echo form_error('email', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $ptg->password ?>">
                <?php echo form_error('password', '<span class="text-sm text-danger">','</span>') ?>
            </div>

                    <button type="submit" class="btn btn-primary mt-4"> Simpan </button>
                    <button type="reset" class="btn btn-danger mt-4 ml-4"> Reset </button>
                
        </form>
    <?php endforeach; ?>
<!-- End Main Content -->

<!-- end of page content -->
</div>