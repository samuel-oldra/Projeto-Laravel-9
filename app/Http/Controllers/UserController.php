<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show($id)
    {
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.index');
    }

    public function update(Request $request, $id)
    {
        if (!$user = User::find($id))
            return redirect()->route('users.index');

        dd($request->all());
    }
}
