@extends('layouts.admin')
@section('title', 'event')
@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Картка Спорт-події</h4>
                <div class="ms-auto text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/events">
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Перехід до основного списку Спорт-подій!"><i class="mdi mdi-bike"></i>
                                Всі події</button>
                        </a>
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Tooltip on bottom"><i class="mdi mdi-cursor-pointer"></i>
                                Редактор</button>
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Tooltip on bottom"><i class="mdi mdi-comment-processing"></i>
                                Коменти</button>
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Tooltip on bottom"><i class="mdi mdi-chart-bar"></i>
                                Звіти</button>
                    </div>
                </div>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard" title="Перехід на головну сторінку"><i class="mdi mdi-view-dashboard"></i></a></li>
                            <li class="breadcrumb-item"><a href="/events" title="Перехід до загального списку подій"><i class="mdi mdi-bike"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="text-primary"><b>Картка події.</b></i></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">ID події</h5>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Значення</th>
                </tr>
                </thead>
                <tbody>
                @foreach($event as $name => $value)
                    <tr>
                        <td>{{$name}}</td>
                        @if($name == 'image_intro' || $name == 'image_full')
                            <td>
                                <div class="card el-element-overlay col-md-3 ">
                                    <div class="el-card-item">
                                        <div class="el-card-avatar el-overlay-1">

                                            <img width="400" height="400" src="{{ asset('storage/image/origin/'.$value) }}" alt="user" >
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item">
                                                        <a class="btn default btn-outline image-popup-vertical-fit el-link
                                                        " href="{{ asset('storage/image/origin/'.$value) }}"><i class="mdi mdi-magnify-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @else
                            <td>{{ $value }}</td>
                        @endif
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <!-- ================================== -->
        <!-- End PAge Content -->

        <!-- Right sidebar -->

        <!-- .right-sidebar -->
        <!-- ===================================== -->
        <!-- End Right sidebar -->
    </div>
    <!-- ======================================= -->
    <!-- End Container fluid  -->



@stop

@section('sidebar')
    @parent
@endsection







