<?php

namespace App\UseCases\Transfer\Contracts;

class InteractorContract
{
    public int $accountIdOrigin;
    /**
     * @var int|NULL
     */
    public $balanceOrigin;


    public int $accountIdDestination;
    /**
     * @var int|NULL
     */
    public $balanceDestination;


    /**
     * @param int|NULL $balance
     */
    public function __construct(
        int $accountIdOrigin,
        $balanceOrigin,
        int $accountIdDestination,
        $balanceDestination
    )
    {
        $this->accountIdOrigin = $accountIdOrigin;
        $this->balanceOrigin = $balanceOrigin;
        $this->accountIdDestination = $accountIdDestination;
        $this->balanceDestination = $balanceDestination;
    }
}
