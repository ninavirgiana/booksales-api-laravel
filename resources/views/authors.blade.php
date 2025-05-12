<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penulis</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Daftar Penulis</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Bio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr>
                <td>{{ $author['id'] }}</td>
                <td>{{ $author['name'] }}</td>
                <td>{{ $author['photo'] }}</td>
                <td>{{ $author['bio'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>