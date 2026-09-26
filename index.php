<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System (Desain)</title>
    <style>
       
        h1 {
            color:#333;
            margin-bottom: 30px;
        }
        h2 {
            margin-bottom: 15px;

        }
        .asset-card {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        .asset-value {
            font-size: 28px;
            font-weight: bold;
        }
        .product-table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        .product-table th {
        padding: 12px;
        text-align: left;
        background-color: #333;
        color: white;
        font-weight: bold;
        }
        body {
    background-color: #f5f5f5;
    margin: 0;
    padding: 30px;
    font-family: Arial, sans-serif;
        }

    .product-table td {
        padding: 12px;
        vertical-align: top;
        max-width: 300px;
    }
    .product-table th,
    .product-table td {
        border: 1px solid #ddd;
    }
    .product-table th:nth-child(4),
    .product-table td:nth-child(4) {
    width: 150px;
    }
    .product-table th:nth-child(5),
    .product-table td:nth-child(5) {
    width: 80px;
    text-align: center;
    }
    .product-table td:nth-child(6){
        line-height: 1.5;
    }
    .product-table tr:hover {
    background-color: #f0f0f0;
    }
    
    .status-kritis {
    background-color: #1ab6efff;
    color: white;
    }
    .status-aman {
        background-color: #016e13ff;
        color: white;
    }
    </style>
</head>
<body>
    
    <style>
    .stok-kritis {
        background-color: #8B0000;
    }
</style>
    <?php

require_once "products.php";
require_once "functions.php";

?>

<p>
    <p class="subtitle">
    Sistem informasi untuk mengelola data produk, stok, dan nilai aset gudang.
    </p>

</p>

<?php
    $totalNilaiStok = 0;
    
    foreach ($Product as $product) {
        
        $totalNilaiStok += hitungTotalNilaiStok($product["Harga"], $product["Stok"]);
       
    }
        ?>

<div class="asset-card">
    <h3>Total Nilai Aset Gudang</h3>
    <div class="asset-value">
       <?php echo "Rp " . number_format($totalNilaiStok, 0, ",", "."); ?>
    </div>
    
</div>
<h2>Data Produk</h2>

<table class="product-table">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Deskripsi</th>
        <th>status</th>
    </tr>

    <?php
    
    foreach ($Product as $product) {
        

        ?>
        <?php
      
        ?>
        <tr>


            <td><?php echo $product["ID"];  ?></td>
            <td><?php echo $product["Nama"];  ?></td>
            <td><?php echo $product["Kategori"];  ?></td>
            <td><?php echo "Rp " . number_format($product["Harga"]);  ?>
            </td>

        
            <td>
                <?php echo $product["Stok"]; ?>

                <?php
                ?>
            </td>

            <td><?php echo $product["Deskripsi"]; ?></td>
            <td class="<?php echo cekStokKritis($product["Stok"]) ? 'status-kritis' : 'status-aman'; ?>">  
                <?php
                if (cekStokKritis($product["Stok"])) {
                    echo "<span class=\"badge-krtis\">Stok kritis</span>";
                } else{
                    echo "aman";
                }
                ?>
            </td>

        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>