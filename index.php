<?php

require_once 'products.php';
require_once 'functions.php';

$totalAset = 0;

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Produk Gudang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .stok-kritis {
            background-color: #ffcccc;
        }
    </style>
</head>

<body>

    <h1>Data Produk Gudang</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Nilai Aset</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($products as $product): ?>

                <?php
                $nilaiAset = hitungTotalNilaiStok(
                    $product['harga'],
                    $product['stok']
                );

                $totalAset += $nilaiAset;

                $classStok = cekStokKritis($product['stok']);
                ?>

                <tr class="<?= $classStok ?>">

                    <td><?= $product['id'] ?></td>

                    <td><?= $product['nama'] ?></td>

                    <td><?= $product['kategori'] ?></td>

                    <td>
                        Rp <?= number_format($product['harga'], 0, ',', '.') ?>
                    </td>

                    <td><?= $product['stok'] ?></td>

                    <td><?= $product['deskripsi'] ?></td>

                    <td>
                        Rp <?= number_format($nilaiAset, 0, ',', '.') ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

    <h2>
        Total Nilai Aset Gudang:
        Rp <?= number_format($totalAset, 0, ',', '.') ?>
    </h2>

</body>

</html>