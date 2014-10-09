<?php

/**
 * @author Jordane
 *
 */
class Model_Actor
{
    /**
     * @var integer
     */
    private $actorId;
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $lastUpdate;
	/**
     * @return the $actorId
     */
    public function getActorId()
    {
        return $this->actorId;
    }

	/**
     * @return the $firstName
     */
    public function getFirstName()
    {
        return ucfirst(strtolower($this->firstName));
    }

	/**
     * @return the $lastName
     */
    public function getLastName()
    {
        return ucfirst(strtolower($this->lastName));
    }

	/**
     * @return the $lastUpdate
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

	/**
     * @param number $actorId
     */
    public function setActorId($actorId)
    {
        $this->actorId = $actorId;
        return $this;
    }

	/**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

	/**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

	/**
     * @param string $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

}