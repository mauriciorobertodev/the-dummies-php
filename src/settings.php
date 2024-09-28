<?php

CONST MAPPER_COLS = 10;
CONST MAPPER_ROWS = 6;

// REGION
const PLAYER_INITIAL_POSITIONS = [
    1 => ['col' => 0, 'row' => 0],
    2 => ['col' => 1, 'row' => 1],
    3 => ['col' => 2, 'row' => 2],
    4 => ['col' => 2, 'row' => 3],
    5 => ['col' => 1, 'row' => 4],
    6 => ['col' => 3, 'row' => 1],
    7 => ['col' => 3, 'row' => 2],
    8 => ['col' => 3, 'row' => 3],
    9 => ['col' => 3, 'row' => 4],
    10 => ['col' => 4, 'row' => 3],
    11 => ['col' => 4, 'row' => 2],
];


const DEFENSIVE = [
    2 => ['col' => 1, 'row' => 1],
    3 => ['col' => 2, 'row' => 2],
    4 => ['col' => 2, 'row' => 3],
    5 => ['col' => 1, 'row' => 4],
    6 => ['col' => 3, 'row' => 1],
    7 => ['col' => 3, 'row' => 2],
    8 => ['col' => 3, 'row' => 3],
    9 => ['col' => 3, 'row' => 4],
    10 => ['col' => 4, 'row' => 3],
    11 => ['col' => 4, 'row' => 2],
];

const NORMAL = [
    2 => ['col' => 2, 'row' => 1],
    3 => ['col' => 4, 'row' => 2],
    4 => ['col' => 4, 'row' => 3],
    5 => ['col' => 2, 'row' => 4],
    6 => ['col' => 6, 'row' => 1],
    7 => ['col' => 8, 'row' => 2],
    8 => ['col' => 8, 'row' => 3],
    9 => ['col' => 6, 'row' => 4],
    10 => ['col' => 7, 'row' => 4],
    11 => ['col' => 7, 'row' => 1],
];

const OFFENSIVE = [
    2 => ['col' => 3, 'row' => 1],
    3 => ['col' => 5, 'row' => 2],
    4 => ['col' => 5, 'row' => 3],
    5 => ['col' => 3, 'row' => 4],
    6 => ['col' => 7, 'row' => 1],
    7 => ['col' => 8, 'row' => 2],
    8 => ['col' => 8, 'row' => 3],
    9 => ['col' => 7, 'row' => 4],
    10 => ['col' => 9, 'row' => 4],
    11 => ['col' => 9, 'row' => 1],
];
