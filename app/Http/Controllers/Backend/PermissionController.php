<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    // load admin permission page
    public function index()
    {
        return view('backend.permission.index');
    }

    // load all permissions
    public function allPermissions()
    {
        if (request()->ajax()) {
            return datatables()->of(Permission::all())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    $count = $count++;
                    return $count;
                })


                ->addColumn('action', function ($data) {

                    //Action btn show by conditions

                    $button = '';
                    $button .= '<a permission_delete_id="' . $data->id . '" class="btn btn-danger btn-sm permission_delete_btn">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </a>';
                    return $button;
                })

                ->rawColumns(['sl', 'action'])->make();
        }
    }

    // store admin permission
    public function store(Request $request)
    {
        $data = Permission::where('name', $request->name)->first();
        if (!empty($data)) {
            return [
                'permission_name' => 'exist'
            ];
        } else {
            Permission::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
        }
    }


    // Delete admin permission
    public function delete($id)
    {
        $data = Permission::find($id);
        $data->delete();
    }











    //
}
