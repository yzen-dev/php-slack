<?php

namespace PHPSlack\BlockKit\CompositionObjects;

class AccessoryObject extends AbstractObject
{
    /**
     * @var string $type The formatting to use for this text object. Can be one of plain_textor mrkdwn.
     */
    private string $type;

    /**
     * @var string
     */
    private string $text;

    /**
     * Indicates whether emojis in a text field should be escaped into the colon emoji format. This field is only usable when type is plain_text.
     *
     * @var bool
     */
    private bool $emoji;

    /**
     * This field is only usable when type is mrkdwn.
     *
     * @var bool
     */
    private bool $verbatim;

    /**
     * @param string $type
     * @param string $text
     * @param bool   $emoji
     * @param bool   $verbatim
     */
    public function __construct(string $type, string $text, bool $emoji = false, bool $verbatim = false)
    {
        $this->type = $type;
        $this->text = $text;
        $this->emoji = $emoji;
        $this->verbatim = $verbatim;
    }

    /**
     * @param string $type
     * @param string $text
     * @param bool   $emoji
     * @param bool   $verbatim
     *
     * @return AccessoryObject
     */
    public static function create(string $type = 'plain_text', string $text = '', bool $emoji = false, bool $verbatim = false): AccessoryObject
    {
        return new self($type, $text, $emoji, $verbatim);
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
            'emoji' => $this->emoji,
            'verbatim' => $this->verbatim,
        ];
        if ($this->type !== 'mrkdwn') {
            unset($data['verbatim']);
        }

        return $data;
    }
}
