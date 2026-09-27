<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System (Desain)</title>
    <style>
       
    h1 {
        color:#336;
        margin-bottom: 30px;
    }
    h2 {
        color: #030303ff;
        margin-bottom: 15px;

    }
    .asset-summary {
        background-color: #111314c9;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 100px;
    }
    .asset-card {
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }
    .asset-value {
        font-size: 35px;
        font-weight: bold;
        margin-right: auto;
    }
    .stok-value {
        font-size: 35px;
        font-weight: bold;
        margin-right: auto;
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
    .Product-card {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    margin-top: 30px;
    border: 1px solid #ddd;
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
    <h1 class="subtitle">
    Sistem informasi untuk mengelola data produk, stok, dan nilai aset gudang.
    </h1>

</p>

<?php
    $totalNilaiStok = 0;
    $totalStok = 0;
    
    foreach ($Product as $product) {
        
        $totalNilaiStok += hitungTotalNilaiStok($product["Harga"], $product["Stok"]);
        $totalStok += $product["Stok"];
    }
        ?>

<div class="asset-card">

    <div class="asset-summary">
        <div>
            <h3>Total Nilai Aset Gudang :</h3>

        <div class="asset-value">
            <?php echo "Rp " . number_format($totalNilaiStok, 0, ",", "."); ?>
     </div>
     
        </div>

        <div>
            <h3>Total Stok :</h3>

            <div class="stok-value">
                <?php echo $totalStok; ?> unit
        </div>

</div>
</div>

    
<div class="Product-card">
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
</div>


</body>
</html>