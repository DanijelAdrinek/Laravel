<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            // in the Rule::unique() method, the first argument is the table name, and the second argument is the name of the field that we want to be unique
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request) {

        $incomingFields = $request->validate([
            'loginname' => ['required', 'min:3', 'max:10'],
            'loginpassword' => ['required', 'min:8', 'max:200']
        ]);

        if(auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');

    }

    public function logout() {
        auth()->logout();

        return redirect('/');
    }


}
