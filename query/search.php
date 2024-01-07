<?php $i = 1; 
$laporan = query("SELECT * FROM laporan 
INNER JOIN user ON laporan.email=user.email
WHERE nama_barang LIKE '%$katakunci%' OR deskripsi LIKE '%$katakunci%' 
ORDER BY waktu_dibuat DESC");
?>