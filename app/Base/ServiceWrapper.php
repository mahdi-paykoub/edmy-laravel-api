<?php

namespace App\Base;

use Illuminate\Contracts\Debug\ExceptionHandler;

class ServiceWrapper
{
    public function __invoke(\Closure $action , \Closure $reject = null)
    {
        try {
            $actionResult = $action();
        } catch (\Throwable $throwable) {
            !is_null($reject) && $reject;
            app()[ExceptionHandler::class]->report($throwable);
            return [
                'ok' => false,
                'data' => 'خطایی در بکند رخ داده است',
            ];
        }

        return [
            'ok' => true,
            'data' => $actionResult,
        ];
    }
}
