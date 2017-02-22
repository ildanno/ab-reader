<?php

namespace BoomBruno\DbMasterCardPdfReaderTest\Unit\Reader;

use Antbank\AccountBalanceReader\Adapter\AdapterInterface;
use Antbank\AccountBalanceReader\Parser\ParserInterface;
use Antbank\AccountBalanceReader\Reader\Reader;
use PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    public function testRead()
    {
        $adapter = $this->prophesize(AdapterInterface::class);
        $adapter->read('/path/to/file')->willReturn('some text');

        $parser = $this->prophesize(ParserInterface::class);
        $parser->parse('some text')->willReturn([]);

        $reader = new Reader(
            $adapter->reveal(),
            $parser->reveal()
        );

        $output = $reader->readFile('/path/to/file');
        self::assertEquals([], $output);
    }
}
