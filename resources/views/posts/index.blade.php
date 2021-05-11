@extends('layout')

@section('title', 'blog')

@section('content')

    <h1>Liste des articles du blog</h1>
    
    <nav>
        {{ $posts->links() }}
    </nav>

    @foreach($posts as $post)
        <article>
            <header>
                <h3><a href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h3>
                <small>Rédigé par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}</small>
            </header>
            {!! nl2br(e($post->content)) !!}
        </article>
    @endforeach
    
@endsection