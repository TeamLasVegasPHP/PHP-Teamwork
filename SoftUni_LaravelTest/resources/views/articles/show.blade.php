@extends('app1')

@section('content')
    <nav class="NavigationBar">
        <ul>
            <li><a href="/" class="btn btn-primary btn-lg" style="margin-top: 25px;">Back to Articles</a></li>
        </ul>
    </nav>
    <main>
    <h1>{{$article->title}}</h1>

    <article id="articleContent">
        Content: {{$article->body}}
    </article>
    <br/>

    <footer>Posted on: {{$article->published_at}}</footer>
    <footer>Author is: {{$author}}</footer>
    </main>


@stop
