@extends('admin.layouts.app')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Trips</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="orderList">

                            <div class="card-body pt-0">
                                @if (session('success'))
                                    <!-- Success Alert -->
                                    <div class="alert alert-success alert-border-left alert-dismissible fade show"
                                        role="alert">
                                        <i class="ri-check-double-line me-3 align-middle"></i> {{ session('success') }}

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>

                                    </div>
                                @endif

                                @if (session('failed'))
                                    <!-- Danger Alert -->
                                    <div class="alert alert-danger alert-border-left alert-dismissible fade show"
                                        role="alert">

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div>
                                    <ul class="nav nav-tabs nav-tabs-custom nav-primary mb-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active All py-3" data-bs-toggle="tab" id="All"
                                                href="#home1" role="tab" aria-selected="true">
                                                <i class="ri-store-2-fill me-1 align-bottom"></i> Matching Trips
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="table-responsive table-card mb-1">
                                        <table class="table table-nowrap align-middle" id="orderTable">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">

                                                    <th class=" text-center">Departing Time</th>
                                                    <th class=" text-center">Coach</th>
                                                    <th class=" text-center">From</th>
                                                    <th class=" text-center">To</th>
                                                    <th class=" text-center">Fare</th>
                                                    <th class=" text-center">Arrival Time</th>
                                                    <th class=" text-center">Available Seat</th>
                                                    {{-- <th class="" data-="status">Delivery Status</th> --}}
                                                    <th class="">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($trips as $trip)
                                                    <tr>
                                                        @php
                                                            $carbonDate = \Carbon\Carbon::parse($trip->departure_time);
                                                            $departure_date = $carbonDate->format('d/m/Y');
                                                            $departure_time = $carbonDate->format('h:i A');
                                                        @endphp


                                                        <td class="product_desc text-center" id="product-desc">
                                                            {{ $departure_time }}
                                                        </td>
                                                        <td class="product_desc text-center" id="product-desc">
                                                            {{ $trip->coach->name }}
                                                        </td>
                                                        <td class="product_desc text-center" id="product-desc">
                                                            {{-- @if ($trip->departure_location) --}}
                                                            {{ $trip->departureLocation->city }}
                                                            {{-- @endif --}}
                                                        </td>
                                                        <td class="product_desc text-center" id="product-desc">
                                                            {{-- @if ($trip->departure_location) --}}
                                                            {{ $trip->arrivalLocation->city }}
                                                            {{-- @endif --}}
                                                        </td>

                                                        <td class="price text-center" id="product-price">
                                                            ${{ $trip->fare }}</td>

                                                        @php
                                                            $carbonDate = \Carbon\Carbon::parse($trip->arrival_time);
                                                            $arrival_date = $carbonDate->format('d/M/Y');
                                                            $arrival_time = $carbonDate->format('h:i A');
                                                        @endphp
                                                        <td class="price text-center" id="product-discount">
                                                            {{ $arrival_time }}
                                                        </td>
                                                        <td class="price text-center" id="available-sit">
                                                            {{ $trip->availableTickets }}
                                                        </td>
                                                        <td>
                                                            <ul class="list-inline hstack gap-2 mb-0">

                                                                <li class="list-inline-item edit">
                                                                    @if ($trip->availableTickets > 0)
                                                                        <button
                                                                            onclick="passValue('{{ $trip->id }}', '{{ $trip->coach->id }}', '{{ $trip->departure_time }}')"
                                                                            class="text-primary d-inline-block btn btn-sm btn-primary text-white">
                                                                            Buy
                                                                        </button>
                                                                    @else
                                                                        <button
                                                                            class="text-primary d-inline-block btn btn-sm btn-primary text-white"
                                                                            disabled>
                                                                            Buy
                                                                        </button>
                                                                    @endif

                                                                </li>

                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        @if ($trips->isEmpty())
                                            <div class="noresult" style="display: block">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                        colors="primary:#25a0e2,secondary:#0ab39c"
                                                        style="width:75px;height:75px">
                                                    </lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted">We couldn't found any matches trip.</p>
                                                </div>
                                            </div>
                                        @endif

                                    </div>

                                </div>

                                <div class="modal" id="userDefinedModal" tabindex="-1" role="dialog"
                                    aria-labelledby="userDefinedModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="userDefinedModalLabel">Number of sit</h5>
                                                <button type="button" class="close" onclick="closeModal()"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <!-- Modal Body -->
                                            <form action="{{ route('admin.buyTicket') }}" method="post"
                                                onsubmit="return validateAndSubmit()">
                                                @csrf
                                                <div class="modal-body">
                                                    <input id="trip-id" type="hidden" value="" name="trip_id">
                                                    <input id="coach-id" type="hidden" value="" name="coach_id">
                                                    <input id="journey-date" type="hidden" value=""
                                                        name="journeyDate">
                                                    {{-- <input type="datetime" name="journeyDate" id="journey-date"
                                                        style="display: none" value> --}}

                                                    <div class="mb-3">
                                                        <label for="quantity" class="form-label">Quantity</label>
                                                        <input type="number" name="quantity" class="form-control"
                                                            id="quantity" placeholder="Number of ticket" min="1"
                                                            value="1" max="8">
                                                        <p class="text-danger" id="error"></p>
                                                    </div>
                                                </div>

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        onclick="closeModal()">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                {{-- @include('admin.components.delete_modal') --}}
                            </div>
                        </div>

                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('admin.components.footer')
    </div>
    <!-- end main content-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <script>
        function passValue(tripId, coachId, journeyDate) {
            // alert(value);
            console.log(tripId);
            console.log(coachId);
            console.log(journeyDate);

            $('#trip-id').val(tripId);
            $('#coach-id').val(coachId);
            $('#journey-date').val(journeyDate);


            $('#userDefinedModal').modal('show');
        }

        function closeModal() {
            $('#userDefinedModal').modal('hide');
        }

        function validateAndSubmit() {
            var availableSit = parseInt(document.getElementById('available-sit').innerText);
            var quantity = parseInt(document.getElementById('quantity').value);

            // alert(quantity);
            if (quantity > availableSit) {
                document.getElementById('error').innerText = 'Quantity exceeds available sit.';
                // alert('Quantity exceeds available sit. Please select a lower quantity.');
                return false;
            } else {
                return true;
            }
            // return false;
        }
    </script>
    <script></script>
@endsection
