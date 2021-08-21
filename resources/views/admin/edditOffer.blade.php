@extends('admin.home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <div class="img text-center">
                            <img src="{{ $offer->photo }}" class="img-fluid">
                        </div>
                        <div class="text mt-3">
                            <h3 class="text-center">
                                Title: <b><input type="text" value="{{ $offer->carname }}"></b>
                            </h3>
                            <h4 class="text-right">
                                Price:
                                <input type="text" value="{{ $offer->price }}"> zł
                            </h4>
                            <hr class="mt-2 mb-2">
                            <div>
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Fueltype:</b>
                                                <input type="text" value="{{ $offer->fueltypes->name }}">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-2">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Course:</b>
                                                <input type="text" value="{{ $offer->course }}"> km
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-2">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Yearproduction:</b>
                                                <input type="text" value="{{ $offer->yearproduction }}">
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Steeringwheel:</b><input type="text"
                                                    value="{{ $offer->steeringwheels->name }}">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-2">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Vehiclestatus:</b>
                                                <input type="text" value="{{ $offer->vehiclestatus->name }}">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            Created: <b>{{ $offer->created_at }}</b>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('admin.dashboard') }}">
                                <button type="button" class="btn btn-outline-dark col-sm-3">Back
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h3 class="text-center"><b>Description</b></h3>
                        <hr class="mt-1">
                        <h5 class="card-text text-center"><textarea type="text" rows="auto" cols="auto"
                                class="responsive">{{ $offer->description }}</textarea></h5>
                        <h3 class="text-center mt-4"><b>Information to Car</b></h3>
                        <hr class="mt-1">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered ">
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

                                    <td><input type="text" value="{{ $offer->carname }}"></td>
                                    <td><input type="text" value="{{ $offer->carmodels->name }}"></td>
                                    <td><input type="text" value="{{ $offer->bodytypes->name }}"></td>
                                    <td><input type="text" value="{{ $offer->fueltypes->name }}"></td>
                                    <td><input type="text" value="{{ $offer->course }}"></td>
                                    <td><input type="text" value="{{ $offer->yearproduction }}"></td>
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
                                    <td><input type="text" value="{{ $offer->vehiclestatus->name }}"></td>
                                    <td><input type="text" value="{{ $offer->engines->name }}"></td>
                                    <td><input type="text" value="{{ $offer->drive }}"></td>
                                    <td><input type="text" value="{{ $offer->countrys->name }}"></td>
                                    <td><input type="text" value="{{ $offer->steeringwheels->name }}"></td>
                                    <td><input type="text" value="{{ $offer->location }}"></td>
                                    </tr>
                                </tbody>
                                <thead>
                                    <tr>
                                        <th scope="col">Additionalequipment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td><input type="text" value="{{ $offer->equipments->name }}"></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
@endsection
