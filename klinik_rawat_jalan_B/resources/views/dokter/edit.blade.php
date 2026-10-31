<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <div id="form">
        <h1>EDIT DATA DOKTER</h1>
        <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama:</label> 
            <input type="text" name="nama" value="{{ $dokter->nama }}" required>

            <label>Nomor SIP :</label>
            <input type="text" name="nomor_sip" value="{{ $dokter->nomor_sip }}" required>

            <label>Spesialisasi:</label> 
            <input type="text" name="spesialisasi" value="{{ $dokter->spesialisasi }}" required>

            <label>Kontak:</label> 
            <input type="text" name="kontak" value="{{ $dokter->kontak }}" required>

            <input type="submit" value="Update Data">
            <a href="{{ route('dokter.index') }}" style="display: block; text-align: center; margin-top: 10px; color: #7f8c8d; text-decoration: none;">Batal</a>
        </form>
    </div>
</body>
</html>