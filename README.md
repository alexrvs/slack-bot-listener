Slack Bot Listener
============
Bot Send Message to Slack

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist alexandervas/slack-bot-listener "*"
```

or add

```
"alexandervas/slack-bot-listener": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
    $bot = new \alexandervas\slackbotlistener\SlackBotListener("https://hooks.slack.com/services/your/incoming/hook");
    
	
 ?>```
