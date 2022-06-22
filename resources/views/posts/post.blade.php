@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class=" w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('post') }}" method="post">
            @csrf
            <h1 class="mb-4">
                New post
            </h1>
            <div class="mb-4">
                <label for="name" class="sr-only">
                    Title
                </label>
                <input type="text" name="title" id="title" placeholder="Choose title" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('title') border-red-500 @enderror">
                @error('title')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="sr-only">
                    Body
                </label>
                <textarea name="body" id="body" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                @error('body') border-red-500 @enderror">
                </textarea>
                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
            </div>
        </form>
    </div>
</div>
@endsection
