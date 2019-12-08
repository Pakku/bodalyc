<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitation;

class InvitationController extends Controller
{

    /**
     * Show the invitation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Invitation $invitation)
    {
        return view('invitation', compact('invitation'));
    }
}
