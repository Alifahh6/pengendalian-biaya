<?php include '../config/db.php'; ?>
<?php include '../views/header.php'; ?>
<?php include '../views/navbar.php'; ?>

<h3 class="mb-3">Statistik Biaya Per SubKelompok</h3>
<div class="card p-3 mb-4">
<div class="table-responsive">
<table class="table table-bordered table-striped">
  <thead><tr><th>SubKelompok</th><th>JumlahBiaya</th><th>JmlPesanan</th><th>Rata_Rata</th><th>MaxBiaya</th><th>MinBiaya</th></tr></thead>
  <tbody>
<?php
$sql = "SELECT SubKelompok, SUM(Jumlah) AS JumlahBiaya, COUNT(Jumlah) AS JmlPesanan, AVG(Jumlah) AS Rata_Rata, MAX(Jumlah) AS MaxBiaya, MIN(Jumlah) AS MinBiaya
        FROM KartuPesanan A INNER JOIN RincianBiaya B ON A.NomorPesanan = B.NomorPesanan
        GROUP BY SubKelompok
        ORDER BY SubKelompok";
try {
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['SubKelompok']).'</td>';
        echo '<td>Rp '.number_format($row['JumlahBiaya'],0,',','.').'</td>';
        echo '<td>'.htmlspecialchars($row['JmlPesanan']).'</td>';
        echo '<td>Rp '.number_format($row['Rata_Rata'],0,',','.').'</td>';
        echo '<td>Rp '.number_format($row['MaxBiaya'],0,',','.').'</td>';
        echo '<td>Rp '.number_format($row['MinBiaya'],0,',','.').'</td>';
        echo '</tr>';
    }
} catch (Exception $e) {
    echo '<tr><td colspan="6">Error: '.htmlspecialchars($e->getMessage()).'</td></tr>';
}
?>
  </tbody>
</table>
</div></div>

<?php include '../views/footer.php'; ?>