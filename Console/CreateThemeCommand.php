<?php

declare(strict_types=1);

namespace Modules\Theme\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class CreateThemeCommand.
 */
<<<<<<< HEAD
class CreateThemeCommand extends Command {
=======
class CreateThemeCommand extends Command
{
>>>>>>> ede0df7 (first)
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'theme:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a skeleton theme.';

    /**
     * Create a new command instance.
     */
<<<<<<< HEAD
    public function __construct() {
=======
    public function __construct()
    {
>>>>>>> ede0df7 (first)
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
<<<<<<< HEAD
    public function handle() {
        $name = $this->argument('name');
        if (\is_array($name)) {
            $name = implode(' ', $name);
        }
        if (null === $name) {
            throw new \Exception('name is missing');
        }
        // dd($name);
=======
    public function handle()
    {
        $name = $this->argument('name');
        if (is_array($name)) {
            $name = implode(' ', $name);
        }
        if (null == $name) {
            throw new \Exception('name is missing');
        }
        //dd($name);
>>>>>>> ede0df7 (first)
        $dir = public_path('themes/'.$name);
        if (File::exists($dir)) {
            $this->error("Theme [{$name}] already exist!");

            return;
        } else {
            $from = realpath(__DIR__.'/../Resources/views/skeleton');
            if (! $from) {
                throw new \Exception(' ['.$from.'] was not found');
            }
            File::copyDirectory($from, $dir);
        }
        $this->info($dir);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
<<<<<<< HEAD
    protected function getArguments() {
=======
    protected function getArguments()
    {
>>>>>>> ede0df7 (first)
        return [
            ['name', InputArgument::REQUIRED, 'The name of the Theme.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
<<<<<<< HEAD
    protected function getOptions() {
=======
    protected function getOptions()
    {
>>>>>>> ede0df7 (first)
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
