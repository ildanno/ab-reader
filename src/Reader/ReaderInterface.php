<?php

namespace Antbank\AccountBalanceReader\Reader;

use Antbank\TransactionInterchange\TransactionInterface;

interface ReaderInterface
{
    /**
     * @param string $path
     * @return TransactionInterface[]
     */
    public function readFile(string $path): array;
}