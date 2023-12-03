@extends('content/master') @section('content')
<link rel="stylesheet" href="{{asset("css/home.css")}}">
<div class="container">
    <div class="container">
        <h3 class="text-center" style="padding-top: 50px !important; font-size: 50px;">Those We Seek - Local</h3>
        <p class="text-center" style="margin-top:2vh;">Missing individuals from our area. Contact listed details or inform the community if found.</p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add report </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel" style="color:black;">Add Report</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('postlocalreport') }}" method="POST"> @csrf <div class="card-body">
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                        <input class="form-control" id="inputFirstName" name="firstname" type="text">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                        <input class="form-control" id="inputLastName" type="text" name="lastname">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPlaceOfBirth">Place of Birth</label>
                                        <input class="form-control" id="inputPlaceOfBirth" name="place_of_birth" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputDateofBirth">Date of Birth</label>
                                        <input class="form-control" id="inputDateofBirth" name="date_of_birth" type="date" min="1900-01-01" max="{{ now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputHair">Hair</label>
                                    <input class="form-control" id="inputHair" type="text" name="hair">
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEyes">Eyes</label>
                                    <input class="form-control" id="inputEyes" type="text" name="eyes">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Height (cm)</label>
                                        <input class="form-control" id="inputHeight" type="text" name="height">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputWeight">Weight (kg)</label>
                                        <input class="form-control" id="inputWeight" type="text" name="weight">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputSex">Sex</label>
                                        <br>
                                        <select name="sex" class="mt-1">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputRace">Race</label>
                                        <input class="form-control" id="inputRace" type="text" name="race">
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputPicture">Picture Link</label>
                                        <input class="form-control" id="inputPicture" type="text" name="picture">
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputDetails">Details</label>
                                        <textarea class="form-control" name="details" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> @if (count($posts)=== 0) {{-- Nobody's here         --}} @else <div class="card-deck row"> @foreach ($posts as $index => $person) @if ($index % 3 == 0) <div class="row"> @endif <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card mb-4">
                        <div class="view overlay">
                            <img class="card-img-top" src={{ $person["picture"] }} onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'" alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="h4 card-title text-dark">{{ $person['first_name'] }} {{ $person['last_name'] }}</h4>
                            <p>Missing</p>
                            {{-- <a href="{{ route('personprofile', $index) }}">Read more</a> --}} <button type="button" class="btn btn-light-blue btn-md" data-bs-toggle="modal" data-bs-target="#seeprofilemodal{{ $index }}">Read more</button> @if ($person['user_id'] === Auth::user()->id) <button type="button" class="btn btn-light-blue btn-md" data-bs-toggle="modal" data-bs-target="#editpostmodal{{ $person['id'] }}">Edit post</button>
                            <div class="modal fade" id="editpostmodal{{ $person['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="editpostmodallabel" style="color:black;">Edit Report</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('editlocalreport',['id' => $person['id']]) }}" method="POST"> @csrf <div class="card-body">
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (phone number)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputFirstName">First Name</label>
                                                            <input class="form-control" id="inputFirstName" name="firstname" type="text" value="{{$person['first_name']}}">
                                                        </div>
                                                        <!-- Form Group (birthday)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputLastName">Last Name</label>
                                                            <input class="form-control" id="inputLastName" type="text" name="lastname" value="{{$person['last_name']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputPlaceOfBirth">Place of Birth</label>
                                                            <input class="form-control" id="inputPlaceOfBirth" name="place_of_birth" type="text" value="{{ $person['place_of_birth'] }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputDateofBirth">Date of Birth</label>
                                                            <input class="form-control" id="inputDateofBirth" name="date_of_birth" type="date" min="1900-01-01" max="{{ now()->format('Y-m-d') }}" value="{{$person['date_of_birth']}}">
                                                        </div>
                                                    </div>
                                                    <!-- Form Group (username)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputHair">Hair</label>
                                                        <input class="form-control" id="inputHair" type="text" name="hair" value="{{$person['hair']}}">
                                                    </div>
                                                    <!-- Form Group (email address)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputEyes">Eyes</label>
                                                        <input class="form-control" id="inputEyes" type="text" name="eyes" value="{{$person['eyes']}}">
                                                    </div>
                                                    <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (phone number)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputPhone">Height</label>
                                                            <input class="form-control" id="inputHeight" type="text" name="height" value="{{$person['height']}}">
                                                        </div>
                                                        <!-- Form Group (birthday)-->
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputWeight">Weight</label>
                                                            <input class="form-control" id="inputWeight" type="text" name="weight" value="{{$person['weight']}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputSex">Sex</label>
                                                            <br>
                                                            <select name="sex" class="mt-1">
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="inputRace">Race</label>
                                                            <input class="form-control" id="inputRace" type="text" name="race" value="{{$person['race']}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="inputPicture">Picture Link</label>
                                                            <input class="form-control" id="inputPicture" type="text" name="picture" value="{{$person['picture']}}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="inputDetails">Details</label>
                                                            <textarea class="form-control" name="details" cols="30" rows="10">{{$person['details']}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Post</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deletereportmodal{{ $person['id'] }}"> Delete </button>
                            <div class="modal fade" id="deletereportmodal{{ $person['id'] }}" tabindex="-1" role="dialog" aria-labelledby="editreportmodalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <form action="{{{route('deletelocalreport',['id' => $person['id']])}}}" method="post"> @csrf <span>Are you sure you want to delete this post?</span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                                            <button class="btn btn-primary" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> @endif
                        </div>
                    </div>
                </div> @if (($index + 1) % 3 == 0) </div> @endif <div class="modal fade" id="seeprofilemodal{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="seeprofilemodal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="display-6">{{ $person['first_name'] }} {{ $person['last_name'] }}</span>
                                        <div class="row" style="padding-top:10px;">
                                            <div class="col-5 col-sm-5">
                                                <img src="{{ $person['picture'] }}" style="object-fit:cover;" onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'" width=305 height=400 alt="Card image cap">
                                            </div>
                                            <div class="col-7">
                                                <div class="mr-2">
                                                    <ul>
                                                        <li>Date of birth : {{ $person['date_of_birth'] ?? '-' }}</li>
                                                        <li>Place Of Birth : {{ $person['place_of_birth'] ?? '-' }}</li>
                                                        <li>Hair : {{ $person['hair'] ?? '-' }}</li>
                                                        <li>Eyes : {{ $person['eyes'] ?? '-' }}</li>
                                                        <li>Height : {{ $person['height'] ?? '-' }}</li>
                                                        <li>Weight : {{ $person['weight'] ?? '-' }}</li>
                                                        <li>Sex : {{ $person['sex'] ?? '-' }}</li>
                                                        <li>Race : {{ $person['race'] ?? '-' }}</li>
                                                    </ul>
                                                    <span class="display-8">{{ $person['details'] ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> @endforeach </div> @endif
    </div>
</div> @endsection