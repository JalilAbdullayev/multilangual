@extends('welcome')
@section('content')
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">
                    {{ $post->title }}
                </h1>
                <p class="py-6">
                    {{  $post->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
