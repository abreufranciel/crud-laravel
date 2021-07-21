@extends('admin.layouts.app')

@section('content')
    <h1 class="text-center text-3xl uppercase font-black my-4">Atualizar Dados:</h1>

        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <li class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">
                        {{$error}}
                    </li>
                @endforeach
            </div>
            
        @endif


    <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 mx-auto">
        <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="rounded-2xl block w-full p-3 mt-2 text-gray-700 bg-gray-300 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                <input type="file" name="image" id="image">
            </div>

            <div class="rounded-2xl block w-full p-3 mt-2 text-gray-700 bg-gray-300 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                <input type="text" name="title" id="title" placeholder="Titulo"  value="{{$post->title}}" autocomplete="off">
            </div>
            
            <div class="rounded-2xl block w-full p-3 mt-2 text-gray-700 bg-gray-300 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner">
                <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteudo" autocomplete="off">{{$post->content}}</textarea>
            </div>
            
            <div class="rounded-3xl w-full py-3 mt-6 font-medium tracking-widest text-center text-white bg-green-500 shadow-lg focus:outline-none hover:bg-green-700 hover:shadow-none">
                <button type="submit"  class="uppercase">Salvar</button>
            </div>
            <div class="rounded-3xl w-full py-3 mt-2 font-medium tracking-widest text-center text-white bg-purple-500 shadow-lg focus:outline-none hover:bg-purple-700 hover:shadow-none">
                <button type="submit" class="uppercase"><a href="{{ route('posts.index') }}">voltar</a></button>
            </div>
            
        </form>
    </div>








@endsection
