<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
</head>
<body>
    <h2>Show User</h2>
    @foreach($users as $user)
        <p>Nama: {{ $user->nama_pengguna }}</p>
    @endforeach
</body>
</html>
