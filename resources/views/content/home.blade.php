@extends('content/master') @section('content') <link rel="stylesheet"
href="{{asset("css/home.css")}}">
<div class="container">
    <div class="container">
        <h3
            class="text-center"
            style="padding-top: 5vh !important; font-size: 50px"
        >
            Those We Seek - Global
        </h3>
        <p class="text-center" style="margin-top: 2vh">
            Worldwide Missing Persons: Contact the FBI if You Have Any Leads.
        </p>
        <div class="card-deck row mt-5">
            @foreach ($data as $index => $person) @if ($index % 3 == 0)
            <div class="row">
                @endif
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="card mb-4">
                        <div class="view overlay">
                            <img
                                class="card-img-top"
                                src="{{ $person->Headshot }}"
                                onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'"
                                alt="Card image cap"
                            />
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="h4 card-title text-dark">
                                {{ $person->{'Name'} }}
                            </h4>
                            <p>Missing</p>
                            {{--
                            <a href="{{ route('personprofile', $index) }}"
                                >Read more</a
                            >
                            --}}
                            <button
                                type="button"
                                class="btn btn-light-blue btn-md"
                                data-bs-toggle="modal"
                                data-bs-target="#seeprofilemodal{{ $index }}"
                            >
                                Read more
                            </button>
                        </div>
                    </div>
                </div>
                @if (($index + 1) % 3 == 0)
            </div>
            @endif
            <div
                class="modal fade"
                id="seeprofilemodal{{ $index }}"
                tabindex="-1"
                role="dialog"
                aria-labelledby="seeprofilemodal"
                aria-hidden="true"
            >
                <div
                    class="modal-dialog modal-dialog-centered modal-lg"
                    role="document"
                >
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span class="display-6"
                                            >{{ $person->Name }}</span
                                        >
                                        <div
                                            class="row"
                                            style="padding-top: 10px"
                                        >
                                            <div class="col-5 col-sm-5">
                                                <img
                                                    src="{{ $person->Headshot }}"
                                                    onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'"
                                                    width="305"
                                                    height="400"
                                                    alt="Card image cap"
                                                />
                                            </div>
                                            <div class="col-7">
                                                <div class="mr-2">
                                                    <ul>
                                                        <li>
                                                            Date of birth : {{
                                                            $person->{'Date(s)
                                                            of Birth Used'} ??
                                                            '-' }}
                                                        </li>
                                                        <li>
                                                            Place Of Birth : {{
                                                            $person->{'Place Of
                                                            Birth'} ?? '-' }}
                                                        </li>
                                                        <li>
                                                            Hair : {{
                                                            $person->{'Hair'} ??
                                                            '-' }}
                                                        </li>
                                                        <li>
                                                            Eyes : {{
                                                            $person->{'Eyes'} ??
                                                            '-' }}
                                                        </li>
                                                        <li>
                                                            Height : {{
                                                            $person->{'Height'}
                                                            ?? '-' }}
                                                        </li>
                                                        <li>
                                                            Weight : {{
                                                            $person->{'Weight'}
                                                            ?? '-' }}
                                                        </li>
                                                        <li>
                                                            Sex : {{
                                                            $person->{'Sex'} ??
                                                            '-' }}
                                                        </li>
                                                        <li>
                                                            Race : {{
                                                            $person->{'Race'} ??
                                                            '-' }}
                                                        </li>
                                                    </ul>
                                                    <span class="display-8"
                                                        >{{ $person->{'Details'}
                                                        ?? '-' }}</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
