<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('cms.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect()->route('users.edit', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('cms.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => [
                'string', 'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'name' => 'string|required',
            'superadmin' => 'boolean',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $properties = $request->only(['email', 'name', 'superadmin']);
        if (!isset($properties['superadmin'])) {
            $properties['superadmin'] = false;
        }
        if ($request->has('password')) {
            $properties['password'] = Hash::make($request->get('password'));
        }
        $user->fill($properties);
        $user->save();

        Log::info('User updated', ['user' => $user, 'whodidit' => Auth::user()->id]);

        return redirect()->route('users.edit', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
