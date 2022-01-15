<?php

namespace PHPSlack\BlockKit;

use PHPSlack\BlockKit\CompositionObjects\AbstractObject;
use PHPSlack\BlockKit\CompositionObjects\TextObject;

/**
 * A section is one of the most flexible blocks available - it can be used as a simple text block,
 * in combination with text fields, or side-by-side with any of the available block elements.
 * @see https://api.slack.com/reference/block-kit/blocks#section
 */
class SectionBlock extends AbstractBlock
{
    /** @inheritdoc */
    protected string $type = 'section';

    /** @var null|TextObject $text The text for the block, in the form of a plain_text text object. */
    private ?TextObject $text = null;

    /** @var array<TextObject> */
    private array $fields;

    /** @var string Unique identifier for a block */
    private string $block_id;

    private mixed $accessory;

    /**
     * @param null|TextObject $text
     * @param array $fields
     * @param string $block_id
     */
    public function __construct(TextObject $text = null, array $fields = [], string $block_id = '')
    {
        $this->text = $text;
        $this->block_id = $block_id;
        $this->fields = $fields;
    }

    /**
     * @param null|TextObject $text
     * @param array $fields
     * @param string $block_id
     *
     * @return SectionBlock
     */
    public static function create(?TextObject $text = null, array $fields = [], string $block_id = ''): SectionBlock
    {
        return new self($text, $fields, $block_id);
    }

    /**
     * Серилизация объекта
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        $data = [
            'type' => $this->type,
            'text' => $this->text,
            'fields' => $this->fields,
            'block_id' => $this->block_id,
        ];

        if (!$this->text) {
            unset($data['text']);
        }
        if (!$this->block_id) {
            unset($data['block_id']);
        }
        if (!$this->fields) {
            unset($data['fields']);
        }

        return $data;
    }
}
