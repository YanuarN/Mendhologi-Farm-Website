<!DOCTYPE html>
<html lang="id" dir="ltr">
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
            @if($errors->has('username'))
            <div class="alert alert-danger">
                {{ $errors->first('username') }}
            </div>
            @endif
            @if(session('username_error'))
            <div class="alert alert-danger">
                {{ session('username_error') }}
            </div>
            @endif
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
            @if($errors->has('password'))
            <div class="alert alert-danger">
                {{ $errors->first('password') }}
            </div>
            @endif
            <div id="password-length-error" class="error" style="display: none;">Password harus terdiri dari minimal 6 karakter.</div>
          </div>
          <div class="input-box">
            <span class="details">Konfirmasi Password</span>
            <input type="password" placeholder="Confirm your password" id="password_confirmation" name="password_confirmation" required>
            @if($errors->has('password_confirmation'))
            <div class="alert alert-danger">
                {{ $errors->first('password_confirmation') }}
            </div>
            @endif
        </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>    
      </form>
      <div class="back-button">
        <a href="/">Back to Main Page</a>
      </div>
    </div>
    </div>
  </div>
</body>
</html>