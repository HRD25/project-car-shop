@extends('admin.home')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <h4 class="card-header text-center bg-dark text-white">User</h4>
                        <div class="card-body">
                            <h5 class="text-center">Slider Home</h5>
                            <hr class="mt-2 mb-2">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Photo active</th>
                                        <th scope="col" class="text-center">Photo</th>
                                        <th scope="col" class="text-center">Photo</th>
                                        <th scope="col" colspan="4" class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($sliders as $slider)
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                                                  </div>
                                                <div class="custom-control custom-switch mb-2">
                                                    <img src=" {{ $slider->photo1 }}" class="img-fluid"
                                                        style="height: 80px;width:120px">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                        value="">
                                                    <label class="custom-control-label" for="customSwitch3"></label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="custom-control custom-switch mb-2">
                                                    <img src=" {{ $slider->photo2 }}" class="img-fluid"
                                                        style="height: 80px;width:120px">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch4"
                                                        value="">
                                                    <label class="custom-control-label" for="customSwitch4"></label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="custom-control custom-switch mb-2">
                                                    <img src=" {{ $slider->photo3 }}" class="img-fluid"
                                                        style="height: 80px;width:120px">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch5"
                                                        value="">
                                                    <label class="custom-control-label" for="customSwitch5"></label>
                                                </div>
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.deleteOffer', ['id' => $slider->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-white border-0 mr-3" type="submit"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                        </svg>
                                                        delete
                                                    </button>
                                                </form>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <h4 class="card-header text-center bg-dark text-white">Admin</h4>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Day</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">Day</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
