<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotmanController extends Controller
{
    public function __invoke()
    {
    	collect(config('botman'))->each(function($value, $key) {
    		$class = '\App\Services\Botman\\' . ucfirst($key);
    		$class::make([$key => $value])->handle();
    	});
    }
}
