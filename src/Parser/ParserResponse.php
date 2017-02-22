<?php

namespace Antbank\AccountBalanceReader\Parser;

use Antbank\TransactionInterchange\TransactionInterface;

class ParserResponse
{
    /**
     * @var \Iterator
     */
    protected $iterator;

    /**
     * @var TransactionInterface|null
     */
    protected $result;

    /**
     * @var bool
     */
    protected $stopPropagation;

    /**
     * ParserResponse constructor.
     * @param \Iterator $iterator
     * @param TransactionInterface|null $result
     * @param bool $stopPropagation
     */
    public function __construct(\Iterator $iterator, $result, $stopPropagation)
    {
        $this->iterator = $iterator;
        $this->result = $result;
        $this->stopPropagation = $stopPropagation;
    }

    /**
     * @return \Iterator
     */
    public function getIterator()
    {
        return $this->iterator;
    }

    /**
     * @return TransactionInterface|null
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return bool
     */
    public function isStopPropagation()
    {
        return $this->stopPropagation;
    }
}
