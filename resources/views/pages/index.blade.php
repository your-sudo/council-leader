<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script
   src="https://kit.fontawesome.com/64d58efce2.js"
   crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="styles.css" />
  <title>Sign in & Sign up Form</title>`
@vite(['resources/css/app.css'])
 </head>

 <body>
  <div class="container">
   <div class="forms-container">
    <div class="signin-signup">
     <form action="#" class="sign-in-form">
      <h2 class="title">Sign in</h2>
      <div class="input-field">
       <i class="fas fa-user"></i>
       <input type="text" placeholder="Username" />
      </div>
      <div class="input-field">
       <i class="fas fa-lock"></i>
       <input type="password" placeholder="Password" />
      </div>
      <input class="btn solid" type="submit" value="Masuk" />
      </div>
     </form>
     <form action="#" class="sign-up-form">
      <h2 class="title">Sign up</h2>
      <div class="input-field">
       <i class="fas fa-user"></i>
       <input type="text" placeholder="Username" />
      </div>
      <div class="input-field">
       <i class="fas fa-envelope"></i>
       <input type="email" placeholder="Email" />
      </div>
      <div class="input-field">
       <i class="fas fa-lock"></i>
       <input type="password" placeholder="Password" />
      </div>
      </div>
     </form>
    </div>
   </div>

   <div class="panels-container">
    <div class="panel left-panel">
     <div class="content">
      <h3>Pilkosis SMENZA </h3>
      <p>
Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed magnam architecto, mollitia consequatur ipsam tempora placeat iure obcaecati dolor! Ullam, autem dolore pariatur rerum neque repellendus temporibus eos ad cupiditate!</a>.
      </p>
      <button class="btn transparent" id="sign-up-btn">Ambil akun</button>
     </div>
     <img src="public/assets/img/log.svg" class="image" alt="" />
    </div>
    <div class="panel right-panel">
     <div class="content">
      <h3>?</h3>
      <p>

      </p>

     </div>
     <img src="public/assets/img/register.svg" class="image" alt="A"/>
    </div>
   </div>
  </div>
  <script src="app.js"></script>
 </body>
</html>
