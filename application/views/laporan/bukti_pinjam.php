<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <style>
        .centerrr{
            text-align: center;
        }

        h1{
            margin-top: 5px;
        }

        h5{
            padding-top: -15px;
        }

        h4{
            padding-top: -35px;
        }

        hr{
            border:0; 
            border-top:3px double; 
            margin-top:40px;
            margin-left: 71px;
            margin-right: 71px;
        }

        h2{
            margin-top: 35px;
        }

        table {
            border-collapse: collapse;
            margin-top: 30px;
            margin-left: 50px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }

        p{
            text-align: justify;
            margin-top: 30px;
            margin-left: 71px;
            margin-right: 71px;
            font-size: 17px;
        }

        .footer{
            text-align: right;
            margin-top: 30px;
            margin-right: 71px;
        }
    </style>

</head>
<body>
    <div class="centerrr">
        <h1>Perpustakaan Aman Sejahtera</h1>
        <h4>Jl. Sejahtera Selalu No.99 Bumi</h4>
        <h5>Telp. (021)9382392</h5>

        <hr>

        <h2>Bukti Peminjaman</h2>
        <br>

        <table>
            <tr>
                <th>No Transaksi</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Kembali</th>
                <th>Nama Petugas</th>
            </tr>
            <?php
            $no=1;
                foreach ($transaksi as $tr ) ://$mobil itu harus sama kaya inisialisasi di controller data_mobil line6    
            ?>
                <tr>
                    <td> <?php echo $tr->no_transaksi ?></td>
                    <td> <?php echo $tr->nama ?></td>
                    <td> <?php echo $tr->judul ?></td>
                    <td> <?php echo $tr->tgl_pinjam ?></td>
                    <td> <?php echo $tr->tgl_kembali ?></td>
                    <td> <?php echo $tr->nama_petugas ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <p>
        <strong> Harap simpan bukti ini dan dibawa kembali ketika mengembalikan buku. </strong> <br><br>
        Jika peminjam mengembalikan buku melewati batas tanggal yang telah 
        ditentukan, maka peminjam akan dikenai <strong> denda </strong> sebesar Rp3.000/hari <br> 
        Jika peminjam ingin melakukan perpanjangan masa pmeinjaman harap 
        melapor kebagian perpustakaan, jika tidak maka peminjam akan dikenai <strong> denda </strong> 
        sebesar yang telah disebutkan diatas <br>
        Jika bukti ini hilang segera konfirmasi kepada pihak perpustakaan 
        serta membayar <strong> denda </strong> sebesar Rp10.000,- <br> 
        Jika buku yang dipinjam oleh peminjam hilang, harap lapor kebagian perpustakaan 
        dan membayar <strong> denda </strong> sebesar Rp100.000,-  <br>
    </p>

    <div class="footer">
        Tertanda
            <br><br><br><br>
        <?php echo $tr->nama_petugas ?>
        </div>
</body>
</html>