<?php $i = 1; 
$laporan = query("SELECT *
FROM laporan
INNER JOIN user ON laporan.email=user.email 
WHERE laporan.email = '$email'
ORDER BY waktu_dibuat DESC");
?>