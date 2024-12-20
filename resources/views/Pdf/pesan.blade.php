<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Pesan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Daftar Pesan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pesan</th>
                <th>Kode Pesan</th>
                <th>Dari Siswa</th>
                <th>Kelas</th>
                <th>Kepada Guru</th>
                <th>Isi Pesan</th>
                <th>Tanggapan Guru</th>
                <th>Tanggal Kirim</th>
                <th>Status Pesan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesan as $key => $pesan)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $pesan->id }}</td>
                <td>{{ $pesan->kd_pesan }}</td>
                <td>{{ $pesan->siswa->nama_siswa }}</td>
                <td>{{ $pesan->siswa->kelas->nama_kelas }}</td>
                <td>{{ $pesan->guru->nama_guru }}</td>
                <td>{{ $pesan->isi_pesan }}</td>
                <td>{{ $pesan->tanggapan ?? 'Tidak di tanggapi' }}</td>
                <td>{{ $pesan->created_at->format('d-m-Y H:i') }}</td>
                <td>{{ $pesan->status_dilihat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
