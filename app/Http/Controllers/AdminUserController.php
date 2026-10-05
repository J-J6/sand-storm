<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    private const MIN_PASSWORD_LENGTH = 12;

    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::query()->orderByDesc('role')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->merge(['email' => mb_strtolower(trim((string) $request->input('email')))]);

        $validated = $request->validateWithBag('createUser', [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', Rule::in([User::ROLE_ADMIN, User::ROLE_SUPER_ADMIN])],
            'password' => ['required', 'string', 'min:'.self::MIN_PASSWORD_LENGTH, 'max:255'],
        ]);

        $user = new User([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);
        $user->role = $validated['role'];
        $user->save();

        return back()->with('status', "{$user->name} was added as ".($user->isSuperAdmin() ? 'a super admin' : 'an admin').'.');
    }

    public function updatePassword(Request $request, User $user): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:'.self::MIN_PASSWORD_LENGTH, 'max:255'],
        ]);

        if ($validator->fails()) {
            return back()->with('error', $validator->errors()->first());
        }

        $user->password = $request->input('password');
        $user->save();

        // Sign them out everywhere, unless they are changing their own password.
        if ($user->isNot($request->user())) {
            DB::table('sessions')->where('user_id', $user->id)->delete();
        }

        return back()->with('status', "Password updated for {$user->name}.");
    }

    public function updateRole(Request $request, User $user): RedirectResponse
    {
        $role = $request->input('role');

        if (! in_array($role, [User::ROLE_ADMIN, User::ROLE_SUPER_ADMIN], true)) {
            return back()->with('error', 'Choose a valid role.');
        }

        if ($user->is($request->user())) {
            return back()->with('error', 'You cannot change your own role.');
        }

        if ($user->isSuperAdmin() && $role === User::ROLE_ADMIN && $this->superAdminCount() <= 1) {
            return back()->with('error', 'There must always be at least one super admin.');
        }

        $user->role = $role;
        $user->save();

        return back()->with('status', "{$user->name} is now ".($user->isSuperAdmin() ? 'a super admin' : 'an admin').'.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        if ($user->is($request->user())) {
            return back()->with('error', 'You cannot remove your own account.');
        }

        if ($user->isSuperAdmin() && $this->superAdminCount() <= 1) {
            return back()->with('error', 'There must always be at least one super admin.');
        }

        $name = $user->name;

        DB::table('sessions')->where('user_id', $user->id)->delete();
        $user->delete();

        return back()->with('status', "{$name} was removed.");
    }

    private function superAdminCount(): int
    {
        return User::query()->where('role', User::ROLE_SUPER_ADMIN)->count();
    }
}
