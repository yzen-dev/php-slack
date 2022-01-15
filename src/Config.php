<?php

namespace PHPSlack;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use PHPSlack\BlockKit\AbstractBlock;

class Config
{
    public string $url;
    public string $username;
    public string $channel;
    public string $color;

    /**
     * @param string $url
     * @param string $username
     * @param string $channel
     * @param string $color
     */
    public function __construct(string $url, string $username, string $channel, string $color = '#ff0000')
    {
        $this->url = $url;
        $this->username = $username;
        $this->channel = $channel;
        $this->color = $color;
    }
}
