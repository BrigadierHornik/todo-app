<?php


namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        return Todo::get("*")->where('user_id', $request->user()->id);
    }

    public function store(Request $request)
    {

        if (Todo::whereDate("deadline", "=" ,date("Y-m-d", strtotime($request->deadline)))->where('user_id', $request->user()->id)->where('completed', 0)->count() >= 2)
        {
            return response()->json(['title' => 'Error','message' => 'You already have a 2 todos uncompleted for this date'], 400);
        }
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'completed' => 'nullable|boolean',
        ]);
        $request->merge(['user_id' => $request->user()->id]);
        $request->merge(['deadline' => date("Y-m-d",strtotime($request->deadline))]);
        //return $request->all();
        return Todo::create($request->all());
        //return (Todo::get("user_id")->where('deadline',$request->deadline)->count());*/
    }

    public function show(Todo $todo)
    {
        return $todo;
    }

    public function update(Request $request, Todo $todo)
    {
        //return $request->todo;
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'completed' => 'nullable|boolean',
        ]);

        $todo->update($request->all());

        return $todo;
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json(null, 204);
    }
}