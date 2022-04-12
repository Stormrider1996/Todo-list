<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
   
    public function index()
    {
        $todolists = Todolist::all();
        return view('home', compact('todolists'));
    }

   public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);
        
        Todolist::create($data);
        return redirect()->route('todolist.index');
    }

    
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return redirect()->route('todolist.index');
    }
}
