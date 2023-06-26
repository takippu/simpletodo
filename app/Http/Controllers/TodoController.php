<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todo = Todo::all();

        return view('index', 
        
        ['todo' => $todo]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate(request(), [
                'name' => ['required'],
                // 'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }

        
        

        $data = request()->all();


        $todo = new Todo();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $data['name'];
        $todo->description = 'null';
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
