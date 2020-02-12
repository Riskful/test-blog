<?php

namespace App;

/**
 * Class Message
 * @package App
 *
 * @author A. Suvorkin
 */
class Message
{
    /**
     * Автор.
     *
     * @var iUser
     */
    private $author;

    /**
     * Заголовок.
     *
     * @var string
     */
    private $title;

    /**
     * Содержание сообщения.
     *
     * @var string
     */
    private $content;

    /**
     * Message constructor.
     * @param $author
     * @param $title
     * @param $content
     */
    public function __construct(iUser $author, $title, $content)
    {
        $this->author = $author;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return iUser
     */
    public function getAuthor(): iUser
    {
        return $this->author;
    }
}