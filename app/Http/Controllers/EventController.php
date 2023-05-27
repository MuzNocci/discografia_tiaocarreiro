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

        $albums = Album::orderBy('lancamento')->get();
        $musicas = Musica::orderBy('faixa')->get();

        return view('admin.dashboard', ['albums' => $albums, 'musicas' => $musicas]);
    }

    public function edit_music($id){

        $albums = Album::orderBy('lancamento')->get();
        $musicas = Musica::orderBy('faixa')->get();

        return view('admin.edit_music', ['albums' => $albums, 'musicas' => $musicas, 'id' => $id]);
    }
}
