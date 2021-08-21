@extends('layouts.app')

@section('content')
    <div class="row mt-1">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header bg-dark text-white p-0 m-0">
                    <div class="row p-0 m-0">
                        <div class="col-sm-3 text-start mt-3 ms-2 ps-2">
                            <a href="{{ route('home') }}">
                                <button type="button" class="btn-close btn-close-white" aria-label="Close">
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-6 text-center">
                            <h1>My Offers</h1>
                        </div>

                        <div class="col-sm text-end mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-stickies" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                <path
                                    d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                            </svg>
                            <span>{{ count($offers) }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 ps-2 pb-0 m-0">
                    <div class="row">
                        @foreach ($offers as $offer)
                            <div class="col-sm-3 p-1">
                                <div class="card">
                                    <div class="card-body p-0 border border-dark rounded-3">
                                        <img class="img-fluid" src="{{ $offer->photo }}"
                                            style="height: 100px,width:100%;">
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
                                                            <b>Yearproduction:</b>
                                                            {{ $offer->yearproduction }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="p-0 m-0">
                                                    <ul class="list-group">
                                                        <li class="list-group-item p-0">
                                                            <b>Vehiclestatus:</b>
                                                            {{ $offer->vehiclestatus->name }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-text text-start">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                            </svg>
                                            {{ $offer->location }}
                                        </p>
                                        <div class="row">
                                            <div class="col-sm-8 text-center  p-0">
                                                <a href="{{ route('ShowOffer', ['id' => $offer->id]) }}">
                                                    <button type="button"
                                                        class="btn btn-sm btn-dark col-sm-8">Check</button>
                                                </a>
                                            </div>

                                            <div class="col-sm-4 text-end p-0">
                                                <button class="bg-white border-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                        fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2"></div>
    </div>
@endsection
