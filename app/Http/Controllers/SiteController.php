<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    public function index(){
        $produtos = Produto::paginate(3);
        return view('site.home', compact('produtos'));
    }

    public function details($slug){
        $produto = Produto::where('slug',$slug)->first();
        return view ('site.details', compact('produto'));
    }

    public function categoria($id){
        $produtos_categoria = Produto::where('id_categoria',$id)->paginate(3);
        $nome_categoria = Categoria::find($id);
        return view ('site.categoria', compact('produtos_categoria','nome_categoria'));
    }
}
