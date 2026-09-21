<?php

require_once "products.php";
require_once "functions.php";

?>

<p>
    Product Information System (Desain)
</p>


<style>
    .stok-kritis {
        background-color: #ADD8E6;
    }
</style>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Deskripsi</th>
    </tr>

    <?php
    $totalNilaiStok = 0;
    
    foreach ($Product as $product) {
        
        $totalNilaiStok += hitungTotalNilaiStok($product["Harga"], $product["Stok"]);

        ?>
        <?php
        if (cekStokKritis($product["Stok"])) {
            ?>
            <tr class = "stok-kritis" >
                <?php
        } else {
            ?>
            <tr>
            <?php
        }
        ?>
            <td><?php echo $product["ID"];  ?></td>
            <td><?php echo $product["Nama"];  ?></td>
            <td><?php echo $product["Kategori"];  ?></td>
            <td><?php echo "Rp" . number_format($product["Harga"]);  ?>
            </td>

        
            <td>
                <?php echo $product["Stok"]; ?>

                <?php
                if (cekStokKritis($product["Stok"])) {
                    echo "Stok Kritis";
            
                }
                ?>
            </td>

            <td><?php echo $product["Deskripsi"]; ?></td>

        </tr>
        <?php
    }
    ?>
</table>

<p>
    Total Nilai Aset Gudang:
    Rp <?php echo number_format($totalNilaiStok,0,",","."); ?>
</p>