<?php

class Model_FilmCategory
{
    /**
     * @var integer
     */
    private $filmId;
    /**
     * @var integer
     */
    private $categoryId;
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
     * @return the $categoryId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
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
     * @param number $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
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