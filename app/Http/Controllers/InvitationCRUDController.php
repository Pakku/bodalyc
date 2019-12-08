<?php

namespace App\Http\Controllers;

use App\Invitation;
use Illuminate\Http\Request;
use Input;
use Illuminate\Validation\Rule;

class InvitationCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations = Invitation::all();
        return view('cms.invitations.index', compact('invitations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.invitations.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'text' => 'string|required',
        ]);

        $properties = $request->only(['name', 'text']);
        $properties['identifier'] = Invitation::createSlugFromName($properties['name']);
        $invitation = Invitation::create($properties);

        return redirect()->route('invitations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        return redirect()->route('invitations.edit', $invitation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        return view('cms.invitations.form', compact('invitation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        $request->validate([
            'identifier' => [
                'string', 'required', 'alpha_dash',
                Rule::unique('invitations')->ignore($invitation->id),
            ],
            'name' => 'string|required',
            'text' => 'string|required',
        ]);

        $properties = $request->only(['identifier', 'name', 'text']);
        $invitation->fill($properties);
        $invitation->save();

        return redirect()->route('invitations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
