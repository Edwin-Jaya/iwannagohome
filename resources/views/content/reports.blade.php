@extends('content/master') @section('content')
<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="{{asset("css/reports.css")}}">
<h3 class="text-center" style="padding-top: 50px !important; font-size: 50px;">Posts</h3>
<p class="text-center" style="color:red">Contribute to the search efforts by composing posts that share relevant details about a missing individual.</p>
<form action="{{{route('actionreports')}}}" method="post"> @csrf <textarea style="resize: none;" class="report_upload" name="description" placeholder="Enter here to create a post..." rows="6"></textarea>
    <button class="btn btn-light-blue btn-md mx-auto" type="submit">Post</button>
</form> @foreach ($users as $user) <div class="tweet-wrap">
    <div class="tweet-header">
        <img src={{ $user['profile_pic'] }} onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'" alt="" class="avator">
        <div class="tweet-header-info">
            {{ $user['username'] }}<span>{{ $user['upload_date'] }} {{ $user['upload_time'] }}</span>
            <p>{!! nl2br($user['description']) !!}</p> @if ($user['user_id'] === Auth::user()->id) <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editreportmodal{{ $user['id'] }}"> Edit post </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deletereportmodal{{ $user['id'] }}"> Delete </button>
            <div class="modal fade" id="deletereportmodal{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="editreportmodalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mb-3">
                                <form action="{{{route('deletereport',['id' => $user['id']])}}}" method="post"> @csrf <p>Are you sure you want to delete this post?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                            <button class="btn btn-primary" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editreportmodal{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="editreportmodalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mb-3">
                                <form action="{{{route('editreport',['id' => $user['id']])}}}" method="post"> @csrf <label style="resize: none;" for="editreport" class="form-label">Edit post</label>
                                    <textarea class="form-control" name="description" rows="6" style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> @endif
        </div>
    </div>
</div> @endforeach @endsection