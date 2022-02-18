@extends('layouts.admin')
@section('title', 'eventcreate')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
                <h5 class="page-title">Нова подія</h5>
            <div class="ms-auto text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/events">
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Перехід до основного списку Спорт-подій!"><i class="mdi mdi-bike"></i>
                            Всі події</button>
                    </a>
                    <a href="/categories/categories-types">
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Tooltip on bottom"><i class="mdi mdi-cursor-pointer"></i>
                            Редактор</button>
                    </a>
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Tooltip on bottom"><i class="mdi mdi-comment-processing"></i>
                            Коменти</button>
                        <button type="button" class="btn btn-dark btn btn-sm" data-placement="bottom" title="Tooltip on bottom"><i class="mdi mdi-chart-bar"></i>
                            Звіти</button>
                </div>
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                        <ul class="navbar-nav float-end">
                            <!-- Start User Dropdown menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                                    href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-arrange-bring-to-front font-14"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-account me-1 ms-1"></i>Мій профайл</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-wallet me-1 ms-1"></i>Мій баланс</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-email me-1 ms-1"></i>Пошта</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-settings me-1 ms-1"></i>Налаштування аккаунту</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="fa fa-power-off me-1 ms-1"></i>Logout</a>
                                    <div class="dropdown-divider"></div>
                                    <div class="ps-4 p-10">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">Показати профайл</a>
                                    </div>
                                </ul>
                            </li>
                            <!-- End User Dropdown menu -->
                        </ul>
                    </div>
                </nav>
            </div>
            <!--  -->
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard" title="Перехід на головну">
                            <img src="/admin/assets/images/logo-icon.png" alt="homepage" class="light-logo" width="12" /></a></li>
                        <li class="breadcrumb-item">
                            <a title="Загальний список подій"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-bike"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/events"><i class="mdi mdi-account me-1 ms-1"></i>Всі події</a>
                                <a class="dropdown-item" href="/events"><i class="mdi mdi-wallet me-1 ms-1"></i>Активні події</a>
                                <a class="dropdown-item" href="/letter s"><i class="mdi mdi-email me-1 ms-1"></i>Пошта</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/events"><i class="mdi mdi-settings me-1 ms-1"></i>Топові події</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-power-off me-1 ms-1"></i>Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="ps-4 p-10">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded text-white">Показати профайл</a>
                                </div>
                            </ul>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="text-primary"><small>Нова подія.</small></i></li>
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
                    Створення Спорт-події успішно виконано !
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h5 class="card-title">Картка створення Спорт-події</h5>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn btn-sm text-white" data-toggle="modal" data-target="#exampleModalCenter" title="Спочатку ознайомтесь з Правилами заповнення картки Спорт-події!">
                            <i class="mdi mdi-alert-outline"></i><span class="hide-menu"><small> Правила заповнення картки Спорт-події</small></span></button>
                            <p></p>
                        <!-- Modal -->
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Назва Спорт-події :</span>
                                @if ($errors->has('event_name'))
                                    <span class="badge bg-danger">* Заповніть це поле!</span>
                                @endif
                            </div>
                            <input class="form-control" type="text" id="event_name" name="event_name" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Тип Спорт-події :</span>
                                @if ($errors->has('event_name')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </div>
                            <input class="form-control" type="text" id="event_type" name="event_type" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Опис Спорт-події :</span>
                                @if ($errors->has('event_name')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </div>
                            <div class="col-12">
                                <textarea class="form-control row-4" id="event_description" name="event_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 text-end control-label col-form-label">Категорія :
                                @if ($errors->has('category_id')) <span class="badge bg-danger">* Заповніть це поле</span> @endif
                            </label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" id="category_id" name="category_id" />
                            </div>
                            <label class="col-sm-3 text-end control-label col-form-label">Дата реєстрації* :
                                {{-- <small class="text-muted"> dd/mm/yyyy </small> --}}
                                @if ($errors->has('registration_date')) <span class="badge bg-danger">* Введіть дату реєстрації</span> @endif
                            </label>
                            <div class="col-sm-4">
                                <input id="registration_date" name="registration_date" type="datetime-local">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-sm-1 text-end control-label col-form-label">Місто* :
                                @if ($errors->has('city')) <span class="badge bg-danger">* Заповніть це поле</span> @endif
                            </label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" id="city" name="city" />
                            </div>
                            <label for="street" class="col-sm-2 text-end control-label col-form-label">Вулиця :
                                @if ($errors->has('street')) <span class="badge bg-danger">* Заповніть це поле</span> @endif
                            </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="street" name="street" />
                            </div>
                            <label for="build_number" class="col-sm-2 text-end control-label col-form-label">Номер будинку :</label>
                            <div class="col-sm-1">
                                <input class="form-control" type="text" id="build_number" name="build_number" />
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Geo point :</span>
                                @if ($errors->has('event_name')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </div>
                            <input class="form-control" type="text" id="geo_point" name="geo_point" />
                        </div>
                        <div class="form-group row">
                            <label for="start_date" class="col-sm-2 text-end control-label col-form-label">Start Date* :
                                @if ($errors->has('start_date')) <span class="badge bg-danger">* Введіть дату</span> @endif
                            </label>
                            <div class="col-sm-4">
                                <input id="start_date" name="start_date" type="datetime-local">
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Посилання на Спорт-подію :</span>
                                @if ($errors->has('event_name')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </div>
                            <input class="form-control" type="text" id="event_link" name="event_link" />
                        </div>
                        <div class="form-group row">
                            <label for="end_date" class="col-sm-2 text-end control-label col-form-label">Finish Date* :
                                @if ($errors->has('finish_date')) <span class="badge bg-danger">* Введіть дату</span> @endif
                            </label>
                            <div class="col-sm-4">
                                <input id="finish_date" name="finish_date" type="datetime-local">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_status" class="col-sm-3 text-end control-label col-form-label">Статус Спорт-події
                                @if ($errors->has('event_status')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="event_status" name="event_status" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_title" class="col-sm-3 text-end control-label col-form-label">Мета тег title
                                @if ($errors->has('meta_title')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="meta_title" name="meta_title" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_desc" class="col-sm-3 text-end control-label col-form-label">Мета тег desc :
                                @if ($errors->has('meta_desc')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="meta_desc" name="meta_desc" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rating" class="col-sm-3 text-end control-label col-form-label">Рейтинг :
                                @if ($errors->has('rating')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="rating" name="rating" />
                            </div>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Посилання сторінки :</span>
                                @if ($errors->has('url')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </div>
                            <input type="text" class="form-control" id="url" name="url" />
                        </div>
                        <div class="form-group row">
                            <label for="event_source" class="col-sm-3 text-end control-label col-form-label">Організатори :
                                @if ($errors->has('event_source')) <span class="badge bg-danger">* Заповніть це поле!</span> @endif
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" id="event_source" name="event_source" />
                            </div>
                        </div>
                    </div>
                    <div class="ms-auto text-center">
                        <button class="btn btn-success text-white" type="button submit"><i class="mdi mdi-arrow-right-drop-circle"></i><b> Створити Спорт-подію!</b></button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 text-center mt-4">
                        <div class="btn-group">
                            <div>
                                <a href="{{route('event.index')}}">
                                    <button class="btn btn-dark" type="reset" value="Reset"><i class="mdi mdi-animation"></i><b> Відміна</b></button>
                                </a>
                            </div>
                            <div> </div>
                            <div>
                                <a href="{{route('dashboard')}}">
                                    <button class="btn btn-info" type="reset" value="Reset"><i class="mdi mdi-view-dashboard"></i><b> Dashboard</b></button>
                                </a>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success margin-5 text-white" data-toggle="modal" data-target="#Modal1">
                            <i class="mdi mdi-arrow-right-drop-circle"></i><b>  Створити Спорт-подію!</b>
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning margin-5 text-white" data-toggle="modal" data-target="#Modal2">
                            <i class="mdi mdi-view-dashboard"></i><b> Dashboard</b>
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3">
                            <i class="mdi mdi-animation"></i><b>  Відміна</b>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                            <div class="modal-dialog" role="document ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Popup Header </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true ">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Here is the text coming you can put also image if you
                                        want…
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Alert Model </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body"> Lorem ipsum dolor sit amet... </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                                        <button type="button" class="btn btn-primary"> Save changes </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Image Header </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../assets/images/background/img5.jpg" width="100% " />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="col-lg-12 text-center mt-4">
                    Already have an account? <a href="#" class="text-danger">Sign In</a>
              </div>
            </div>
        </div>
    </div>
                <!-- End Page Content -->
            <!-- Right sidebar -->
        <!-- .right-sidebar -->
    <!-- End Right sidebar -->

</div>

<!-- End Container fluid  -->


@stop

@section('sidebar')
    @parent
@endsection

