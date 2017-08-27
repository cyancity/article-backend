@extends('layouts.mob') @section('content')
    <div class="container-fluid all">
        <div class="maincontent row" id="pagination">
            <div style="padding-top: -8px;">
                <img src="http://img.jswmw.com/home/upLoad/slide/month_1209/201209251442427983.jpg" alt="">
            </div>
        </div>
    </div>
    <tab-bar></tab-bar>
    <router-view></router-view>


    {{--<footer>镇江民生工商</footer>--}}
@endsection