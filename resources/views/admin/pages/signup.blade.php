@extends('admin.layouts.auth')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6 col-xl-5">

            <div class="card mt-4">

                <div class="card-body p-4">

                    @if (session('success'))
                        <!-- Success Alert -->
                        <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
                            <i class="ri-check-double-line me-3 align-middle"></i> {{ session('success') }} <a
                                href="{{ route('admin.login') }}" class="alert-link">Login</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif

                    @if (session('failed'))
                        <!-- Danger Alert -->
                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                            <i class="ri-error-warning-line me-3 align-middle"></i> {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="text-center mt-2">
                        <h5 class="text-primary">Create New Account</h5>
                        <p class="text-muted">Get your free Store-Keeper account now</p>
                    </div>
                    <div class="p-2 mt-4">


                        <form class="needs-validation" novalidate method="POST" action="{{ route('admin.signup') }}">

                            @csrf

                            <div class="mb-3">
                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Enter username" required>
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" id="useremail"
                                    placeholder="Enter email address" required>

                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" id="phone"
                                    placeholder="Phone Number" required>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password-input">Password</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" name="password" class="form-control pe-5 password-input"
                                        onpaste="return false" placeholder="Enter password" id="password-input"
                                        aria-describedby="passwordInput" required>
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Sign Up</button>
                            </div>

                        </form>

                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Already have an account ? <a href="{{ route('admin.login') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
            </div>

        </div>
    </div>
@endsection
