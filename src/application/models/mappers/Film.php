<?php

class Model_Mapper_Film
{
    private $filmTable;
    
    public function fetchAll($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        $result = $this->getFilmTable()->fetchAll($where, $order, $count, $offset);
        if (0 === $result->count()) {
            return false;
        }
        $films = array();
        foreach ($result as $row) {
            $films[] = $this->rowToObject($row);
        }
        return $films;
    }
    
    /**
     * Jointure entre catégories et films
     * @param integer $id
     */
    public function fetchByCategory($id)
    {
        $table = new Model_DbTable_FilmCategory;
        $result = $table->fetchAll(array('category_id = ?' => $id));
        foreach ($result as $row) {
            $films[] = $this->find($row['film_id']);
        }
        return $films;
    }    
    
    /**
     * Fait le lien entre le model et ta table Film
     * @param Integer $filmId
     * @return boolean|Model_Film
     */
    public function find($filmId)
    {
        $result = $this->getFilmTable()->find($filmId);
        if (0 === $result->count()) {
            return false;
        }
        
        return $this->rowToObject($result[0]);
    }
    
    /**
     * Ajoute un nouveau film en DB
     * @param Model_Film $film
     */
    public function insert(Model_Film $film)
    {
        $data = $this->objectToRow($film);
        return $this->getFilmTable()->insert($data);
    }
    
    /**
     * Update un film
     * @param Model_Film $film
     */
    public function update(Model_Film $film)
    {
        $data = $this->objectToRow($film);
        $where = array('film_id = ?' => $film->getFilmId());
        return $this->getFilmTable()->update($data, $where);
    } 

    /**
     * Supprime un film en DB
     * @param integer $filmId
     */
    public function delete($filmId)
    {
        return $this->getFilmTable()->delete($filmId);
    }       
    
    /**
     * Lazy loading du DbTable Film
     * @return Model_DbTable_Film
     */
    private function getFilmTable()
    {
        if (NULL === $this->filmTable) {
            $this->filmTable = new Model_DbTable_Film;
        }
        return $this->filmTable;
    }    
    
    /**
     * Converti l'objet Film en un tableau
     * @param Model_Film $film
     * @return Array
     */
    private function objectToRow(Model_Film $film)
    {
        return array(
            'film_id' => $film->getFilmId(),
            'title' => $film->getTitle(),
            'description' => $film->getDescription(),
            'release_year' => $film->getReleaseYear(),
            'language_id' => $film->getLanguageId(),
            'original_language_id' => $film->getOriginalLanguageId(),
            'rental_duration' => $film->getRentalDuration(),
            'rental_rate' => $film->getRentalRate(),
            'length' => $film->getLength(),
            'replacement_cost' => $film->getReplacementCost(),
            'rating' => $film->getRating(),
            'special_features' => $film->getSpecialFeatures(),
            'last_update' => $film->getLastUpdate(),
        );
    }
    
    /**
     * Converti un tableau en un objet film
     * @param Array $data
     * @return Model_Film
     */
    private function rowToObject($data)
    {
        $film = new Model_Film;
        $film->setFilmId($data['film_id'])
        ->setTitle($data['title'])
        ->setDescription($data['description'])
        ->setReleaseYear($data['release_year'])
        ->setLanguageId($data['language_id'])
        ->setOriginalLanguageId($data['original_language_id'])
        ->setRentalDuration($data['rental_duration'])
        ->setRentalRate($data['rental_rate'])
        ->setLength($data['length'])
        ->setReplacementCost($data['replacement_cost'])
        ->setRating($data['rating'])
        ->setSpecialFeatures($data['special_features'])
        ->setLastUpdate($data['last_update']);
        return $film;
    }
}