@extends('layouts.app')

@section('content')
    <!-- Slider !-->
    <div class="card border-0">
        <div class="card-body m-0 p-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators ">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach ($Sliders as $slider)
                        <div class="carousel-item {{ $slider->status == 'action' ? 'active' : '' }}">
                            <img class="img-fluid d-block " style="height: 390px;width:100%" src="{{ $slider->photo }}"
                                alt="Photo car">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- End slider !-->

    <!-- Search offert !-->
    <div class="card border-0 p-0 m-0">
        <div class="card-body bg-dark p-1">
            <form action="#" method="GET">
                <div class="row p-0 m-0">
                    <div class="col-sm-6 p-0 m-0">
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Bodytypes
                        </button>
                        <ul class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton">
                            @foreach ($stats['bodytypes'] as $stat)
                                <li class="text-start">
                                    <p class="p-0 m-0"><input type="checkbox" name="bodytype" value="{{ $stat['name'] }}">
                                        {{ $stat['name'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            CarModel
                        </button>
                        <ul class="dropdown-menu p-0 m-0" aria-labelledby="dropdownMenuButton">
                            @foreach ($stats['carmodel'] as $stat)
                                <li class="text-start">
                                    <p class="p-0 m-0"><input type="checkbox" name="carmodel" value="{{ $stat['name'] }}">
                                        {{ $stat['name'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Fueltype
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($stats['fueltype'] as $stat)
                                <li class="text-start">
                                    <p class="p-0 m-0"><input type="checkbox" name="fueltype" value="{{ $stat['name'] }}">
                                        {{ $stat['name'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Course
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            <li><input type="number" name="courseod" placeholder="Of .. Km" value=""></li>
                            <li><input type="number" name="coursedo" placeholder="To .. Km" value=""></li>
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Engine
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            @foreach ($stats['engine'] as $stat)
                                <li class="text-start">
                                    <p class="p-0 m-0"><input type="checkbox" name="engine" value="{{ $stat['name'] }}">
                                        {{ $stat['name'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Steeringwheel
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            <li>
                                @foreach ($stats['steeringwheel'] as $stat)
                            <li class="text-start">
                                <p class="p-0 m-0"><input type="checkbox" name="steeringwheel"
                                        value="{{ $stat['name'] }}"> {{ $stat['name'] }}</p>
                            </li>
                            @endforeach
                            </li>
                        </ul>

                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Price
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            <li>
                                <input type="number" name="priceod" placeholder="Of money" value="">
                            </li>
                            <li>
                                <input type="number" name="pricedo" placeholder="To money" value="">
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 text-end">
                        <input type="text" name="carname" class="col-sm-6 text-center rounded-pill" placeholder="Carname">
                        <button type="submit" class="btn-sm btn-primary text-white rounded-pill border-0">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Search offert !-->

    <!-- Center -->
    <div class="container-fluid m-0 pt-0 p-3 pb-0">
        <div class="row p-1 pt-0">
            @foreach ($offers as $offer)
                <div class="col-sm-2 p-1">
                    <div class="card">
                        <div class="card-body p-0 border border-dark rounded-3">
                            <img class="img-fluid" src="{{ $offer->photo }}" style="height: 100px,width:100%;">
                            <h5 class="card-text text-center"><b>{{ $offer->carname }}</b></h5>
                            <p class="card-text h5 text-end">
                                Price: <b>{{ $offer->price }}</b> $
                            </p>
                            <div class="row mb-1">
                                <div class="col-sm-7">
                                    <div class="p-0 m-0">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Course:</b> {{ $offer->course }} <b>km</b>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="p-0 m-0">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Yearproduction:</b> {{ $offer->yearproduction }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="p-0 m-0">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Vehiclestatus:</b> {{ $offer->vehiclestatus->name }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <p class="card-text text-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                </svg>
                                {{ $offer->location }}
                            </p>

                            <div class="row">
                                <div class="col-sm-8 text-end p-0">
                                    <a href="{{ route('ShowOffer', ['id' => $offer->id]) }}">
                                        <button type="button" class="btn btn-sm btn-dark col-sm-10">Check</button>
                                    </a>
                                </div>


                                @if (in_array($offer->id, $idFavorits))
                                    <div class="col-sm-4 text-end p-0">
                                        <form action="{{ route('user.deletefavorite', ['id' => $offer->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-white border-0" role="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="red"
                                                    class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="col-sm-4 text-end p-0">
                                        <form action="{{ route('user.addfavorite', ['id' => $offer->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button class="bg-white border-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                    fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                                    <path
                                                        d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
    <div class="container-fluid bg-dark p-1 m-0 text-center">
        <div class="row p-0 m-0">
            <div class="col-sm-5"></div>
            <div class="col-sm"> {{ $offers->links('vendor.pagination.bootstrap-4') }}</div>
            <div class="col-sm-5"></div>
        </div>
    </div>

    </div>
    <!-- End Center -->

    <!-- Similar offers !-->
    {{-- <div class="card border-0">
        <h2 class="card-header text-center bg-dark text-white">Similar offers</h2>
        <div class="card-body p-0 m-0">
            <div class="row">
                @foreach ($Similar as $simil)
                    <div class="col-sm-2">
                        <div class="card">
                            <dvi class="card-body">
                                <img class="img-fluid rounded-3" src="{{ $simil->photo }}"
                                    style="height: 100px,width:100%;">
                                <h5 class="card-text text-center"><b>{{ $simil->carname }}</b></h5>
                                <p class="card-text h5 text-end">
                                    Price: <b>{{ $simil->price }}</b> zł
                                </p>
                                <p class="card-text text-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                    </svg>
                                    {{ $simil->location }}
                                </p>
                                <div>
                                    <button type="button" class="btn btn-sm btn-secondary">Check</button>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
