<?php

namespace App\Services;

use App\Models\Problem;
use App\Tools\Solver;

class SolutionService
{
    protected string $problemStr;
    protected array $problem = [];
    protected string $solutionStr = '';
    protected array $solution = [];

    public function __construct(string $problemStr)
    {
        $this->problemStr = $problemStr;

        $this->prepareProblem();
    }

    /**
     * Prepare the array of the problem
     */
    public function prepareProblem()
    {
        foreach (str_split($this->problemStr) as $item) {
            array_push($this->problem, intval($item));
        }
    }

    public function checkThatProblemExists(): bool
    {
        return Problem::where('schema', $this->problemStr)->exists();
    }

    public function getProblem(): Problem
    {
        return Problem::where('schema', $this->problemStr)->first();
    }

    public function saveProblem(): void
    {
        $this->prepareSolutionString();

        Problem::create([
            'schema' => $this->problemStr,
            'solution' => $this->solutionStr
        ]);
    }

    public function solve(): bool
    {
        $solver = new Solver();

        $solver->setProblem($this->problem);

        $result = $solver->solve();

        $this->solution = $solver->getSolution();

        return $result;
    }

    public function testSolution(): bool
    {
        $solver = new Solver();

        $result = $solver->testSolution($this->solution);

        if ($result) {
            $this->solution = $solver->getSolution();
        }

        return $result;
    }

    protected function prepareSolutionString()
    {
        $solution = [];

        foreach ($this->solution as $row) {
            $solution = array_merge($solution, $row);
        }

        $this->solutionStr = implode('', $solution);
    }

    public function getSolution(): string
    {
        $this->prepareSolutionString();

        return $this->solutionStr;
    }

    public function setSolutionStr(string $string)
    {
        $this->solutionStr = $string;

        $this->setSolution();
    }

    protected function setSolution()
    {
        foreach (str_split($this->solutionStr) as $item) {
            array_push($this->solution, intval($item));
        }
    }
}
