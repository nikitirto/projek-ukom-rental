<!doctype html>
<html lang="en">

<head>
    <title>Skyline whell</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="" style="">
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <h1><a href="index.html" class="logo"><img src="{{ asset('img/Car_.png') }}" alt=""
                            style="width: 40px">&nbsp; Rental Mobil</a></h1>
                <ul class="list-unstyled components">
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <li class="active">
                            <a href="{{ url('data-user') }}"><img src="{{ asset('img/person_icon_.png') }}"
                                    alt="" style="width: 30px"> &nbsp; User</a>
                        </li>
                        <li>
                            <a href="{{ url('data-admin') }}"><img src="{{ asset('img/admin.png') }}"
                                    alt="" style="width: 30px"> &nbsp; Admin</a>
                        </li>
                        <li>
                            <a href="{{ url('data-customer') }}"><img src="{{ asset('img/customer.png') }}"
                                    alt="" style="width: 30px"> &nbsp; Customer</a>
                        </li>
                        <li>
                            <a href="{{ url('data-kondisi') }}"><img src="{{ asset('img/car_inspection.png') }}"
                                    alt="" style="width: 30px"> &nbsp; Data Kondisi</a>
                        </li>
                        @endif
                        @if (Auth::check() && Auth::user()->role == 'customer')
                        <li>
                            <a href="{{ url('data-sewa') }}"><img src="{{ asset('img/car-rent.png') }}" alt=""
                                    style="width: 25px;"> &nbsp; Data Sewa</a>
                        </li>
                        
                        <li>
                            <a href="{{ url('data-rekening') }}"><img src="{{ asset('img/icon _Coins_.png') }}"
                                    alt="" style="width: 25px;"> &nbsp; Data Rekening</a>
                        </li>
                        <li>
                            <a href="{{ url('data-servis') }}"><img src="{{ asset('img/car-service.png') }}"
                                    alt="" style="width: 25px;">
                                &nbsp; Data Servis</a>
                        </li>
                    
                    <li>
                        <a href="{{ url('data-mobil') }}"><img src="{{ asset('img/Car_.png') }}" alt=""
                                style="width: 30px"> &nbsp; Data Mobil</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url('logout') }}"><img src="{{ asset('img/logout.png') }}" alt=""
                                style="width: 30px"> &nbsp; Logout</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="" style="margin-left: 300px">
            @yield('content')
        </div>
    </div>


</body>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</html>
