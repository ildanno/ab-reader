<?php

namespace Antbank\AccountBalanceReader\Adapter;

class PopplerAdapter implements AdapterInterface
{
    /**
     * Read a file and returns text content
     *
     * @param string $file File path to read
     * @return string File content
     * @throws \Exception
     */
    public function read(string $file): string
    {
        $destFile = tempnam(sys_get_temp_dir(), 'pdf_to_text_');

        $command = sprintf(
            'pdftotext %s %s',
            escapeshellarg(realpath($file)),
            escapeshellarg($destFile)
        );

        $return = 0;
        $output = system($command, $return);

        $content = file_get_contents($destFile);
        unlink($destFile);

        switch ($return) {
            case 0:
                return $content;

            default:
                throw new \Exception($command . PHP_EOL . $output, $return);
        }
    }
}
