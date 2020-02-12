<?php

namespace App;

interface iUser
{
    /**
     * Идентификатор.
     *
     * @return int
     */
    public function getId();

    /**
     * Проверяет, может ли пользователь редактировать сообщение.
     *
     * @param Message $message
     * @return bool
     */
    public function canEdit(Message $message);

    /**
     * Проверяет, может ли пользователь удалить сообщение.
     *
     * @param Message $message
     * @return bool
     */
    public function canDelete(Message $message);
}