@extends('content/master')@section('content')
<link rel="stylesheet" href={{asset("css/editprofile.css")}}>
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="{{ $user[0]['profil_pic'] }}" alt="" onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'">
                    <!-- Profile picture help block-->
                    <!-- Profile picture upload button-->
                    <form method="POST" action="{{ route('editimage',$user[0]['id']) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="filename" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="{{route("editprofiledata",$user[0]['id'])}}" method="POST">
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="inputUsername" type="text"name="username" placeholder="Enter your username" value="{{ $user[0]['username'] }}">
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Enter your email address" value="{{ $user[0]['email'] }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="text" name="phone" placeholder="Enter your phone number" value="{{ $user[0]['phone'] }}">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="date_of_birth" placeholder="Enter your birthday" value="{{ $user[0]['date_of_birth'] }}">
                                </div>
                                <div class="mb-3 mt-4">
                                    <p>Change password</p>
                                    <hr>
                                    <label class="small mb-1" for="inputUsername">Password</label>
                                    <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Enter your password">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputUsername">Password Confirmation</label>
                                    <input class="form-control" name="password_confirmation" id="inputPasswordConfirmation" type="password" placeholder="Enter your Password Confirmation">
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-secondary mt-2" type="button">Back</button>
                            <button class="btn btn-primary mt-2" type="submit">Save changes</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection