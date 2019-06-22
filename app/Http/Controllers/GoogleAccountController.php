<?php

namespace App\Http\Controllers;

use App\GoogleAccount;
use Illuminate\Http\Request;
use App\Services\Google;

class GoogleAccountController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts', [
            'accounts' => auth()->user()->googleAccounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Google $google)
    {
        if (! $request->has('code')) {
            // Send the user to the OAuth consent screen.
            return redirect($google->createAuthUrl());
        }

        // Use the given code to authenticate the user.
        $google->authenticate($request->get('code'));
        
        // Make a call to the Google+ API to get more information on the account.
        $account = $google->service('Plus')->people->get('me');

        auth()->user()->googleAccounts()->updateOrCreate(
            [
                // Map the account's id to the `google_id`.
                'google_id' => $account->id,
            ],
            [
                // Use the first email address as the Google account's name.
                'name' => head($account->emails)->value,
                
                // Last but not least, save the access token for later use.
                'token' => $google->getAccessToken(),
            ]
        );

        return redirect()->route('google.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GoogleAccount  $googleAccount
     * @return \Illuminate\Http\Response
     */
    public function show(GoogleAccount $googleAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GoogleAccount  $googleAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(GoogleAccount $googleAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GoogleAccount  $googleAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoogleAccount $googleAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GoogleAccount  $googleAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoogleAccount $googleAccount)
    {
        //
    }
}
