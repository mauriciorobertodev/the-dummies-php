<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: server.proto

namespace Lugo;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Changes the goalkeepers velocity in a higher speed.
 * The goalkeepers may move kicker than other players when they jump, however the jump movement cannot be interrupted
 * after triggered. (read specs to find out the number of turns the jump lasts)
 *
 * Generated from protobuf message <code>lugo.JumpOrder</code>
 */
class JumpOrder extends \Google\Protobuf\Internal\Message
{
    /**
     * Goalkeeper's velocity during the jump.
     *
     * Generated from protobuf field <code>.lugo.Velocity velocity = 1;</code>
     */
    private $velocity = null;

    public function __construct() {
        \GPBMetadata\Server::initOnce();
        parent::__construct();
    }

    /**
     * Goalkeeper's velocity during the jump.
     *
     * Generated from protobuf field <code>.lugo.Velocity velocity = 1;</code>
     * @return \Lugo\Velocity
     */
    public function getVelocity()
    {
        return $this->velocity;
    }

    /**
     * Goalkeeper's velocity during the jump.
     *
     * Generated from protobuf field <code>.lugo.Velocity velocity = 1;</code>
     * @param \Lugo\Velocity $var
     * @return $this
     */
    public function setVelocity($var)
    {
        GPBUtil::checkMessage($var, \Lugo\Velocity::class);
        $this->velocity = $var;

        return $this;
    }

}

