<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Musica;

class PageController extends Controller
{

    public function index(Request $Request){

        $search = Request('search');
        $albums_auth = [];

        if ($search){

            $musicas = Musica::orderBy('faixa')->where([['nome', 'like', '%'.$search.'%']])->get();

            foreach ($musicas as $musica){
                $albums_auth[] = $musica->album;
            }

        }else{

            $musicas = Musica::orderBy('faixa')->get();
            
        }

        $albums = Album::orderBy('lancamento')->get();

        return view('home', ['albums' => $albums, 'musicas' => $musicas, 'album_auth' => $albums_auth, 'search' => $search, 'registros' => count($musicas)]);
    }



    public function dashboard(Request $Request){

        $search = Request('search');
        $albums_auth = [];

        if ($search){

            $musicas = Musica::orderBy('faixa','desc')->where([['nome', 'like', '%'.$search.'%']])->get();

            foreach ($musicas as $musica){
                $albums_auth[] = $musica->album;
            }

        }else{

            $musicas = Musica::orderBy('faixa')->get();
            
        }

        $albums = Album::orderBy('lancamento')->get();

        return view('admin.dashboard', ['albums' => $albums, 'musicas' => $musicas, 'album_auth' => $albums_auth, 'search' => $search, 'album_registros' => count($albums),'registros' => count($musicas)]);
    }



    public function adicionar_album(){

        return view('admin.add_album');
    }

    public function editar_album($id){

        $albums = Album::orderBy('lancamento')->get();

        if (count($albums) > 0){
            return view('admin.edit_album', ['albums' => $albums[0], 'id' => $id]);
        }else{
            return redirect('/dashboard/');
        }
    }

    public function deletar_album($id){

        $albums = Album::where([['id', 'like', $id]])->get();

        if (count($albums) > 0){
            return view('admin.del_album', ['albums' => $albums[0], 'id' => $id]);
        }else{
            return redirect('/dashboard/');
        }
    }



    public function adicionar_music(){

        $albums = Album::orderBy('lancamento')->get();
        
        if (count($albums) > 0){
            return view('admin.add_music', ['albums' => $albums]);
        }else{
            return redirect('/dashboard/');
        }
    }

    public function editar_music($id){

        $albums = Album::orderBy('lancamento')->get();
        $musicas = Musica::where([['id', 'like', $id]])->get();

        if (count($albums) > 0 or count($musicas) > 0){
            return view('admin.edit_music', ['albums' => $albums, 'musicas' => $musicas[0], 'id' => $id]);
        }else{
            return redirect('/dashboard/');
        }
    }

    public function deletar_music($id){

        $musicas = Musica::where([['id', 'like', $id]])->get();

        if (count($musicas) > 0){
            return view('admin.del_music', ['musicas' => $musicas[0], 'id' => $id]);
        }else{
            return redirect('/dashboard/');
        }
    }

}
