<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logout</title>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css\login.css') }}">
</head>

<div class="page-wrapper">

    <body>
        <img src="{{ asset('img/bolder 3.png') }}" alt="bolder3" class="position-absolute"
            style="right: 0px;height:250px">
        <img src="{{ asset('img/Bolder 2.png') }}" alt="bolder2" class="position-absolute"
            style="bottom: 0px;height:150px">
        <div class="container vh-100">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center ">
                    <div class="w-100">
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                        <h2 class="text-center mb-1 mt-3">Logged Out</h2>
                        {{-- <button type="submit" class="btn btn-login">Log In</button> --}}
                        <h5 class="text-center mb-3">Thank you for using Payroll</h5>
                        <a href="{{ url('login') }}"class="btn btn-navy d-flex align-items-center ms-2">Sign In
                            Again</button>
                        </a>
                        <h5 class="text-center mb-3">See You Later</h5>

                    </div>
                    {{-- <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-login">Log In</button>
                </div> --}}
                </div>
            </div>
        </div>
    </body>
</div>

</html>
