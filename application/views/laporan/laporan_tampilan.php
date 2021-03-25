<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .centerr{
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
        }

        h2{
            margin-top: 35px;
        }

        table {
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }

        p{
            text-align: right;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="centerr">
        <h1> Perpuastakaan Aman Selalu</h1>
        <h4> Jl. Sejahtera Selalu No.99 Bumi </h4>
        <h5> Telp. (021)9382392 </h5>

        <hr>

        <h2> Daftar Buku Yang Pernah Dipinjam</h2>

        <table>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Nama Petugas</th>
            </tr>
            <?php
            $no=1;
                foreach ($transaksi as $tr ) ://$mobil itu harus sama kaya inisialisasi di controller data_mobil line6    
            ?>
                <tr>
                    <td> <?php echo $no++ ?></td>
                    <td> <?php echo $tr->no_transaksi ?></td>
                    <td> <?php echo $tr->nama ?></td>
                    <td> <?php echo $tr->judul ?></td>
                    <td> <?php echo $tr->tgl_pinjam ?></td>
                    <td> <?php echo $tr->tgl_pengembalian ?></td>
                    <td> <?php echo $tr->nama_petugas ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <p>
        Tertanda
            <br><br>
        Kepala Perpustakaan
    </p>
</body>
</html>