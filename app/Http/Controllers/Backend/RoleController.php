<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Permission;
use App\Http\Controllers\Controller;
use App\Models\Backend\Role;

class RoleController extends Controller
{
    // load admin role page
    public function index()
    {
        $data = Permission::all();
        return view('backend.role.index', [
            'data' => $data
        ]);
    }


    // load all roles
    public function allRoles()
    {
        if (request()->ajax()) {
            return datatables()->of(Role::all())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    $count = $count++;
                    return $count;
                })

                ->addColumn('permission', function ($data) {

                    $per_list = '<ul>';
                    foreach (json_decode($data->permission) as $per) {
                        $per_list .= '<li style="list-style:none;"><i class="fa fa-check-circle"></i> ' . $per . '</li>';
                    }
                    $per_list .= '</ul>';
                    return $per_list;
                })

                ->addColumn('status', function ($data) {

                    //status btn checked unchecked
                    $status_check = $data->status ? 'checked' : '';

                    $button = '<label class="switch">
                            <input value="' . $data->id . '" role_name="' . $data->name . '" id="user_status_btn" type="checkbox" ' . $status_check . '>
                            <span class="slider round"></span>
                    </label>';
                    return $button;
                })


                ->addColumn('action', function ($data) {

                    //Action btn show by conditions

                    $button = '';
                    $button .= '<a role_delete_id="' . $data->id . '" class="btn btn-danger btn-sm role_delete_btn">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </a>';
                    return $button;
                })

                ->rawColumns(['sl', 'permission', 'status', 'action'])->make();
        }
    }

    // store admin role
    public function store(Request $request)
    {
        $data = Role::where('name', $request->name)->first();
        if (!empty($data)) {
            return [
                'role_name' => 'exist'
            ];
        } else {
            Role::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'permission' => json_encode($request->permission),
            ]);
        }
    }


    // status update
    public function statusUpdate($id)
    {
        $data = Role::find($id);

        if ($data->status == true) {
            $data->status = false;
            $data->update();
            return 'off';
        } else {
            $data->status = true;
            $data->update();
        }
    }

    // delete
    public function statusDelete($id)
    {
        $data = Role::find($id);
        $data->delete();
    }














    //
}
