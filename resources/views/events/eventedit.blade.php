@extends('layouts.admin')
@section('title', 'eventedit')
@section('content')
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Events Editor</h4>
                <div class="ms-auto text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info btn btn-sm text-white" data-toggle="modal"
                            data-target="#exampleModalCenter"
                            title="Спочатку ознайомтесь з Правилами заповнення картки Спорт-події!">
                        <i class="mdi mdi-alert-outline"></i><span class="hide-menu"><small> Правила заповнення картки Спорт-події</small></span>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard" title="Перехід на головну"><i
                                        class="mdi mdi-view-dashboard"></i></a></li>
                            <li class="breadcrumb-item"><a href="/events" title="Перехід до загального списку подій"><i
                                        class="mdi mdi-bike"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="text-primary"><b>Редакт
                                        події.</b></i></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Container fluid  -->
    <div class="container">
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
                        Створення Спорт-події успішно виконано !
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="ms-auto text-end">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/events">
                                    <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom"
                                            title="Перехід до основного списку Спорт-подій!">
                                        <i class="mdi mdi-bike"></i> Всі події
                                    </button>
                                </a>
                                <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom"
                                        title="Tooltip on bottom">
                                    <i class="mdi mdi-alert-outline"></i> Редактор
                                </button>
                                <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom"
                                        title="Tooltip on bottom">
                                    <i class="mdi mdi-alert-outline"></i> Рейтинг
                                </button>
                            </div>
                        </div>
                        <h5 class="card-title">1. Форма редагування Спорт-події в <strong>Sportcalendar:</strong></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid  -->
    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Event Edit</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Події</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Редагування події
                            </li>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form class="form-horizontal" action="{{ route('event.update', $event->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <h4 class="card-title">Редагування події</h4>
                            <div class="form-group row">
                                <label
                                    for="event_name"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Назва
                                    @if ($errors->has('event_name'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>

                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="event_name"
                                        name="event_name"
                                        value="{{ $event->event_name }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="event_type"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Тип
                                    @if ($errors->has('event_type'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="event_type"
                                        name="event_type"
                                        value="{{ $event->event_type }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="category_id"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Id категорії
                                    @if ($errors->has('category_id'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="category_id"
                                        name="category_id"
                                        value="{{ $event->category_id }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="event_description"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Опис заходу
                                    @if ($errors->has('event_description'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <textarea
                                        class="form-control"
                                        id="event_description"
                                        name="event_description">{{ $event->event_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="city"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Місце проведення
                                    @if ($errors->has('place'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="place"
                                        name="place"
                                        value="{{ $event->place }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="city"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Місто проведення
                                    @if ($errors->has('city'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="city"
                                        name="city"
                                        value="{{ $event->city }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="street"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Вулиця проведення
                                    @if ($errors->has('street'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="street"
                                        name="street"
                                        value="{{ $event->street }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="build_number"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Номер будинку
                                    @if ($errors->has('build_number'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="build_number"
                                        name="build_number"
                                        value="{{ $event->build_number }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="geo_point"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Індекс
                                    @if ($errors->has('geo_point'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="geo_point"
                                        name="geo_point"
                                        value="{{ $event->geo_point }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label">Дата реєстрації
                                    <small class="text-muted">dd/mm/yyyy</small>
                                    @if ($errors->has('registration_date'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        id="registration_date"
                                        name="registration_date"
                                        type="datetime-local"
                                        value="{{ date('Y-m-d\TH:i:s', strtotime($event->registration_date)) }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label">Дата початку
                                    <small class="text-muted">dd/mm/yyyy</small>
                                    @if ($errors->has('start_date'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        id="start_date"
                                        name="start_date"
                                        type="datetime-local"
                                        value="{{ date('Y-m-d\TH:i:s', strtotime($event->start_date)) }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label">Дата закінчення
                                    <small class="text-muted">dd/mm/yyyy</small>
                                    @if ($errors->has('finish_date'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        id="finish_date"
                                        name="finish_date"
                                        type="datetime-local"
                                        value="{{ date('Y-m-d\TH:i:s', strtotime($event->finish_date)) }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="event_link"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Посилання на запрошення
                                    @if ($errors->has('event_link'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="event_link"
                                        name="event_link"
                                        value="{{ $event->event_link }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="event_status"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Статус запрошення
                                    @if ($errors->has('event_status'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="event_status"
                                        name="event_status"
                                        value="{{ $event->event_status }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="meta_title"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Мета тег title
                                    @if ($errors->has('meta_title'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="meta_title"
                                        name="meta_title"
                                        value="{{ $event->meta_title }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="meta_desc"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Мета тег desc
                                    @if ($errors->has('meta_desc'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="meta_desc"
                                        name="meta_desc"
                                        value="{{ $event->meta_desc }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="rating"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Рейтинг
                                    @if ($errors->has('rating'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="rating"
                                        name="rating"
                                        value="{{ $event->rating }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="url"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Посилання сторінки
                                    @if ($errors->has('url'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="url"
                                        name="url"
                                        value="{{ $event->url }}"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="event_source"
                                    class="col-sm-3 text-end control-label col-form-label">
                                    Організатори
                                    @if ($errors->has('event_source'))
                                        <span class="badge bg-danger">Danger</span>
                                    @endif
                                </label>
                                <div class="col-sm-6">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="event_source"
                                        name="event_source"
                                        value="{{ $event->event_source }}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->

        <!-- End Right sidebar -->
    </div>
    <!-- End Container fluid  -->
@stop

@section('sidebar')
    @parent
@endsection







