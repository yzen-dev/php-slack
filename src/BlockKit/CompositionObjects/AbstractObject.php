<?php

namespace PHPSlack\BlockKit\CompositionObjects;

use JsonSerializable;

abstract class AbstractObject implements JsonSerializable
{
    /**
     * @var string $type The formatting to use for this text object. Can be one of plain_textor mrkdwn.
     */
    private string $type;
}
