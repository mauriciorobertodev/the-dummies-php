<?php

namespace Bot;

use Lugo4php\Formation;
use Lugo4php\GameInspector;
use Lugo4php\Interfaces\IBot;
use Lugo4php\PlayerState;
use Lugo4php\Interfaces\IMapper;
use Lugo4php\Mapper;
use Lugo4php\Point;
use Lugo4php\SPECS;

class MyBot implements IBot
{
	private Formation $formationOffensive;
	private Formation $formationDefensive;
	private Formation $formationNormal;

	public function __construct(public IMapper $mapper) {
		$this->formationOffensive = Formation::createFromArray(OFFENSIVE);
		$this->formationDefensive = Formation::createFromArray(DEFENSIVE);
		$this->formationNormal = Formation::createFromArray(NORMAL);
	}

	public function onDisputing(GameInspector $inspector): array
	{
		$orders = [];
		$ballPosition = $inspector->getBall()->getPosition();

		$ballRegion = $this->mapper->getRegionFromPoint($ballPosition);
		$myRegion = $this->mapper->getRegionFromPoint($inspector->getMyPosition());

		$moveDestination = $this->getMyExpectedPosition($inspector, $this->mapper, $inspector->getMyNumber());

		if ($myRegion->distanceToRegion($ballRegion) <= 2) {
			$moveDestination = $ballPosition;
		}

		if(!$inspector->getMyPosition()->is($moveDestination)) {
			$orders[]  = $inspector->makeOrderMoveToPoint($moveDestination);
		}

		$orders[] = $inspector->makeOrderCatch();

		return $orders;
	}

	public function onHolding(GameInspector $inspector): array
	{
		$attackGoalCenter = $inspector->getAttackGoal()->getCenter();
		$opponentGoalRegion = $this->mapper->getRegionFromPoint($attackGoalCenter);
		$currentRegion = $this->mapper->getRegionFromPoint($inspector->getMyPosition());

		if ($currentRegion->distanceToRegion($opponentGoalRegion) <= 2) {
			$goalTopY = $inspector->getAttackGoal()->getTopPole()->getY();
			$goalBottomY = $inspector->getAttackGoal()->getBottomPole()->getY();
			$goalX = $inspector->getAttackGoal()->getCenter()->getX();

			$randomPoint = new Point($goalX, rand($goalTopY, $goalBottomY));

			$orders[] = $inspector->makeOrderKickToPoint($randomPoint);
		} else {
			$orders[] = $inspector->makeOrderMoveToPoint($attackGoalCenter);
		}

		return $orders;
	}

	public function onDefending(GameInspector $inspector): array
	{
		$orders = [];

		$moveDestination = $this->getMyExpectedPosition($inspector, $this->mapper, $inspector->getMyNumber());

		if ($inspector->getMyPosition()->distanceTo($inspector->getBallPosition()) <= SPECS::BALL_SIZE * 3) {
			$moveDestination = $inspector->getBallPosition();
		}

		$orders[] = $inspector->tryMakeOrderMoveToPoint($moveDestination);
		$orders[] = $inspector->makeOrderCatch();

		return $orders;
	}

	public function onSupporting(GameInspector $inspector): array
	{
		$orders = [];

		$moveDestination = $this->getMyExpectedPosition($inspector, $this->mapper, $inspector->getMyNumber());
		$orders[] = $inspector->tryMakeOrderMoveToPoint($moveDestination);

		return $orders;
	}
	
	public function asGoalkeeper(GameInspector $inspector, PlayerState $state): array
	{		
		$orders = [];

		var_dump('SOU GOLEIROOO brasil zz');

		if ($state === PlayerState::DISPUTING) {
			$orders[] = $inspector->makeOrderJumpToPoint($inspector->getBallPosition());
			$orders[] = $inspector->makeOrderCatch();
		}

		if($state === PlayerState::HOLDING) {
			if($inspector->getBallRemainingTurnsInGoalZone() > 3) {
				$orders[] = $inspector->tryMakeOrderMoveToPoint($inspector->getDefenseGoal()->getCenter());
			} else {
				$orders[] = $inspector->tryMakeOrderKickToPlayer($inspector->getMyPlayer(rand(2, 11)));
			}
		}

		if ($state === PlayerState::SUPPORTING || $state === PlayerState::DEFENDING) {
			$orders[] = $inspector->makeOrderMoveToPoint($inspector->getBallPosition());
			$orders[] = $inspector->makeOrderCatch();
		}

		return $orders;
	}

	public function getMyExpectedPosition(GameInspector $inspector, Mapper $mapper): Point
    {
        $ballPosition = $inspector->getBallPosition();
        $ballRegion = $mapper->getRegionFromPoint($ballPosition);
        $fieldThird = $this->mapper->getCols() / 3;
        $ballCols = $ballRegion->getCol();

		$tacticPositions = $this->formationOffensive;
        if ($ballCols < $fieldThird) {
			$tacticPositions = $this->formationDefensive;
        } elseif ($ballCols < $fieldThird * 2) {
			$tacticPositions = $this->formationNormal;
        }

		$position = $tacticPositions->getPositionOf($inspector->getMyNumber());
    
        $expectedRegion = $mapper->getRegion($position->getX(), $position->getY());

        return $expectedRegion->getCenter();
    }

	public function onReady(GameInspector $inspector): void { }
	
	public function beforeActions(GameInspector $inspector): void { }

	public function afterActions(GameInspector $inspector): void { }
}