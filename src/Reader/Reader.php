<?php

namespace Antbank\AccountBalanceReader\Reader;

use Antbank\AccountBalanceReader\Adapter\AdapterInterface;
use Antbank\AccountBalanceReader\Parser\ParserInterface;
use Antbank\TransactionInterchange\TransactionInterface;

class Reader implements ReaderInterface
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var ParserInterface
     */
    private $parser;

    /**
     * Reader constructor.
     * @param AdapterInterface $adapter
     * @param ParserInterface $parser
     */
    public function __construct(AdapterInterface $adapter, ParserInterface $parser)
    {
        $this->adapter = $adapter;
        $this->parser = $parser;
    }

    /**
     * @param string $path
     * @return TransactionInterface[]
     */
    public function readFile(string $path): array
    {
        $contents = $this->adapter->read($path);
        return $this->parser->parse($contents);
    }
}
