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
<a href="<?php echo base_url('peminjaman/peminjaman_tampil') ?>" class="ml-4 mb-2 btn btn-primary"> Kembali </a>
<?php foreach ($transaksi as $tr) : ?>
    <form method="POST" action="<?php echo base_url('peminjaman/kembaliin') ?>" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="card mb-4">
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">
                        Form Pengembalian
                    </h6>
                </div>

                <div class="card-body">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                                <div class="form-group row">

                                    <div class="col-sm-6 ">

                                        <label class="col-lg-4 ">No. Transaksi</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" name="tgl_kembali" value="<?php echo $tr->tgl_kembali ?>">
                                                <input type="text" id="no_transaksi" name="no_transaksi" class="form-control" value="<?php echo $tr->no_transaksi ?>" readonly="readonly"><br>
                                            </div>
                                        
                                        <label class="col-lg-4 ">Nama Anggota</label>
                                            <div class="col-lg-9">
                                                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $tr->nama ?>" readonly="readonly"><br>
                                            </div>

                                        <label class="col-lg-4 ">Judul Buku</label>
                                            <div class="col-lg-9">
                                                <input type="text" id="judul" name="judul" class="form-control" value="<?php echo $tr->judul ?>" readonly="readonly"><br>
                                            </div>
                                        
                                    </div>

                                <div class="col-sm-6">
                                        <label class="col-lg-9 ">Tanggal Pengembalian</label>
                                            <div class="col-lg-9">
                                                <input type="date" id="tgl_pengembalian" name="tgl_pengembalian" class="form-control"><br>
                                            </div>
                                    
                                    <label class="col-lg-4 ">Status</label>
                                        <div class="col-lg-9">
                                            <select name="status" class="form-control" id="judul">
                                                <option> 
                                                        <?php 
                                                            if ($tr->status == '1') {
                                                                echo 'Dipinjam';
                                                            }
                                                        ?> 
                                                </option>
                                                <option value="1"> Dipinjam </option>
                                                <option value="2"> Kembali </option>
                                            </select><br>
                                        </div>

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
<?php endforeach; ?>

</div>
<!-- End of Main Content -->

