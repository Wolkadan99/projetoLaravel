<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FornecedorController extends Controller
{
    public function __construct()
    {
        # garante o acesso dos methods apenas a usuário authenticado
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #Recupera todas fornecedors e envia a view index
        Gate::authorize("acesso-administrador");
        $fornecedores = Fornecedor::all();
        return view('fornecedor.index', compact('fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $fornecedor = new Fornecedor();
            $dados = $request->only($fornecedor->getFillable());
            Fornecedor::create($dados);
            echo "Inserido com sucesso!";
            return redirect()->action([FornecedorController::class, 'index']);

        } catch (\Exception $e) {
            return redirect()->action([FornecedorController::class, "index"])->with("resposta", "Erro ao inserir!");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('fornecedor.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view("fornecedor.edit", compact("fornecedor"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $fornecedor = new Fornecedor();
            $dados = $request->only($fornecedor->getFillable());
            Fornecedor::whereId($id)->update($dados);
            return redirect()->action([FornecedorController::class, 'index']);
        } catch (\Exception $e) {
            return redirect()->action([FornecedorController::class, "index"])->with("resposta", "Erro ao alterar!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Fornecedor::destroy($id);
            return redirect()->action([FornecedorController::class, 'index']);
        } catch (\Exception $e) {
            return redirect()->action([FornecedorController::class, 'index'])->with("respost", "Erro ao excluir!");
        }
    }

}
