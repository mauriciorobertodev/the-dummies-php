<?php
namespace Lugo4php;

use Lugo\Velocity as LugoVelocity;
use Lugo4php\Interfaces\IVelocity;

class Velocity implements IVelocity
{
	public function __construct(private Vector2D $direction, private float $speed) {}

	public function getDirection(): Vector2D
	{
		return $this->direction;
	}

    public function setDirection(Vector2D $direction): self
	{
		$this->direction = $direction;
		return $this;
	}

    public function getSpeed(): float
	{
		return $this->speed;
	}

    public function setSpeed(float $speed): self
	{
		$this->speed = $speed;
		return $this;
	}

	public function toLugoVelocity(): LugoVelocity
	{
		$velocity = new LugoVelocity();
		$velocity->setSpeed($this->speed);
		$velocity->setDirection($this->direction->toLugoVector());
		return $velocity;
	}

	public function __toString(): string
	{
		return "[{$this->direction->getX()}, {$this->direction->getY()}, {$this->speed}]";
	}

	public static function fromLugoVelocity(LugoVelocity $lugoVelocity): Velocity
	{
		return new Velocity(
			Vector2D::fromLugoVector($lugoVelocity->getDirection())->normalize(),
			$lugoVelocity->getSpeed()
		);
	}

	public static function newZeroed(): Velocity
	{
		return new Velocity(new Vector2D(), 0);
	}
}