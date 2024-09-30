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
                <label for="nama">foto:</label>
                <input type="file" name="gambar" id="">

                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" required>

                <label for="harga">Harga:</label>
                <input type="number" id="harga" name="harga" required>
                    
                <button class="tombol" name="submit" type="submit">Save</button>
                <!-- <button type="submit" name="submit">Tambah Data</button> -->


                <!-- <input type="button" value="Refresh" onclick="window.location.href='?action=clear'"> -->
            </form>
        </div>
   
        <?php
        $file = 'data.json'; // Menentukan nama file JSON tempat menyimpan data
        
              // Membaca data dari file
       
        $databarang = json_decode(file_get_contents($file), true); // Membaca isi file dan mendecode JSON menjadi array PHP
        
        // Menyimpan data ke file
           
      
        if (isset($_POST['submit'])) { // Mengecek apakah formulir telah disubmit
            $nama = $_POST['nama']; // Mengambil nilai nama dari formulir
            $jumlah = $_POST['jumlah']; // Mengambil nilai jumlah dari formulir
            $harga = $_POST['harga']; // Mengambil nilai harga dari formulir

        // Menambahkan data baru ke array
            $databarang[] = [ 
                'Nama' => "$nama", // Menambahkan item dengan nama
                'Jumlah' => $jumlah, // Menambahkan item dengan jumlah
                'Harga' => $harga // Menambahkan item dengan harga
            ];

        }
    // var_dump($databarang);        
        file_put_contents($file, json_encode($databarang)); // Mengubah array PHP menjadi JSON dan menyimpannya ke file

        ?>

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
                    

                $no = 1;
                foreach ($databarang as $index => $item) { // Loop untuk menampilkan data
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $item['Nama'] . "</td>";
                    echo "<td>" . $item['Jumlah'] . "</td>";
                    echo "<td>" . $item['Harga'] . "</td>";                  
                    
                    // Logika untuk menentukan status tanpa menggunakan fungsi
                    if ($item['Jumlah'] > 0) {
                        echo "<td class='tersedia'>Tersedia</td>";
                    } else {
                        echo "<td class='tidak-tersedia'>Tidak Tersedia</td>";
                    }

                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </section>
</body>
</html>
