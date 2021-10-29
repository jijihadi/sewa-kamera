<?php 

function statusbadge($ich){
    switch ($ich) {
        case '0':
            return '<span class="badge badge-danger">Belum</span>';
            break;
        case '1':
            return '<span class="badge badge-success">Sudah</span>';
            break;
        case '3':
            return '<span class="badge badge-primary">Selesai</span>';
            break;
    }
}

function selectsama($ich, $nii){
    if ($ich == $nii) {
        return 'selected';
    }
}

function viewdenda($id)
{
    $comm = DB::table("pengembalians")
        ->where("sewa_id", $id) // Getting the Authenticated user id
        ->get()->toArray();
        // 
    if ($comm[0]->denda == "0") {
        return "Tidak ada denda";
    } else {
        return $comm[0]->denda." karna ".$comm[0]->catatan;
    }
    
}

function getnotif()
{
    $comm = DB::table("sewas")
        ->select('*', DB::raw('tanggal_sewa + INTERVAL durasi HOUR as deadline'))
        ->where(DB::raw('MONTH(now())'), DB::raw('MONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
        ->where(DB::raw('DAYOFMONTH(now())'), DB::raw('DAYOFMONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
        ->where(DB::raw('HOUR(NOW())'), '>', DB::raw('HOUR(tanggal_sewa + INTERVAL (durasi-2) HOUR)')) // Getting the Authenticated user id
        ->where(DB::raw('HOUR(NOW())'), '<', DB::raw('HOUR(tanggal_sewa + INTERVAL (durasi+1) Minute)')) // Getting the Authenticated user id
        ->get()->toarray();
        // 
    return json_encode($comm);
}

// function getnotif()
// {
//     $comm = DB::table("sewas")
//         ->select('*', DB::raw('tanggal_sewa + INTERVAL durasi HOUR as deadline'))
//         ->where(DB::raw('DAYOFMONTH(now())'), DB::raw('DAYOFMONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
//         ->where(DB::raw('MONTH(now())'), DB::raw('MONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
//         ->get()->toarray();
//         // 
//     return json_encode($comm);
// }

// function getnumbnotif()
// {
//     $comm = DB::table("sewas")
//         ->select('*', DB::raw('tanggal_sewa + INTERVAL durasi HOUR as deadline'))
//         ->where(DB::raw('DAYOFMONTH(now())'), DB::raw('DAYOFMONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
//         ->where(DB::raw('MONTH(now())'), DB::raw('MONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
//         ->get()->toarray();
//         // 
//     return count($comm);
// }

function getnumbnotif()
{
    $comm = DB::table("sewas")
        ->select('*', DB::raw('tanggal_sewa + INTERVAL durasi HOUR as deadline'))
        ->where(DB::raw('MONTH(now())'), DB::raw('MONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
        ->where(DB::raw('DAYOFMONTH(now())'), DB::raw('DAYOFMONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
        ->where(DB::raw('HOUR(NOW())'), '>', DB::raw('HOUR(tanggal_sewa + INTERVAL (durasi-2) HOUR)')) // Getting the Authenticated user id
        ->where(DB::raw('HOUR(NOW())'), '<', DB::raw('HOUR(tanggal_sewa + INTERVAL (durasi+1) Minute)')) // Getting the Authenticated user id
        ->get()->toarray();
        // 
    return count($comm);
}

function namakamera( $id)
{
    $comm = DB::table("kameras")
        ->where("id_kamera", $id) // Getting the Authenticated user id
        ->get()->toArray();
        // 
    return $comm[0]->nama_kamera."/".$comm[0]->tipe_kamera;
}

function namaadmin( $id)
{
    $comm = DB::table("users")
        ->where("id", $id) // Getting the Authenticated user id
        ->get()->toArray();
        // 
    return $comm[0]->name;
}

function namacust( $id)
{
    $comm = DB::table("customers")
        ->where("id_cust", $id) // Getting the Authenticated user id
        ->get()->toArray();
        // 
    return $comm[0]->nama_cust;
}

function nocust($id)
{
    $comm = DB::table("customers")
        ->where("id_cust", $id) // Getting the Authenticated user id
        ->get()->toArray();
        // 
    return $comm[0]->hp_cust;
}

function namamerk( $id)
{
    $comm = DB::table("merks")
        ->where("id_merk", $id) // Getting the Authenticated user id
        ->get()->toArray();
        // 
    return $comm[0]->nama_merk;
}

function namajaminan( $id)
{
    $comm = DB::table("jaminans")
        ->where("id_jaminan", $id) // Getting the Authenticated user id
        ->get()->toArray();
        // 
    return strtoupper($comm[0]->jenis_jaminan)." dengan kode <span class='text-danger'><b>".$comm[0]->no_jaminan."</b></span>";
}

function isActive($path)
{
    return (Request::segment(2)==$path ) ? 'active' : '';
}

function rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return "Rp " . $rupiah;
}
function bilanganbulat($teks)
{
    $teks = preg_replace("/[^0-9]/", "", $teks);
    return $teks;
}
function tglindo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    // $result = '0';
    return ($result);
}

function bulanindo($date)
{
    $BulanIndo = array("Januari", "Februari", "Maret",
        "April", "Mei", "Juni",
        "Juli", "Agustus", "September",
        "Oktober", "November", "Desember");
    $bulan = $date;
    $result = $BulanIndo[(int) $bulan - 1];
    return ($result);
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return ucfirst($hasil) . " Rupiah";
}
