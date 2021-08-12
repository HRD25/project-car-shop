@extends('admin.home')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body text-center">
                <form>
                    <div class="row">

                        <input type="text" placeholder="carname" name="carname">
                        <input type="text" placeholder="carmodel">
                        <input type="number" placeholder="course">
                        <input type="date" placeholder="yearproduction">

                        <select class="form-select" aria-label="Default select example">
                            <option selected value="0">Select vehiclestatus</option>
                            <option value="bezwypadkowy">bezwypadkowy</option>
                            <option value="wypadkowy">wypadkowy</option>
                            <option value="uszkodzony">uszkodzony</option>
                        </select>

                        <input type="text" placeholder="engine">

                        <select class="form-select" aria-label="Default select example">
                            <option selected value="0">Select Drive</option>
                            <option value="Przod">Przod</option>
                            <option value="Tyl">Tyl</option>
                            <option value="4">Na 4</option>
                        </select>

                        <input type="text" placeholder="country">

                        <select class="form-select" aria-label="Default select example">
                            <option selected value="0">Select steeringwheel</option>
                            <option value="lewa">Po lewej</option>
                            <option value="prawa">Po prawej</option>
                        </select>

                        <input type="text" placeholder="location">
                        <textarea type="text" placeholder="description"></textarea>
                        <input type="number" placeholder="price">
                        <div class="col-sm-">
                            <input class="form-control form-control-sm" name="photos" type="file">
                        </div>

                        <select class="form-select" aria-label="Default select example">
                            <option selected value="0">Select Body Type</option>
                            <option value="pb">Paliwo</option>
                            <option value="pbg">Paliwo+Gaz</option>
                            <option value="on">Diesel</option>
                        </select>
                        <select class="form-select" aria-label="Default select example">
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
                    <div class="text-center">
                        <button class="btn-sm bg-primary">Wyslij</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
