<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index(){
        $produtos = Produto::paginate(3);
        return view('site.home', compact('produtos'));
    }

    public function details($slug){

        if(!auth()->check()){
            return redirect()->route('site.index');
        }

        $produto = Produto::where('slug',$slug)->first();

        // Gate::authorize('ver-produto', $produto);
        // $this->authorize('verProduto', $produto);

        if (auth()->user()->can('verProduto', $produto)) {
            return view('site.details', compact('produto'));
        }

        if (auth()->user()->cannot('verProduto', $produto)) {
            return redirect()->route('site.index');
        }
        
        return view ('site.details', compact('produto'));
    }

    public function categoria($id){
        $produtos_categoria = Produto::where('id_categoria',$id)->paginate(3);
        $nome_categoria = Categoria::find($id);
        return view ('site.categoria', compact('produtos_categoria','nome_categoria'));
    }
}
