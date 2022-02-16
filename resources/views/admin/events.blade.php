@extends('layouts.admin')
@section('title', 'events')
@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title">Спорт-події</h5>
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
                            <li class="breadcrumb-item active" aria-current="page"><i class="text-primary"><b>Всі
                                        події.</b></i>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Sales chart -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- Start Filtr Calendar -->
                    <p></p>
                    <form class="form-horizontal" action="/event/date-filtr" method="POST"
                          enctype="multipart/form-data">
                        <div class="ms-auto text-center">
                            <div class="form-group row">
                                <!-- start date -->
                                <label class="col-sm-3 text-end control-label col-form-label">
                                    @if ($errors->has('registration_date')) <span class="badge bg-danger">* Введіть початкову дату</span> @endif
                                </label>
                                <div class="col-sm-1">
                                    <input id="first_search_date" name="first_search_date" type="datetime-local">
                                </div>
                                <!-- end date -->
                                <label class="col-sm-1 text-end control-label col-form-label">
                                    @if ($errors->has('registration_date')) <span class="badge bg-danger">* Введіть кінцеву дату</span> @endif
                                </label>
                                <div class="col-sm-1">
                                    <input id="second_search_date" name="second_search_date" type="datetime-local">
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-dark btn btn-sm" type="button" data-toggle="collapse"
                                            data-target=".multi-collapse" aria-expanded="false"
                                            aria-controls="multiCollapseExample1 multiCollapseExample2">Пошук
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End Filtr Calendar -->
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Аналітика Спорт-подій</h4><h5 class="card-subtitle">За
                                    період:</h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Start columns Blocks -->
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-line-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <a href="#eventactive">
                                            <div class="bg-dark p-10 text-white text-center"><i
                                                    class="mdi mdi-animation fs-3 mb-1 font-14"></i>
                                                <h4 class="mb-0 mt-1">{{ $events->count() }}</h4><small
                                                    class="font-light">Активних подій</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <a href="#eventamount">
                                            <div class="bg-dark p-10 text-white text-center"><i
                                                    class="mdi mdi-bike fs-3 mb-1 font-14"></i>
                                                <h4 class="mb-0 mt-1">{{ $events->count() }}</h4><small
                                                    class="font-light">Всього Спорт-подій</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <a href="#eventnew">
                                            <div class="bg-dark p-10 text-white text-center"><i
                                                    class="mdi mdi-plus fs-3 font-14"></i>
                                                <h4 class="mb-0 mt-1">{{ $events->count() }}</h4><small
                                                    class="font-light">Нових подій</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <a href="#eventarchive">
                                            <div class="bg-dark p-10 text-white text-center"><i
                                                    class="mdi mdi-tag fs-3 mb-1 font-14"></i>
                                                <h4 class="mb-0 mt-1">{{ $events->count() }}</h4><small
                                                    class="font-light">Архів подій</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center"><i
                                                class="mdi mdi-table fs-3 mb-1 font-14"></i>
                                            <h4 class="mb-0 mt-1">{{ $events->count() }}</h4><small class="font-light">Pending
                                                Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center"><i
                                                class="mdi mdi-web fs-3 mb-1 font-14"></i>
                                            <h4 class="mb-0 mt-1">{{ $events->count() }}</h4><small class="font-light">Online
                                                Orders</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End columns blocks -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sales chart -->
        <!-- Start Page Content -->
        @if(isset($delete))
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">Видалення успішно виконано !</div>
                </div>
            </div>
        @endif
        @if(isset($create))
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success" role="alert">Створення успішно виконано !</div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <!-- Start 1 Total List Events Table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" id="#eventamount">1. Повний список доданних Спорт-подій в <strong>Sportcalendar:</strong>
                        </h5>
                        <a href="{{route('event.create')}}">
                            <button type="submit" class="btn btn-success btn-sm text-white submit">Додати Спорт-подію!
                            </button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>
                                    <label class="customcheckbox mb-3">
                                        <input type="checkbox" id="mainCheckbox"/><span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>№</th>
                                <th>Назва</th>
                                <th>Категорія</th>
                                <th>Місто</th>
                                <th>Тип події</th>
                                <th>Адреса</th>
                                <th>Дата</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="customtable">
                            @foreach($events as $event)
                                <tr>
                                    <td>
                                        <label class="customcheckbox mb-3">
                                            <input type="checkbox" id="mainCheckbox"/>
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $events->firstItem()+$loop->index }}</td>
                                    <td>{{ $event->event_name }}</td>
                                    <td>{{ $event->category_id }}</td>
                                    <td>{{ $event->city }}</td>
                                    <td>{{ $event->event_type }}</td>
                                    <td>{{ $event->street }}</td>
                                    <td>{{ $event->start_date }}</td>
                                    <td width="30" height="80">
                                        <div>
                                            <ul style="list-style:none;">
                                                <li><a href="{{route('event.show', $event->id)}}"><span
                                                            class="badge rounded-pill bg-cyan float-end"><i
                                                                class="mdi mdi-step-forward"></i>Show</span></a></li>
                                                <li><a href="{{route('event.edit', $event->id)}}"><span
                                                            class="badge rounded-pill bg-secondary float-end"><i
                                                                class="mdi mdi-grease-pencil"></i>Edit</span></a></li>
                                                <!-- Button trigger modal -->
                                                <li>
                                                    <a type="submit" data-bs-toggle="modal"
                                                       data-bs-target="#modalDelete{{$event->id}}">
                                                        <span class="badge rounded-pill bg-danger float-end">
                                                        <i class="mdi mdi-archive"></i>Delete</span>
                                                    </a>
                                                    @include('events.modal.delete')
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex no-block align-items-center">
                            <div class="ms-auto text-center"> {{ $events->links() }} </div>
                            <div class="ms-auto text-center">
                                <blockquote class="blockquote">
                                    <p><i>Загальна кількість подій в базі <b> Sportcalendar: </b></i><span
                                            class="h4">{{ $events->count() }}</span></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End 2 Total List Events Table -->
                <!-- Start 2 TOP Report Events Table -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">2. Топові Спорт-події - "TOP Chart"! :</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Назва</th>
                                    <th>Категорія</th>
                                    <th>Місто</th>
                                    <th>Тип події</th>
                                    <th>Адреса</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($eventsTop as $event)
                                    <tr>
                                        <td>{{ $loop->index + 1}}</td>
                                        <td>{{ $event->event_name }}</td>
                                        <td>{{ $event->category_id }}</td>
                                        <td>{{ $event->city }}</td>
                                        <td>{{ $event->event_type }}</td>
                                        <td>{{ $event->street }}</td>
                                        <td>{{ $event->start_date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 d-flex no-block align-items-center">
                                <div class="ms-auto text-center">
                                    <blockquote class="blockquote">
                                        <p><i>Перелік ТОПових подій, загальна кількість: </i><span
                                                class="h4"> {{ $eventsTop->count() }} </span></p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End 2 TOP Report Events Table -->
            </div>
        </div>
    </div>
    <!-- End Container fluid  -->

    <!-- Start Container fluid  -->
    <div class="container">
        <!-- START Column!!! -->
        <div class="row">
            <!-- Column Users -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/users">
                    <div class="card card-hover">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                            <h6 class="text-white">Користувачі</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column Partners -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/partners">
                    <div class="card card-hover">
                        <div class="box bg-primary text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                            <h6 class="text-white">Партнери</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column Organizer -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/organizer">
                    <div class="card card-hover">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                            <h6 class="text-white">Органайзер</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column Dashboard2 -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/dashboard2">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                            <h6 class="text-white">Dashboard-II</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column Bells -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/bells">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-email-outline"></i></h1>
                            <h6 class="text-white">Повідомлення</h6>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Column Letters -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="/letters">
                    <div class="card card-hover">
                        <div class="box bg-secondary text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-email-outline"></i></h1>
                            <h6 class="text-white">Пошта</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- END Column!!! -->
    <!-- End PAge Content -->
@stop
@section('sidebar')
    @parent
@endsection
