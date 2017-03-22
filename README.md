Slack Bot Listener
============
Bot Send Message to Slack

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist alexrvs/slack-bot-listener "*"
```

or add

```
"alexrvs/slack-bot-listener": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php

require(__DIR__ . '/vendor/autoload.php');

use alexrvs\slackbotlistener\SlackBotListener;

    $webhook = "https://hooks.slack.com/services/your/incoming/hook";
    
    $slackbot = new SlackBotListener($webhook);

    $slackbot->text('test')->send();
```

Attachments:

```php
$webhook = "https://hooks.slack.com/services/T00000000/B00000000/XXXXXXXXXXXXXXXXXXXXXXXX";
$bot = new SlackBotListener($webhook);

$bot->attach($bot->createAttachment('fallback')
                                ->setText('Text Attachment')
                                ->setImageUrl('https://a.slack-edge.com/ae57/img/slack_api_logo.png')
                                ->setThumbUrl('https://a.slack-edge.com/ae57/img/slack_api_logo.png')
                                ->setFooterIcon('https://a.slack-edge.com/ae57/img/slack_api_logo.png')
                                ->setAuthor('Bobby Tables','http://flickr.com/bobby/','http://flickr.com/icons/bobby.jpg')
    )->text('test text')->send();

```
 
 
