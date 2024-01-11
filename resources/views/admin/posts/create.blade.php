@extends('layout.admin')
@section('title', isset($post) ? "Редактировать статью с ID:{$post->id}" : 'Добавить статью')
@section('content')


<div class="container mx-auto px-6 py-8">
    <h3 class="text-gray-700 text-3xl font-medium">{{isset($post) ? "Редактировать статью с ID:{$post->id}" : 'Добавить статью' }}</h3>

    <div class="mt-8">

    </div>

    <div class="mt-8">
        <form enctype="multipart/form-data" class="space-y-5 mt-5" method="post" action="{{ isset($post) ? route('admin.posts.update' , $post->id) : route('admin.posts.store')}} ">
            @csrf

            @if(isset($post))
                @method('PUT')
            @endif
            <input name="title" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror" value="{{isset($post) ? $post->title : '' }}" placeholder="Название" />
            @error('title')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <input name="preview"  type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('preview') border-red-500 @enderror" value="{{isset($post) ? $post->preview : '' }}" placeholder="Описание" />
            @error('preview')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <input name="description"  type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('description') border-red-500 @enderror" value="{{isset($post) ? $post->description : '' }}" placeholder="Полный текст" />
            @error('description')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @if(isset($post))
                <div>
                    <img class="h-64 w-64" src="https://images.unsplash.com/photo-1571171637578-41bc2dd41cd2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
                </div>
            @endif
            


            @error('thumbnail')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <input name="thumbnail" type="file" class="w-full h-12" placeholder="Обложка" />
            <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
        </form>
    </div>
</div>


@endsection