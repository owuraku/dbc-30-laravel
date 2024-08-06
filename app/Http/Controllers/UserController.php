<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index',[
            'users' => $users
        ]);

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', [
            'user' => new User
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $this->getValidationRules();
        $data = $request->validate(
            $validator['rules'],$validator['messages']
        );

        User::create($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = $this->getValidationRules($user->id);
        $data = $request->validate(
            $validator['rules'],$validator['messages']
        );

        $user->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    private function getValidationRules($userId = null) {
        $rules = [
            'fullname' => 'required|regex:/^[\pL\s]+$/u|min:5|max:255',
            'role' => 'required|in:admin,super_admin',
            'email' => ['required','email','max:255'],
        ];

        if ($userId != null){
            $rules['email'][] =  Rule::unique('users')->ignore($userId);
        } else {
            $rules['email'][] = 'unique:users';
            $rules['password'] = 'required|alpha|max:255|min:8|confirmed';
            $rules['password_confirmation'] = 'required';
        }
        $messages = [
            'fullname.regex' => 'Fullname must contain only alphabets and spaces'
        ];
        $attributes = [];
        return ['rules' => $rules, 'messages' => $messages,'attributes' => $attributes];
   } 
}
