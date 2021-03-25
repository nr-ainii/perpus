<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Update Data Anggota</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- End Page Heading -->

<!-- Begin Main Content -->
    <?php foreach ($anggota as $ag) : ?>
        <form method="POST" action="<?php echo base_url('data_anggota/update_anggota_aksi') ?>" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">NIS</label>
                <!-- <input type="hidden" name="nis" value="<?php echo $ag->nis ?>"> -->
                <input type="text" name="nis" class="form-control" value="<?php echo $ag->nis ?>">
                <?php echo form_error('nis', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Nama Anggota</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $ag->nama ?>">
                <?php echo form_error('nama', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?php echo $ag->kelas ?>">
                <?php echo form_error('kelas', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="">
                    <option value="<?php echo $ag->jenis_kelamin ?>"><?php echo $ag->jenis_kelamin ?></option>
                    <option value="laki-laki">Laki - Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                <?php echo form_error('jenis_kelamin', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            

                    <button type="submit" class="btn btn-primary mt-4"> Simpan </button>
                    <button type="reset" class="btn btn-danger mt-4 ml-4"> Reset </button>
                
        </form>
    <?php endforeach; ?>
<!-- End Main Content -->

<!-- end of page content -->
</div>