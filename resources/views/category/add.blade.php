
@extends('layouts.app') @section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="panel panel-default col-md-9">
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <strong>{{ Session::get('success') }}</strong>
                            </button>
                        </div>
                    @endif @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <strong>{{ Session::get('error') }}</strong>
                            </button>
                        </div>
                    @endif

                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown link
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
@endsection
