@extends('app1')

@section('content')
    <h1>Articles</h1>
    @if(Auth::user())
        <h2>User: {{Auth::user()->name}}</h2>
    @endif
    <hr/>

        <article>
            @foreach($articles as $i=>$article)
            <h2>
                <a href="{{action('ArticlesController@show',[$article->id])}}">{{$article->title}}</a>
            </h2>
            <div class="body">
                {{$article->body}}
                <h3>Autor: {{$authors[$i]}}</h3>

            </div>
            @endforeach
            {{--@foreach($authors as $autor)--}}
                {{--<h3>Autor: {{$autor}}</h3>--}}
                {{--@endforeach--}}
        </article>


    @if(Auth::user())
        <a href="/articles/create" class="btn btn-primary btn-lg" style="margin-top: 25px;">Create an Article</a>
        <a href="/auth/logout" class="btn btn-primary btn-lg" style="margin-top: 25px;">Logout</a>
    @else
        <a href="/auth/login" class="btn btn-primary btn-lg" style="margin-top: 25px;">Login</a>
        <a href="/auth/register" class="btn btn-primary btn-lg" style="margin-top: 25px;">Register</a>
    @endif

@stop

