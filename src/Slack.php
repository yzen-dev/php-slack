<?php

namespace PHPSlack;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use PHPSlack\BlockKit\AbstractBlock;

/**
 *
 */
class Slack
{
    /**
     * @param Config $config
     * @param Client|null $client
     */
    public function __construct(
        private Config $config,
        private ?Client $client = null,
    ) {
        $this->client ??= new Client();
    }

    /**
     * Отправка webhook события
     *
     * @param array<AbstractBlock> $block
     *
     * @return bool
     * @throws GuzzleException
     */
    public function send(array $block): bool
    {
        $result = $this->client->request(
            'POST',
            $this->config->url,
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                RequestOptions::JSON => [
                    'username' => $this->config->username,
                    'channel' => $this->config->channel,
                    "color" => $this->config->color,
                    'blocks' => $block,
                ],
            ]
        );

        return $result->getStatusCode() === 200;
    }
}
