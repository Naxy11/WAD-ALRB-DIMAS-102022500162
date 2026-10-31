 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>

<body>
    <div id="form">
        <h1>BIODATA DOKTER</h1>
        <form action="{{ route('dokter.store') }}" method="POST">
            @csrf
            <label>Nama:</label> 
            <input type="text" name="nama" required>
            <label>Nomor SIP :</label>
            <input type="text" name="nomor_sip" required>
            <label>Spesialisasi:</label>
            <input type="text" name="spesialisasi" required>
            <label>Kontak:</label> 
            <input type="text" name="kontak" required>
            <input type="submit" value="Simpan Data">
            <a href="{{ route('dokter.index') }}" style="display: block; text-align: center; margin-top: 10px; color: #7f8c8d; text-decoration: none;">Kembali</a>
        </form>
    </div>
</body>
</html> 