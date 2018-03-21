## Laravel with Botman - without using Botman Studio

### Slack

Few things you to do in order to create bot for Slack:

1. Create new app
2. Create app Bot Users - and copy the `Bot User OAuth Access Token`, and add in `.env` on `SLACK_TOKEN` key.
3. Create event subscriptions
	- You need your app Botman endpoint, in this project it's `https://your-domain.com/botman`
	- Subscribe to `message.channels` and `message.im` event.
4. Lastly, run `php artisan botman:listen-on-slack`.

### Telegram

Create your bot and retrieve the API Token for the bot and add in `.env` file.

```
TELEGRAM_TOKEN=""
```

### Development

You can use `valet share` or `ngrok` to have local live server.
