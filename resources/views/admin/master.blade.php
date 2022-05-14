<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    
    <style>
        body{
            padding: 3px;
        }
        .sidenav{
            width: 200px;
            background-color: black;
            height: 100%;
            position: fixed;
            padding: 60px 15px;
            margin-left: -15px;
        }
        .sidenav a{
            display: block;
            font-size: 20px;
            text-decoration: none;
            color: white;
            padding: 7px;
        }
        .main{
            margin-left: 200px;
            font-size: 18px;
            padding:70px 20px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar fixed-top navbar-expand-lg bg-dark">
                    <div class="container-fluid">
                      <a class="navbar-brand text-white" href="#">Media-Site Admin-Dashboard</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="float-end">
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li>
                                <form action="{{ route('logout') }}" method="POST">
                                  @csrf
                                  <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to logout?')">logout</button>
                                </form>
                              </li>
                              
                            </ul>
                          </li>
                         
                        </ul>
                       
                      </div>
                    </div>
                    </div>
                  </nav>
            </div>
        </div>

        <div class="sidenav">
            <a href="{{ route('posts.index') }}">Posts</a>
            <a href="{{ route('categories.index') }}">Category</a>
            <a href="{{ url('/admin/users') }}">Users</a>
            <a href="#">Others</a>
        </div>

        <div class="main">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous">
    </script>
</body>