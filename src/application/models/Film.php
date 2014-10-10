<?php

class Model_Film
{
    /**
     * @var integer
     */
    private $filmId;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var integer
     */
    private $releaseYear;
    /**
     * @var integer
     */
    private $languageId;
    /**
     * @var integer
     */
    private $originalLanguageId;
    /**
     * @var integer
     */
    private $rentalDuration;
    /**
     * @var float
     */
    private $rentalRate;
    /**
     * @var integer
     */
    private $length;
    /**
     * @var float
     */
    private $replacementCost;
    /**
     * @var integer
     */
    private $rating;
    /**
     * @var string
     */
    private $specialFeatures;
    /**
     * @var string
     */
    private $lastUpdate;
    /**
     * @var array
     */
    private $categories; 
    /**
     * @var array
     */
    private $actors;
    
    /** 
     * @var Array
     */
    private $labels = array(
        'Trailers',
        'Commentaries',
        'Deleted Scenes',
        'Behind the Scenes'
    );
    
    /**
     * @var Array
     */
    private $PEGI = array(
        'G',
        'PG',
        'PG-13',
        'R',
        'NC-17'
    );    
    
	/**
     * @return the $PEGI
     */
    public function getPEGI()
    {
        return $this->PEGI;
    }

	/**
     * @param multitype: $PEGI
     */
    public function setPEGI($PEGI)
    {
        $this->PEGI[] = $PEGI;
        return $this;
    }

	/**
     * @return the $labels
     */
    public function getLabels()
    {
        return $this->labels;
    }

	/**
     * @param multitype: $labels
     */
    public function setLabels($label)
    {
        $this->labels[] = $label;
        return $this;
    }

	/**
     * @return the $filmId
     */
    public function getFilmId()
    {
        return $this->filmId;
    }

	/**
     * @return the $title
     */
    public function getTitle()
    {
        return ucfirst(strtolower($this->title));
    }

	/**
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

	/**
     * @return the $releaseYear
     */
    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

	/**
     * @return the $languageId
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

	/**
     * @return the $originaLanguageId
     */
    public function getOriginalLanguageId()
    {
        return $this->originalLanguageId;
    }

	/**
     * @return the $rentalDuration
     */
    public function getRentalDuration()
    {
        return $this->rentalDuration;
    }

	/**
     * @return the $rentalRate
     */
    public function getRentalRate()
    {
        return $this->rentalRate;
    }

	/**
     * @return the $length
     */
    public function getLength()
    {
        return $this->length;
    }

	/**
     * @return the $replacementCost
     */
    public function getReplacementCost()
    {
        return $this->replacementCost;
    }

	/**
     * @return the $rating
     */
    public function getRating()
    {
        return $this->rating;
    }

	/**
     * @return the $specialFeatures
     */
    public function getSpecialFeatures()
    {
        return $this->specialFeatures;
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
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

	/**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

	/**
     * @param number $releaseYear
     */
    public function setReleaseYear($releaseYear)
    {
        $this->releaseYear = $releaseYear;
        return $this;
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
     * @param number $originalLanguageId
     */
    public function setOriginalLanguageId($originalLanguageId)
    {
        $this->originalLanguageId = $originalLanguageId;
        return $this;
    }

	/**
     * @param number $rentalDuration
     */
    public function setRentalDuration($rentalDuration)
    {
        $this->rentalDuration = $rentalDuration;
        return $this;
    }

	/**
     * @param number $rentalRate
     */
    public function setRentalRate($rentalRate)
    {
        $this->rentalRate = $rentalRate;
        return $this;
    }

	/**
     * @param number $length
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

	/**
     * @param number $replacementCost
     */
    public function setReplacementCost($replacementCost)
    {
        $this->replacementCost = $replacementCost;
        return $this;
    }

	/**
     * @param number $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
    
    public function setSpecialFeatures($features)
    {
        $this->specialFeatures = $features;
        return $this;
    }    
    
    /**
     * Crée la liste de features
     * @param Array $features
     * @return string
     */
    public function addSpecialFeatures($features)
    {
        $labels = $this->getLabels();
        $listFeatures = "";
        foreach ($features as $feature) {
            if (array_key_exists($feature, $labels)) {
                $listFeatures .= $labels[$feature] . ",";
            }
        }        
        $this->specialFeatures = substr($listFeatures, 0, -1); 
        
        return $this;
    }      
    
    public function getCategories()
    {
        if (NULL === $this->categories) {
            $categoryMapper = new Model_Mapper_Category;
            $this->categories = $categoryMapper->fetchByFilm($this->filmId);
        }
        return $this->categories;
    }
    
    public function getActors()
    {
        if (NULL === $this->actors) {
            $actorMapper = new Model_Mapper_Actor;
            $this->actors = $actorMapper->fetchByFilm($this->filmId);
        }
        return $this->actors;
    }    
    
    
    
}