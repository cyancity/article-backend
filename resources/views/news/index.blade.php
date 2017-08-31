@extends('layouts.mob') @section('content')
    <div class="container-fluid all">
        <div class="maincontent row" id="pagination">
            <div style="padding-top: -8px;">
                <img src="/img/zjgs-banner.jpg" alt="banner">
            </div>
        </div>
    </div>
    <tab-bar></tab-bar>
    <router-view></router-view>


    {{--<footer>镇江民生工商</footer>--}}
@endsection