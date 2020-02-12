<?php

namespace App;

/**
 * Менеджер.
 * Может редактировать свои сообщения и сообщения других пользователей.
 * Удалять сообщения не может.
 *
 * Class Manager
 * @package App
 *
 * @author A. Suvorkin
 */
class Manager implements iUser
{
    /**
     * @var int Идентификатор.
     */
    private $id;

    /**
     * Manager constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function canEdit(Message $message)
    {
        if ($message->getAuthor() instanceof User) {
            return true;
        }

        if ($message->getAuthor() instanceof self &&
            $message->getAuthor()->getId() === $this->id
        ) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function canDelete(Message $message)
    {
        return false;
    }

    /**
     * Идентификатор.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}