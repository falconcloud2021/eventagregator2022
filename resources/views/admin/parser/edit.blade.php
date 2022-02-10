@extends('layouts.admin')
@section('title', 'parser')
@section('content')

    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Парсери {{$parser->parsed_event_name}}</h4>
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
                        <form class="w-50" action="{{route('parser.update', $parser->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Event name</label>
                                <input name="parsed_event_name" type="text" class="form-control"
                                       placeholder="Enter event name" value="{{$parser->parsed_event_name}}">
                                @error('parsed_event_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Event type</label>
                                <input name="parsed_event_type" type="text" class="form-control"
                                       placeholder="Enter event type" value="{{$parser->parsed_event_type}}">
                                @error('parsed_event_type')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Event category</label>
                                <input name="parsed_event_category" type="text" class="form-control"
                                       placeholder="Enter event category" value="{{$parser->parsed_event_category}}">
                                @error('parsed_event_category')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Event link</label>
                                <input name="parsed_event_link" type="text" class="form-control"
                                       placeholder="Enter event link" value="{{$parser->parsed_event_link}}">
                                @error('parsed_event_link')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Geo point</label>
                                <input name="parsed_geo_point" type="text" class="form-control"
                                       placeholder="Enter event link" value="{{$parser->parsed_geo_point}}">
                                @error('parsed_geo_point')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <input name="parsed_city" type="text" class="form-control"
                                       placeholder="Enter city" value="{{$parser->parsed_city}}">
                                @error('parsed_city')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Street</label>
                                <input name="parsed_street" type="text" class="form-control"
                                       placeholder="Enter street" value="{{$parser->parsed_street}}">
                                @error('parsed_street')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Build number</label>
                                <input name="parsed_build_number" type="text" class="form-control"
                                       placeholder="Enter build number" value="{{$parser->parsed_build_number}}">
                                @error('parsed_build_number')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Source</label>
                                <input name="parsed_source" type="text" class="form-control"
                                       placeholder="Enter source" value="{{$parser->parsed_source}}">
                                @error('parsed_source')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Registration date</label>
                                <input name="parsed_registration_date" type="datetime-local" class="form-control"
                                       placeholder="Enter registration date"
                                       value="{{$parser->registrationDateForInput()}}">
                                @error('parsed_registration_date')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Start date</label>
                                <input name="parsed_start_date" type="datetime-local" class="form-control"
                                       placeholder="Enter start date" value="{{$parser->startDateForInput()}}">
                                @error('parsed_start_date')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('sidebar')
    @parent
@endsection

