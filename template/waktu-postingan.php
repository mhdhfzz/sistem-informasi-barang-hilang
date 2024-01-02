<?php
$awal  = date_create($row["waktu_dibuat"]);
$akhir = date_create(); // waktu sekarang

$diff  = date_diff($akhir, $awal);

if ($diff->y > 0) {
echo $diff->y . " tahun";
if ($diff->m > 0) {
echo " " . $diff->m . " bulan";
}
if ($diff->d > 0) {
echo " " . $diff->d . " hari";
}
if ($diff->h > 0) {
echo " " . $diff->h . " jam";
}
if ($diff->i > 0) {
echo " " . $diff->i . " menit";
}
echo " yang lalu";
} elseif ($diff->days >= 30 && $diff->days % 30 == 0) {
$bulan_lalu = $diff->days / 30;
echo $bulan_lalu . " bulan yang lalu";
} elseif ($diff->days > 1) {
echo $diff->days . " hari";
if ($diff->h > 0) {
echo " " . $diff->h . " jam";
}
if ($diff->i > 0) {
echo " " . $diff->i . " menit";
}
echo " yang lalu";
} elseif ($diff->h > 0) {
echo $diff->h . " jam";
if ($diff->i > 0) {
echo " " . $diff->i . " menit";
}
echo " yang lalu";
} elseif ($diff->i > 0) {
echo $diff->i . " menit yang lalu";
} else {
echo "Baru saja";
}
?>