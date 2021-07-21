<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreUpdadePost;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->paginate();
        
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    
    //metodo que faz toda a funcionalidade de cadastro do metodo create/
    public function store(StoreUpdadePost $request)
    {

        $data = $request->all();
        //verifico se o arquivo e falido para upload
        if ($request->image->isValid()) {
            
            //personaliza o nome do arquivo
            $nameFile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientOriginalExtension();
            
            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        //função para estar cadastrando no banco
       Post::create($data);
       return redirect()->route('posts.index')
                        ->with('message','Axie Cadastrado com Sucesso');
    }

    public function show($id){

        //verifica se o post tem algo a ser enviado para nao gerar exception
        //se o post for diferent de NULL ele exibe o post se nao redireciona pra index
            if(!$post = Post::find($id)){
                return redirect()->route('posts.index');

        }

       return view('admin.posts.show',compact('post'));
    }

    public function delete($id){

        //verifica se o post tem algo a ser enviado para nao gerar exception
        //se o post for diferent de NULL ele exibe o post se nao redireciona pra index
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');

        }   

        if (Storage::exists($post->image)) {
            Storage::delete($post->image);
        }

        $post->delete();
        return redirect()->route('posts.index')
                        ->with('message','Axie Deletado com Sucesso');
    }


    public function edit($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->back();
        }

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdadePost $request,$id){

        //verifica se o post tem algo a ser enviado para nao gerar exception
        //se o post for diferent de NULL ele exibe o post se nao redireciona pra index
            if(!$post = Post::find($id)){
                return redirect()->route('posts.index');

            }

            $data = $request->all();
            
            // # função necessaria pra apagar o post e upar novamente a foto quando for editar ou quando apagar
            //deletar o arquivo de vez
            //verifico se o arquivo e falido para upload
        if ($request->image->isValid()) {

            if (Storage::exists($post->image)) {
                Storage::delete($post->image);
            }
            
            //personaliza o nome do arquivo
            $nameFile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientOriginalExtension();
            
            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }



        //pega todos os parametos com o request ja realizando as validações e faz a alteração
        $post->update();
        
        return redirect()->route('posts.index')
                            ->with('message','Axie Atualizado com Sucesso');
    }


    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate();

        return view('admin.posts.index', compact('posts', 'filters'));
    }

    

    
    
}
