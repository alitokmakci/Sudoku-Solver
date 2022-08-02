<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $problems = Problem::paginate();

        return response()->json($problems);
    }

    public function show(int $id)
    {
        $problem = Problem::findOrFail($id);
        return response()->json($problem);
    }

    public function random()
    {
        $problem = Problem::inRandomOrder()->first();

        return response()->json($problem);
    }

    public function test(Request $request, int $id)
    {
        $problem = Problem::findOrFail($id);

        $result = $problem->solution == $request->get('solution');

        return response()->json([
            'result' => $result
        ]);
    }
}
