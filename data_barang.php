<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>

    <!-- Tambahkan CSS untuk styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="header">
            <!-- Logo -->
            <img class="logo" src="logo2.png" alt="Logo">

            <h2>Aplikasi Pengolahan Data Barang</h2>
            <h2>AzaStore</h2>
            <p>Desa Karangduren Kecamatan Tengaran Kab. Semarang</p>
            <hr class="baris1">
            <hr class="baris2">
        </div>

        <!-- Formulir untuk input data -->
        <div class="formulir">
            <form method="post" action="">
                <label for="nama">Nama Barang:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" required>

                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" required>

          
                <input type="submit" value="Tambah Data">
                <input type="button" value="Refresh" onclick="window.location.href='?action=clear'">
            </form>
        </div>
   

        <div class="tampildata">
            <h1>Daftar Barang</h1>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
                
                <?php
                
                $no=0;
                  $file = 'data.json';
                  $databarang = file_get_contents($file);//ambil data json
                  $databarang = json_decode($databarang, true);
                           foreach ($databarang as $key => $barang) {
                        $no++;
                        echo "<tr>";
                        echo "<td> $no </td>";
                        echo "<td> $barang[Nama] </td>";
                        echo "<td> $barang[Jumlah] </td>";
                        echo "<td> $barang[Harga] </td>";
                        if ($barang['Jumlah'] > 0) {
                            echo "<td class='tersedia'>Tersedia </td>";
                        } else {
                            echo "<td class='tidak-tersedia'>Tidak Tersedia </td>";
                        }
                 echo "</tr>";
                    
                                                   
                    }       
                ?>
            </table>
        </div>
    </section>
</body>
</html>
