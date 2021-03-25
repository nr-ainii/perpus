<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
<!-- End Page Heading -->

<!-- Begin Main Content -->
    <a href="<?php echo base_url('data_petugas/tambah_petugas') ?>" class="btn btn-primary mb-2"> + Tambah Data </a>
    <form method="POST" action="<?php echo base_url('data_petugas/search') ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-3 mb-3 my-2 my-md-0 mw-100 navbar-search">
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
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
                foreach ($petugas as $ptg ) ://$mobil itu harus sama kaya inisialisasi di controller data_mobil line6    
            ?>
                <tr>
                    <td> <?php echo $no++ ?> </td>
                    <td> <?php echo $ptg->nama ?> </td>
                    <td> <?php echo $ptg->email ?> </td>
                    <td> <?php echo $ptg->password ?> </td>
                    
                    <td>
                        <div class="row">
                            <a href="<?php echo base_url('data_petugas/delete_petugas/').$ptg->id_petugas ?>" 
                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a href="<?php echo base_url('data_petugas/update_petugas/').$ptg->id_petugas ?>" 
                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
<!-- End Main Content -->

<!-- end of page content -->
</div>

