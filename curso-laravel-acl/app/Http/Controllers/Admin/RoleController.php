<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    private $role;

    /**
     *  Carrega as instâncias das dependências desta classe.
     */
    public function __construct(RoleService $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->role->index();
        $breadcrumb = $this->breadcrumb(['Funções']);

        return view('admin.roles.index', compact('roles', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = $this->role->show($id);
        $breadcrumb = $this->breadcrumb(['Funções', 'Visualizar']);

        return view('admin.roles.show', compact('role', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = $this->role->delete($id);

        if (!$service->success) {
            return redirect()->route('roles.show', $id)
                    ->with('error', [
                        'class' => $service->class,
                        'message' => $service->message
                    ])
                    ->withInput();
        }

        return redirect()
                        ->route('roles.index')
                        ->withSuccess($service->message);
    }
}
