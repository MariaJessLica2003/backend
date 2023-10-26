<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Faker\Provider\UserAgent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //retrieve the validated import data
        $validated = $request->validated();
        $validated['password'] = hash::make($validated['password']);
        $User = User::create($validated);

        return $User;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $User = User::findOrfail($id);

        $validated = $request->validated();

        $User->name = $validated['name'];

        $User->save();

        return $User;
    }

    /**
     * Update email the specified resource in storage.
     */
    public function email(UserRequest $request, string $id)
    {
        $User = User::findOrfail($id);

        $validated = $request->validated();

        $User->email = $validated['email'];

        $User->save();

        return $User;
    }
    /**
     * Update password the specified resource in storage.
     */
    public function password(UserRequest $request, string $id)
    {
        $User = User::findOrfail($id);

        $validated = $request->validated();

        $User->password = hash::make($validated['password']);

        $User->save();

        return $User;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::findOrfail($id);

        $User->delete();

        return $User;
    }
}
