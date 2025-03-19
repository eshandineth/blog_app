<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Mail\VerifyEmail;
use App\Models\User;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmail()
{
    if (Auth::user()->email_verified_at) {
        return redirect()->route('dashboard')->with('message', 'Your email is already verified.');
    }

    // Generate the signed URL for email verification
    $signedUrl = URL::temporarySignedRoute(
        'verification.verify',  // Ensure this matches the route name defined above
        now()->addMinutes(60), 
        ['id' => Auth::id()]
    );

    // Send the verification email
    Mail::to(Auth::user()->email)->send(new VerifyEmail($signedUrl));

    return back()->with('message', 'Verification email sent!');
}

public function verifyEmail(Request $request)
{
    // Check if the signed URL is valid
    if (!$request->hasValidSignature()) {
        abort(401, 'Invalid or expired verification link.');
    }

    // Find the user by ID
    $user = User::findOrFail($request->id);

    // Check if the user's email is already verified
    if ($user->email_verified_at) {
        return redirect()->route('dashboard')->with('message', 'Your email is already verified.');
    }

    // Mark the user's email as verified
    $user->email_verified_at = now();
    $user->save();

    return redirect()->route('dashboard')->with('message', 'Email verified successfully!');
}

}
