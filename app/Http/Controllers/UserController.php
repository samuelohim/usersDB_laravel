<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a user variable

        $users = User::get();   // this gets all of our users
        return view('user', compact('users')); // dd($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // get all the information from the form
        $userData = $request->all();
        /* Approach # 1:    Pass an array */
            //    $user = User::create($userData);  // create() insert the record into our DB automatically    // dd($userData);

        /* Approach # 2:    Pass in the $request; simplify down to one line */
            //    $user = User::create($request->all());  // create() insert the record into our DB automatically    // dd($userData);


        /* create a new user object from user model */
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));

         //   dd($user);

        // store them into db
            $user->save();

        // redirect the user back to the user list 


            return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find a user with this $id

      //  $user = User::find($id);
        $user = User::where('id', $id)->first();
        return view('users-show', compact('user'));
        // return a view to show the user (pass the user into the view)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id); // $user = User::where('id', $id)->first();
        return view('user-edit', compact('user'));
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
        //
            $user = User::find($id);

        // if ($request->has('name'))
        //     $user->name = $request->input('name');
        // if ($request->has('email'))
        //     $user->email = $request->input('email');
        // if ($request->has('password'))
        //     $user->password = bcrypt($request->input('password'));
        // $user->save();

        // return redirect('users');
            $userData = array_filter($request->all());
            if (isset($userData['password']))
                $userData['password'] = bcrypt($userData['password']);
            $user->fill($userData);
            $user->save();
            return redirect('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::find($id);        // $user = User::where('id', $id)->first();
        $user->delete();
        // $user->save();
        return redirect('users');
    }
}
