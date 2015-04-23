@extends('app1')
@section('css')
    <link rel="stylesheet" href=""/> <!-- za CSS -->
@stop
@section('content')

@if(count($name))
    <h1>People I like</h1>
    <ul>
        @foreach($name as $n)
            <li>{{$n}}</li>
        @endforeach
    </ul>
@endif
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur debitis dolor doloremque dolorum est eveniet expedita id molestiae necessitatibus nostrum quam quasi quo, quod quos unde ut vitae voluptate.
    </p>
    <a href="/" class="btn btn-primary btn-n" style="margin-top: 25px;">Return</a>
@stop