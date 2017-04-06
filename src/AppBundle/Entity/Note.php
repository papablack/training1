<?php

namespace AppBundle\Entity;

/**
 * Note class.
 *
 * @package AppBundle\Entity
 * @author Haracewiat <contact@haracewiat.pl>
 */
class Note
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $content;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Note
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @var User
     */
    private $user;


    /**
     * Set user
     *
     * @param User $user
     *
     * @return Note
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

}
