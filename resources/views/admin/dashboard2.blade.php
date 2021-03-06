@extends('layouts.admin')
@section('title', 'dashboard2')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard-II</h4>
            <div class="ms-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-dark btn btn-sm d-flex align-items-center text-white dropdown-toggle" data-placement="bottom" title="Перехід до основного списку Спорт-подій!"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-bike"></i>
                                Всі події</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>

                    <button type="button" class="btn btn-dark btn btn-sm d-flex align-items-center text-white dropdown-toggle" data-placement="bottom" title="Tooltip on bottom"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-cursor-pointer"></i>
                                Редактор</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                </div>
            </div>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard" title="Перехід на головну"><i class="mdi mdi-view-dashboard"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="text-primary"><b>Dashboard-II.</b></i>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->

<p> Dashboard2 page! Something content include!</p>



@stop

@section('sidebar')
@parent
@endsection
