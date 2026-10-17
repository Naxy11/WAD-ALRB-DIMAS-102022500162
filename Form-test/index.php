<?php

require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $nomor_sip = htmlspecialchars($_POST["nomor_sip"]);
    $spesialisasi = htmlspecialchars($_POST['spesialisasi']);
    $kontak = htmlspecialchars($_POST['kontak']);

    $sql = "INSERT INTO dokter (nama, nomor_sip, spesialisasi, kontak) VALUES (:nama, :nomor_sip, :spesialisasi, :kontak)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nama' => $nama,
        ':nomor_sip' => $nomor_sip,
        ':spesialisasi' => $spesialisasi,
        ':kontak' => $kontak
    ]);

    header("Location: index.php");
    exit();
}

$sql_tampil = "SELECT * FROM dokter ORDER BY id DESC";
$stmt_tampil = $pdo->query($sql_tampil);
$data_dokter = $stmt_tampil->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Dokter</title>
    <link rel="stylesheet" href="form-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4" style="background-color: #eafaf1;">
    <div class="container">
        <h2 style="color: #27ae60;">Direktori Tenaga Medis</h2>
        <a href="Form-dokter.html" class="btn btn-success mb-3">+ Tambah Dokter Baru</a>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor SIP</th>
                    <th>Spesialisasi</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_dokter as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nomor_sip']; ?></td>
                    <td><?= $row['spesialisasi']; ?></td>
                    <td><?= $row['kontak']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>