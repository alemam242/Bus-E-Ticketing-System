@extends('user.layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                        <div class="flex-grow-1">
                                            <h4 class="fs-16 mb-1">Welcome, {{ Session::get('admin')['username'] }}!</h4>
                                            <p class="text-muted mb-0">
                                                Enjoy your journey
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end card header -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                            <div class="row">
                                <div class="col-xl-6 col-md-6 mx-auto">
                                    <!-- card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="my-form" method="POST" action="{{ route('user.trip') }}"
                                                onsubmit="return validateAndSubmit()">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="productname-field" class="form-label">From</label>
                                                    <select class="form-control" data-trigger id="start" name="from"
                                                        id="from-city" required>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('from')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="productname-field" class="form-label">To</label>
                                                    <select class="form-control" data-trigger id="to-city" name="to"
                                                        required>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('to')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date" class="form-label">Date</label>
                                                    <input type="date" name="date" class="form-control" id="date"
                                                        placeholder="Select Date" value="{{ date('m-d-y') }}" required>
                                                    @error('date')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Search</button>
                                                </div>

                                            </form>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>

                                </div>
                                <!-- end row-->

                            </div>
                            <!-- end .h-100-->
                        </div>
                        <!-- end col -->

                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('user.components.footer')
        </div>
        <!-- end main content-->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            function validateAndSubmit() {
                var fromCity = $('#from-city').val();
                var toCity = $('#to-city').val();
                var selectedDate = new Date($('#date').val());
                var currentDate = new Date();

                selectedDate.setHours(0, 0, 0, 0);
                currentDate.setHours(0, 0, 0, 0);

                console.log(selectedDate);
                console.log(currentDate);

                if (fromCity === toCity) {
                    alert('Select a different city');
                    return false;
                } else if (selectedDate < currentDate) {
                    alert('You have selected a previous date');
                    return false;
                }

                return true;
            }
        </script>
    @endsection
