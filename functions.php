<?php
function hitungNilaiTotalStok($Harga, $Stok)
{
    return $Harga * $Stok;
}

function cekStokKritis($Stok)
{
    if ($Stok < 3) {
        return true;
    }
    return false;
}