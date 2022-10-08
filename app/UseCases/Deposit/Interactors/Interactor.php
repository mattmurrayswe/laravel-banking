<?php

namespace App\UseCases\Deposit\Interactors;

use App\UseCases\Balance\Contracts\InputContract as BalanceInputContract;
use App\UseCases\Balance\Interactors\Interactor as BalanceInteractor;
use App\UseCases\Deposit\BusinessEntities\AccountExistanceVerifier;
use App\UseCases\Deposit\Contracts\InputContract;
use App\UseCases\Deposit\Contracts\InteractorContract;

class Interactor
{
    public InteractorContract $interactorContract;

    public function __construct(InputContract $inputContract)
    {
        $balanceInputContract = new BalanceInputContract($inputContract->destination);

        $balanceInteractor = new BalanceInteractor($balanceInputContract);

        if ($balanceInteractor->interactorContract->accountExists === true) {
            $this->interactorContract = new InteractorContract(
                $inputContract->destination,
                $balanceInteractor->interactorContract->balance
            );
        }
    }
}
