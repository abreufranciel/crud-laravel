<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdadePost;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::get();
        
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

        $post->delete();
        return redirect()->route('posts.index')
                        ->with('message','Axie Deletado com Sucesso');
    }


    public function update($id){

        //verifica se o post tem algo a ser enviado para nao gerar exception
        //se o post for diferent de NULL ele exibe o post se nao redireciona pra index
            if(!$post = Post::find($id)){
                return redirect()->route('posts.index');

        }

       return view('admin.posts.update',compact('post'));
    }

    

    
    
}
