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
         
            <input type="hidden" name="submit" value="true">
            <input type="submit" value="Tambah Data">
            
            <input type="button" value="Refresh" onclick="window.location.href='?action=clear'">
            
        </form>
    </div>

    <?php
$file = 'data.json'; // Menentukan nama file JSON tempat menyimpan data

// Membaca data dari file
if (file_exists($file)) { // Mengecek apakah file JSON sudah ada
    $databarang = json_decode(file_get_contents($file), true); // Membaca isi file dan mendecode JSON menjadi array PHP
} else {
    $databarang = []; // Jika file tidak ada, inisialisasi dengan array kosong
}

if (isset($_POST['submit'])) { // Mengecek apakah formulir telah disubmit
    $nama = $_POST['nama']; // Mengambil nilai nama dari formulir
    $jumlah = $_POST['jumlah']; // Mengambil nilai jumlah dari formulir
    $harga = $_POST['harga']; // Mengambil nilai harga dari formulir

    // Menambahkan data baru ke array
    $databarang[] = [
        'Nama' => $nama, // Menambahkan item dengan nama
        'Jumlah' => $jumlah, // Menambahkan item dengan jumlah
        'Harga' => $harga // Menambahkan item dengan harga
    ];

    // Menyimpan data ke file
    file_put_contents($file, json_encode($databarang)); // Mengubah array PHP menjadi JSON dan menyimpannya ke file
}

// Fungsi untuk menentukan status ketersediaan
function tentukanStatus($jumlah) {
    return $jumlah > 0 ? 'Tersedia' : 'Tidak Tersedia'; // Mengembalikan 'Tersedia' jika jumlah lebih dari 0, selain itu 'Tidak Tersedia'
}
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
            <th>Detail</th>
        </tr>
        <?php
        foreach ($databarang as $index => $item) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>" . htmlspecialchars($item['Nama']) . "</td>";
            echo "<td>" . htmlspecialchars($item['Jumlah']) . "</td>";
            echo "<td>" . htmlspecialchars($item['Harga']) . "</td>";

            $status = tentukanStatus($item['Jumlah']);
            echo "<td class='" . ($status == 'Tersedia' ? 'tersedia' : 'tidak-tersedia') . "'>" . $status . "</td>";
            echo "<td><a href='detail.php?index={$index}' target='_blank'>Detail</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>


    </div>
    

</section>
    
</body>
</html>
