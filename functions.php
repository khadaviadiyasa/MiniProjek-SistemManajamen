<?php
hitungNilaiTotalStok($Harga, $Stok)
{
    return $Harga * $Stok;
}

cekStokKritis($Stok)
{
    if ($Stok < 3) {
        return true;
    }
    return false;
}