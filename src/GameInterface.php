<?php


namespace SPS;


use SPS\Player\PlayerInterface;
use SPS\Rule\RuleInterface;

interface GameInterface
{
    public function start(): void;

    /**
     * @param PlayerInterface $player
     */
    public function addPlayer(PlayerInterface $player): void;

    /**
     * @param RuleInterface $rule
     */
    public function addRule(RuleInterface $rule): void;
}