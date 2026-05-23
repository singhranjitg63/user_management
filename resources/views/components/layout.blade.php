<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Dashboard Template</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
 <link rel="stylesheet" href="style.css" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<body>
  <header class="py-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <a href="/home" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none fs-4 fw-bold">
        <span class="text-danger">A2Z</span> BLOGS
      </a>
      <div class="d-flex align-items-center">
        <form class="w-100 me-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
        <div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="dropdown-item">
                  Log Out
                </button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="{{ route('dashboard')}}">
                <span data-feather="home"></span>
                Home
              </a>
            </li>
            <li class="nav-item hover">
              <a class="nav-link text-dark" href="{{ route('users.index') }}">
                <span data-feather="file"></span>
                Users
              </a>
            </li>
            <li class="nav-item hover">
              <a class="nav-link text-dark" href="/blog">
                <span data-feather="file"></span>
                Blogs
              </a>
            </li>
            <li class="nav-item hover">
              <a class="nav-link text-dark" href="/categories">
                <span data-feather="users"></span>
                Categories
              </a>
            </li>
            <li class="nav-item hover">
              <a class="nav-link text-dark" href="#">
                <span data-feather="users"></span>
                Admin
              </a>
            </li>
          </ul>
          <canvas class="my-4 w-100" id="myChart" width="900" height="1200"></canvas>
        </div>
      </nav>
      <main class="col-md-9 mt-4 ms-sm-auto col-lg-10 px-md-4 ">
        {{ $slot}}
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @if(session('success'))
  <script>
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "timeOut": "2000",
    };
    toastr.success("{{session('success')}}");
  </script>
  @endif
</body>

</html>