<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Log;
class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->with = ['role'];
        $this->user = $user;
    }

    public function index(Request $request)
    {
        abort_unless($request->user()->isAbleTo('user-read'), 403);
        try {
            $users = $this->user->with($this->with)->get();
            $userDetails = new UserCollection($users);
            if (count($userDetails)) {
                return Inertia::render('User', [
                    'users' => $userDetails,
                ]);
            }
        } catch (\Exception $e) {
            Log::emergency($e);
            $msg = __('common.error');
            return Inertia::render('Error', [
                'error' => $msg,
            ]);
        }
    }
}
