<?php

/**
 * @author Jordane
 *
 */
class Model_Category
{
    /**
     * @var integer
     */
    private $categoryId;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $lastUpdate;
	/**
     * @var array
     */
    private $films;
    
	/**
     * @return the $categoryId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

	/**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @return the $lastUpdate
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    public function getFilms()
    {
        if (NULL === $this->films) {
            $filmMappers = new Model_Mapper_Film;
            $this->films = $filmMappers->fetchByCategory($this->categoryId);
        }
        return $this->films;
    }

    

}