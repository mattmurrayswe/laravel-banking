<?php

namespace App\UseCases\Withdraw\Interactors;

use App\UseCases\Balance\BusinessEntities\AccountExistanceVerifier;
use App\UseCases\Withdraw\BusinessEntities\BalanceDecreaser;
use App\UseCases\Withdraw\Contracts\InputContract;
use App\UseCases\Withdraw\Contracts\InteractorContract;

class Interactor
{
    public InteractorContract $interactorContract;

    public function __construct(InputContract $inputContract)
    {
        $accountExistanceVerifier = new AccountExistanceVerifier(
            $inputContract->origin
        );
        
        if ($accountExistanceVerifier->exists === true) {

            $balanceDecreaser = new BalanceDecreaser(
                $inputContract->origin, 
                $inputContract->amount
            );

            $this->setInteractorContract(
                $inputContract->origin,
                $balanceDecreaser->newBalance
            );

        } else {

            $this->setInteractorContract(
                $inputContract->origin,
                NULL
            );
        }
    }

    /**
     * @param int|NULL $balance
     */
    private function setInteractorContract(int $accountId, $balance): void
    {
        $this->interactorContract = new InteractorContract(
            $accountId,
            $balance
        );
    }
}
