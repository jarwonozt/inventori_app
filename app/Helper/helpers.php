<?php
use App\Models\Admin\Configuration;

function rupiah($angka){

	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	echo $hasil_rupiah;

}

function website(){
    $data = Configuration::latest()->first();

    return $data;
}
