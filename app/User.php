<?php

namespace App;

/**
 * Пользователь.
 * Может редактировать только свои сообщения.
 * Удалять не может.
 *
 * Class User
 * @package App
 *
 * @author A. Suvorkin
 */
class User implements iUser
{
    /**
     * Идентификатор.
     *
     * @var int
     */
    private $id;

    /**
     * User constructor.
     * @param $id
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