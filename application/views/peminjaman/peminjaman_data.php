<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi Peminjaman</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- End Page Heading -->
</div>


<!-- Main Content -->
<div id="content">
<a href="<?php echo base_url('peminjaman/peminjaman_tampil') ?>" class="ml-4 mb-2 btn btn-primary"> Lihat Data Peminjaman</a>
<form method="POST" action="<?php echo base_url('peminjaman/pinjam_buku') ?>" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="card mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">
                    Form Peminjaman
                </h6>
            </div>

            <div class="card-body">
                <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                            <div class="form-group row">

                                <div class="col-sm-6 ">

                                    <label class="col-lg-4 ">No. Transaksi</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $autonumber ?>" readonly="readonly"><br>
                                        </div>

                                    <label class="col-lg-4 ">Tgl Pinjam</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?php echo $tglpinjam; ?>" readonly="readonly"><br>
                                        </div>
                                        

                                    <label class="col-lg-4 ">Tgl Kembali</label>
                                        <div class="col-lg-7">
                                            <input type="text" id="tgl_kembali" name="tgl_kembali" class="form-control" value="<?php echo $tglkembali; ?>" readonly="readonly"><br>
                                        </div>
                                        
                                    
                                </div>

                            <div class="col-sm-6">
                                <label class="col-lg-4 ">Nama Anggota</label>
                                    <div class="col-lg-7">
                                        <select name="nama" class="form-control" id="nis">
                                            <option> </option>
                                            <?php foreach($anggota as $ag): ?> 
                                            <option  value="<?php echo $ag->nama ?>"><?php echo $ag->nama ?></option>
                                            <?php endforeach; ?>
                                        </select><br>
                                    </div>
                                    <?php echo form_error('nama','<div class="text-small text-danger">','</div>') ?>
                                
                                <label class="col-lg-4 ">Judul Buku</label>
                                    <div class="col-lg-7">
                                        <select name="judul" class="form-control" id="judul">
                                            <option> </option>
                                            <?php foreach($buku as $bk): ?> 
                                            <option  value="<?php echo $bk->judul ?>"><?php echo $bk->judul ?></option>
                                            <?php endforeach; ?>
                                        </select><br>
                                    </div>
                                    <?php echo form_error('judul','<div class="text-small text-danger">','</div>') ?>

                                    <button type="submit" class="btn btn-primary mt-2 ml-2"> Simpan </button>

                            </div>

                            </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
        
    </div>
</form>

</div>
<!-- End of Main Content -->

