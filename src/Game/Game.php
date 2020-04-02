<?php

declare(strict_types=1);

namespace SPS\Game;


use SPS\Item\ItemInterface;
use SPS\Player\PlayerInterface;
use SPS\Rule\Rule;
use SPS\Rule\RuleInterface;
use SPS\Score\Score;

class Game implements GameInterface
{
    public const DEFAULT_ROUNDS_QTY = 100;

    /**
     * @var PlayerInterface[]
     */
    private $players = [];

    /**
     * @var RuleInterface[]
     */
    private $rules = [];

    /**
     * @var int
     */
    private int $rounds = 0;

    /**
     * Game constructor.
     * @param int $rounds
     */
    public function __construct(int $rounds = self::DEFAULT_ROUNDS_QTY)
    {
        $this->rounds = $rounds;
    }

    /**
     * @throws Exception
     */
    public function start(): void
    {
        $this->validate();

        for ($i = 0; $i < $this->rounds; $i++) {
            $itemA = $this->getPlayerA()->play();
            $itemB = $this->getPlayerB()->play();

            $this->applyRules($itemA, $itemB);
        }
    }

    /**
     * @param PlayerInterface $player
     * @throws Exception
     */
    public function addPlayer(PlayerInterface $player): void
    {
        if (empty($player->getStrategy())) {
            throw new Exception('Player must have strategy to play the game');
        }

        if (empty($player->getName())) {
            throw new Exception('Player must have a name to play the game');
        }

        $this->players[] = $player;
    }

    /**
     * @param RuleInterface $rule
     */
    public function addRule(RuleInterface $rule): void
    {
        $this->rules[] = $rule;
    }

    /**
     * @param int $rounds
     */
    public function setRounds(int $rounds): void
    {
        $this->rounds = $rounds;
    }

    /**
     * @throws Exception
     */
    private function validate(): void
    {
        if (count($this->players) != 2) {
            throw new Exception('Game supports only 2 players at the moment');
        }

        if (count($this->rules) <= 0) {
            throw new Exception('We can\'t play. Game needs rules');
        }

        if ($this->rounds == 0) {
            throw new Exception('There are no rounds in the game. Please add at least one');
        }
    }

    /**
     * @return PlayerInterface
     */
    private function getPlayerA(): PlayerInterface
    {
        return $this->players[0];
    }

    /**
     * @return PlayerInterface
     */
    private function getPlayerB(): PlayerInterface
    {
        return $this->players[1];
    }

    /**
     * @param ItemInterface $itemA
     * @param ItemInterface $itemB
     */
    private function applyRules(ItemInterface $itemA, ItemInterface $itemB): void
    {
        foreach ($this->rules as $rule) {
            $result = $rule->apply($itemA, $itemB);

            if ($result === null) {
                continue;
            }

            if ($result == Rule::RESULT_A_HITS_B) {
                $playerAScore = 1;
                $playerBScore = 0;
            } elseif ($result == Rule::RESULT_B_HITS_A) {
                $playerAScore = 0;
                $playerBScore = 1;
            } elseif ($result == Rule::RESULT_DRAW) {
                $playerAScore = 0;
                $playerBScore = 0;
            }

            $this->getPlayerA()->addScore(new Score($itemA, $playerAScore));
            $this->getPlayerB()->addScore(new Score($itemB, $playerBScore));

            break;
        }
    }
}