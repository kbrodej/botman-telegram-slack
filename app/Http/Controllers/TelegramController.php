<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class TelegramController extends Controller
{
    public function __invoke()
    {
    	collect(config('botman'))->each(function($value, $key) {
    		$class = '\App\Services\Botman\\' . ucfirst($key);
    		$class::make([$key => $value])->handle();
    	});
    }
}
