@extends('layouts.app')

@section('content')
@include('lui-croppie::partials.css')
@include('lui-croppie::partials.js')
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary" >
            <div class="box-header with-border">
                <h3 class="box-title">Change Profile Picture</h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
                @include('lui-croppie::bootstrap3.default')
            </div>
        </div>
    </div>
</div>
@stop
