<?php

/**
 * @author Jordane
 *
 */
class Model_Language
{
    /**
     * @var integer
     */
    private $languageId;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $lastUpdate;
    
	/**
     * @return the $languageId
     */
    public function getLanguageId()
    {
        return $this->languageId;
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
     * @param number $languageId
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
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

    

    

}