<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ApiRequestMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:apiRequest {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make form request for api validations';


    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '/Http/Requests';
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/api-request.stub';
    }

}
