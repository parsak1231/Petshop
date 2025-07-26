<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\EditAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected array $methodsToConvert = ['store', 'update'];

    public function index(Request $request)
    {
        $entries = getEntriesData($request, [5, 10, 20, 25, 50], 20);

        $query = $this->getSearchData($request);
        $users = $query->paginate($entries)->withQueryString();

        return view('admin.users.index', compact('entries', 'users'));
    }


    private function getSearchData(Request $request)
    {
        $query = User::query();

        if ($request->filled('email')) {
            $query->where('email', 'like', "%$request->email%");
        }
        if ($request->filled('phone')) {
            $query->where('phone', 'like', "%$request->phone%");
        }
        if ($request->filled('first_name')) {
            $query->where('first_name', 'like', "%$request->first_name%");
        }
        if ($request->filled('last_name')) {
            $query->where('last_name', 'like', "%$request->last_name%");
        }

        return $query;
    }

    public function create()
    {
        $allowedRoles = $this->getAllowedRoles();
        return view('admin.users.create', compact('allowedRoles'));
    }

    public function store(AddAdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if (isset($data['role'])) {
            $user->assignRole(Role::find($data['role'])->name);
        }
        else {
            $user->assignRole('admin');
        }

        return redirect()->route('admin.users.index');
    }

    private function getAllowedRoles()
    {
        $currentUser = Auth::user();
        $allowedRoles = [];

        if ($currentUser?->hasRole('super_admin')) {
            $allowedRoles = Role::whereIn('name', ['admin', 'super_admin'])->get();
        }

        return $allowedRoles;
    }

    public function destroy(User $user)
    {
        $currentUser = Auth::user();

        if (!$currentUser?->hasRole('super_admin')) {
            return redirect()->back()->with('error', 'شما دسترسی لازم برای حذف کاربر را ندارید.');
        }

        if ($currentUser->id === $user->id) {
            return redirect()->back()->with('error', 'شما نمی‌توانید خودتان را حذف کنید.');
        }

        $user->delete();

        return redirect()->back();
    }

    public function edit(User $user)
    {
        $allowedRoles = $this->getAllowedRoles();

        if ($user->hasRole('customer') || $user->hasRole('seller')) {
            abort(403, 'شما اجازه ویرایش اطلاعات این کاربر را ندارید.');
        }

        if (Auth::user()->hasRole('admin') && $user->hasRole('super_admin')) {
            abort(403, 'شما نمی توانید اطلاعات سوپر ادمین را ویرایش کنید');
        }

        return view('admin.users.edit', compact('user', 'allowedRoles'));
    }

    public function update(EditAdminRequest $request, User $user)
    {
        $currentUser = Auth::user();
        $data = $request->validated();

        if ($user->hasRole('customer') || $user->hasRole('seller')) {
            abort(403, 'شما اجازه ویرایش اطلاعات این کاربر را ندارید.');
        }

        if ($currentUser->hasRole('admin') && $user->hasRole('super_admin')) {
            abort(403, 'شما نمی توانید اطلاعات سوپر ادمین را ویرایش کنید');
        }

        if (isset($data['role'])) {
            $user->syncRoles(Role::find($data['role'])->name);
        }

        $user->update($data);

        return redirect()->route('admin.users.index');
    }
}
