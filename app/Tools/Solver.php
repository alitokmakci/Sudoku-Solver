<?php

namespace App\Tools;

class Solver
{
    protected array $originalProblem;
    protected array $problem = [];

    protected array $solution;


    /**
     * @param array $problem
     */
    public function setProblem(array $problem): void
    {
        $this->originalProblem = $problem;
    }

    public function getSolution()
    {
        return $this->problem;
    }

    public function solve(): bool
    {
        $this->convertOriginalProblemToDimensionalArray();

        return $this->startSolver();
    }

    protected function startSolver(): bool
    {
        $emptyCellsExists = $this->checkEmptyCellExists();

        if (!$emptyCellsExists) {
            return true;
        }

        $r = $emptyCellsExists[0];
        $c = $emptyCellsExists[1];

        for ($num = 1; $num < 10; $num++) {
            if ($this->checkNumberIsValid($num, $r, $c)) {
                $this->problem[$r][$c] = $num;

                if ($this->startSolver()) {
                    return true;
                } else {
                    $this->problem[$r][$c] = 0;
                }

            }
        }

        return false;
    }


    protected function convertOriginalProblemToDimensionalArray()
    {
        $i = 0;
        $row = [];

        foreach ($this->originalProblem as $item) {
            array_push($row, $item);

            if ($i % 9 === 8) {
                array_push($this->problem, $row);
                $row = [];
            }

            $i++;
        }
    }

    protected function checkEmptyCellExists(): array|bool
    {
        for ($row = 0; $row < 9; $row++) {
            for ($col = 0; $col < 9; $col++) {
                if ($this->problem[$row][$col] === 0) {
                    return [$row, $col];
                }
            }
        }

        return false;
    }

    protected function checkNumberIsValid($number, $row, $col): bool
    {
        // Check vertically
        for ($r = 0; $r < 9; $r++) {
            if ($this->problem[$r][$col] == $number) {
                return false;
            }
        }

        // Check horizontally
        for ($c = 0; $c < 9; $c++) {
            if ($this->problem[$row][$c] == $number) {
                return false;
            }
        }

        $gridRow = (intdiv($row, 3)) * 3;
        $gridCol = (intdiv($col, 3)) * 3;

        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($this->problem[$gridRow + $i][$gridCol + $j] == $number) {
                    return false;
                }
            }
        }

        return true;
    }

    public function testSolution(array $solution): bool
    {
        $this->originalProblem = $solution;

        $this->convertOriginalProblemToDimensionalArray();

        if ($this->checkEmptyCellExists() !== false) {
            return false;
        }

        for ($row = 0; $row < 9; $row++) {
            for ($col = 0; $col < 9; $col++) {
                if (!$this->checkNumberForTest($this->problem[$row][$col], $row, $col)) {
                    return false;
                }
            }
        }

        return true;
    }

    protected function checkNumberForTest($number, $row, $col)
    {
        $result = 0;
        // Check vertically
        for ($r = 0; $r < 9; $r++) {
            if ($this->problem[$r][$col] == $number) {
                $result++;
            }
        }

        if ($result > 1) {
            return false;
        }

        $result = 0;
        // Check horizontally
        for ($c = 0; $c < 9; $c++) {
            if ($this->problem[$row][$c] == $number) {
                $result++;
            }
        }

        if ($result > 1) {
            return false;
        }

        $result = 0;
        $gridRow = (intdiv($row, 3)) * 3;
        $gridCol = (intdiv($col, 3)) * 3;

        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($this->problem[$gridRow + $i][$gridCol + $j] == $number) {
                    $result++;
                }
            }
        }

        if ($result > 1) {
            return false;
        }

        return true;
    }
}