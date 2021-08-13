@extends('admin.home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="#" method="POST">
                    <div class="card border-dark mt-3 text-center">
                        <h3 class="card-header bg-dark text-white">ADD OFFER</h3>
                        <div class="card-body>">
                            <div class="row mt-3">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <h5 class="text-center"><b>Photo section</b>
                                        <hr class="mt-2 mb-2">
                                    </h5>
                                    <input class="form-control form-control-sm" name="photos" type="file">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <h5 class="text-center"><b>Car Section</b>
                                        <hr class="mt-2 mb-2">
                                    </h5>
                                    <span>CarName: </span><input type="text" placeholder="carname" name="carname">
                                    <span>CarModel: </span><input type="text" placeholder="carmodel">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <span>CarPrice: </span><input type="number" placeholder="price">
                                    <span>CarCourse: </span><input type="number" placeholder="course">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <span>CarCountry: </span><input type="text" placeholder="country">
                                    <span>CarLocation: </span><input type="text" placeholder="location">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <span>CarYearproduction: </span><input type="date" placeholder="yearproduction">
                                    <span>CarEngine: </span><input type="text" placeholder="engine">
                                </div>
                                <div class="col-sm-4"></div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <h5 class="text-center"><b>Info Section</b>
                                        <hr class="mt-2 mb-2">
                                    </h5>
                                    <select class="form-select mr-1" aria-label="Default select example">
                                        <option selected value="0">Select vehiclestatus</option>
                                        <option value="bezwypadkowy">bezwypadkowy</option>
                                        <option value="wypadkowy">wypadkowy</option>
                                        <option value="uszkodzony">uszkodzony</option>
                                    </select>
                                    <select class="form-select mr-1" aria-label="Default select example">
                                        <option selected value="0">Select Drive</option>
                                        <option value="Przod">Przod</option>
                                        <option value="Tyl">Tyl</option>
                                        <option value="4">Na 4</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected value="0">Select steeringwheel</option>
                                        <option value="lewa">Po lewej</option>
                                        <option value="prawa">Po prawej</option>
                                    </select>

                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <select class="form-select mr-1" aria-label="Default select example">
                                        <option selected value="0">Select Body Type</option>
                                        <option value="pb">Paliwo</option>
                                        <option value="pbg">Paliwo+Gaz</option>
                                        <option value="on">Diesel</option>
                                    </select>
                                    <select class="form-select mr-1" aria-label="Default select example">
                                        <option selected value="0">Select Fueltyp</option>
                                        <option value="pb">Paliwo</option>
                                        <option value="pbg">Paliwo+Gaz</option>
                                        <option value="on">Diesel</option>
                                    </select>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected value="0">Select Additionalequipment</option>
                                        <option value="pb">Paliwo</option>
                                        <option value="pbg">Paliwo+Gaz</option>
                                        <option value="on">Diesel</option>
                                    </select>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <textarea type="text" placeholder="description" class="col-sm-8" rows="5"></textarea>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8 mb-2">
                                    <button type="button" class="btn btn-outline-success btn-sm col-sm-7">Send</button>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
@endsection
