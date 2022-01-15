<?php

namespace PHPSlack\BlockKit\BlockElements;

use JsonSerializable;

abstract class AbstractObject implements JsonSerializable
{
    private string $type;
}
