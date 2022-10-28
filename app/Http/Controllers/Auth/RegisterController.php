<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

use App\Models\User;
use App\Http\Requests\User\Auth\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        
        User::create(array_merge($data, [
            "password" => Hash::make($request->password),
            "status_id" => 1
        ]));
        
        return redirect()->route('register')->with('success', 'You have successfully submitted, your application is under approval.');
    }
}
