<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy bootstrap dashboard admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, Flexy bootstrap 5 dashboard template" />
    <meta name="description" content="Flexy is powerful and clean admin dashboard template" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Payroll</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- This page plugin CSS -->
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .dataTables_filter {
            display: none;
        }
    </style>
</head>

<body>
    <!-- ============================================================= -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================= -->
    <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#fec80e" stroke-width="2"></path>
            <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#fec80e" stroke-width="2"></path>
            <path id="teabag" fill="#fec80e" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z">
            </path>
            <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#fec80e"></path>
            <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#fec80e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
    <!-- ============================================================= -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================= -->
    <div id="main-wrapper">
        <!-- ============================================================= -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================= -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ri-close-line ri-menu-2-line fs-6"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('img/logo_baru.png') }}" alt="homepage" style="right: 5px; width:80%">
                            <!-- Light Logo icon -->
                            <img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            {{-- <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> --}}
                            <!-- Light Logo text -->
                            <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ri-more-line fs-6"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item">
                            <a class="nav-link sidebartoggler d-none d-md-block" href="javascript:void(0)"><i data-feather="menu"></i></a>
                        </li>
                        {{-- <!-- search -->
                        <li class="nav-item" style="margin-left: 50px">
                            <div class="input-group" style="position: absolute; width:50%; margin:10px">
                                <span class="input-group-prepend">
                                    <button class="btn btn-outline-secondary bg-white border-end-0  border ms-n5"
                                        type="button">
                                        <i data-feather="search"></i>
                                    </button>
                                </span>
                                <input class="form-control border-start-0 border" type="search" value="search"
                                    id="example-search-input">
                            </div>
                        </li> --}}
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown profile-dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../../assets/images/users/account.jpg" alt="user" width="30" class="profile-pic rounded-circle" />
                                <div class="d-none d-md-flex">
                                    <span class="ms-2">
                                        <span class="text-dark fw-bold">{{ Auth::user()->tipe_user == 'superadmin' ? 'Superuser' : 'User' }}</span></span>
                                    {{-- <span>
                                        <i data-feather="chevron-down" class="feather-sm"></i>
                                    </span> --}}
                                </div>
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================= -->
        <!-- End Topbar header -->
        <!-- ============================================================= -->
        <!-- ============================================================= -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================= -->

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <img src="{{ asset('img/Bolder 2.png') }}" alt="border" class="position-absolute" style="bottom: 0px;height:150px; width:100%">
            <div class="scroll-sidebar h-100">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        {{-- <li class="nav-small-cap">
                            <i class="nav-small-line"></i>
                            <span class="hide-menu">Dashboards</span>
                        </li> --}}
                        @if (Auth::user()->tipe_user == 'admin')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/dashboard') }}" aria-expanded="false">
                                <i data-feather="grid"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="inbox"></i><span class="hide-menu">Gaji
                                    Karyawan
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/KaryawanTetap" class="sidebar-link"><span class="hide-menu">
                                            Karyawan
                                            Tetap </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/karyawanperbantuaninka" class="sidebar-link"><span class="hide-menu">
                                            Karyawan Perbantuan INKA
                                        </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/karyawanPKWT" class="sidebar-link"><span class="hide-menu">
                                            Karyawan PKWT
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text"></i><span class="hide-menu">Gaji
                                    Lembur
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/GajiLemburTetap" class="sidebar-link"><span class="hide-menu">
                                            Karyawan
                                            Tetap </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/GajiLemburInka" class="sidebar-link"><span class="hide-menu">
                                            Karyawan Perbantuan INKA
                                        </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/GajiLemburPkwt" class="sidebar-link"><span class="hide-menu">
                                            Karyawan PKWT
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/rekap" aria-expanded="false">
                                <i data-feather="book-open"></i><span class="hide-menu">Rekap Gaji</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/slip" aria-expanded="false">
                                <i data-feather="archive"></i><span class="hide-menu">Slip Gaji</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/template" aria-expanded="false">
                                <i data-feather="download"></i><span class="hide-menu">Download Template</span>
                            </a>
                        </li>
                        @else
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/dashboardSuperuser') }}" aria-expanded="false">
                                <i data-feather="grid"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="inbox"></i><span class="hide-menu">Gaji
                                    Karyawan
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/KaryawanTetapSuper" class="sidebar-link"><span class="hide-menu">
                                            Karyawan
                                            Tetap </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="KaryawanInkaSuper" class="sidebar-link"><span class="hide-menu">
                                            Karyawan Perbantuan INKA
                                        </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="KaryawanPkwtSuper" class="sidebar-link"><span class="hide-menu">
                                            Karyawan PKWT
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text"></i><span class="hide-menu">Gaji
                                    Lembur
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/GajiLemburTetapSuper" class="sidebar-link"><span class="hide-menu">
                                            Karyawan
                                            Tetap </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/GajiLemburInkaSuper" class="sidebar-link"><span class="hide-menu">
                                            Karyawan Perbantuan INKA
                                        </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/GajiLemburPkwtSuper" class="sidebar-link"><span class="hide-menu">
                                            Karyawan PKWT
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/RekapSuper" aria-expanded="false">
                                <i data-feather="book-open"></i><span class="hide-menu">Rekap Gaji</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/SlipSuper" aria-expanded="false">
                                <i data-feather="archive"></i><span class="hide-menu">Slip Gaji</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/TemplateSuper" aria-expanded="false">
                                <i data-feather="download"></i><span class="hide-menu">Download Template</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text"></i><span class="hide-menu">Approval
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/ApprovalSuper" class="sidebar-link"><span class="hide-menu">
                                            Gaji Karyawan</span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/ApprovalLemburSuper" class="sidebar-link"><span class="hide-menu">
                                            Gaji Lembur
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#modalLogout">
                                <i data-feather="log-out"></i><span class="hide-menu">Logout</span>
                            </a>
                        </li>

                    </ul>
                </nav>


                <!-- End Sidebar navigation -->
            </div>

        </aside>
        <!-- ============================================================= -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================= -->
        <!-- ============================================================= -->
        <!-- Page wrapper  -->
        <!-- ============================================================= -->
        @yield('content')

        <!-- Modal Logout -->

        <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLogoutLabel">Logout</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to Logout?
                        <form id="logout-form" action="{{ url('/actionlogout') }}">
                            @csrf
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-merah" data-bs-dismiss="modal">No</button>

                        <button class="btn btn-navy" onclick="document.getElementById(
                                        'logout-form').submit();">Yes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <!-- ============================================================= -->
        <footer class="footer text-center">
            2023© Payroll Rekaindo Global Jasa
        </footer>
        <!-- ============================================================= -->
        <!-- End footer -->
        <!-- ============================================================= -->
        <!-- ============================================================= -->
        <!-- End Page wrapper  -->
        <!-- ============================================================= -->



    </div>
    <!-- ============================================================= -->
    <!-- End Wrapper -->
    <!-- ============================================================= -->
    <!-- ============================================================= -->
    <!-- All Jquery -->
    <!-- ============================================================= -->
    <script src="../../dist/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/app.init.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../dist/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.js"></script>
    <script src="../../dist/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/feather.min.js"></script>
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="../../dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="../../dist/js/pages/datatable/datatable-basic.init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('customScripts')

    <script>
        $(document).ready(function() {
            $('.month-filter, .year-filter').on('change', function() {
                applyFilters();
            });

            function applyFilters() {
                var selectedMonths = $('.month-filter:checked').map(function() {
                    return $(this).next().text();
                }).get();

                var selectedYears = $('.year-filter:checked').map(function() {
                    return $(this).next().text();
                }).get();

                $('.myTable tbody tr').each(function() {
                    var showRow = true;

                    var rowMonths = $(this).find('.month-column').text().trim();
                    var rowYear = $(this).find('.year-column').text().trim();

                    if (selectedMonths.length > 0 && !selectedMonths.includes(rowMonths)) {
                        showRow = false;
                    }

                    if (selectedYears.length > 0 && !selectedYears.includes(rowYear)) {
                        showRow = false;
                    }

                    if (showRow) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            //find search #example-search-input then apply keyup function to .myTable
            $('#example-search-input').on('keyup', function() {
                // var value = $(this).val().toLowerCase();
                // console.log(value);
                // $('#zero_config tbody tr').filter(function() {
                //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                // });
                oTable.search($(this).val()).draw();
            });
        });
    </script>

    <script>
        //document ready
        $(document).ready(function() {
            $('button.dropdown-toggle').on('click', function() {
                // .dropdown-menu toggleClass('show');
                $(this).next().toggleClass('show');
            });

            $('body').on('click', function(e) {
                if (!$('button.dropdown-toggle').is(e.target) && $('button.dropdown-toggle').has(e.target)
                    .length === 0 && $(
                        '.show').has(e.target).length === 0) {
                    $('button.dropdown-toggle').next().removeClass('show');
                }
            });
        })
    </script>



</body>


</html>