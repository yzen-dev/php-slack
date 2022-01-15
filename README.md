## PHPSlack client

> Alas, I do not speak English, and the documentation was compiled through google translator :(
> I will be glad if you can help me describe the documentation more correctly :)


## :scroll: **Installation**
The package can be installed via composer:
```
composer require yzen.dev/php-slack
```

## :scroll: **Usage**
Common use case:

```php
$config = new Config(
            url:      'https://hooks.slack.com/services/you-token',
            username: 'YouProject',
            channel:  'project-channel',
        );
        $slack = new Slack($config);
        $slack->send([
                         HeaderBlock::create(TextObject::create(text: 'Test message')),
                         DividerBlock::create(),
                         SectionBlock::create(
                             fields: [
                                         TextObject::createMarkdown(text: ":curly_haired_man:*  User:*\n <https://github.com/yzen-dev|yzen.dev>"),
                                         TextObject::createMarkdown(text: ":crown:*  Role:*\n Creator"),
                                     ]
                         ),
                         SectionBlock::create(
                             fields: [
                                         TextObject::createMarkdown(text: ":calendar:*  When:*\n `13.12.2021 23:33`"),
                                     ]
                         ),
                         ActionsBlock::create(
                             elements: [
                                           ButtonObject::create(
                                               text: TextObject::create(text: "Open repository"),
                                               url:  'https://github.com/yzen-dev/php-slack',
                                               style: 'danger'
                                           ),
                                       ]
                         ),
                         DividerBlock::create(),
                     ]);
    }
```
