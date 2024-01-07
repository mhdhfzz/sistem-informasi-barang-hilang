<?php $i = 1; 
if (empty($katakunci) && empty($kategori)) {
    $laporan = query("SELECT * FROM laporan 
    INNER JOIN user ON laporan.email=user.email
    ORDER BY waktu_dibuat DESC");
} elseif (empty($katakunci)) {
    $laporan = query("SELECT * FROM laporan 
    INNER JOIN user ON laporan.email=user.email
    WHERE kategori_barang = '$kategori'
    ORDER BY waktu_dibuat DESC");
} elseif (empty($kategori)) {
    $laporan = query("SELECT * FROM laporan 
    INNER JOIN user ON laporan.email=user.email
    WHERE nama_barang LIKE '%$katakunci%' OR deskripsi LIKE '%$katakunci%'
    ORDER BY waktu_dibuat DESC");
} else {
    $laporan = query("SELECT * FROM laporan 
    INNER JOIN user ON laporan.email=user.email
    WHERE kategori_barang = '$kategori' AND (nama_barang LIKE '%$katakunci%' OR deskripsi LIKE '%$katakunci%')
    ORDER BY waktu_dibuat DESC");
}

?>