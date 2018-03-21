<?php 

namespace App\Services\BotMan;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

class Slack 
{
	public $botman;
	public $config;

	public function __construct($config)
	{
		DriverManager::loadDriver(\BotMan\Drivers\Slack\SlackDriver::class);

		$this->config = $config;
		$this->botman = BotManFactory::create($config);
	}

	public static function make($config)
	{
		return (new self($config));
	}

	public function handle()
	{
		$this->botman->hears('hello', function (BotMan $bot) {
		    $bot->reply('Hello yourself.');
		});

		$this->botman->hears('hi', function (BotMan $bot) {
		    $bot->reply('hi yourself.');
		});

		$this->botman->fallback(function ($bot) {
	        $bot->reply("Sorry, I did not understand these commands. Try: `/hi`");
	    });

		$this->botman->listen();
	}
}