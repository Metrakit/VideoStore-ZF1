<?php

class Model_FilmActor
{
    /**
     * @var integer
     */
    private $filmId;
    /**
     * @var integer
     */
    private $actorId;
    /**
     * @var string
     */
    private $lastUpdate;
	/**
     * @return the $filmId
     */
    public function getFilmId()
    {
        return $this->filmId;
    }

	/**
     * @return the $actorId
     */
    public function getActorId()
    {
        return $this->actorId;
    }

	/**
     * @return the $lastUpdate
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

	/**
     * @param number $filmId
     */
    public function setFilmId($filmId)
    {
        $this->filmId = $filmId;
        return $this;
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
     * @param string $lastUpdate
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }
    
    
}