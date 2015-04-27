@extends('app1')

@section('content')
    <nav class="NavigationBar">
        <ul>
            @if(Auth::user())
                <li><a href="/articles/create" class="btn btn-primary btn-lg" style="margin-top: 25px;">Create an Article</a></li>
                <li><a href="/auth/logout" class="btn btn-primary btn-lg" style="margin-top: 25px;">Logout</a></li>
            @else
                <li><a href="/auth/login" class="btn btn-primary btn-lg" style="margin-top: 25px;">Login</a></li>
                <li><a href="/auth/register" class="btn btn-primary btn-lg" style="margin-top: 25px;">Register</a></li>
            @endif
        </ul>
    </nav>
    <h1>Articles</h1>
    @if(Auth::user())
        <h2>User: {{Auth::user()->name}}</h2>
    @endif
        <article>

            @foreach($articles as $i=>$article)
                <div id="eachArticle">
            <h2>
                <a href="{{action('ArticlesController@show',[$article->id])}}">{{$article->title}}</a>
            </h2>
            <div class="body">
                {{$article->body}}
                <h3>Autor: {{$authors[$i]}}</h3>

            </div>
                </div>
            @endforeach
            {{--@foreach($authors as $autor)--}}
                {{--<h3>Autor: {{$autor}}</h3>--}}
                {{--@endforeach--}}
        </article>





@stop

