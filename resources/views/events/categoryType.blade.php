@extends('layouts.admin')
@section('title', 'categoryType')
@section('content')

<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h5 class="page-title">Категорії</h5>
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
                        <li class="breadcrumb-item"><a href="/dashboard" title="Перехід на головну">
                            <img src="/admin/assets/images/logo-icon.png" alt="homepage" class="light-logo" width="12" /></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="text-primary"><b>Категорії.</b></i>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->

<!-- Start Page Content -->
<!-- Start 1 Container fluid  -->
<div class="container-fluid">
    <!-- Start cards -->
    <div class="row">
        <!-- Card 1 -->
        <div class="col-md-3">
            <div class="card mt-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="peity_line_neutral left text-center mt-2">
                            <span>
                                <span style="display: none">10,15,8,14,13,10,10</span><canvas width="50" height="24"></canvas>
                            </span>
                            <h6>10%</h6>
                        </div>
                    </div>
                    <div class="col-md-6 border-left text-center pt-2"><h3 class="mb-0 fw-bold">{{ $categories->total() }}</h3>
                        <span class="text-muted">"КАТЕГОРІЙ" подій :</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-3">
            <div class="card mt-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="peity_bar_bad left text-center mt-2">
                            <span>
                                <span style="display: none">3,5,6,16,8,10,6</span><canvas width="50" height="24"></canvas>
                            </span>
                            <h6>-40%</h6>
                        </div>
                    </div>
                    <div class="col-md-6 border-left text-center pt-2"><h3 class="mb-0 fw-bold">{{ $events->total() }}</h3>
                        <span class="text-muted">"АКТИВНИХ" подій :</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-3">
            <div class="card mt-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="peity_line_good left text-center mt-2">
                            <span>
                                <span style="display: none">12,6,9,23,14,10,17</span>
                                <canvas width="50" height="24"></canvas>
                            </span>
                            <h6>+60%</h6>
                        </div>
                    </div>
                    <div class="col-md-6 border-left text-center pt-2"><h3 class="mb-0">{{ $types->total() }}</h3>
                        <span class="text-muted">"ТИПІВ" подій :</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="col-md-3">
            <div class="card mt-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="peity_bar_good left text-center mt-2">
                            <span>12,6,9,23,14,10,13</span>
                            <h6>+30%</h6>
                        </div>
                    </div>
                    <div class="col-md-6 border-left text-center pt-2"><h3 class="mb-0 fw-bold">{{ $events->total() }}</h3>
                        <span class="text-muted">"СПОРТ-ПОДІЙ" :</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End cards -->

    <!-- Allert message -->
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
    <!-- END Allert message -->

    <div class="row">
        <div class="col-12">
            <!-- Start 1. Table Events Categories -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" id="#eventactive">1. Перелік <b>"Категорій"</b> Спорт-подій :</h5>
                    <a href="/event/create" >
                        <button type="submit" class="btn btn-success btn-sm text-white submit"><b>Додати Категорію!</b></button>
                    </a>
                    {{-- <form action="{{ route('event_create') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm text-white submit">Додати Спорт-подію!</button>
                    </form> --}}
                    <p> </p>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Категорія</th>
                                    <th>Фото події</th>
                                    <th>Дата</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $categories->firstItem()+$loop->index }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_img }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                    <ul style="text-align:left; list-style:none">
                                        <li class="sidebar-item">
                                            <i class="mdi mdi-pencil"></i>
                                            <a href="/category/edit/{{ $category->id }}" aria-expanded="false"><span class="hide-menu"><b>Редагувати</b></span></a>
                                        </li>
                                        <li class="sidebar-item">
                                            <i class="mdi mdi-archive"></i>
                                            <a href="/category/delete/{{ $category->id }}" aria-expanded="false"><span class="hide-menu"><b>Видалити</b></span></a>
                                        </li>
                                    </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex no-block align-items-center">
                            <div class="ms-auto text-center"> {{ $categories->onEachSide(5)->links('pagination::bootstrap-4') }} </div>
                            <div class="ms-auto text-center">
                                <blockquote class="blockquote">
                                    <p><i>Кількість <b>"Категорій"</b> Спорт-подій: </i><span class="h4"> {{ $categories->total() }} </span></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End 1. Table Events Categories -->
            <!-- Start 2. Table Types events -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" id="#eventactive">2. Перелік <b>"Типів"</b> Спорт-подій :</h5>
                    <a href="/event/create" >
                        <button type="submit" class="btn btn-success btn-sm text-white submit"><b>Додати Подію!</b></button>
                    </a>
                    {{-- <form action="{{ route('event_create') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm text-white submit">Додати Спорт-подію!</button>
                    </form> --}}
                    <p> </p>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Категорія</th>
                                    <th>Дата</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($types as $type)
                                <tr>
                                    <td>{{ $types->firstItem()+$loop->index }}</td>
                                    <td>{{ $type->type_name }}</td>
                                    <td>{{ $type->created_at }}</td>
                                    <td>
                                    <ul style="text-align:left; list-style:none">
                                        <li class="sidebar-item">
                                            <i class="mdi mdi-pencil"></i>
                                            <a href="/category/edit/{{ $type->id }}" aria-expanded="false"><span class="hide-menu"><b>Редагувати</b></span></a>
                                        </li>
                                        <li class="sidebar-item">
                                            <i class="mdi mdi-archive"></i>
                                            <a href="/category/delete/{{ $type->id }}" aria-expanded="false"><span class="hide-menu"><b>Видалити</b></span></a>
                                        </li>
                                    </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 d-flex no-block align-items-center">
                            <div class="ms-auto text-center"> {{ $types->onEachSide(5)->links('pagination::bootstrap-4') }} </div>
                            <div class="ms-auto text-center">
                                <blockquote class="blockquote">
                                    <p><i>Кількість<b> "Типів" </b>Спорт-подій:</i><span class="h4"> {{ $types->total() }} </span></p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End 2. Table Types events -->
        </div>
    </div>
</div>
<!-- End 1 Container fluid  -->

<!-- Start 2 Container fluid  -->
 <div class="container-fluid">
    <!-- START Column!!! -->
     <div class="row">
         <!-- Column Users -->
         <div class="col-md-6 col-lg-2 col-xlg-3" >
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
