<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    /**
     * @var PermissionService
     */
    private $permission;

    /**
     *  Carrega as instâncias das dependências desta classe.
     */
    public function __construct(PermissionService $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permission->index();
        $breadcrumb = $this->breadcrumb(['Permissões']);

        return view('admin.permissions.index', compact('permissions', 'breadcrumb'));
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
     * @param  \Illuminate\Http\Requests\PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
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
        $permission = $this->permission->show($id);
        $breadcrumb = $this->breadcrumb(['Permissões', 'Visualizar']);

        return view('admin.permissions.show', compact('permission', 'breadcrumb'));
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
     * @param  \Illuminate\Http\Requests\PermissionRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
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
        $service = $this->permission->delete($id);

        if (!$service->success) {
            return redirect()->route('permissions.show', $id)
                    ->with('error', [
                        'class' => $service->class,
                        'message' => $service->message
                    ])
                    ->withInput();
        }

        return redirect()
                        ->route('permissions.index')
                        ->withSuccess($service->message);
    }
}
