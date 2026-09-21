<?php

require_once "products.php";
require_once "functions.php";

?>

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
    foreach ($Product as $product) {
        ?>
        <tr>
            <td><?php echo $product["ID"];  ?></td>
            <td><?php echo $product["Nama"];  ?></td>
            <td><?php echo $product["Kategori"];  ?></td>
            <td><?php echo "RP" . number_format($product["Harga"]);  ?>
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

        <tr>
        <?php
    }
    ?>
</