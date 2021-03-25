<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
    <a href="<?php echo base_url('laporanpdf/cetak_laporan') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<!-- End Page Heading -->

<!-- Begin Main Content -->
    <a href="<?php echo base_url('peminjaman') ?>" class="btn btn-primary mb-2"> Back </a>
    <form method="POST" action="<?php echo base_url('peminjaman/search') ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-3 mb-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
        <input type="text" name= "cari" class="form-control border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
            <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
        </div>
    </form>
    <!-- <div class="text-small">
        *fitur upload gambar dan update data belum tersedia
    </div> -->
        <?php echo $this->session->flashdata('pesan') ?>
        <table class="table table-hover table-striped table-bordered ">
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Nama Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
                foreach ($transaksi as $tr ) ://$mobil itu harus sama kaya inisialisasi di controller data_mobil line6    
            ?>
                <tr>
                    <td> <?php echo $tr->no_transaksi ?> </td>
                    <td> <?php echo $tr->nama ?> </td>
                    <td> <?php echo $tr->judul ?> </td>
                    <td> <?php echo $tr->tgl_pinjam ?> </td>
                    <td> <?php echo $tr->tgl_kembali ?> </td>
                    <td> <?php echo $tr->tgl_pengembalian ?> </td>
                    <td>  <?php 
                            if ($tr->status == "1") {
                                echo "<span class='badge badge-danger'> Dipinjam </span>";
                            } else {
                                echo "<span class='badge badge-success'> Dikembalikan </span>";
                            }
                        ?> 
                    </td>
                    <td> Rp<?php echo number_format($tr->denda,0,',','.') ?>,00 </td>
                    <td> <?php echo $tr->nama_petugas ?> </td>
                    
                    <td>
                        
                        <!-- <div class="row"> -->
                            <a href="<?php echo base_url('peminjaman/form_kembali/').$tr->no_transaksi ?>" 
                                class="btn btn-sm btn-primary mb-2 align-center
                                <?php 
                                    if ($tr->status == "2") {
                                        echo "disabled";
                                    } 
                                ?>
                                "> Kembali
                            </a>
                            <a href="<?php echo base_url('peminjaman/perpanjang/').$tr->no_transaksi ?>" 
                                class="btn btn-sm btn-success mb-2 align-center
                                <?php 
                                    if ($tr->status == "2") {
                                        echo "disabled";
                                    } 
                                ?>
                                "> Perpanjang
                            </a>
                            <!-- <a href="<?php echo base_url('peminjaman/perpanjang/').$tr->no_transaksi ?>" 
                                class="btn btn-sm btn-success mb-2">Perpanjang</a> -->
                            <a href="<?php echo base_url('bukti_pinjam/cetak/').$tr->no_transaksi ?>" 
                                class="btn btn-sm btn-danger"><i class="fas fa-download fa-sm]"></i> Bukti Pinjam</a>
                            
                        <!-- </div> -->
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
<!-- End Main Content -->

<!-- end of page content -->
</div>

