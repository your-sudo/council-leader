<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <title>Pilkosis</title>
  </head>

  <body>
    <div class="container" id="container">
      <div class="form-container sign-up">
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <h1>Buat Password</h1>

          <span>Masukan NIS, nama ibu, dan buat password</span>
          <input type="text" placeholder="NIS"  />
          <input type="text" placeholder="Nama ibu" />
          <input type="password" placeholder="Password" />
          <button>Buat Akun</button>
        </form>
      </div>
      <div class="form-container sign-in">
        <form method="GET">
          <h1>Masuk</h1>
          <span>Masukan NIS Dan Password</span>
          <input type="text" placeholder="NIS" name:"nis" />
          <input type="password" placeholder="Password" name:"password" />
          <a id="register">Lupa Password</a>
          <button type="submit">Masuk</button>
        </form>
      </div>
      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-panel toggle-left">
            <h1>Hallo, Smenzavers!</h1>
            <p>Login untuk memilih caksis dan cawaksis SMK Negeri 1 Kebumen</p>
            <button class="hidden" id="login">Log In</button>
          </div>
          <div class="toggle-panel toggle-right">
            <h1>Hallo, Smenzavers!</h1>
            <p>
              Buat password untuk memilih caksis dan cawaksis SMK Negeri 1 Kebumen
            </p>
            <button class="hidden" id="register2">Buat Password</button>
          </div>
        </div>
      </div>
    </div>

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
  </body>
</html>
<style>

  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

