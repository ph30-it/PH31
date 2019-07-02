<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleUser;
use App\Role;
use Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show list user
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show form create user 
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // code xử lí tạo user
        try 
        {

            if ($request->hasFile('image')) 
            {
                $imageData = [];
                foreach (request()->file('image') as $image) 
                {
                    $filename = $image->getClientOriginalName();
                    $newFilename = '/images/user/'.md5(microtime(true)).$filename;
                    $image->move(public_path('/images/user/'), $newFilename);
                    array_push($imageData, $newFilename);
                }
                $images = implode(',', $imageData);
                // dd($images);
                $userData = $request->except(["_token", "image"]);
                $userData['images']= $images;
                $userData['password'] = bcrypt($userData['password']);
                User::create($userData);
            }
            return redirect()->route('cats.create')->with('message', 'create success');
        } catch (Exception $ex) 
            {
                return redirect()->back()->with('fail', 'create fail');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $user = User::find($userId);
        dd($user);
        // return view('user.detail', compact('user'));
        // show detail user
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // show form edit user info
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // xử lí update user info 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete user
    }

    public function getFullName($id)
    {
        // get fullname
    }

    public function getFormSetRole($id)
    {
        $user= User::find($id);
        $listUserRoles = RoleUser::where('user_id', $id)->pluck('role_id')->toArray();
        // dd($listUserRoles);

        $roles= Role::all();
        return view('user.set_role', compact('user', 'listUserRoles', 'roles'));
    }

    public function storeRole(Request $request, $id)
    {
        $data = $request->get('role_id');
        $user = User::find($id);
        $user->roles()->sync($data);
        return redirect()->route('form-set-role-user', $user->id);
        // dd($data);

    }
    public function read()
    {
        $data = Excel::load('/file/ScreenList.xlsx')->get();
        dd($data);
    }
}
