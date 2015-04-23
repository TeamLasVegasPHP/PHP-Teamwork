@extends('app1')

@section('content')
    <h1>{{$article->title}}</h1>
    <article>
        Content: {{$article->body}}
    </article>
    <br/>
    <footer>Posted on: {{$article->published_at}}</footer>
    <footer>Author is: {{$author}}</footer>

    <a href="/" class="btn btn-primary btn-lg" style="margin-top: 25px;">Back to Articles</a>
@stop