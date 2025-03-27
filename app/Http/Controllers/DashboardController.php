<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $users_qtd = User::all()->count();

        // Gráfico 1 - usuários
        $usersData = User::select(
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('ano')
        ->orderBy('ano','asc')
        ->get();

        // preparar arrays para o gráfico 1
        foreach ($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        // formatar para chat.js
        $graficoUser = (Object)[
            'userLabel' => "'Comparativo de cadastros de usuários'",
            'userAno' => implode(',', $ano),
            'userTotal' => implode(',', $total)
        ];

        // Gráfico 2 - Produtos-Categoria
        $categorias = Categoria::all();

        foreach ($categorias as $category) {
            $categoryName[] = "'".$category->nome."'";
            $categoryTotal[] = Produto::where('id_categoria', $category->id)->count();
        }

        $graficoProduct = (Object)[
            'categories' => implode(',', $categoryName),
            'totals' => implode(',', $categoryTotal)
        ];

        return view('admin.dashboard', compact('users_qtd', 'graficoUser', 'graficoProduct'));
    }
}
