<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Update Data Buku</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- End Page Heading -->

<!-- Begin Main Content -->
    <?php foreach ($buku as $bk) : ?>
        <form method="POST" action="<?php echo base_url('data_buku/update_buku_aksi') ?>" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Kode Buku</label>
                <!-- <input type="hidden" name="kode_buku" value="<?php echo $bk->kode_buku ?>"> -->
                <input type="text" name="kode_buku" class="form-control" value="<?php echo $bk->kode_buku ?>">
                <?php echo form_error('kode_buku', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Judul buku</label>
                <input type="text" name="judul" class="form-control" value="<?php echo $bk->judul ?>">
                <?php echo form_error('judul', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" value="<?php echo $bk->pengarang ?>">
                <?php echo form_error('pengarang', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" value="<?php echo $bk->deskripsi ?>">
                <?php echo form_error('deskripsi', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            

                    <button type="submit" class="btn btn-primary mt-4"> Simpan </button>
                    <button type="reset" class="btn btn-danger mt-4 ml-4"> Reset </button>
                
        </form>
    <?php endforeach; ?>
<!-- End Main Content -->

<!-- end of page content -->
</div>