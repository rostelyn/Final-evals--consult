<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($profile)
    {
        // Validate the profile parameter to match the allowed profiles
        $validProfiles = ['Prof.bsit101', 'Prof.bsit201', 'Prof.bsit301', 'Prof.bsit401'];
        if (!in_array($profile, $validProfiles)) {
            abort(404);
        }

        // Return the corresponding view
        return view("AdminCtation.Studentlistinfo.{$profile}");
    }
}

