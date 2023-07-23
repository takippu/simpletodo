<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use App\Models\TodoCategory;
use App\Models\TodoList;
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
            // $posts = auth()->user()->todoList()->get();
            // $cats = auth()->user()->userCats()->get();

            $posts = TodoList::where('user_id', auth()->user()->id)->get();
            $cats = Category::where('user_id',auth()->user()->id)->get();

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
            'todoAdd' => ['required'],
        ]);
        
        // $get = $request->all();
        // dd($get);
        TodoList::create([
            'todo' => $request->todoAdd,
            'user_id' => auth()->id(),
            'category_id' => is_null($request->category) ? '99' : $request->category,
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
        $list = TodoList::findOrFail($id);
        
        // Perform any additional checks or authorization before deleting
    
        $list->delete();

        // Optionally, you can return a response or redirect to a specific page
        return redirect()->back()->with('successdelete', 'One of your task is completed!');


    }



    //Add New Category
    public function addCategory(Request $request)
    {
         //security purpose
         $request->validate([
            'name' => ['required'],
        ]);
    
        Category::create([
            'category_name' => $request->name,
            'user_id' => auth()->id(),


        ]);
        session()->flash('success', 'new things added!');

        return redirect('/');
    }
    //Edit  Category
    public function editCategory(Request $request, $id)
    {
         // Validate the request data
         $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Retrieve the category based on the ID and the currently authenticated user's ID
        $category = Category::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->first();

        // If the category doesn't exist or doesn't belong to the current user, redirect back with an error message
        if (!$category) {
            return redirect()->route('index')->with('error', 'Category not found or you do not have permission to update it.');
        }

        // Update the category's name
        $category->category_name = $request->input('category_name');
        $category->save();

        // Redirect to the category index page with a success message
        // return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        session()->flash('success', 'new things added!');

        return redirect('/');
    }
}
