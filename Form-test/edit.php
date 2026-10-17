<?php
require_once "database.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM dokter WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $dokter = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dokter) {
        die("Data dokter tidak ditemukan!");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $nomor_sip = htmlspecialchars($_POST['nomor_sip']);
    $spesialisasi = htmlspecialchars($_POST['spesialisasi']);
    $kontak = htmlspecialchars($_POST['kontak']);

    $sql = "UPDATE dokter SET nama = :nama, nomor_sip = :nomor_sip, spesialisasi = :spesialisasi, kontak = :kontak WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nama'        => $nama,
        ':nomor_sip'   => $nomor_sip,
        ':spesialisasi' => $spesialisasi,
        ':kontak'      => $kontak,
        ':id'          => $id
    ]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dokter</title>
    <link rel="stylesheet" href="form-style.css">
</head>
<body>
    <div id="form">
        <h1>EDIT DATA DOKTER</h1>
        <form action="edit.php" method="POST">
            <input type="hidden" name="id" value="<?= $dokter['id']; ?>">

            <label>Nama:</label> 
            <input type="text" name="nama" value="<?= $dokter['nama']; ?>" required>

            <label>Nomor SIP :</label>
            <input type="text" name="nomor_sip" value="<?= $dokter['nomor_sip']; ?>" required>

            <label>Spesialisasi:</label> 
            <input type="text" name="spesialisasi" value="<?= $dokter['spesialisasi']; ?>" required>

            <label>Kontak:</label> 
            <input type="text" name="kontak" value="<?= $dokter['kontak']; ?>" required>

            <input type="submit" value="Update Data">
            <a href="index.php" style="display: block; text-align: center; margin-top: 10px; color: #7f8c8d; text-decoration: none;">Batal</a>
        </form>
    </div>
</body>
</html>