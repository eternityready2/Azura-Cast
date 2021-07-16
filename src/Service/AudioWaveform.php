<?php

declare(strict_types=1);

namespace App\Service;

use InvalidArgumentException;
use RuntimeException;
use Symfony\Component\Process\Process;

class AudioWaveform
{
    /**
     * @return mixed[]
     */
    public static function getWaveformFor(string $path): array
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException(sprintf('File at path "%s" not found.', $path));
        }

        $jsonOutPath = tempnam(sys_get_temp_dir(), 'awf') . '.json';

        $process = new Process(
            [
                'audiowaveform',
                '-i',
                $path,
                '-o',
                $jsonOutPath,
                '--pixels-per-second',
                '20',
                '--bits',
                '8',
            ]
        );
        $process->setTimeout(60);
        $process->setIdleTimeout(3600);

        $process->mustRun();

        if (!is_file($jsonOutPath)) {
            throw new RuntimeException('Audio waveform JSON was not generated.');
        }

        $inputRaw = file_get_contents($jsonOutPath);
        $input = json_decode($inputRaw, true, 512, JSON_THROW_ON_ERROR);

        // Limit all input to a range from 0 to 1.
        $data = $input['data'];
        $maxVal = (float)max($data);
        $newData = [];

        foreach ($data as $row) {
            $newData[] = round($row / $maxVal, 2);
        }

        $input['data'] = $newData;
        return $input;
    }
}
