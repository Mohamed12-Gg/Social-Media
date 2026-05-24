<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'subscriber') {
        return redirect()->route('home');
    }
        $users = UserModel::all();
        return view('admin.users.index',compact('users'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
   $data = $request->validate(

    [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|max:20',
        'role' => 'required|in:admin,subscriber',
        'password' => 'required|min:6|confirmed',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ],

    [
        // Name
        'name.required' => 'Please enter your full name.',
        'name.string' => 'Name must be text only.',
        'name.max' => 'Name must not exceed 255 characters.',

        // Email
        'email.required' => 'Please enter your email.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already taken.',

        // Phone
        'phone.required' => 'Please enter your phone number.',
        'phone.max' => 'Phone number is too long.',

        // Role
        'role.required' => 'Please select a role.',
        'role.in' => 'Selected role is invalid.',

        // Password
        'password.required' => 'Please enter a password.',
        'password.min' => 'Password must be at least 6 characters.',
        'password.confirmed' => 'Password confirmation does not match.',

        // Image
        'image.required' => 'Please upload an image.',
        'image.image' => 'Uploaded file must be an image.',
        'image.mimes' => 'Image must be JPG, JPEG, PNG, or WEBP.',
        'image.max' => 'Image size must not exceed 2MB.',
    ]

);


    // Create Image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $path = $file->storeAs('images',$fileName,'public');
            $data['image'] = $path;
         }

        //  return $data;


        // Create
        $data['password'] = Hash::make($request->password);
        UserModel::create($data);


    // Save
        // $user = new UserModel();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->phone = $request->phone;
        // $user->role = $request->role;
        // $user->iamge = $request->image;
        // if ($request->hasFile('image')) {
        // // Create Image
        //     $file = $request->file('image');
        //     $fileName = time() . "_" . $file->getClientOriginalName();
        //     $path = $file->storeAs('images',$fileName,'public');
        //     $user['image'] = $path;
        //  }

        // return $user;
        // $user->save();
        return redirect()->route('users.index')->with('msg', 'User Added successfully');


}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = UserModel::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = UserModel::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data = $request->validate(

    [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'required|string|max:20',
        'role' => 'required|in:admin,subscriber',
        'password' => 'nullable|min:6|confirmed',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4000',
    ],

    [
        // Name
        'name.required' => 'Name is required.',
        'name.string' => 'Name must be text.',
        'name.max' => 'Name must not exceed 255 characters.',

        // Email
        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email already exists.',

        // Phone
        'phone.required' => 'Phone number is required.',
        'phone.max' => 'Phone number is too long.',

        // Role
        'role.required' => 'Please select a role.',
        'role.in' => 'Invalid role selected.',

        // Password
        'password.min' => 'Password must be at least 6 characters.',
        'password.confirmed' => 'Password confirmation does not match.',

        // Image
        'image.image' => 'The uploaded file must be an image.',
        'image.mimes' => 'Image must be jpg, jpeg, png, or webp.',
        'image.max' => 'Image size must not exceed 2MB.',
    ]

);
        $user = UserModel::findOrFail($id);
        $data['password'] = Hash::make($request->password);
        // لو فيه باسورد جديدة
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    } else {
        unset($data['password']);
    }

    // Image
     if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $path = $file->storeAs('images',$fileName,'public');
            $data['image'] = $path;
         }

        $user->update($data);
        return redirect()->route('users.index')->with('msg', 'User Edit successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        UserModel::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('msg', 'User Deleted successfully');
    }
}
