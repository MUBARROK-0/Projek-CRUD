<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Formulir biodata</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section class="container">
      <header>Admin Panel</header>
      <form action="login_process.php" method="post" class="form">
        <div class="input-box">
          <label for="username">Username</label>
          <input
            type="text"
            id="username"
            name="username"
            required
          />
        </div>

        <div class="input-box">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            required
          />
        </div>
        <a href="#" class="forgot_pasword">Forgot Pasword?</a>
        <button type="submit" class="form-button">Login</button>
        <div class="bottom-link">
                    Don't have an account?
                    <a href="add_admin.php" id="signup-link">Signup</a>
                </div>
      </form>
    </section>
  </body>
</html>
