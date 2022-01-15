<?php

namespace PHPSlack\BlockKit\BlockElements;

use PHPSlack\BlockKit\CompositionObjects\TextObject;

/**
 * An interactive component that inserts a button.
 * The button can be a trigger for anything from opening a simple link to starting a complex workflow.
 *
 * To use interactive components, you will need to make some changes to prepare your app.
 * Read our guide to enabling interactivity.
 *
 * @see https://api.slack.com/reference/block-kit/block-elements#button
 */
class ButtonObject extends AbstractObject
{
    /**
     * @var string $type The formatting to use for this text object. Can be one of plain_textor mrkdwn.
     */
    private string $type = 'button';

    /** @var TextObject $text The text for the block, in the form of a plain_text text object. */
    private TextObject $text;

    private string $action_id;

    private string $url;

    private string $value;

    /** @var string $style Decorates buttons with alternative visual color schemes. (primary, danger) */
    private string $style;

    private mixed $confirm;

    /**
     * @param TextObject $text
     * @param string $action_id
     * @param string $url
     * @param string $value
     * @param string $style
     * @param mixed $confirm
     */
    public function __construct(TextObject $text, string $action_id = '', string $url = '', string $value = '', string $style = 'default', mixed $confirm = null)
    {
        $this->text = $text;
        $this->action_id = $action_id;
        $this->url = $url;
        $this->value = $value;
        $this->style = $style;
        $this->confirm = $confirm;
    }


    /**
     * @param TextObject $text
     * @param string $action_id
     * @param string $url
     * @param string $value
     * @param string $style
     * @param null|mixed $confirm
     *
     * @return ButtonObject
     */
    public static function create(TextObject $text, string $action_id = '', string $url = '', string $value = '', string $style = 'default', mixed $confirm = null): ButtonObject
    {
        return new self($text, $action_id, $url, $value, $style, $confirm);
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
            'action_id' => $this->action_id,
            'url' => $this->url,
            'value' => $this->value,
            'style' => $this->style,
            'confirm' => $this->confirm,
        ];

        if (!$this->action_id) {
            unset($data['action_id']);
        }
        if (!$this->url) {
            unset($data['url']);
        }
        if (!$this->value) {
            unset($data['value']);
        }
        if (!$this->style) {
            unset($data['style']);
        }
        if (!$this->confirm) {
            unset($data['confirm']);
        }

        return $data;
    }
}
