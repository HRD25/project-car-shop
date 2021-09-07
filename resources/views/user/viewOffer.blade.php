@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-8">
                <div class="card border border-dark">
                    <div class="card-body p-0">
                        <div class="container-fluid text-center p-0">
                            <img src="{{ $offer->photo }}" class="img-fluid" style="width: 100%">
                        </div>
                        <div class="text mt-3">
                            <h2 class="text-center"><b>{{ $offer->carname }}</b></h2>
                            <h3 class="text-end mb-0">Price: <b>{{ $offer->price }}</b> zł</h3>
                            <hr class="mt-0 mb-2">
                            <div>
                                <div class="d-flex flex-row">
                                    <div class="p-1">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Fueltype:</b> {{ $offer->fueltypes->name }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-1">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Course:</b> {{ $offer->course }} km
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-1">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Yearproduction:</b> {{ $offer->yearproduction }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-1">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Vehiclestatus:</b> {{ $offer->vehiclestatus->name }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex flex-row">
                                    <div class="p-1">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0">
                                                <b>Steeringwheel:</b> {{ $offer->steeringwheels->name }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            Created: <b>{{ $offer->created_at }}</b>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <a href="{{ route('home') }}">
                                    <button type="button" class="btn btn-sm btn-dark col-sm-10">Back
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-6 text-end">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3 border border-dark">
                    <div class="card-body">
                        <h3 class="text-center"><b>Description</b></h3>
                        <hr class="mt-1">
                        <h5 class="card-text">{{ $offer->description }}</h5>
                        <h3 class="text-center mt-4"><b>Information to Car</b></h3>
                        <hr class="mt-1">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Carname</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">BodyType</th>
                                        <th scope="col">Fueltype</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Yearproduction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $offer->carname }}</td>
                                    <td>{{ $offer->carmodels->name }}</td>
                                    <td>{{ $offer->bodytypes->name }}</td>
                                    <td>{{ $offer->fueltypes->name }}</td>
                                    <td>{{ $offer->course }}</td>
                                    <td>{{ $offer->yearproduction }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Vehiclestatus</th>
                                        <th scope="col">Engine</th>
                                        <th scope="col">Drive</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Steeringwheel</th>
                                        <th scope="col">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $offer->vehiclestatus->name }}</td>
                                    <td>{{ $offer->engines->name }}</td>
                                    <td>{{ $offer->drives->name }}</td>
                                    <td>{{ $offer->countrys->name }}</td>
                                    <td>{{ $offer->steeringwheels->name }}</td>
                                    <td>{{ $offer->location }}</td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Additionalequipment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $offer->equipments->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 UserIsOffer">
                <div class="card">
                    <div class="card-body p-0 ">
                        <div class="text-center">
                            <img src="{{ asset('/storage/' . $offer->Users->avatar) }}" class="img-fluid rounded-circle"
                                style="width: 50%; height:50%;">
                        </div>
                        <hr class="mb-1 mt-2">
                        <div class="text-center m-0 p-0 ">
                            <h3><b>{{ $offer->Users->name }}</b></h3>
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-sm btn-dark col-sm-12" onclick="ShowSendMessage()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                    </svg>
                                    <span>Message</span>
                                </button>
                            </div>

                            <div class="col-sm-6">
                                <button class="btn btn-sm btn-dark col-sm-12" id="NumerPhone" onclick="ShowNumberPhone()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg>
                                    <span>Number</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="Message" id="Message">
                            <input type="text" id="messageOffer" name="message" class="col-sm"
                                placeholder="Message.." />
                            <button class="btn-sm btn-dark border-0 col-sm-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-cursor" viewBox="0 0 16 16">
                                    <path
                                        d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103zM2.25 8.184l3.897 1.67a.5.5 0 0 1 .262.263l1.67 3.897L12.743 3.52 2.25 8.184z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="phoneNumber" id="phoneNumber">
                        <div class="bg-dark">
                            <span>600-100-100</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row slider">
                @foreach ($suggestions as $suggestion)
                    <div class="col-sm-10">
                        <div class="col-sm-11">
                            <div class="card">
                                <div class="card-body p-0 border border-dark rounded-3">
                                    <img class="img-fluid" src="{{ $suggestion->photo }}"
                                        style="height: 100px,width:100%;">
                                    <h5 class="card-text text-center"><b>{{ $suggestion->carname }}</b>
                                    </h5>
                                    <p class="card-text h5 text-end">
                                        Price: <b>{{ $suggestion->price }}</b> $
                                    </p>
                                    <div class="row mb-1">
                                        <div class="col-sm-7">
                                            <div class="p-0 m-0">
                                                <ul class="list-group">
                                                    <li class="list-group-item p-0">
                                                        <b>Course:</b> {{ $suggestion->course }}
                                                        <b>km</b>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="p-0 m-0">
                                                <ul class="list-group">
                                                    <li class="list-group-item p-0">
                                                        <b>Yearproduction:</b>
                                                        {{ $suggestion->yearproduction }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="p-0 m-0">
                                                <ul class="list-group">
                                                    <li class="list-group-item p-0">
                                                        <b>Vehiclestatus:</b>
                                                        {{ $suggestion->vehiclestatus->name }}
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
                                        {{ $suggestion->location }}
                                    </p>

                                    <div class="row">
                                        <div class="col-sm-8 text-end p-0">
                                            <a href="{{ route('ShowOffer', ['id' => $suggestion->id]) }}">
                                                <button type="button" class="btn btn-sm btn-dark col-sm-10">Check</button>
                                            </a>
                                        </div>

                                        @if (in_array($suggestion->id, $idFavorits))
                                            <div class="col-sm-4 text-end p-0">
                                                <form
                                                    action="{{ route('user.deletefavorite', ['id' => $suggestion->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-white border-0" role="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                            fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="col-sm-4 text-end p-0">
                                                <form action="{{ route('user.addfavorite', ['id' => $suggestion->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="bg-white border-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                            fill="currentColor" class="bi bi-suit-heart"
                                                            viewBox="0 0 16 16">
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
