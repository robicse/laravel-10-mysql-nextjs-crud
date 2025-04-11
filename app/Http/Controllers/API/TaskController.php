<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        return response()->json(Task::all());
    }

    public function store(Request $request){
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return response()->json([
            'status' => true,
            'data' => $task
        ]);
    }

    public function show($id){
        $task = Task::find($id);
        if(!$task){
            return response()->json([
                'status' => false,
                'message' => 'Task not found'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $task
        ]);
    }


    // public function update(Request $request, $id){
    //     $task = Task::find($id);
    //     if(!$task){
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Task not found'
    //         ]);
    //     }
    //     $task->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'status' => $request->status
    //     ]);
    //     return response()->json([
    //         'status' => true,
    //         'data' => $task
    //     ]);
    // }

    public function update(Request $request, $id){
        $task = Task::find($id);
        if(!$task){
            return response()->json([
                'status' => false,
                'message' => 'Task not found'
            ]);
        }
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return response()->json([
            'status' => true,
            'data' => $task
        ]);
    }

    // public function destroy($id){
    //     $task = Task::find($id);
    //     if(!$task){
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Task not found'
    //         ]);
    //     }
    //     $task->delete();
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Task deleted successfully'
    //     ]);
    // }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'status' => false,
                'message' => 'Task not found'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'status' => true,
            'message' => 'Task deleted successfully'
        ]);
    }

}
