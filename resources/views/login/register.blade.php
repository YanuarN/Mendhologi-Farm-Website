<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="css/styler.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Register</div>
    <div class="content">
      <form action="/register" method="post">
      @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nama</span>
            <input type="text" placeholder="Masukkan Nama" name="nama_pengguna" id="nama_pengguna"required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Masukkan username" id="username" name="username" required>
          </div>
          <div class="input-box">
            <span class="details">Alamat</span>
            <input type="text" placeholder="Masukkan Alamat" id="alamat" name="alamat" required>
          </div>
          <div class="input-box">
            <span class="details">No Whatsapp</span>
            <input type="text" placeholder="+62" id="whatsapp" name="whatsapp" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" id="password" name="password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
          <!-- <button type="submit">Register</button> -->
        </div>
      </form>
    </div>
  </div>

</body>
</html>