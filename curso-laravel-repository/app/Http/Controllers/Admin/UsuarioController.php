<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    /**
     * @var UsuarioService
     */
    protected $usuario;

    /**
     *  Carrega as instâncias das dependências desta classe.
     */
    public function __construct(UsuarioService $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Mostra a lista de registros.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = $this->breadcrumb(['Usuários']);
        $usuarios = $this->usuario->index();

        return view('admin.usuarios.index', compact('usuarios', 'breadcrumb'));
    }

    /**
     * Mostra o formulário para criar um novo registro.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = $this->breadcrumb(['Usuários', 'Novo']);
        return view('admin.usuarios.create', compact('breadcrumb'));
    }

    /**
     * Envia os dados para registro.
     *
     * @param  \Illuminate\Http\Requests\UsuarioRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $service = $this->usuario->store($request->all());

        if (!$service->success) {
            return redirect()->route('usuarios.create')
                ->with('error', [
                    'class' => $service->class,
                    'message' => $service->message
                ])
                ->withInput();
        }

        return redirect()
                        ->route('usuarios.index')
                        ->withSuccess($service->message);
    }

    /**
     * Mostra um registro específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumb = $this->breadcrumb(['Usuários', 'Visualizar']);
        $usuario = $this->usuario->show($id);

        if(!$usuario)
            return redirect()->back();

        return view('admin.usuarios.show', compact('usuario', 'breadcrumb'));
    }

    /**
     * Exibe um registro para edição.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumb = $this->breadcrumb(['Usuários', 'Editar']);
        $usuario = $this->usuario->edit($id);

        if (!$usuario) {
            return redirect()->back();
        }

        return view('admin.usuarios.edit', compact('usuario', 'breadcrumb'));
    }

    /**
     * Envia os dados para serem atualizados.
     *
     * @param  \Illuminate\Http\Request\UsuarioRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $service = $this->usuario->update($id, $request->all());

        if (!$service->success) {
            return redirect()->route('usuarios.edit', $id)
                    ->with('error', [
                        'class' => $service->class,
                        'message' => $service->message
                    ])
                    ->withInput();
        }

        return redirect()
                        ->route("usuarios.index")
                        ->withSuccess($service->message);
    }

    /**
     * Solicita a camada de serviço a remoção de um registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->usuario->delete($id);

        if (!$service->success) {
            return redirect()->route('usuarios.show', $id)
                    ->with('error', [
                        'class' => $service->class,
                        'message' => $service->message
                    ])
                    ->withInput();
        }

        return redirect()
                        ->route('usuarios.index')
                        ->withSuccess($service->message);
    }

    /**
     * Pega os dados de busca informados pelo usuário.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $usuarios = $this->usuario->search($request);

        $data = $request->except('_token');
        return view('admin.usuarios.index', compact('usuarios', 'data'));
    }
}
