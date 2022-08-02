<?php

namespace App\Http\Controllers;

use App\Services\SolutionService;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function solve(Request $request)
    {
        $service = new SolutionService($request->get('problem'));

        if ($service->checkThatProblemExists()) {
            return response()->json($service->getProblem());
        }

        $result = $service->solve();

        if (!$result) {
            return response()->json([
                'solution' => 'Sudoku could not solved!'
            ], 500);
        }

        $service->saveProblem();

        return response()->json($service->getProblem());
    }

    public function test(Request $request)
    {
        $service = new SolutionService($request->get('problem'));
        $service->setSolutionStr($request->get('solution'));

        $result = $service->testSolution();

        if ($result && !$service->checkThatProblemExists()) {
            $service->saveProblem();
        }

        return response()->json([
            'result' => $result
        ]);
    }
}
