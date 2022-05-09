<?php

declare(strict_types=1);

/*
-- https://dev.to/techsolutionstuff/how-to-check-ram-and-cpu-usage-in-laravel-4idf
-- https://jamesbachini.com/ram-cpu-usage-php-script/
*/

namespace Modules\Theme\View\Components\Info;

use Illuminate\View\Component;
use Modules\Xot\Services\FileService;

class Server extends Component
{
    public array $attrs = [];
    //public $type;
    //public $title;

    /**
     * Undocumented function.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        /*
        $free = shell_exec('free'); //return null ..
        $free = (string) trim((string) $free);
        $free_arr = explode("\n", $free);
        //dddx(['free' => $free, 'free_arr' => $free_arr]);
        $mem = explode(' ', $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $usedmem = $mem[2];
        $usedmemInGB = number_format($usedmem / 1048576, 2).' GB';
        $memory1 = $mem[2] / $mem[1] * 100;
        $memory = round($memory1).'%';
        $fh = fopen('/proc/meminfo', 'r');
        $mem = 0;
        while ($line = fgets($fh)) {
            $pieces = [];
            if (preg_match('/^MemTotal:\s+(\d+)\skB$/', $line, $pieces)) {
                $mem = $pieces[1];
                break;
            }
        }
        fclose($fh);
        $totalram = number_format($mem / 1048576, 2).' GB';

        //cpu usage
        $cpu_load = sys_getloadavg();
        $load = $cpu_load[0].'% / 100%';
        */
        // return view('details',compact('memory','totalram','usedmemInGB','load'))

        /*
        memory_get_usage()  Returns the memory amount in bytes.
        memory_get_peak_usage() - Returns the peak of memory allocated by PHP

        */
        //$cmd = 'wmic ComputerSystem get TotalPhysicalMemory';
        //@exec($cmd, $outputTotalPhysicalMemory);
        //dddx($outputTotalPhysicalMemory);
        /*
        "_" => array:3 [▼
            0 => "TotalPhysicalMemory"
            1 => "34199285760"
            2 => ""
        ]
        */

        $mem = $this->getServerMemoryUsage();
        /*
        $mem_html = sprintf('Memory usage: %s / %s (%s%%)',
            FileService::getNiceFileSize((int) ($memUsage['usage'])),
            FileService::getNiceFileSize((int) $memUsage['total']),
            $memUsage['perc']
        );
        */

        $view = 'theme::components.info.server';

        $view_params = [
            'view' => $view,
            'mem' => $mem,
            //'memory' => $memory,
            //'totalram' => $totalram,
            //'usedmemInGB' => $usedmemInGB,
            //'load' => $load,
        ];

        return view()->make($view, $view_params);
    }

    // Returns used memory (either in percent (without percent sign) or free and overall in bytes)
    /**
     * @return array|null
     */
    public function getServerMemoryUsage()
    {
        $memoryTotal = null;
        $memoryFree = null;

        if (stristr(PHP_OS, 'win')) {
            // Get total physical memory (this is in bytes)
            $cmd = 'wmic ComputerSystem get TotalPhysicalMemory';
            @exec($cmd, $outputTotalPhysicalMemory);

            // Get free physical memory (this is in kibibytes!)
            $cmd = 'wmic OS get FreePhysicalMemory';
            @exec($cmd, $outputFreePhysicalMemory);

            if ($outputTotalPhysicalMemory && $outputFreePhysicalMemory) {
                // Find total value
                foreach ($outputTotalPhysicalMemory as $line) {
                    if ($line && preg_match('/^[0-9]+$/', $line)) {
                        $memoryTotal = $line;
                        break;
                    }
                }

                // Find free value
                foreach ($outputFreePhysicalMemory as $line) {
                    if ($line && preg_match('/^[0-9]+$/', $line)) {
                        $memoryFree = $line;
                        $memoryFree *= 1024;  // convert from kibibytes to bytes
                        break;
                    }
                }
            }
        } else {
            if (is_readable('/proc/meminfo')) {
                $stats = @file_get_contents('/proc/meminfo');

                if (false !== $stats) {
                    // Separate lines
                    $stats = str_replace(["\r\n", "\n\r", "\r"], "\n", $stats);
                    $stats = explode("\n", $stats);

                    // Separate values and find correct lines for total and free mem
                    foreach ($stats as $statLine) {
                        $statLineData = explode(':', trim($statLine));

                        //
                        // Extract size (TODO: It seems that (at least) the two values for total and free memory have the unit "kB" always. Is this correct?
                        //

                        // Total memory
                        if (2 == count($statLineData) && 'MemTotal' == trim($statLineData[0])) {
                            $memoryTotal = trim($statLineData[1]);
                            $memoryTotal = explode(' ', $memoryTotal);
                            $memoryTotal = (int) $memoryTotal[0];
                            $memoryTotal *= 1024;  // convert from kibibytes to bytes
                        }

                        // Free memory
                        if (2 == count($statLineData) && 'MemFree' == trim($statLineData[0])) {
                            $memoryFree = trim($statLineData[1]);
                            $memoryFree = explode(' ', $memoryFree);
                            $memoryFree = (int) $memoryFree[0];
                            $memoryFree *= 1024;  // convert from kibibytes to bytes
                        }
                    }
                }
            }
        }

        if (is_null($memoryTotal) || is_null($memoryFree)) {
            return null;
        }

        $usage = $memoryTotal - $memoryFree;

        return [
            'total' => $memoryTotal,
            'total_nice' => FileService::getNiceFileSize((int) $memoryTotal),
            'usage' => $usage,
            'usage_nice' => FileService::getNiceFileSize((int) $usage),
            'free' => $memoryFree,
            'free_nice' => FileService::getNiceFileSize((int) $memoryFree),
            'perc' => round(100 - ($memoryFree * 100 / $memoryTotal), 2),
        ];
    }
}
