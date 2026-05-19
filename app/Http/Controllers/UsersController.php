<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Users\CreateUserRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $builder = User::query();
        if($request->has('keyword') && $request->input('keyword')) {
            $builder = $builder->where('name', 'LIKE' , '%'.$request->input('keyword').'%')
            ->orWhere('email', 'LIKE' , '%'.$request->input('keyword').'%')
            ->orWhere('role', 'LIKE' , '%'.$request->input('keyword').'%');
        }
        $items = $builder->paginate(5);
        return view('users.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        try {
            // \DB::beginTransaction();
            $userData = new User();
            $userData->name = $request->name;
            $userData->email = $request->email;
            $userData->password = $request->password;
            $userData->phone = $request->phone;
            $userData->role = $request->role;

            if (!$userData->save()) {
                throw new \Exception("User has not been created. please try again later", 422);
                
            }
            // \DB::commit();
            return redirect()->route('users.index')->with('success','Add new User successfully!' );
        } catch (\Throwable $th) {
            // \DB::rollback();
            dd($th);
            return redirect()->back()->with('error', $th->getMessage());
        }
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
    public function edit(string $id)
    {
         $user = User::find($id);
        return view('users.edit',['item' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         try {
            // \DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->role = $request->role;
            
            if (!$user->save()) {
                throw new \Exception("User has not been updated. Please try again later", 422);
            }
            // \DB::commit();
            return redirect()->route('users.index')->with('success','User update successfully!' );
        } catch (\Throwable $th) {
            // \DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userData = User::findOrFail($id);
        $userData->delete();
        return redirect()->route('users.index')->with('success','User delete successfully!' );;
    }
    
}
