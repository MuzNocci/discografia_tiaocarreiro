<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Musica;

class EventController extends Controller
{

    public function register_album(Request $request){

        $album = new Album;
        $album->nome = $request->nome;
        $album->lancamento = $request->lancamento;
        $album->save();

        return redirect('/dashboard/');
    }

    public function update_album(Request $request){

        Album::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard/')->with('message','Álbum editada com sucesso!');
    }

    public function destroy_album($id){

        Album::where([['id','like',$id]])->delete();
        Musica::where([['album','like',$id]])->delete();

        return redirect('/dashboard/')->with('message','Álbum deletado com sucesso!');
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

    public function update_music(Request $request){

        Musica::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard/')->with('message','Música editada com sucesso!');
    }

    public function destroy_music($id){

        Musica::where([['id','like',$id]])->delete();

        return redirect('/dashboard/')->with('message','Música deletada com sucesso!');
    }

}
