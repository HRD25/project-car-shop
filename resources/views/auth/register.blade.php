@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header text-center bg-dark text-white">{{ __('Register') }}</h5>

                    <div class="card-body p-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row mt-1">
                                <div class="col-sm-3">
                                    @error('name')
                                        <div class="alert alert-danger p-0">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 text-center" style="display: flex">
                                    <label for="name">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-person-circle mt-2 me-2" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                    </label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <div class="col-sm-3">
                                    @error('email')
                                        <div class="alert alert-danger p-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 text-center" style="display: flex">
                                    <label for="email">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-envelope mt-2 me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                                        </svg>
                                    </label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="E-mail">
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <div class="col-sm-3">
                                    @error('password')
                                        <div class="alert alert-danger p-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6" style="display: flex">
                                    <label for="password">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-key mt-2 me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Password"
                                        value="{{ old('password') }}">
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <div class="col-sm-3"></div>

                                <div class="col-md-6" style="display: flex">
                                    <label for="password-confirm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-key-fill mt-2 me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                        </svg>
                                    </label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <div class="col-sm-3">
                                    @error('name')
                                        <div class="alert alert-danger p-0">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 text-center" style="display: flex">
                                    <label for="phoneNumber">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-telephone mt-2 me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                        </svg>
                                    </label>
                                    <input id="phoneNumber" type="tel"
                                        class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber"
                                        value="{{ old('phoneNumber') }}" placeholder="phoneNumber" maxlength="9">
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <div class="col-sm-5"></div>
                                <div class="col-md-6 text-center" style="display: flex">
                                    <div class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-gender-female" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                                        </svg>
                                        <input type="radio" value="women">
                                        <span>Women</span>
                                    </div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-gender-male" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                                        </svg>
                                        <input type="radio" value="man" checked><span>Man</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-4">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-dark col-sm-8 p-0">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
