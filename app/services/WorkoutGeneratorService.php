<?php

require_once __DIR__ . '/../models/Workout.php';
require_once __DIR__ . '/../models/WorkoutExercise.php';
require_once __DIR__ . '/../models/Exercise.php';
require_once __DIR__ . '/WorkoutAI.php';

class WorkoutGeneratorService
{

    private $exerciseModel;
    private $workoutModel;
    private $workoutExerciseModel;

    public function __construct()
    {
        $this->exerciseModel = new Exercise();
        $this->workoutModel = new Workout();
        $this->workoutExerciseModel = new WorkoutExercise();
    }

    public function generate($student)
    {
        
        $split = WorkoutAI::getSplit(
            $student['training_days']
        );

        list($sets, $reps, $rest) =
            $this->getTrainingConfig(
                $student['objective']
            );

        foreach ($split as $letter => $groups) {


            $workoutId = $this->workoutModel
                ->createAndReturnId([

                'student_id' => $student['id'],
                'workout_name' => "Treino {$letter}",
                'objective' => $student['objective'],
                'training_days' => $student['training_days'],
                'trainer_id' => null

            ]);
            

            $order = 1;

            foreach ($groups as $group) {

                $limit = $this->exerciseLimit($group);

                $exercises =
                    $this->exerciseModel
                    ->findRandomByMuscleGroup(
                        $group,
                        $student['experience_level'],
                        $limit
                    );

                foreach ($exercises as $exercise) {

                    $this->workoutExerciseModel
                        ->create([

                        'workout_id' => $workoutId,
                        'exercise_id' => $exercise['id'],
                        'sets' => $sets,
                        'reps' => $reps,
                        'rest_time' => $rest,
                        'notes' => 'Gerado automaticamente pela IA',
                        'exercise_order' => $order++

                    ]);
                }
            }
        }
    }

    private function getTrainingConfig($objective)
    {

        switch ($objective) {

            case 'Hipertrofia':
                return [4, '8-12', 90];

            case 'Emagrecimento':
                return [3, '12-15', 45];

            case 'Força':
                return [5, '4-6', 180];

            case 'Resistência':
                return [3, '15-20', 30];

            default:
                return [4, '10-12', 60];
        }
    }

    private function exerciseLimit($group)
    {

        switch ($group) {

            case 'chest':
            case 'back':
            case 'legs':
                return 4;

            case 'shoulders':
            case 'biceps':
            case 'triceps':
                return 3;

            case 'abs':
            case 'forearms':
            case 'calves':
                return 2;

            default:
                return 3;
        }
    }
}