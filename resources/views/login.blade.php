<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - PAYROLL REKA</title>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\login.css') }}">
</head>

<body>
    <img src="{{ asset('img/bolder 3.png') }}" alt="bolder3" class="position-absolute" style="right: 0px;height:250px">
    <img src="{{ asset('img/Bolder 2.png') }}" alt="bolder2" class="position-absolute"
        style="bottom: 0px;height:150px">
    <div class="container vh-100">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center ">
                <div class="w-100">
                    <img src="{{ asset('img/logo_baru.png') }}" alt="logo">
                    <h2 class="text-center mb-1 mt-3">PAYROLL</h2>
                    <h5 class="text-center mb-3"> PT. REKAINDO GLOBAL JASA</h5>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <b>Opps!</b> {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('actionlogin') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control input" placeholder="Email"
                                required="">
                        </div>
                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control input" placeholder="Password"
                                required="">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-login">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 vh-100 d-flex align-items-center justify-content-center">
                <img src="{{ asset('img/ilustrasi.png') }}" alt="ilustrasi" class="w-75 h-75">
            </div>
        </div>
    </div>
</body>

</html>
