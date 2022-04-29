<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Role;
use Log;

class RoleController extends Controller
{
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function index(Request $request)
    {
        abort_unless($request->user()->isAbleTo('role-read'), 403);
        try {
            $roles = $this->role->all();
            return Inertia::render('Role', [
                'roles' => $roles,
            ]);
        } catch (\Exception $e) {
            Log::emergency($e);
            $msg = __('common.error');
            return Inertia::render('Error', [
                'error' => $msg,
            ]);
        }
    }
}
