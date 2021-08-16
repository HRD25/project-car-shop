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
                                        <th scope="col">Slide</th>
                                        <th scope="col">Slide 2</th>
                                        <th scope="col">Slide 3</th>
                                        <th scope="col">Active</th>
                                        <th scope="col" class="text-center">Save</th>
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

                                                <td class="text-center">
                                                    <img src=" {{ $slider->photo }}" class="img-fluid rounded-pill"
                                                        style="height: 50px;width:100px">
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="Switch1" value="action" @if ($slider->status == 'action') checked @endif>
                                                        <label class="form-check-label" for="flexSwitch"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="Switch2" value="slide2" @if ($slider->status == 'slide2') checked @endif>
                                                        <label class="form-check-label" for="flexSwitch"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="Switch3" value="slide3" @if ($slider->status == 'slide3') checked @endif>
                                                        <label class="form-check-label" for="flexSwitch"></label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="SwitchActive" value="on" @if ($slider->active == 'on') checked @endif>
                                                        <label class="form-check-label" for="flexSwitch"></label>
                                                    </div>
                                                </td>

                                                <td class="text-center">
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
                                                </td>
                                            </form>

                                            <td>
                                                <button type="button" class="btn-sm bg-white border-0"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Delete
                                                </button>

                                                <!-- Start -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Post
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure,you want to delete this Post?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success text-white"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form
                                                                    action="{{ route('admin.deleteViewUser', ['id' => $slider->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger text-white">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h4 class="text-center mt-3">Add Photo to slider</h4>
                            <hr class="mb-2 mt-2">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Add</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <td>
                                                <input type="file" name="photo" />
                                            </td>
                                            <td>
                                                <button type="submit" class="btn-sm bg-white border-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-box-arrow-in-down"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z" />
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                    </svg>
                                                    Add
                                                </button>
                                            </td>
                                        </form>
                                        <td>
                                            <a href="{{ route('home') }}">
                                                <button type="button" class="btn btn-sm bg-white border-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
                                                    </svg>
                                                    View
                                                </button>
                                            </a>
                                        </td>
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
