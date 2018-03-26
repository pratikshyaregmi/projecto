<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Role;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        public function __construct()
        { $this->middleware('admin', ['only' => ['userslist', 'destroy']]);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::pluck('name', 'id');
        return view('users.index', compact('users'));
    }

    public function userslist()
    {
        $users = User::all();
        $roles = Role::pluck('name', 'id');
        return view('users.userslist', compact('users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::whereUsername($username)->first();
        if (Auth::user()->role_id == $user->id){
        return view('users.edit', compact('user'));
        }
        else {
          return 'You do not have permission for this!';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
            $rules = [
                'photo_id' => ['mimes:jpeg,jpg,png', 'max:1000'],
                'name' => ['min:1', 'max:32'],
                'about' => ['min:20', 'max:2000'],
            ];

            $message = [
              'photo_id.mimes' => 'Please upload a jpeg, jpg or png file',
              'photo_id.max' => 'Your profile picture should not exceed 1mb',
            ];

            $this->validate($request, $rules, $message);

          $input = $request->all();
          $user = User::whereUsername($username)->first();

          if (Auth::user()->id == $user->id){
            if ($file = $request->file('photo_id')) {

              if ($user->photo){
                unlink('images/' . $user->photo->photo);
                $user->photo()->delete('photo');
              }
                // $name = Carbon::now(). '.' .$file->getClientOriginalName();
                $name = time(). '.' .$file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['photo' => $name, 'title' => $name]);
                $input['photo_id'] = $photo->id;
            }
          }
          $user->update($input);

          notify()->flash('<h2>Profile Updated successfully!</h2>', 'success');

          return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        notify()->flash('<h2>You have just deleted a user!</h2>', 'success');
        return back();

    }
}
