<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Dokter</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4" style="background-color: #eafaf1;">
    <div class="container">
        <h2 style="color: #27ae60;">Direktori Tenaga Medis</h2>
        <a href="{{ route('dokter.create') }}" class="btn btn-success mb-3">+ Tambah Dokter Baru</a>
        
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
                @foreach ($data_dokter as $row):
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->nomor_sip }}</td>
                    <td>{{ $row->spesialisasi }}</td>
                    <td>{{ $row->kontak }}</td>
                    <td>
                        <a href="{{ route('dokter.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dokter.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>