<?php

const MIN_PASSING_GRADE = 38;
const ROUNDING_THRESHOLD = 3;

function getNextMultipleOfFive(int $number): int
{
  return $number % 5 === 0 ? $number : ceil($number / 5) * 5;
}

function calculateFinalGrade(int $grade): int
{
  if ($grade < MIN_PASSING_GRADE) return $grade;

  $nextMultiple = getNextMultipleOfFive($grade);
  return ($nextMultiple - $grade) < ROUNDING_THRESHOLD ? $nextMultiple : $grade;
}

function gradeStudents(array $grades): array
{
  return array_map('calculateFinalGrade', $grades);
}

function readGradesFromInput(int $numberOfStudents): array
{
  $grades = [];
  for ($i = 0; $i < $numberOfStudents; $i++) {
    $input = trim(fgets(STDIN));
    $grades[] = (int)$input;
  }
  return $grades;
}

function main(): void
{
  $numberOfStudents = (int)trim(fgets(STDIN));

  $grades = readGradesFromInput($numberOfStudents);
  $finalGrades = gradeStudents($grades);

  foreach ($finalGrades as $finalGrade) {
    echo $finalGrade . "\n";
  }
}

main();
