@extends('layouts.mob') @section('content')
<div class="container-fluid all">
    
    <sidebar></sidebar>
    <div class="maincontent row" id="pagination">
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1>Sample Text Here</h1>
            </div>

            <pagination></pagination>
            
        </div>
    </div>
</div>
<a href="#top" id="goTop"><i class="fa fa-angle-up fa-3x"></i></a> @endsection