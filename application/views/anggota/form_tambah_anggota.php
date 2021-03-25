<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Form Tambah Data Anggota</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- End Page Heading -->

<!-- Begin Main Content -->
        <form method="POST" action="<?php echo base_url('data_anggota/tambah_anggota_aksi') ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">NIS</label>
                <input type="text" name="nis" class="form-control">
                <?php echo form_error('nis', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Nama anggota</label>
                <input type="text" name="nama" class="form-control">
                <?php echo form_error('nama', '<span class="text-sm text-danger">','</span>') ?>
            </div>
            <div class="form-group">
                <label for="">Kelas </label>
                <input type="text" name="kelas" class="form-control" placeholder="Masukkan harga satuan barang tersebut">
                <?php echo form_error('kelas', '<span class="text-sm text-danger">','</span>') ?>
            </div> 
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin Anda --</option>
                        <option value="Laki - Laki"> Laki - Laki </option>
                        <option value="Perempuan"> Perempuan </option>
                </select>
                <?php echo form_error('jenis_kelamin','<div class="text-small text-danger">','</div>') ?>
            </div>
                    <button type="submit" class="btn btn-primary mt-4"> Simpan </button>
                    <button type="reset" class="btn btn-danger mt-4 ml-4"> Reset </button>
                
        </form>
<!-- End Main Content -->

<!-- end of page content -->
</div>
