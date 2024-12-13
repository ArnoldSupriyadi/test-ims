<?php
function hitung_angsuran($pokok_utang, $jangka_waktu) {
    // Menentukan bunga berdasarkan jangka waktu
    if ($jangka_waktu <= 12) {
        $bunga = 0.12;
    } elseif ($jangka_waktu <= 24) {
        $bunga = 0.14;
    } else {
        $bunga = 0.165;
    }

    // Menghitung angsuran per bulan
    $angsuran_per_bulan = ($pokok_utang + ($pokok_utang * $bunga)) / $jangka_waktu;
    return $angsuran_per_bulan;
}

// Data dari Pak Sugus
$pokok_utang = 240000000; // OTR
$jangka_waktu = 24; // Misalnya jangka waktu 24 bulan

// Menghitung angsuran
$angsuran = hitung_angsuran($pokok_utang, $jangka_waktu);

// Menampilkan rincian angsuran
echo "<h2>Rincian Angsuran Bulanan Pak Sugus</h2>";
echo "<table border='1' style='width: 50%; text-align: center;'>";
echo "<tr><th>Keterangan</th><th>Nilai</th></tr>";
echo "<tr><td>Pokok Utang</td><td>" . number_format($pokok_utang, 0, ',', '.') . "</td></tr>";
echo "<tr><td>Jangka Waktu (Bulan)</td><td>" . $jangka_waktu . "</td></tr>";
echo "<tr><td>Bunga</td><td>" . ($jangka_waktu <= 12 ? '12%' : ($jangka_waktu <= 24 ? '14%' : '16,5%')) . "</td></tr>";
echo "<tr><td>Total Bunga</td><td>" . number_format($pokok_utang * ($jangka_waktu <= 12 ? 0.12 : ($jangka_waktu <= 24 ? 0.14 : 0.165)), 0, ',', '.') . "</td></tr>";
echo "<tr><td>Total Pembayaran</td><td>" . number_format($pokok_utang + ($pokok_utang * ($jangka_waktu <= 12 ? 0.12 : ($jangka_waktu <= 24 ? 0.14 : 0.165))), 0, ',', '.') . "</td></tr>";
echo "<tr><td>Angsuran per Bulan</td><td>" . number_format($angsuran, 2, ',', '.') . "</td></tr>";
echo "</table>";
?>
