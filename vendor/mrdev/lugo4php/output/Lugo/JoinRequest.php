<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: server.proto

namespace Lugo;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * JoinRequest define the player configuration to the game.
 *
 * Generated from protobuf message <code>lugo.JoinRequest</code>
 */
class JoinRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Only used in official matches to guarantee that only one process will assume that player position (team and number).
     * The bot process will receive this token as an argument, and must send it to the server in this message.
     *
     * Generated from protobuf field <code>string token = 1;</code>
     */
    private $token = '';
    /**
     * Identifies the protocol version of the bot.
     *
     * Generated from protobuf field <code>string protocol_version = 2;</code>
     */
    private $protocol_version = '';
    /**
     * Identify the bot's team side (Team_Home or Team_Away)
     *
     * Generated from protobuf field <code>.lugo.Team.Side team_side = 3;</code>
     */
    private $team_side = 0;
    /**
     * Player's number 1-11
     *
     * Generated from protobuf field <code>uint32 number = 4;</code>
     */
    private $number = 0;
    /**
     * Position where the player must be set at "GetReady" state (at beginning of the match or after a goal)
     *
     * Generated from protobuf field <code>.lugo.Point init_position = 5;</code>
     */
    private $init_position = null;

    public function __construct() {
        \GPBMetadata\Server::initOnce();
        parent::__construct();
    }

    /**
     * Only used in official matches to guarantee that only one process will assume that player position (team and number).
     * The bot process will receive this token as an argument, and must send it to the server in this message.
     *
     * Generated from protobuf field <code>string token = 1;</code>
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Only used in official matches to guarantee that only one process will assume that player position (team and number).
     * The bot process will receive this token as an argument, and must send it to the server in this message.
     *
     * Generated from protobuf field <code>string token = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->token = $var;

        return $this;
    }

    /**
     * Identifies the protocol version of the bot.
     *
     * Generated from protobuf field <code>string protocol_version = 2;</code>
     * @return string
     */
    public function getProtocolVersion()
    {
        return $this->protocol_version;
    }

    /**
     * Identifies the protocol version of the bot.
     *
     * Generated from protobuf field <code>string protocol_version = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setProtocolVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->protocol_version = $var;

        return $this;
    }

    /**
     * Identify the bot's team side (Team_Home or Team_Away)
     *
     * Generated from protobuf field <code>.lugo.Team.Side team_side = 3;</code>
     * @return int
     */
    public function getTeamSide()
    {
        return $this->team_side;
    }

    /**
     * Identify the bot's team side (Team_Home or Team_Away)
     *
     * Generated from protobuf field <code>.lugo.Team.Side team_side = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setTeamSide($var)
    {
        GPBUtil::checkEnum($var, \Lugo\Team_Side::class);
        $this->team_side = $var;

        return $this;
    }

    /**
     * Player's number 1-11
     *
     * Generated from protobuf field <code>uint32 number = 4;</code>
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Player's number 1-11
     *
     * Generated from protobuf field <code>uint32 number = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setNumber($var)
    {
        GPBUtil::checkUint32($var);
        $this->number = $var;

        return $this;
    }

    /**
     * Position where the player must be set at "GetReady" state (at beginning of the match or after a goal)
     *
     * Generated from protobuf field <code>.lugo.Point init_position = 5;</code>
     * @return \Lugo\Point
     */
    public function getInitPosition()
    {
        return $this->init_position;
    }

    /**
     * Position where the player must be set at "GetReady" state (at beginning of the match or after a goal)
     *
     * Generated from protobuf field <code>.lugo.Point init_position = 5;</code>
     * @param \Lugo\Point $var
     * @return $this
     */
    public function setInitPosition($var)
    {
        GPBUtil::checkMessage($var, \Lugo\Point::class);
        $this->init_position = $var;

        return $this;
    }

}

