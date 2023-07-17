<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoCategory;
use App\Models\UserTodoCategory;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $todo = Todo::all();
        if (Auth::check()) {
            $posts = auth()->user()->todoList()->get();
            $cats = auth()->user()->userCats()->get();
        }else{
            $posts = null;
            $cats = null;
        }


        return view('index', 
        
        ['todo' => $posts,
        'categories' => $cats,        
        ]);
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
        // try {
        //     $this->validate(request(), [
        //         'name' => ['required'],
        //         // 'description' => ['required']
        //     ]);
        // } catch (ValidationException $e) {
        // }

    
        // $data = request()->all();
        // $todo = new Todo();
        // //On the left is the field name in DB and on the right is field name in Form/view
        // $todo->name = $data['name'];
        // $todo->description = 'null';
        // $todo->save();

        // session()->flash('success', 'new things added!');

        // return redirect('/');

         //security purpose
         $request->validate([
            'name' => ['required'],
        ]);
    
        Todo::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
            'description' => null,

        ]);
        session()->flash('success', 'new things added!');

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
        $list = Todo::findOrFail($id);
        
        // Perform any additional checks or authorization before deleting
    
        $list->delete();

        // Optionally, you can return a response or redirect to a specific page
        return redirect()->back()->with('successdelete', 'List item deleted successfully.');


    }



    //Add New Category
    public function addCategory(Request $request)
    {
         //security purpose
         $request->validate([
            'name' => ['required'],
        ]);
    
        UserTodoCategory::create([
            'category' => $request->name,
            'user_id' => auth()->id(),


        ]);
        session()->flash('success', 'new things added!');

        return redirect('/');
    }
}
