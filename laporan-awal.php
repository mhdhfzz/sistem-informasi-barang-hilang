<?php $i = 1; 
$laporan = query("SELECT *
FROM laporan
INNER JOIN user ON laporan.email=user.email
ORDER BY waktu_dibuat DESC
LIMIT 9");
?>