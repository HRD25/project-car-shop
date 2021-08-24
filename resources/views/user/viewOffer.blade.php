@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($offers as $offer)
                <div class="col-sm-3"></div>
                <div class="col-sm-6 ">
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
                                        <td>{{ $offer->drive }}</td>
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

                    <div class="card mt-3 mb-3 border border-dark">
                        <div class="card-header bg-dark text-center text-white p-0 m-0">
                            <div class="row p-0">
                                <div class="col-sm-4"></div>

                                <div class="col-sm-4 text-center h3">Message</div>

                                <div class="col-sm-3 text-end me-1 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                                    </svg>
                                </div>
                            </div>

                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('user.email') }}" method="GET">
                                @csrf
                                <div class="form-group col-sm-10">
                                    <div class="row mt-2">
                                        <div class="col-sm-2">
                                            <label class="h5 ms-1" for="title">Title:</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="col-sm-7 form-control" type="text" id="title" name="title">
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                </div>

                                <div class="mt-2 form-group col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-2 mt-5">
                                            <label class="h5 ms-1" for="message">Contents:</label>
                                        </div>
                                        <div class="col-sm-10 mt-2">
                                            <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 mt-4">
                                    <button type="submit" class="btn btn-sm btn-dark col-sm-10">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
    @endforeach
    </div>
    </div>
@endsection
