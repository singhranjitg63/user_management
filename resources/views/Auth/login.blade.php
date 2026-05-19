<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet">

  <title>Blog Management - Login</title>
</head>

<body class="bg-light">
  <div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
      <div class="col-md-5 col-lg-4">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <h2 class="fw-bold text-primary">Login</h2>
              <p class="text-muted">Sign in to continue</p>
            </div>

            <form action="#" method="POST">
              <div class="mb-3">
                <label for="inputEmail" class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control form-control-lg" name="email" id="inputEmail" placeholder="Enter your email" required>
              </div>
              <div class="mb-2">
                <label for="inputPassword" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control form-control-lg" name="password" id="inputPassword" placeholder="Enter your password" required>
              </div>

              <div class="text-end mb-4">
                <a href="#" class="text-decoration-none">Forgot Password?</a>
              </div>
              <div class="d-grid mb-3">
                <button type="submit"class="btn btn-primary btn-lg">Log In</button>
              </div>
              <div class="text-center">
                <p class="mb-0">Don't have an account?
                  <a href="#" class="text-decoration-none fw-bold">
                    Register
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
        <p class="text-center text-muted mt-4">
          © 2026–2027 TED IT
        </p>
      </div>
    </div>
  </div>
</body>

</html>