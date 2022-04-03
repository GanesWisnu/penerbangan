<?php

$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rahman Saleh" => 40000,
    "Juanda" => 30000
];
ksort($bandara_asal);

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwantan" => 90000,
    "Sultan Iskandar Muda" => 60000
];
ksort($bandara_tujuan);

function pajak_asal($bandara_asal, $asal)
{
    $harga_pajak = $bandara_asal[$asal];
    return $harga_pajak;
}

function pajak_tujuan($bandara_tujuan, $tujuan)
{
    $harga_pajak = $bandara_tujuan[$tujuan];
    return $harga_pajak;
}

function hitung_total_pajak($bandara_asal, $asal, $bandara_tujuan, $tujuan)
{
    $harga_pajak_asal = pajak_asal($bandara_asal, $asal);
    $harga_pajak_tujuan = pajak_tujuan($bandara_tujuan, $tujuan);
    $total_pajak = $harga_pajak_asal + $harga_pajak_tujuan;
    return $total_pajak;
}

function hitung_total_harga_tiket($harga_tiket, $total_pajak)
{
    $total_harga_tiket = $harga_tiket + $total_pajak;
    return $total_harga_tiket;
}

function rupiah($angka)
{
    $hasil = "Rp " . number_format($angka,0,',','.');
    return $hasil;
}
?>