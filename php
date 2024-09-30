<?php
            function tentukanStatus($jumlah) {
                if ($jumlah > 0) {
                    return 'Tersedia';
                } else {
                    return 'Tidak Tersedia';
                }
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