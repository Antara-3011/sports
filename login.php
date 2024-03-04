<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/sports-frontend/Signup/signup.css" />
  </head>
  <body>
    <div class="signup-form">
      <h1>Login</h1>
      <p style="color: grey">Please enter your login details to signin</p>
      <form class="row g-3">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" />
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4" />
        </div>
        <div class="col-12">
          <div
            class="form-check"
            style="display: flex; justify-content: space-between"
          >
            <div>
              <input class="form-check-input" type="checkbox" id="gridCheck" />
              <label class="form-check-label" for="gridCheck">
                Keep me logged in
              </label>
            </div>
            <div>
              <a href="#" style="color: blueviolet">Forgot password?</a>
            </div>
          </div>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Log In</button>
        </div>
        <div class="col-12">
          <p>
            Dont't have an account?
            <span style="display: inline-block; margin-left: 5px"
              ><a href="/sports-frontend/Signup/signup.php">Sign Up</a></span
            >
          </p>
        </div>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
