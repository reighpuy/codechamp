<?php 

function format_rupiah($rp)
{
    $jumlah = number_format($rp, 0, ",", ".");
    $rupiah = "IDR " . $jumlah;

    return $rupiah;
}

?>