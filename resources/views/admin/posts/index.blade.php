@extends('admin.layouts.app')

@section('content')
    <h1 class="text-center text-3xl uppercase font-black my-4">Axie Infinity</h1>
    <div class="grid">
        <a href="{{ route('posts.create') }}"
            class="rounded-1xl my-4 uppercase px-8 py-2 rounded bg-blue-500 text-blue-50 max-w-max shadow-sm hover:shadow-lg">
            Cadastrar novo Axie
        </a>
    </div>

    @if(session('message'))
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300">
            {{session('message')}}
        </div>
    @endif


    <form action="{{ route('posts.search') }}" method="post" class="bg-white">
        @csrf
        <div class="max-w-sm my-3 p-1 pr-0 py-1 flex items-center">
            <input type="text" name="search" placeholder="Filtrar" class="flex-1 appearance-none rounded shadow p-3 text-grey-dark mr-2 focus:outline-none" autocomplete="off">
            <button type="submit" class="uppercase p-3 rounded bg-indigo-400 text-blue-50 max-w-max shadow-sm hover:shadow-lg">Filtrar</button>
        </div>
    </form>


    <table class="min-w-full bg-white text-center uppercase">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">
                    ID
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">
                    Imagem
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">
                    Nome
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">
                    Descrição
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider text-center">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                        #{{ $post->id }}
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 w-20">
                        <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}">
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $post->title }}</td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $post->content }}</td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 rounded-1xl">
                        <a href="{{ route('posts.show', $post->id) }}" class=" bg-blue-500 px-5 py-2 border-blue-500 border text-white rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Visualizar</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-green-500 px-5 py-2 border-green-500 border text-white rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Editar</a>
                    </td>
                </tr>
                
                
            @endforeach

        </tbody>

        
    </table>
    


    <div class="my-4">
        @if (isset($filters))
            {{ $posts->appends($filters)->links() }}
        @else
            {{ $posts->links() }}
        @endif
    </div>

@endsection


