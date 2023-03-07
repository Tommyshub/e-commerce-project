<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ProfileController extends Controller
{
    // Get user info

    // Renders profile page
    public function index()
    {
        $user = auth()->user();
        return Inertia::render('Profile', [
            'user' => $user,
        ]);
    }


    // Updates user information
    public function update(Request $request, $id)
    {
        // Update user fields with input from request
        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'city' => $request->input('stadt'),
            'state' => $request->input('bundesland'),
            'street' => $request->input('strasse'),
            'house_number' => $request->input('hausnummer'),
            'postal_code' => $request->input('plz'),
            'phone_number' => $request->input('telefonnummer'),
        ]);
        // Returns to profile with success message
        return Redirect::route('profile.index')->with('success', 'Benutzerinformationen aktualisiert');
    }
}
