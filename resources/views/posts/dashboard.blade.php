@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class=" w-8/12 bg-white p-6 rounded-lg">
            <h1 class="mb-4">
                Dashboard
            </h1>
            <div class="">
                @if ($posts->count())
                @foreach ($posts as $post)
                <div class="mb-3">

                
                <div class="mb-1">
                    <a href="" class="font-bold">{{ $post->user->name }}</a>
                    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans()}}</span>
                    <h4 class="font-bold">{{$post->title}}</h4>
                    <p class="mb-2">{{$post->body}}</p>
                </div>

                @if($post->ownedBy(auth()->user()))
                <div>
                    <form action="{{ route('post.destroy',$post) }}" method="POST" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
                </div>
                @endif

                <div class="flex items-center">
                    @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                    @else
                    <form action="{{ route('posts.likes', $post->id) }}" method="POST" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form>
                    @endif
                    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                </div>
                
            </div>
                @endforeach
                {{$posts->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection