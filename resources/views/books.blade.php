<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f9fa; font-weight: bold; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .price { text-align: right; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Buku</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Cover</th>
                    <th>Penulis</th>
                    <th>Genre</th>
                    <th class="price">Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->cover_photo }}</td> 
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->genre->name }}</td>
                    <td class="price">Rp {{ number_format($book->price, 0, ',', '.') }}</td>
                    <td>{{ $book->stock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>