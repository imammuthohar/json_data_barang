<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>

    <!-- Tambahkan CSS untuk styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <?php 
        session_start(); 
        
        // Proses refresh/clear data
        if (isset($_GET['action']) && $_GET['action'] == 'clear') {
            unset($_SESSION['barang']);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        // Proses input tambahan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $jumlah = $_POST["jumlah"];
            $harga = $_POST["harga"];

            // Menambahkan data baru ke dalam session
            $_SESSION['barang'][] = [
                'Nama' => $nama,
                'Jumlah' => $jumlah,
                'Harga' => $harga
            ];
        }
        ?>
        
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
           <!-- Tampilan tabel untuk data barang -->
        <h1>Daftar Barang</h1>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
            
            <?php
                if ($item['Jumlah'] > 0) {
                    echo "<td>Tersedia</td>";
                } else {
                    echo "<td>Tidak Tersedia</td>";
                }

            // Menampilkan data barang
            if (isset($_SESSION['barang'])) {
                $barang = $_SESSION['barang'];

                $no = 1;
                foreach ($barang as $index => $item) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$item['Nama']}</td>";
                    echo "<td>{$item['Jumlah']}</td>";
                    echo "<td>{$item['Harga']}</td>";

                    $status = tentukanStatus($item['Jumlah']);
                    if ($status == 'Tersedia') {
                        echo "<td class='tersedia'>Tersedia</td>";
                    } else {
                        echo "<td class='tidak-tersedia'>Tidak Tersedia</td>";
                    }

                    echo "<td><a href='detail.php?index={$index}' target='_blank'>Detail</a></td>";
                    echo "</tr>";

                    $no++;
                }
            }
            ?>
      
        </table>
    </div>
    

</section>
    
</body>
</html>
