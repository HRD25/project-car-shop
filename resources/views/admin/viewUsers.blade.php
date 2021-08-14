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
                                        <th scope="col">Photo</th>
                                        <th scope="col">Save</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <form action="{{ route('admin.updateView', ['id' => $slider->id]) }}"
                                                method="POST">
                                                @method('PATCH')
                                                @csrf
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <img src=" {{ $slider->photo }}" class="img-fluid"
                                                            style="height: 80px;width:120px">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="SwitchStatus" value="on" @if ($slider->status == 'on') checked @endif>
                                                        <label class="form-check-label" for="flexSwitch"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="submit" class="bg-white border-0 ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-check-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                                        </svg>
                                                        Save
                                                    </button>
                                            </form>
                                            </td>

                                            <td>
                                                <form action="{{ route('admin.deleteOffer', ['id' => $slider->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-white border-0 " type="submit"><svg
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
                                        </tr>
                                    @endforeach
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
                                            <td>
                                                FORMULARZ DODAJACY
                                            </td>
                                        </tbody>
                                    </table>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
