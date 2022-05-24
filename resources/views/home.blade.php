@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($data as $key => $el)
                    @if($key < 5) @if($key==0) <div class="carousel-item active">
                        <p>{{ $el->message }}</p>
                </div>
                @else
                <div class="carousel-item">
                    <p>{{ $el->message }}</p>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            <hr>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            </button>
        </div>

        <p class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(Auth::check())
        <form id="ajaxform" class="col-md-6">
            <div class="form-group">
                @csrf
                <input type="text" name="message" class="form-control" placeholder="Введите комментарий">
                <input type="hidden" name="author" value="{{ Auth::user()->name }}">
            </div>
            <div class="float-right">
            </div>
            <button type="submit" class="btn btn-primary my-1 send-message" style="float:right;">Отправить</button>
        </form>
        @endif

        <div class='filter col-md-2' style="margin-left: auto; margin-right: 0;">
            <input class="form-control" id="myInput" type="text" placeholder="Поиск">
        </div>

        <ul class="media-list" id="myList">
            @foreach($data as $key => $el)
            @if($key < 3) <li class="media border-bottom">
                <div class="media-body">
                    <h4 class="media-heading">
                        {{ $el->author }}
                    </h4>
                    <p>
                        {{ $el->message }}
                    </p>
                </div>
                </li>
                @endif
                @endforeach
        </ul>
        <div id="loadMore">Показать ещё</div>
    </div>
</div>
</div>
@endsection