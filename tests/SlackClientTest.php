<?php

declare(strict_types=1);

namespace Tests;

use GuzzleHttp\Client;
use PHPSlack\BlockKit\ActionsBlock;
use PHPSlack\BlockKit\BlockElements\ButtonObject;
use PHPSlack\BlockKit\CompositionObjects\TextObject;
use PHPSlack\BlockKit\DividerBlock;
use PHPSlack\BlockKit\HeaderBlock;
use PHPSlack\BlockKit\SectionBlock;
use PHPSlack\Config;
use PHPSlack\Slack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Response;

/**
 * Class SlackClientTest
 * @package Tests
 */
class SlackClientTest extends TestCase
{

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testCustomTransform(): void
    {
        $mock = new MockHandler([
            new Response(200, [], 'OK'),
        ]);

        $handlerStack = HandlerStack::create($mock);

        $config = new Config(
            url:      'https://hooks.slack.com/services/you-token',
            username: 'YouProject',
            channel:  'project-channel',
        );
        $slack = new Slack($config, new Client(['handler' => $handlerStack]));

        $result = $slack->send([
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
        $this->assertTrue($result);
    }
}
