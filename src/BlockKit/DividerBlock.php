<?php

namespace PHPSlack\BlockKit;

/**
 * A content divider, like an <hr>, to split up different blocks inside of message.
 * The divider block is nice and neat, requiring only a type.
 *
 * @see https://api.slack.com/reference/block-kit/blocks#divider
 */
class DividerBlock extends AbstractBlock
{
    /** @inheritdoc */
    protected string $type = 'divider';

    /**
     * @return DividerBlock
     */
    public static function create(): DividerBlock
    {
        return new self();
    }

    /**
     * Серилизация объекта
     *
     * @return array<string,string>
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => $this->type,
        ];
    }
}
