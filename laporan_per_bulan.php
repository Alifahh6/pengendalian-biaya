<?php include '../config/db.php'; ?>
<?php include '../views/header.php'; ?>
<?php include '../views/navbar.php'; ?>

<h3 class="mb-3">Laporan Biaya Langsung Per Bulan</h3>
<div class="card p-3 mb-4">
<div class="table-responsive">
<table class="table table-bordered table-striped">
  <thead><tr><th>Tahun</th><th>Bulan</th><th>Kelompok</th><th>JumlahBiaya</th></tr></thead>
  <tbody>
<?php
$sql = "SELECT YEAR(B.Tanggal) AS Tahun, MONTH(B.Tanggal) AS Bulan, Kelompok, SUM(Jumlah) AS JumlahBiaya
        FROM KartuPesanan A INNER JOIN RincianBiaya B ON A.NomorPesanan = B.NomorPesanan
        GROUP BY YEAR(B.Tanggal), MONTH(B.Tanggal), Kelompok
        ORDER BY Tahun, Bulan, Kelompok";
try {
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['Tahun']).'</td>';
        echo '<td>'.htmlspecialchars($row['Bulan']).'</td>';
        echo '<td>'.htmlspecialchars($row['Kelompok']).'</td>';
        echo '<td>Rp '.number_format($row['JumlahBiaya'],0,',','.').'</td>';
        echo '</tr>';
    }
} catch (Exception $e) {
    echo '<tr><td colspan="4">Error: '.htmlspecialchars($e->getMessage()).'</td></tr>';
}
?>
  </tbody>
</table>
</div></div>

<?php include '../views/footer.php'; ?>