<?php

namespace PHPSlack\BlockKit;

use PHPSlack\BlockKit\CompositionObjects\TextObject;

/**
 * A header is a plain-text block that displays in a larger, bold font.
 * Use it to delineate between different groups of content in your app's surfaces.
 * @see https://api.slack.com/reference/block-kit/blocks#header
 */
class HeaderBlock extends AbstractBlock
{
    /** @inheritdoc */
    protected string $type = 'header';

    /** @var TextObject $text The text for the block, in the form of a plain_text text object. */
    private TextObject $text;

    /** @var string Unique identifier for a block */
    private string $block_id;

    /**
     * @param TextObject $text
     * @param string $block_id
     */
    public function __construct(TextObject $text, string $block_id = '')
    {
        $this->text = $text;
        $this->block_id = $block_id;
    }

    /**
     * @param TextObject $text
     * @param string $block_id
     *
     * @return HeaderBlock
     */
    public static function create(TextObject $text, string $block_id = ''): HeaderBlock
    {
        return new self($text, $block_id);
    }

    /**
     * Серилизация объекта
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'type' => $this->type,
            'text' => $this->text,
            'block_id' => $this->block_id,
        ];
    }
}
