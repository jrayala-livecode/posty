@props(['post' => $post])
<div class="mb-3">
    <div class="mb-1">
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
        <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans()}}</span>
        <h4 class="font-bold">{{$post->title}}</h4>
        <p class="mb-2">{{$post->body}}</p>
    </div>

    @can('delete',$post)
    <div>
        <form action="{{ route('post.destroy',$post) }}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    </div>
    @endcan

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