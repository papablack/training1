<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User class.
 *
 * @package AppBundle\Entity
 * @author Haracewiat <contact@haracewiat.pl>
 */
class User extends BaseUser
{

    /**
     * @var int
     */
    protected $id;


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
     * @var Collection
     */
    private $notes;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->notes = new ArrayCollection();
    }


    /**
     * Add note
     *
     * @param Note $note
     *
     * @return User
     */
    public function addNote(Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove note
     *
     * @param Note $note
     */
    public function removeNote(Note $note)
    {
        $this->notes->removeElement($note);
    }

    /**
     * Get notes
     *
     * @return Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }

}
