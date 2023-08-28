<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy bootstrap dashboard admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, Flexy bootstrap 5 dashboard template" />
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
</head>

<body>
    <!-- ============================================================= -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================= -->
    <div class="preloader">
        <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
                stroke="#fec80e" stroke-width="2"></path>
            <path
                d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
                stroke="#fec80e" stroke-width="2"></path>
            <path id="teabag" fill="#fec80e" fill-rule="evenodd" clip-rule="evenodd"
                d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z">
            </path>
            <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" stroke="#fec80e"></path>
            <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#fec80e"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
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
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ri-close-line ri-menu-2-line fs-6"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
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
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ri-more-line fs-6"></i></a>
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
                            <a class="nav-link sidebartoggler d-none d-md-block" href="javascript:void(0)"><i
                                    data-feather="menu"></i></a>
                        </li>
                        <!-- search -->
                        <li class="nav-item search-box">
                            <a class="nav-link" href="javascript:void(0)">
                                <i data-feather="search"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control border-0" placeholder="Search &amp; enter" />
                                <a class="srh-btn"><i data-feather="x-circle" class="feather-sm text-muted"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link nav-sidebar" href="javascript:void(0)">
                                <i data-feather="shopping-cart"></i>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="2"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="message-square"></i>
                                <div class="notify">
                                    <span class="point bg-warning"></span>
                                </div>
                            </a>
                            <div class="
                    dropdown-menu
                    mailbox
                    dropdown-menu-end dropdown-menu-animate-up
                  "
                                aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="rounded-top p-30 pb-2 d-flex align-items-center">
                                            <h3 class="card-title mb-0">Messages</h3>
                                            <span class="badge bg-primary ms-3">5 new</span>
                                        </div>
                                    </li>
                                    <li class="p-30 pt-0">
                                        <div class="message-center message-body position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/1.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle online"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        Roman Joined the Team!
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Congratulate
                                                        him</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/2.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle busy"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        New message received
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Salma
                                                        sent you new message</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/4.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle busy"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        New Payment received
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Check
                                                        your earnings</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/5.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle away"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        Jolly completed tasks
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Assign
                                                        her new tasks</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                        AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/1.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                    <span class="profile-status rounded-circle online"></span>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        Payment deducted
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">$230
                                                        deducted from account</span>
                                                    <span
                                                        class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                        AM</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mt-4">
                                            <a class="btn btn-info text-white" href="javascript:void(0);">
                                                See all messages
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i>
                                <div class="notify">
                                    <span class="point bg-primary"></span>
                                </div>
                            </a>
                            <div
                                class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    dropdown-menu-animate-up
                  ">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="rounded-top p-30 pb-2 d-flex align-items-center">
                                            <h3 class="card-title mb-0">Notifications</h3>
                                            <span class="badge bg-warning ms-3">5 new</span>
                                        </div>
                                    </li>
                                    <li class="p-30 pt-0">
                                        <div class="message-center message-body position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/1.jpg" alt="user"
                                                        class="rounded-circle w-100" /></span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        Roman Joined the Team!
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Congratulate
                                                        him</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/2.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        New message received
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Salma
                                                        sent you new message</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span class="btn btn-light-info text-info btn-circle">
                                                    <i data-feather="dollar-sign" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        New Payment received
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Check
                                                        your earnings</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                                <span class="user-img position-relative d-inline-block">
                                                    <img src="../../assets/images/users/4.jpg" alt="user"
                                                        class="rounded-circle w-100" />
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        Jolly completed tasks
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Assign
                                                        her new tasks</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                                <span class="btn btn-light-danger text-danger btn-circle">
                                                    <i data-feather="credit-card" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        Payment deducted
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">$230
                                                        deducted from account</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="mt-4">
                                            <a class="btn btn-info text-white" href="javascript:void(0);">
                                                See all notifications
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown profile-dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../../assets/images/users/user.jpg" alt="user" width="30"
                                    class="profile-pic rounded-circle" />
                                <div class="d-none d-md-flex">
                                    <span class="ms-2">Hi,
                                        <span class="text-dark fw-bold">Johnathan</span></span>
                                    <span>
                                        <i data-feather="chevron-down" class="feather-sm"></i>
                                    </span>
                                </div>
                            </a>
                            <div
                                class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    dropdown-menu-animate-up
                  ">
                                <ul class="list-style-none">
                                    <li class="p-30 pb-2">
                                        <div class="rounded-top d-flex align-items-center">
                                            <h3 class="card-title mb-0">User Profile</h3>
                                            <div class="ms-auto">
                                                <a href="javascript:void(0)" class="link py-0">
                                                    <i data-feather="x-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div
                                            class="
                          d-flex
                          align-items-center
                          mt-4
                          pt-3
                          pb-4
                          border-bottom
                        ">
                                            <img src="../../assets/images/users/user.jpg" alt="user"
                                                width="90" class="rounded-circle" />
                                            <div class="ms-4">
                                                <h4 class="mb-0">Johnathan Doe</h4>
                                                <span class="text-muted">Administrator</span>
                                                <p class="text-muted mb-0 mt-1">
                                                    <i data-feather="mail" class="feather-sm me-1"></i>
                                                    info@Flexy.com
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="p-30 pt-0">
                                        <div class="message-center message-body position-relative"
                                            style="height: 210px">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span class="btn btn-light-info btn-rounded-lg text-info">
                                                    <i data-feather="dollar-sign" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        My Profile
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Account
                                                        Settings</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span
                                                    class="
                              btn btn-light-success btn-rounded-lg
                              text-success
                            ">
                                                    <i data-feather="shield" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                                d-flex
                                align-items-center
                              ">
                                                        My Inbox
                                                        <span class="mt-n2 ms-1"><i
                                                                class="
                                    mdi mdi-checkbox-blank-circle
                                    fs-1
                                    text-success
                                  "></i></span>
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Messages
                                                        & Emails</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                                <span
                                                    class="
                              btn btn-light-danger btn-rounded-lg
                              text-danger
                            ">
                                                    <i data-feather="credit-card" class="feather-sm fill-white"></i>
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                                    <h5
                                                        class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                        My Tasks
                                                    </h5>
                                                    <span
                                                        class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">To-do
                                                        and Daily Tasks</span>
                                                </div>
                                            </a>
                                            <div class="mt-4">
                                                <a href="javascript:void(0)"
                                                    class="
                              text-dark
                              fs-3
                              font-weight-medium
                              hover-primary
                            ">
                                                    Account Settings
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="
                              text-dark
                              fs-3
                              font-weight-medium
                              hover-primary
                            ">
                                                    Frequently Asked Questions
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="
                              text-dark
                              fs-3
                              font-weight-medium
                              hover-primary
                            ">
                                                    Pricing
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a class="btn btn-info text-white" href="javascript:void(0);">
                                                Logout
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="nav-small-line"></i>
                            <span class="hide-menu">Dashboards</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/dashboard')}}"
                                aria-expanded="false">
                                <i data-feather="grid"></i><span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index2.html"
                                aria-expanded="false">
                                <i data-feather="shopping-bag"></i><span class="hide-menu">eCommerce</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="inbox"></i><span class="hide-menu">Gaji Karyawan
                                </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="inbox-email.html" class="sidebar-link"><i class="ri-mail-line"></i><span
                                            class="hide-menu"> Karyawan Tetap </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="inbox-email-detail.html" class="sidebar-link"><i
                                            class="ri-mail-open-line"></i><span class="hide-menu"> Karyawan Perbantuan INKA
                                        </span></a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="inbox-email-compose.html" class="sidebar-link"><i
                                            class="ri-mail-add-line"></i><span class="hide-menu"> Karyawan PKWT
                                        </span></a>
                                </li>
                            </ul>
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
        <!-- footer -->
        <!-- ============================================================= -->
        <footer class="footer text-center">
            2023© All Rights Reserved by Wrappixel
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
</body>

</html>
