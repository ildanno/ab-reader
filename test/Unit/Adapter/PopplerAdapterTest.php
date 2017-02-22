<?php

namespace AntbankTest\AccountBalanceReader\Unit\Adapter;

use Antbank\AccountBalanceReader\Adapter\PopplerAdapter;
use PHPUnit\Framework\TestCase;

class PopplerAdapterTest extends TestCase
{
    public function testRead()
    {
        $adapter = new PopplerAdapter();
        $output = $adapter->read(__DIR__ . '/../../data/mc-example.pdf');

        self::assertContains('85592616325078742710785 56991121 01/02/2017 02/02/2017 SUPERMERCATO 145,80', $output);
        self::assertContains('85592616325078742710785 56991121 02/02/2017 03/02/2017 CARBURANTE 50,35', $output);
        self::assertContains('85592616325078742710785 56991121 03/02/2017 04/02/2017 BOLLETTA TELEFONO 44,19', $output);
        self::assertContains('85592616325078742710785 56991121 04/02/2017 05/02/2017 RISTORANTE 80,00', $output);
        self::assertContains('85592616325078742710785 56991121 05/02/2017 06/07/2017 BOUTIQUE 1.234,56', $output);
    }
}
