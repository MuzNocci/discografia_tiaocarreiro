<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Album;
use App\Models\Musica;

class EventController extends Controller
{
    public function index(Request $Request){

        $search = Request('search');
        $albums_auth = [];

        if ($search){

            $musicas = Musica::orderBy('faixa')->where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();

            foreach ($musicas as $musica){
                $albums_auth[] = $musica->album;
            }

        }else{

            $musicas = Musica::orderBy('faixa')->get();
            
        }

        $albums = Album::orderBy('lancamento')->get();

        return view('home', ['albums' => $albums, 'musicas' => $musicas, 'album_auth' => $albums_auth, 'search' => $search, 'registros' => count($musicas)]);
    }

    public function login(){
        return view('admin.login');
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

        return view('admin.dashboard', ['albums' => $albums, 'musicas' => $musicas, 'album_auth' => $albums_auth, 'search' => $search, 'registros' => count($musicas)]);
    }

    public function adicionar_music(){

        $albums = Album::orderBy('lancamento')->get();

        return view('admin.add_music', ['albums' => $albums]);
    }

    public function register_music(Request $request){

        $musica = new Musica;
        $musica->album = $request->album;
        $musica->faixa = $request->faixa;
        $musica->nome = $request->nome;
        $musica->duracao = $request->duracao;
        $musica->save();

        return redirect('/dashboard/');
        
    }

    public function editar_music($id){

        $albums = Album::orderBy('lancamento')->get();

        $musicas = Musica::where([['id', 'like', $id]])->get();

        return view('admin.edit_music', ['albums' => $albums, 'musicas' => $musicas[0], 'id' => $id]);
    }

    public function update_music(Request $request){

        Musica::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard/')->with('message','Música editada com sucesso!');
    }

    public function deletar_music($id){

        $musicas = Musica::where([['id', 'like', $id]])->get();

        return view('admin.del_music', ['musicas' => $musicas[0], 'id' => $id]);
    }

    public function destroy_music($id){

        Musica::where([['id','like',$id]])->delete();

        return redirect('/dashboard/')->with('message','Música deletada com sucesso!');
    }


    public function adicionar_album(){

        return view('admin.add_album');
    }

    public function register_album(Request $request){

        $album = new Album;
        $album->nome = $request->nome;
        $album->lancamento = $request->lancamento;
        $album->save();

        return redirect('/dashboard/');
        
    }

    public function editar_album($id){

        $albums = Album::orderBy('lancamento')->get();
        $musicas = Musica::orderBy('faixa')->get();

        return view('admin.edit_album', ['albums' => $albums[0], 'id' => $id]);
    }

    public function update_album(Request $request){

        Album::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard/')->with('message','Álbum editada com sucesso!');
    }

    public function deletar_album($id){

        $albums = Album::where([['id', 'like', $id]])->get();

        return view('admin.del_album', ['albums' => $albums[0], 'id' => $id]);
    }

    public function destroy_album($id){

        Album::where([['id','like',$id]])->delete();
        Musica::where([['album','like',$id]])->delete();

        return redirect('/dashboard/')->with('message','Álbum deletado com sucesso!');
    }
}
