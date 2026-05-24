<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

     public function show()
    {
        $user = UserModel::findOrFail(Auth::id());
        return view('website.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = UserModel::findOrFail($id);
        return view('website.profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $id = Auth::id();
    $user = UserModel::findOrFail($id);

    $data = $request->validate([
        'name'     => 'sometimes|required|alpha|max:255',
        'email'    => 'sometimes|required|email|unique:users,email,' . $id,
        'phone'    => 'sometimes|required|string|max:20',
        'password' => 'nullable|min:6|confirmed',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4000',
    ], [
        'name.required'      => 'Name is required.',
        'name.max'           => 'Name must not exceed 255 characters.',
        'name.alpha'         => 'Name must be only chuructur',
        'email.required'     => 'Email is required.',
        'email.email'        => 'Please enter a valid email address.',
        'email.unique'       => 'This email already exists.',
        'phone.required'     => 'Phone number is required.',
        'phone.max'          => 'Phone number is too long.',
        'password.min'       => 'Password must be at least 6 characters.',
        'password.confirmed' => 'Password confirmation does not match.',
        'image.image'        => 'The uploaded file must be an image.',
        'image.mimes'        => 'Image must be jpg, jpeg, png, or webp.',
        'image.max'          => 'Image size must not exceed 4MB.',
    ]);

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    } else {
        unset($data['password']);
    }

    if ($request->hasFile('image')) {
        $file     = $request->file('image');
        $fileName = time() . "_" . $file->getClientOriginalName();
        $path     = $file->storeAs('images', $fileName, 'public');
        $data['image'] = $path;
    }

    $user->update($data);

    return redirect()->route('profile')->with('msg', 'Profile updated successfully');
}

}
