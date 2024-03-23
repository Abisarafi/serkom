<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100%;
            width: 175px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 20px;
            border-right: 1px solid #dee2e6;
        }
        .content {
            margin-left: 175px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin">Admin</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <header style="background-color: #007bff; color: white; padding: 10px;">
            
        </header>

        <h2>Data Mahasiswa</h2>

        <form action="{{ route('home.search') }}" method="GET">
            <input type="text" name="keyword" placeholder="Cari berdasarkan nama">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>

        <p>Jumlah total mahasiswa: {{ $total_mahasiswa }}</p>

        <h3>Statistik Gender</h3>
        <ul>
            @foreach ($statistik_gender as $statistik)
            <li>{{ $statistik->gender }}: {{ $statistik->total }}</li>
            @endforeach
        </ul>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Gender</th>
                    <th>Usia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->alamat }}</td>
                    <td>{{ $mahasiswa->tanggal_lahir }}</td>
                    <td>{{ $mahasiswa->gender }}</td>
                    <td>{{ $mahasiswa->usia }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
