<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showFormContact()
    {
        return view('mail.contact-us');
    }

    public function sendMailContact(Request $request)
    {
        $email = $request->get('email');
        $content = $request->get('content');
        \Mail::to($email)->send(new ContactMail($email, $content));
        dd('done');
        // return redirect()->route('/');
    }

}
