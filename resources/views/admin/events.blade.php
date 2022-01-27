@extends('layouts.admin')
@section('title', 'events')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Розділ: "Спорт-події"!</h4>
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
                        <li class="breadcrumb-item"><a href="/dashboard" title="Перехід на головну"><h6><i>Dashboard-I</i></h6></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="text-primary"><b>Спорт-події.</b></i>
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
            <!-- 1 Actual Report Events Table -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">1. Список доданних Спорт-подій в <strong>Sportcalendar:</strong></h5>
                    <div>
                        <a href="/event/create" >
                            <button type="submit" class="btn btn-success btn-sm text-white submit">Додати Спорт-подію!</button>
                        </a>
                    </div>
                    {{-- <form action="{{ route('event_create') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm text-white submit">Додати Спорт-подію!</button>
                    </form> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    <label class="customcheckbox mb-3">
                                        <input type="checkbox" id="mainCheckbox" />
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>№</th>
                                <th>Назва</th>
                                <th>Категорія</th>
                                <th>Місто</th>
                                <th>Тип події</th>
                                <th>Фото події</th>
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
                                            <input type="checkbox" id="mainCheckbox" />
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $events->firstItem()+$loop->index }}</td>
                                    <td>{{ $event->event_name }}</td>
                                    <td>{{ $event->category_id }}</td>
                                    <td>{{ $event->city }}</td>
                                    <td>{{ $event->event_type }}</td>
                                    <td>
                                        <div class="el-card-avatar el-overlay-1">
                                            <img src="/admin/assets/images/intro/{{ $event->image_intro }}" width="140" height="80" alt="image_intro" />
                                            <div class="el-overlay">
                                                <ul class="list-style-none el-info">
                                                    <li class="el-item">
                                                        <a class="btn default btn-outline image-popup-vertical-fit el-link"
                                                        href="/admin/assets/images/full/{{ $event->image_full }}"><i class="mdi mdi-magnify-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $event->street }}</td>
                                    <td>{{ $event->start_date }}</td>
                                    <td width="30" height="80">
                                        <div>
                                            <ul style="list-style:none;">
                                                <li><a href="/event/show/{{ $event->id }}"><span class="badge rounded-pill bg-cyan float-end"><i class="mdi mdi-step-forward"></i>Show</span></a></li>
                                                <li><a href="/event/edit/{{ $event->id }}"><span class="badge rounded-pill bg-secondary float-end"><i class="mdi mdi-grease-pencil"></i>Edit</span></a></li>
                                                <!-- Button trigger modal -->
                                                <li>
                                                    <button type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                                        <span class="badge rounded-pill bg-danger float-end"><i class="mdi mdi-archive"></i>Delete</span>
                                                    </button>
                                                </li>
                                                <!-- Modal Delete Button -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Відміна</button>
                                                            <a href="/event/add-to-archive/{{ $event->id }}"><i class="mdi mdi-grease-pencil"></i>
                                                                <button type="submit" class="btn btn-danger">Видалити подію</button>
                                                            </a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="ms-auto text-center"> {{ $events->onEachSide(5)->links('pagination::bootstrap-4') }} </div>
                        <div class="ms-auto text-center">
                            <blockquote class="blockquote">
                                <p><i>Загальна кількість подій в базі </i><b> Sportcalendar: </b><span class="h4">{{ $events->total() }}</span></p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 2 TOP Report Events Table --}}
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
                                    <th>Фото події</th>
                                    <th>Адреса</th>
                                    <th>Дата</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td>{{ $events->firstItem()+$loop->index }}</td>
                                    <td>{{ $event->event_name }}</td>
                                    <td>{{ $event->category_id }}</td>
                                    <td>{{ $event->city }}</td>
                                    <td>{{ $event->event_type }}</td>
                                    <td>{{ $event->image_intro }}</td>
                                    <td>{{ $event->street }}</td>
                                    <td>{{ $event->start_date }}</td>

                                        {{-- <ul style="text-align:left; list-style:none">
                                            <li class="sidebar-item">
                                                <i class="mdi mdi-television-guide"></i>
                                                <a href="/event/show/{{ $event->id }}" aria-expanded="false"><span class="hide-menu"><b>Покaзати</b></span></a>
                                            </li>
                                            <li class="sidebar-item">
                                                <i class="mdi mdi-pencil"></i>
                                                <a href="/event/edit/{{ $event->id }}" aria-expanded="false"><span class="hide-menu"><b>Редагувати</b></span></a>
                                            </li>
                                            <li class="sidebar-item">
                                                <i class="mdi mdi-archive"></i>
                                                <a href="/event/delete/{{ $event->id }}" aria-expanded="false"><span class="hide-menu"><b>Видалити</b></span></a>
                                            </li>
                                        </ul> --}}

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex no-block align-items-center">
                            <div class="ms-auto text-center"> {{ $events->onEachSide(5)->links('pagination::bootstrap-4') }} </div>
                            <div class="ms-auto text-center">
                                <blockquote class="blockquote">
                                    <p><i>Перелік ТОПових подій, загальна кількість: </i><span class="h4"> {{ $events->total() }} </span></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
    <!-- Right sidebar -->
    <!-- .right-sidebar -->
    <!-- End Right sidebar -->

</div>
<!-- End Container fluid  -->


@stop

@section('sidebar')
@parent
@endsection
