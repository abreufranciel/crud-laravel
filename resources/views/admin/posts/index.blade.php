@extends('admin.layouts.app')

@section('content')
    <h1 class="text-center text-3xl uppercase font-black my-4">Axies Infinity</h1>
    <div class="grid">
        <a href="{{ route('posts.create') }}"
            class="my-4 uppercase px-8 py-2 rounded bg-purple-700 text-blue-50 max-w-max shadow-sm hover:shadow-lg">
            Cadastrar novo Axie
        </a>
    </div>

    @if(session('message'))
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300">
            {{session('message')}}
        </div>
    @endif


    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                    ID
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                    Imagem
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                    Nome
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                    Descrição
                </th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
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

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" class="w-20">
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $post->title }}</td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $post->content }}</td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5 text-right">
                        <a href="{{ route('posts.show', $post->id) }}" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Visualizar</a>
                        <a href="{{ route('posts.update', $post->id) }}" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-700 hover:text-white focus:outline-none">Editar</a>
                    </td>




                </tr>

                





            @endforeach

        </tbody>
    </table>





@endsection


