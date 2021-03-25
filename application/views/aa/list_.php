<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("partial_/header.php") ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            <?php $this->load->view("partial_/sidebar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Topbar -->
            <?php $this->load->view("partial_/navbar.php") ?>

            <!-- Main Content -->
            <div id="content">

                <div class="container-fluid">
                    <div class="card mb-4">
                        <?php $this->load->view("partial_/breadcrumb.php") ?>
                        <?php
                
                        if(!empty($message)) {
                            echo $message;
                            }
                        ?>  
                        <div class="card-body">
                            <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <form class="user" action="<?php echo site_url('peminjaman/simpan');?>" method="post">
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
                                            <label class="col-lg-4 ">Nis</label>
                                                <div class="col-lg-7">
                                                    <select name="nis" class="form-control" id="nis">
                                                        <option> </option>
                                                        <?php foreach($anggota as $da): ?> 
                                                        <option  value="<?php echo $da->nis ?>"><?php echo $da->nis ?></option>
                                                        <?php endforeach; ?>
                                                    </select><br>
                                                </div>
                                            
                                            <label class="col-lg-4 ">Nama Siswa</label>
                                                <div class="col-lg-7">
                                                    <input type="text" name="nama" id="nama" class="form-control" readonly="readonly">
                                                </div>

                                        </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>
                    <div class="card mb-4">
                        
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">
                                Data Buku
                            </h6>
                        </div>

                        <div class="card-body">
                            
                                <div class="form-group">
                                    <label>Kode Buku</label>
                                        <select name="kode_buku" class="form-control" id="kode_buku">
                                            <option> </option>
                                            <?php foreach($buku as $ku): ?> 
                                            <option  value="<?php echo $ku->kode_buku ?>"><?php echo $ku->kode_buku ?></option>
                                            <?php endforeach; ?>
                                            </select><br>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control"  id="judul" readonly="readonly"><br>
                                </div>
                                <div class="form-group">
                                    <label >Pengarang</label>
                                    <input type="text" class="form-control"  id="pengarang" readonly="readonly">
                                </div>
                                <div class="form-group ">
                                    <label class="sr-only">Pengarang</label>
                                    <button id="tambah_buku" class="btn btn-primary"> Add Book <i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            <br /><br />

                            <!-- buat tampil tabel tmp     -->
                            <div id="tampil"></div>
                            <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php $this->load->view("partial_/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Logout Modal-->
  <?php $this->load->view("partial_/modal.php") ?>

  <?php $this->load->view("partial_/js.php") ?>
  
<script>
$(document).ready(function() {

    //alert('');

    $('#dataTables-example').DataTable({
        responsive: true
    });


    //load data tmp 
    function loadData()
    {
        $("#tampil").load("<?php echo site_url('peminjaman/tampil_tmp') ?>");
    }
    loadData();

    //function buat mengkosong form data buku setelah di tambah ke tmp
    function EmptyData()
    {
        $("#kode_buku").val("");
        $("#judul").val("");
        $("#pengarang").val("");
    }

    //ambil data anggota berdasarkan nis
    // $("#nis").click(function(){
    $("#nis").change(function(){    
        var nis = $("#nis").val();
        
        $.ajax({
            url:"<?php echo site_url('peminjaman/cari_anggota');?>",
            type:"POST",
            data:"nis="+nis,
            cache:false,
            success:function(html){
                $("#nama").val(html);
                // document.write(html)
            }
        })
        
    });

    $("#kode_buku").change(function(){    
        var kode_buku = $("#kode_buku").val();
        
        $.ajax({
            url:"<?php echo site_url('peminjaman/cari_book');?>",
            type:"POST",
            data:"kode_buku="+kode_buku,
            cache:false,
            success:function(html){
                $("#judul").val(html);
                $("#pengarang").val(html);
                // document.write(html)
            }
        })
        
    });

    //show modal search buku
    $("#cari").click(function(){
        $("#myModal2").modal("show");
        //return false;  biar gk langsung ilang
    })

    //search buku
    $("#caribuku").keyup(function(){
        var caribuku = $('#caribuku').val();

         $.ajax({
            url:"<?php echo site_url('peminjaman/cari_buku');?>",
            type:"POST",
            data:"caribuku="+caribuku,
            cache:false,
            success:function(hasil){
                $("#tampilbuku").html(hasil);
                
            }
        })
        
    })


    //tambah buku dari modal ke form
    
    // $(".tambah").live("click", function(){
    $('body').on('click', '.tambah', function(){
        
        var kode_buku = $(this).attr("kode");
        var judul     = $(this).attr("judul");
        var pengarang = $(this).attr("pengarang");
        
        $("#kode_buku").val(kode_buku);
        $("#judul").val(judul);
        $("#pengarang").val(pengarang);

        $("#myModal2").modal("hide");
        //console.log(kode_buku);
       
    });


    //event keypress cari kode
    $("#kode_buku").keypress(function(){
        
        //13 adalah kode asci buat enter
        if(event.which == 13) {
            var kode_buku = $("#kode_buku").val();

            $.ajax({
                url:"<?php echo site_url('peminjaman/cari_kode_buku');?>",
                type:"POST",
                data:"kode_buku="+kode_buku,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    
                   data = hasil.split("|");
                   if(data==0) {
                       alert("Buku " + kode_buku + " Book Not Found");
                       $("#judul").val("");
                       $("#pengarang").val("");
                   }
                   else{
                       $("#judul").val(data[0]);
                       $("#pengarang").val(data[1]);
                       $("#tambah_buku").focus();
                   }

                   //console.log(data);
                }
            })
            
        } 

    }) //end event keypress

    //tambah_buku ke tmp
    $("#tambah_buku").click(function(){
        
        var kode_buku = $("#kode_buku").val();
        var judul     = $("#judul").val();
        var pengarang = $("#pengarang").val();

        if(kode_buku == "") {
            alert("Kode " + kode_buku + " Masih Kosong ");
            $("#kode_buku").focus();
            return false;
        }
        else if(judul == ""){
            alert("Judul " + judul + " Masih Kosong ");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/save_tmp');?>",
                type:"POST",
                data:"kode_buku="+kode_buku+"&judul="+judul+"&pengarang="+pengarang,
                cache:false,
                success:function(hasil){
                    loadData();
                    EmptyData();
                    //alert(hasil);
                   //console.log(data);
                }
            })
        }

    }) //end tambahbuku 

    // //delete tabel tmp
    $('body').on('click', '.hapus', function(){
        
        //ambil dulu atribute kodenya
        var kode_buku = $(this).attr('kode');
        $.ajax({
            url:"<?php echo site_url('peminjaman/hapus_tmp');?>",
            type:"POST",
            data:"kode_buku="+kode_buku,
            cache:false,
            success:function(hasil){
                // alert(hasil);
                loadData();
            }
        })
        

    }); //end delete table tmp

    //simpan transaksi 
    //$("#simpan").click(function(){
    $('body').on('click', '#simpan', function(){    
        
        //tampung data dari form buat dikirim 
        var no_transaksi = $("#no_transaksi").val();
        var tgl_pinjam   = $("#tgl_pinjam").val();
        var tgl_kembali  = $("#tgl_kembali").val();
        var nis          = $("#nis").val();

        var jumlah_tmp   = parseInt($("#jumlahTmp").val(), 10);

        //cek nis jika kosong 
        if(nis == "") {
            alert("Pilih Nis Siswa");
            $("#nis").focus();
            return false;
        }
        else if(jumlah_tmp == 0){
            alert("Pilih Buku yang di pinjam");
            return false;
        }
        else{
            $.ajax({
                url:"<?php echo site_url('peminjaman/simpan_transaksi');?>",
                type:"POST",
                data:"no_transaksi="+no_transaksi+"&tgl_pinjam="+tgl_pinjam+"&tgl_kembali="+tgl_kembali+
                "&nis="+nis+"&jumlah_tmp="+jumlah_tmp,
                cache:false,
                success:function(hasil){
                  //console.log(hasil);
                 
                  alert("Transaksi Peminjaman Berhasil");
                  
                  location.reload();
                }
            })
        }
        
    })


  

});
</script>

</body>

</html>
