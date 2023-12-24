@extends('admin.layouts.auth')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    @if (session('failed'))
                        <!-- Danger Alert -->
                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                            <i class="ri-error-warning-line me-3 align-middle"></i> {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign in to continue to Store-Keeper.</p>
                    </div>
                    <div class="p-2 mt-4">
                        @php
                            $currentRouteName = request()
                                ->route()
                                ->getName();
                        @endphp
                        <form method="POST" action="{{ route($currentRouteName) }}">

                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter email">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="float-end">
                                    <a href="#" class="text-muted">Forgot
                                        password?</a>
                                </div>
                                <label class="form-label" for="password-input">Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" name="password" class="form-control pe-5 password-input"
                                        placeholder="Enter password" id="password-input">
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>

                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                <label class="form-check-label" for="auth-remember-check">Remember
                                    me</label>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Sign In</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            {{-- @if ($currentRouteName == 'user.login') --}}
            <div class="mt-4 text-center">
                <p class="mb-0">Don't have an account ? <a href="{{ route('admin.signup') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
            </div>
            {{-- @endif --}}

        </div>
    </div>
@endsection
