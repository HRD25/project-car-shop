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
        <div class="card-body bg-dark">
            <form action="/" method="POST">
                <div class="row">
                    <!-- Start Button -->
                    <div class="col-sm-6 p-0 m-0">
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Bodytypes
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><input type="text"></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            CarModel
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><input type="text"></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                            <li><a class="dropdown-item" href="#">Menu item</a></li>
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Fueltype
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a href="#" class="btn btn-white" role="button" data-bs-toggle="button">Toggle link</a>
                            </li>
                            <li><a href="#" class="btn btn-white" role="button" data-bs-toggle="button">Toggle link</a>
                            </li>
                            <li><a href="#" class="btn btn-white" role="button" data-bs-toggle="button">Toggle link</a>
                            </li>
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Course
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            <li><input type="number" name="course-od" placeholder="Of .. Km"></li>
                            <li><input type="number" name="course-do" placeholder="To .. Km"></li>
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Engine
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            <li><input class="form-check-input" type="checkbox" value="1.0" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    1.0
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="checkbox" value="2.0" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    2.0
                                </label>
                            </li>
                        </ul>
                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Steeringwheel
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            <li>
                                <input class="form-check-input" type="checkbox" value="2.0" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    2.0
                                </label>
                            </li>
                            <li>
                                <input class="form-check-input" type="checkbox" value="2.0" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    2.0
                                </label>
                            </li>
                        </ul>

                        <button class="btn btn-secondary dropdown-toggle btn-sm rounded-pill" type="button"
                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            Price
                        </button>
                        <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton">
                            <li>
                                <input type="number" name="price-od" placeholder="Of money">
                            </li>
                            <li>
                                <input type="number" name="price-do" placeholder="To money">
                            </li>
                        </ul>
                        <!-- End Button -->
                    </div>
                    <div class="col-sm-6 text-end">
                        <input type="text" name="carname" class="col-sm-6 text-center rounded-pill" placeholder="Carname">
                        <button class="btn-sm btn-primary text-white rounded-pill border-0">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Search offert !-->

    <!-- Center -->
    <div class="card p-0 m-0">
        <div class="card-body">
            <div class="row">
                @foreach ($offers as $offer)
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-body">
                                <img class="img-fluid rounded-3" src="{{ $offer->photo }}" style="height: 100px,width:100%;">
                                <h5 class="card-text text-center"><b>{{ $offer->carname }}</b></h5>
                                <p class="card-text h5 text-end">
                                    Price: <b>{{ $offer->price }}</b> zł
                                </p>
                                <p class="card-text text-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                    </svg>
                                    {{ $offer->location }}
                                </p>
                                <div>
                                    <button type="button" class="btn btn-sm btn-secondary">Check</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Center -->

    <!-- Similar offers !-->
    <div class="card border-0">
        <h2 class="card-header text-center bg-dark text-white">Similar offers</h2>
        <div class="card-body p-0 m-0">
            <h1 class="text-center">Similar Offers</h1>
        </div>
    </div>
@endsection
