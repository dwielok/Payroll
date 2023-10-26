@extends('layouts.connect')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12 align-self-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="index.html" class="link" data-feather="grid"></a>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1>
            </div>
            <div class="
            col-lg-4 col-md-6
            d-none d-md-flex
            align-items-center
            justify-content-end
          ">
                {{-- <select class="form-select theme-select border-0" aria-label="Default select example">
                        <option value="1">Today 23 March</option>
                        <option value="2">Today 24 March</option>
                        <option value="3">Today 25 March</option>
                    </select> --}}
                {{-- <a href="javascript:void(0)" class="btn btn-info d-flex align-items-center ms-2">
                        <i class="ri-add-line me-1"></i>
                        Add New
                    </a> --}}
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================= -->
    <!-- Container fluid  -->
    <!-- ============================================================= -->
    <div class="container-fluid">
        <!-- ============================================================= -->
        <!-- Start Page Content -->
        <!-- ============================================================= -->
        <!-- basic table -->
        {{-- <div class="row">
                <div class="col-12">
                    <div class="card"> --}}
        {{-- <div class="border-bottom title-part-padding">
                            <h4>Zero Configuration</h4>
                            <h6 class="card-subtitle mb-0">
                                DataTables has most features enabled by default, so all you
                                need to do to use it with your own tables is to call the
                                construction function:<code> $().DataTable();</code>. You
                                can refer full documentation from here
                                <a href="https://datatables.net/">Datatables</a>
                            </h6>
                        </div> --}}

        {{-- </div>
                </div>
            </div> --}}
        <!-- ============================================================= -->
        <!-- End PAge Content -->
        <!-- ============================================================= -->
    </div>
    <!-- ============================================================= -->
    <!-- End Container fluid  -->
    <!-- ============================================================= -->
    <!-- ============================================================= -->

</div>
@endsection