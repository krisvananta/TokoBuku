<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('/css/stylesheets.css') }}">
    <link rel="stylesheet" href="{{ asset('lightbox2/dist/css/lightbox.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('lightbox2/dist/js/lightbox-plus-jquery.min.js')}}"></script> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>GoodBooks.co</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if(Auth::check())
                        @if(Auth::check() && Auth::user()->level=='admin')
                            <li class="nav-item">
                                <a id="dashboard-admin" class="nav-link active" href="/buku">Dashboard Admin</a>
                            </li>
                            <li class="nav-item">
                                <a id="user-list" class="nav-link" href="/users">User List</a>
                            </li>
                        @elseif(Auth::check() && Auth::user()->level=='user')
                            <li class="nav-item">
                                <a class="nav-link active" href="/buku">Home</a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Coming soon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Coming Soon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('gallery')) ? 'active' : '' }}" href="{{route('gallery.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item disabled" href="#">Coming soon</a></li>
                            <li><a class="dropdown-item disabled" href="#">Coming soon</a></li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>