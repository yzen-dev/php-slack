<?php

namespace PHPSlack\BlockKit;

use JsonSerializable;

abstract class AbstractBlock implements JsonSerializable
{
    /** @var string Type of block */
    protected string $type;
}
