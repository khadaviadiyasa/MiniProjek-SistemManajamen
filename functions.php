<?php
function hitungTotalNilaiStok($harga, $stok)
{
    return $harga * $stok;
}

function cekStokKritis($stok)
{
    if ($stok < 3) {
        return true;
    }
    return false;
}