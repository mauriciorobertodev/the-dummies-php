<?php

require 'vendor/autoload.php';
require 'settings.php';

use Bot\MyBot;
use Lugo4php\Client;
use Lugo4php\Env;
use Lugo4php\Mapper;

$env = new Env();

$mapper = new Mapper(MAPPER_COLS, MAPPER_ROWS, $env->getBotSide());
$initRegion = PLAYER_INITIAL_POSITIONS[$env->getBotNumber()];
$initPosition = $mapper->getRegion($initRegion['col'], $initRegion['row'])->getCenter();

$bot = new MyBot($mapper);

$client = new Client(
	$env->getGrpcUrl(),
	$env->getGrpcInsecure(),
	$env->getBotToken(),
	$env->getBotSide(),
	$env->getBotNumber(),
	$initPosition
);

$client->playAsBot($bot);