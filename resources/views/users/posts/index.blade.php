@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="flex justify-center">
        <div class=" w-8/12 bg-white p-6 rounded-lg">
            <h1 class="mb-4">
                {{ $user->name }}
            </h1>
            <div class="">
                @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                {{$posts->links()}}
                @endif
            </div>
        </div>
    </div>
</div>
@endsection