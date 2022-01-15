<?php

namespace PHPSlack\BlockKit;

use PHPSlack\BlockKit\CompositionObjects\TextObject;
use PHPSlack\BlockKit\CompositionObjects\AbstractObject;

/**
 * A block that is used to hold interactive elements.
 *
 * @see https://api.slack.com/reference/block-kit/blocks#actions
 */
class ActionsBlock extends AbstractObject
{
    /** @inheritdoc */
    protected string $type = 'actions';

    /** @var array<AbstractObject> $text The text for the block, in the form of a plain_text text object. */
    private array $elements;

    /** @var string Unique identifier for a block */
    private string $block_id;

    /**
     * @param array<AbstractObject> $elements
     * @param string $block_id
     */
    public function __construct(array $elements = [], string $block_id = '')
    {
        $this->block_id = $block_id;
        $this->elements = $elements;
    }

    /**
     * @param array<AbstractObject> $elements
     * @param string $block_id
     *
     * @return ActionsBlock
     */
    public static function create(array $elements = [], string $block_id = ''): ActionsBlock
    {
        return new self($elements, $block_id);
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
            'elements' => $this->elements,
            'block_id' => $this->block_id,
        ];

        if (!$this->block_id) {
            unset($data['block_id']);
        }

        return $data;
    }
}
