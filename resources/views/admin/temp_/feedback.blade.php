@extends('layouts.master')
@section('title')
    Gallery Add
@endsection

@section('page-title')
    Gallery Add
@endsection
@section('body')

    <body data-layout="horizontal">
    @endsection
    @section('content')
        <input type="hidden" value="{{ json_encode($dist) }}" class="dist_">
        <div class="row mt-4">
            @if (session('success'))
                <script>
                    alert('{{ session('success') }}');
                </script>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center text-primary m-0">SHELTER HOME GRIVANCE REDRESSAL APPLICATION
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 mt-xl-0">
                            <form class="mb-4" action="{{ url()->current() }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input required type="text" class="form-control" name="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input required type="text" class="form-control" name="Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Age</label>
                                            <input required type="number" class="form-control" name="Age">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mobile No.</label>
                                            <input required type="text" class="form-control" name="Mobile">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email Id.</label>
                                            <input required type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input required type="date" class="form-control" name="Date">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">PURPOSE OF VISIT:</label>
                                            <input required type="text" class="form-control" name="pov">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h3 class="card-title text-center text-primary m-0">SHELTER HOME FEEDBACK/GRIEVANCES:</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">District Name :</label>
                                            <select class="form-select dist" name="dist" required>
                                                <option selected="selected" value="">All District</option>
                                                @foreach ($dist as $key => $item)
                                                    <option class="text-capitalize" value="{{ $key }}">
                                                        {{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">ULB Name :</label>
                                            <select class="form-select ulbs" name="ulbs" required>
                                                <option selected="selected" value="">All ULBs</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Location Name</label>
                                            <select class="form-select location" name="location" required>
                                                <option selected="selected" value="">All location</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">FEEDBACK/GRIEVANCES TYPE</label>
                                            <select class="form-select" name="feedback" required>
                                                <option selected="selected" value="COMMENT">COMMENT</option>
                                                <option value="COMPLAINT">COMPLAINT</option>
                                                <option value="ANY OTHER ISSUES">ANY OTHER ISSUES</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 compl d-none">
                                        <div class="mb-3">
                                            <label class="form-label">Enter Complaint</label>
                                            <textarea name="compl" class="form-control" rows="6"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h3 class="card-title text-center text-primary m-0">SPECIFY THE RANKING (CLEANLINESS):
                                </h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">OUTSIDE THE SHELTER HOME</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="otsh"
                                                    value="BEST" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    BEST
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="otsh"
                                                    value="GOOD">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="otsh"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="otsh"
                                                    value="POOR">
                                                <label class="form-check-label" for="formRadios1">
                                                    POOR
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">LAWN/INSIDE PREMISE</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="lip"
                                                    value="BEST" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    BEST
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="lip"
                                                    value="GOOD">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="lip"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="lip"
                                                    value="POOR">
                                                <label class="form-check-label" for="formRadios1">
                                                    POOR
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">ROOMS</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="rooms"
                                                    value="BEST" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    BEST
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="rooms"
                                                    value="GOOD">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="rooms"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="rooms"
                                                    value="r_POOR">
                                                <label class="form-check-label" for="formRadios1">
                                                    POOR
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">KITCHEN</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="kitchen"
                                                    value="BEST" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    BEST
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="kitchen"
                                                    value="GOOD">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="kitchen"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="kitchen"
                                                    value="POOR">
                                                <label class="form-check-label" for="formRadios1">
                                                    POOR
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">BATHROOM</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="bathroom"
                                                    value="BEST" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    BEST
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="bathroom"
                                                    value="GOOD">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="bathroom"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="bathroom"
                                                    value="POOR">
                                                <label class="form-check-label" for="formRadios1">
                                                    POOR
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">ALL</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="all_"
                                                    value="BEST" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    BEST
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="all_"
                                                    value="GOOD">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="all_"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="all_"
                                                    value="POOR">
                                                <label class="form-check-label" for="formRadios1">
                                                    POOR
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h3 class="card-title text-center text-primary m-0">BEHAVIOUR:</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">MANAGER</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="manager"
                                                    value="GOOD" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="manager"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="manager"
                                                    value="BAD">
                                                <label class="form-check-label" for="formRadios1">
                                                    BAD
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">CARETAKER</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="caretaker"
                                                    value="GOOD" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="caretaker"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="caretaker"
                                                    value="BAD">
                                                <label class="form-check-label" for="formRadios1">
                                                    BAD
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">GAURD</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="gaurd"
                                                    value="GOOD" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="gaurd"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="gaurd"
                                                    value="BAD">
                                                <label class="form-check-label" for="formRadios1">
                                                    BAD
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">OTHER</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="other"
                                                    value="GOOD" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="other"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="other"
                                                    value="BAD">
                                                <label class="form-check-label" for="formRadios1">
                                                    BAD
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <h3 class="card-title text-center text-primary m-0">SERVICE:</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">FOOD</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="food"
                                                    value="GOOD" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="food"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="food"
                                                    value="BAD">
                                                <label class="form-check-label" for="formRadios1">
                                                    BAD
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">OTHER</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="other_1"
                                                    value="GOOD" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    GOOD
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="other_1"
                                                    value="AVERAGE">
                                                <label class="form-check-label" for="formRadios1">
                                                    AVERAGE
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="other_1"
                                                    value="BAD">
                                                <label class="form-check-label" for="formRadios1">
                                                    BAD
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h3 class="card-title text-center text-primary m-0">OTHERS:</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">REGISTER MAINTENANCE</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="register_maintain"
                                                    value="yes" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="register_maintain"
                                                    value="no">
                                                <label class="form-check-label" for="formRadios1">
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">PAY MONEY FOR STAYING</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="pmfs"
                                                    value="yes" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="pmfs"
                                                    value="no">
                                                <label class="form-check-label" for="formRadios1">
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">CCTV INSTALLED/WORKING</label>
                                        </div>
                                        <div class="col-md-8 d-flex gx-3">
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="cctvw"
                                                    value="yes" checked="checked">
                                                <label class="form-check-label" for="formRadios1">
                                                    YES
                                                </label>
                                            </div>
                                            <div class="form-check mb-3 me-3">
                                                <input class="form-check-input" type="radio" name="cctvw"
                                                    value="no">
                                                <label class="form-check-label" for="formRadios1">
                                                    NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border py-2 my-2">
                                        <div class="mb-3">
                                            <label class="form-label">HOW WOULD YOU RANKED THE OVERALL AVAILABLE FACILITIES
                                                AND SERVICES:</label>
                                            <select name="overall_rating" class="form-control">
                                                <option value="10" selected>10</option>
                                                <option value="9">9</option>
                                                <option value="8">8</option>
                                                <option value="7">7</option>
                                                <option value="6">6</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit"
                                        class="btn btn-primary w-sm waves-effect waves-light">Add</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
    <script>
        $('[name="feedback"]').on('change',function(){
            if($(this).val() == 'COMPLAINT'){
                $('.compl').removeClass('d-none');
            }else{
                $('.compl').addClass('d-none');
            }
        })
    </script>
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
