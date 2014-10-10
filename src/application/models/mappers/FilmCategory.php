<?php

class Model_Mapper_FilmCategory
{
    private $filmCategoryTable;
    
    /**
     * Ajoute une nouvelle relation categorie-film en DB
     * @param Model_FilmCategory $filmCategory
     */
    public function insert(Model_FilmCategory $filmCategory)
    {
        $data = $this->objectToRow($filmCategory);
        return $this->getFilmCategoryTable()->insert($data);
    }
  
    /**
     * Converti l'objet FilmCategory en un tableau
     * @param Model_FilmCategory $filmCategory
     * @return Array
     */
    private function objectToRow(Model_FilmCategory $filmCategory)
    {
        return array(
            'film_id' => $filmCategory->getFilmId(),
            'category_id' => $filmCategory->getCategoryId(),
            'last_update' => $filmCategory->getLastUpdate()
        );
    }
    
    /**
     * Converti un tableau en un objet FilmCategory
     * @param Array $data
     * @return Model_FilmCategory
     */
    private function rowToObject($data)
    {
        $filmCategory = new Model_FilmCategory;
        $filmCategory->setCategoryId($data['category_id'])
        ->setFilmId($data['film_id'])
        ->setLastUpdate($data['last_update']);
        return $filmCategory;
    }
    
    /**
     * Lazy loading du DbTable FilmCategory
     * @return Model_DbTable_FilmCategory
     */
    private function getFilmCategoryTable()
    {
        if (NULL === $this->filmCategoryTable) {
            $this->filmCategoryTable = new Model_DbTable_FilmCategory;
        }
        return $this->filmCategoryTable;
    }    
}