@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-sm-6">
                <form action="{{ route('user.sendOffer') }}" method="POST">
                    @csrf
                    <div class="card border border-dark">
                        <div class="card-body p-0">
                            <div class="container-fluid text-center p-0 m-0">
                                <img id="uploadPreview" style="height: 400px; width:100%;" class="img-fluid bg-secondary">
                            </div>
                            <div class="container">
                                <div class="row mt-3">
                                    <div class="col-sm-3 text-center">
                                        <input id="uploadPhoto" type="file" style="display: none" name="photo"
                                            onchange="PreviewImage();">
                                        <button type="button" value="" class="btn-sm btn-dark border-0 col-sm-9"
                                            onclick="document.getElementById('uploadPhoto').click();">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                <path
                                                    d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="col-sm-5">
                                        <h4 class="text-center">
                                            <input type="text" name="carname" placeholder="CarName"
                                                value="{{ old('carname') }}"
                                                class="@error('carname') is-invalid @enderror text-center border-dark border-1 rounded">
                                        </h4>
                                    </div>

                                    <div class="col-sm-4">
                                        <h5 class="text-end mb-0">Price: <input type="number" value="{{ old('price') }}"
                                                class="@error('price') is-invalid @enderror col-sm-7 border-dark border-1 rounded"
                                                name="price">zł
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        @error('photo')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 text-center">
                                        @error('carname')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 text-center">
                                        @error('price')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0 text-center bg-dark text-white ">
                                                <b>Yearproduct</b>
                                            </li>
                                            <li class="list-group-item p-0">
                                                <input type="month" min="1850" maxlength="4" name="yearproduction"
                                                    value="{{ old('yearproduction') }}"
                                                    class="@error('yearproduction') is-invalid @enderror text-center col-sm-12 p-0 m-0">
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-6">
                                        <ul class="list-group">
                                            <li class="list-group-item p-0 text-center bg-dark text-white">
                                                <b>Course in km</b>
                                            </li>
                                            <li class="list-group-item p-0">
                                                <input type="number" name="course" value="{{ old('course') }}"
                                                    class="@error('course') is-invalid @enderror text-center col-sm-12 p-0 m-0">
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        @error('yearproduction')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 text-center p-0">
                                        @error('course')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <ul class="list-group text-center">
                                            <li class="list-group-item p-0 bg-dark text-white">
                                                <b>SteeringWheel</b>
                                            </li>
                                            <li class="list-group-item p-0">
                                                <select class="form-select form-select-sm " name="steeringwheel">
                                                    @foreach ($additives['steeringwheel'] as $steeringwheels)
                                                        <option value="{{ $steeringwheels->id }}">
                                                            {{ $steeringwheels->name }}</option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-4">
                                        <ul class="list-group text-center">
                                            <li class="list-group-item p-0 bg-dark text-white">
                                                <b>VehicleStatus</b>
                                            </li>
                                            <li class="list-group-item p-0">
                                                <select class="form-select form-select-sm" name="vehiclestatu">
                                                    @foreach ($additives['vehiclestatu'] as $vehiclestatus)
                                                        <option value="{{ $vehiclestatus->id }}">
                                                            {{ $vehiclestatus->name }}</option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-4">
                                        <ul class="list-group text-center">
                                            <li class="list-group-item p-0 text-center bg-dark text-white">
                                                <b>Fueltype</b>
                                            </li>
                                            <li class="list-group-item p-0">
                                                <select class="form-select form-select-sm" name="fueltype">
                                                    @foreach ($additives['fueltype'] as $fueltyp)
                                                        <option value="{{ $fueltyp->id }}">
                                                            {{ $fueltyp->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        @error('steeringwheel')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        @error('vehiclestatu')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        @error('fueltype')
                                            <div class="alert alert-danger p-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-sm btn-success text-white col-sm-5">Create
                            </button>
                        </div>
                    </div>
            </div>

            <div class="col-sm-6">
                <div class="card border border-dark mt-3">
                    <div class="card-body">
                        <h3 class="text-center"><b>Description</b></h3>
                        @error('description')
                            <div class="alert alert-danger p-0">{{ $message }}</div>
                        @enderror
                        <hr class="mt-1 mb-2">
                        <h5 class="card-text">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                rows="10" placeholder="Your description">{{ old('description') }}</textarea>
                        </h5>
                        <h3 class="text-center mt-3"><b>Information to Car</b></h3>
                        @error('location')
                            <div class="alert alert-danger p-0">{{ $message }}</div>
                        @enderror
                        <hr class="mt-1">
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col" class="text-center">Location</th>
                                        <th scope="col" class="text-center">Model</th>
                                        <th scope="col" class="text-center">BodyType</th>
                                        <th scope="col" class="text-center">Additionalequipment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-0 m-0">
                                            <input type="text" placeholder="location" value="{{ old('location') }}"
                                                class="col-sm-12 p-1 text-center  @error('location') is-invalid @enderror"
                                                name="location">
                                        </td>
                                        <td class="p-0 m-0">
                                            <select class="form-select" name="carmodel">
                                                @foreach ($additives['carmodels'] as $carmodel)
                                                    <option value="{{ $carmodel->id }}">{{ $carmodel->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-0 m-0">
                                            <select class="form-select" name="bodytype">
                                                @foreach ($additives['bodytypes'] as $bodytype)
                                                    <option value="{{ $bodytype->id }}">{{ $bodytype->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-0 m-0 border-0">
                                            <select class="form-select" name="equipment">
                                                @foreach ($additives['equipments'] as $equipment)
                                                    <option value="{{ $equipment->id }}">{{ $equipment->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th scope="col" class="text-center">Engine</th>
                                        <th scope="col" class="text-center">Country</th>
                                        <th scope="col" class="text-center">Drive</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-0 m-0">
                                            <select class="form-select" name="engine">
                                                @foreach ($additives['engines'] as $engine)
                                                    <option value="{{ $engine->id }}">{{ $engine->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-0 m-0">
                                            <select class="form-select" name="country">
                                                @foreach ($additives['countrys'] as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="p-0 m-0">
                                            <select class="form-select" name="drive">
                                                @foreach ($additives['drives'] as $drive)
                                                    <option value="{{ $drive->id }}">{{ $drive->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
