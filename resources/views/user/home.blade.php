@extends('layouts.app')

@section('content')
    <!-- Slider !-->
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($offersSlider as $offer)
                    <div class="carousel-item {{ $offer->id == 1 ? 'active' : '' }}">
                        <img class="img-fluid d-block " style="height: 350px;width:100%" src="{{ $offer->photo }}"
                            alt="{{ $offer->id_carmodel }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
    </div>
    <!-- End slider !-->

    <!-- Search offert !-->
    <div class="container">
        <div class="card">
            <form action="/" method="POST">
                <div class="card-body bg-dark">
                    <div class="btn-group">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Sprawdz
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item">1</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">2</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item">3</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <!-- End Search offert !-->

    <!-- Wyroznione !-->
    <div class="container">
        <div class="card">
            <h2 class="card-header text-center">Wyróznione</h2>
            <div class="row">
                @foreach ($offers as $offer)
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <img class="img img-fluid" src="{{ $offer->photo }}" style="height: 150px">
                                <h5 class="card-text text-center">{{ $offer->carname }}</h5>
                                <p class="card-text text-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                      </svg>
                                    {{ $offer->location }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
