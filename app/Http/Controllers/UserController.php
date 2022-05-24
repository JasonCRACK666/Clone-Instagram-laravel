<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        // Validate data
        $formField = $request->validate([
            'name' => ['required', 'min:3'],
            'lastname' => 'required',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6|confirmed'
        ]);

        // Save path the avatar
        // * Only path, not all image
        $formField['avatar'] = $request->file('avatar')->store('avatars', 'public');

        // Encrypt password
        $formField['password'] = bcrypt($formField['password']);

        // create the user
        $user = User::create($formField);

        // save user and login to App
        Auth::login($user);

        // return message
        return redirect('/')->with('message', 'Hola!, bienvenido a El Clone de Instagram');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        // Validate data
        $formField = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // verificamos que el usuario ya este registrado
        if (Auth::attempt($formField)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Ya estas logueado!');
        }

        // En caso de que no esta logueado 
        return back()->withErrors(['email' => 'Credenciales invalidas'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Ya no estás logueado');
    }

    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        if ($user->id != Auth::id()) {
            abort(403, 'No estas autorizado para realizar esta acción');
        }

        $formField = $request->validate([
            'name' => ['required', 'min:3'],
            'lastname' => 'required',
            'username' => ['required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
        ]);

        if ($request->hasFile('avatar')) {
            $formField['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($formField);

        Auth::logout();
        Auth::login($user);

        return redirect('/' . $user->username)->with('message', 'Se han actualizado sus cambios de forma correcta!');
    }

    public function destroy(User $user, Request $request)
    {
        $user->delete();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Su cuenta ha sido eliminada, con todo y sus Posts');
    }
}
