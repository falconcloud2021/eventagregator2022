@extends('layouts.admin')
@section('title', 'parser')
@section('content')

    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Парсери</h4>
                <div class="ms-auto text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button"
                                class="btn btn-dark btn btn-sm d-flex align-items-center text-white dropdown-toggle"
                                data-placement="bottom" title="Перехід до основного списку Спорт-подій!"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="mdi mdi-bike"></i>
                            Всі події
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>

                        <button type="button"
                                class="btn btn-dark btn btn-sm d-flex align-items-center text-white dropdown-toggle"
                                data-placement="bottom" title="Tooltip on bottom"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="mdi mdi-cursor-pointer"></i>
                            Редактор
                        </button>
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
                            <li class="breadcrumb-item"><a href="/dashboard" title="Перехід на головну">
                                    <img src="/admin/assets/images/logo-icon.png" alt="homepage" class="light-logo"
                                         width="12"/></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i
                                    class="text-primary"><b>Парсери.</b></i>
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
        @if(isset($delete))
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        Видалення успішно виконано !
                    </div>
                </div>
            </div>
        @endif
        @if(isset($create))
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        Створення успішно виконано !
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Результат роботи парсерів <strong>Sportcalendar</strong></h5>
                            <form action="{{ route('events') }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-cyan btn-sm text-white submit">Перейти в Додані
                                    події!
                                </button>
                            </form>
                            <p></p>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Назва</th>
                                    <th>Link</th>
                                    <th>Місто</th>
                                    <th>Тип події</th>
                                    <th>Адреса</th>
                                    <th>Дата</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($parsed as $parse)
                                    <tr>
                                        <td>{{$parse->parsed_event_name}}</td>
                                        <td>
                                            @if(isset($parse->parsed_event_link))
                                                <a href="{{$parse->parsed_event_link}}">Link</a>
                                            @endif
                                        </td>
                                        <td>@if(isset($parse->parsed_city)){{$parse->parsed_city}}@endif</td>
                                        <td>@if(isset($parse->parsed_event_type)){{$parse->parsed_event_type}}@endif</td>
                                        <td></td>
                                        <td>@if(isset($parse->parsed_start_date)){{$parse->parsed_start_date}}@endif</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-between">
                                                 <a href="{{route('parser.edit', $parse->id)}}">
                                                <i class="fas text-success fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{route('parser.destroy', $parse->id)}}"
                                                  method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="text-danger fas fa-trash" role="button"></i>
                                                </button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('sidebar')
    @parent
@endsection

