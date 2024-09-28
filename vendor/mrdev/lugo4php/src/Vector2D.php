<?php

namespace Lugo4php;

use Lugo4php\Interfaces\IPositionable;
use Lugo4php\Traits\IsPositionable;
use Lugo\Point as LugoPoint;
use Lugo\Vector as LugoVector;

class Vector2D implements IPositionable
{
    use IsPositionable;

    public function __construct(float $x = 0, float $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public static function fromLugoPoint(LugoPoint $lugoPoint): Vector2D {
        return (new static())->setX($lugoPoint->getX())->setY($lugoPoint->getY());
    }

    public static function fromLugoVector(LugoVector $lugoVector): Vector2D {
        return (new static())->setX($lugoVector->getX())->setY($lugoVector->getY());
    }
}