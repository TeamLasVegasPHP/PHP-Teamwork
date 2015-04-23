@extends('app1')

@section('content')
    <h1>Write a new article</h1>

    <hr/>

    {!! Form::open(['url'=>'articles'])!!}
        <div class="form-group">
            {!!Form::label('title','Titles:')!!}
            {!!Form::text('title',null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('body','Body:')!!}
            {!!Form::textarea('body',null, ['class'=>'form-control'])!!}
        </div>

         <div class="form-group">
             {!!Form::submit('Add Article', ['class'=>'btn btn-primary form-control'])!!}
         </div>
    {!! Form::close()!!}
    <a href="/" class="btn btn-primary btn-lg" style="margin-top: 25px;">Return to Articles</a>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@stop