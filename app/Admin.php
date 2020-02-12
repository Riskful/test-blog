<?php

namespace App;

/**
 * Администратор.
 * Может редактировать и удалять любые сообщения.
 *
 * Class Admin
 * @package App
 *
 * @author A. Suvorkin
 */
class Admin implements iUser
{
    /**
     * Идентификатор.
     *
     * @var int
     */
    private $id;

    /**
     * Admin constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
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

    /**
     * @inheritDoc
     */
    public function canEdit(Message $message)
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function canDelete(Message $message)
    {
        return true;
    }
}