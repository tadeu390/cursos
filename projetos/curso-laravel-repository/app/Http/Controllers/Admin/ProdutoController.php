<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Http\Controllers\Controller;
use App\Services\ProdutoService;
use App\Services\CategoriaService;

class ProdutoController extends Controller
{
    protected $produto;
    protected $categoria;

    public function __construct(
        ProdutoService $produto,
        CategoriaService $categoria
        ) {
        $this->produto = $produto;
        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto->index();

        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->categoria->get();

        return view('admin.produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ProdutoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $this->produto->store($request->all());

        return redirect()
            ->route('produtos.index')
            ->withSuccess('Produto cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->show($id);
        $categorias = $this->categoria->get();

        if(!$produto)
            return redirect()->back();

        return view('admin.produtos.show', compact('produto', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = $this->categoria->get();
        $produto = $this->produto->edit($id);

        if (!$produto) {
            return redirect()->back();
        }

        return view('admin.produtos.edit', compact('categorias', 'produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\ProdutoRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $this->produto->update($id, $request->all());

        return redirect()
            ->route("produtos.index")
            ->withSuccess('Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->produto->delete($id);

        return redirect()
            ->route('produtos.index')
            ->withSuccess('Produto apagado com sucesso.');
    }

    public function search(Request $request)
    {
        $produtos = $this->produto->search($request);

        $data = $request->except('_token');

        return view('admin.produtos.index', compact('produtos', 'data'));
    }
}
