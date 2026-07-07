<?php

class WorkoutAI
{
    public static function getSplit($days)
    {
        switch ($days) {

            // 1 DIA - Full Body
            case 1:
                return [

                    'A' => [
                        'Peito',
                        'Costas',
                        'Ombros',
                        'Bíceps',
                        'Tríceps',
                        'Pernas',
                        'Panturrilha',
                        'Abdômen'
                    ]

                ];

            // 2 DIAS
            case 2:
                return [

                    'A' => [
                        'Peito',
                        'Costas',
                        'Bíceps',
                        'Tríceps'
                    ],

                    'B' => [
                        'Pernas',
                        'Ombros',
                        'Panturrilha',
                        'Abdômen'
                    ]

                ];

            // 3 DIAS (ABC)
            case 3:
                return [

                    'A' => [
                        'Peito',
                        'Tríceps',
                        'Ombros'
                    ],

                    'B' => [
                        'Costas',
                        'Bíceps',
                        'Antebraço'
                    ],

                    'C' => [
                        'Pernas',
                        'Panturrilha',
                        'Abdômen'
                    ]

                ];

            // 4 DIAS (ABCD)
            case 4:
                return [

                    'A' => [
                        'Peito',
                        'Tríceps'
                    ],

                    'B' => [
                        'Costas',
                        'Bíceps'
                    ],

                    'C' => [
                        'Pernas',
                        'Panturrilha'
                    ],

                    'D' => [
                        'Ombros',
                        'Antebraço',
                        'Abdômen'
                    ]

                ];

            // 5 DIAS (ABCDE)
            case 5:
                return [

                    'A' => [
                        'Peito'
                    ],

                    'B' => [
                        'Costas'
                    ],

                    'C' => [
                        'Pernas',
                        'Panturrilha'
                    ],

                    'D' => [
                        'Ombros'
                    ],

                    'E' => [
                        'Bíceps',
                        'Tríceps',
                        'Antebraço',
                        'Abdômen'
                    ]

                ];

            // 6 DIAS (Push Pull Legs 2x)
            case 6:
                return [

                    'A' => [
                        'Peito',
                        'Tríceps',
                        'Ombros'
                    ],

                    'B' => [
                        'Costas',
                        'Bíceps',
                        'Antebraço'
                    ],

                    'C' => [
                        'Pernas',
                        'Panturrilha'
                    ],

                    'D' => [
                        'Peito',
                        'Tríceps',
                        'Ombros'
                    ],

                    'E' => [
                        'Costas',
                        'Bíceps',
                        'Antebraço'
                    ],

                    'F' => [
                        'Pernas',
                        'Panturrilha',
                        'Abdômen'
                    ]

                ];

            default:

                return [

                    'A' => [
                        'Peito',
                        'Tríceps',
                        'Ombros'
                    ],

                    'B' => [
                        'Costas',
                        'Bíceps'
                    ],

                    'C' => [
                        'Pernas',
                        'Panturrilha',
                        'Abdômen'
                    ]

                ];
        }
    }
}