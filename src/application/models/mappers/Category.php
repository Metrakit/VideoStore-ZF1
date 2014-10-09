<?php

class Model_Mapper_Category
{
    private $categoryTable;
    
    /**
     * Récupère plusieurs catégories
     * @param string $where
     * @param integer $order
     * @param integer $count
     * @param integer $offset
     * @return boolean|multitype:Model_Category
     */
    public function fetchAll($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        $result = $this->getCategoryTable()->fetchAll($where, $order, $count, $offset);
        if (0 === $result->count()) {
            return false;
        }
        $categories = array();
        foreach ($result as $row) {
            $categories[] = $this->rowToObject($row);
        }
        return $categories;
    }
    
    /**
     * Jointure entre catégories et films
     * @param integer $id
     */
    public function fetchByFilm($id)
    {
        $table = new Model_DbTable_FilmCategory;
        $result = $table->fetchAll(array('film_id = ?' => $id));
        foreach ($result as $row) {
            $categories[] = $this->find($row['category_id']);
        }
        return $categories;
    }
    
    /**
     * Fait le lien entre le model et ta table Category
     * @param Integer $categoryId
     * @return boolean|Model_Category
     */
    public function find($categoryId)
    {
        $result = $this->getCategoryTable()->find($categoryId);
        if (0 === $result->count()) {
            return false;
        }
        
        return $this->rowToObject($result[0]);
    }
    
    /**
     * Ajoute une nouvelle catégorie en DB
     * @param Model_Category $category
     */
    public function insert(Model_Category $category)
    {
        $data = $this->objectToRow($category);
        return $this->getCategoryTable()->insert($data);
    }
    
    /**
     * Update une catégorie
     * @param Model_Category $category
     */
    public function update(Model_Category $category)
    {
        $data = $this->objectToRow($category);
        $where = array('category_id = ?' => $category->getCategoryId());
        return $this->getCategoryTable()->update($data, $where);
    }   
    
    /**
     * Supprime une catégorie en DB
     * @param integer $categoryId
     */
    public function delete($categoryId)
    {
        return $this->getCategoryTable()->delete($categoryId);
    }    
    
    /**
     * Lazy loading du DbTable Category
     * @return Model_DbTable_Category
     */
    private function getCategoryTable()
    {
        if (NULL === $this->categoryTable) {
            $this->categoryTable = new Model_DbTable_Category;
        }
        return $this->categoryTable;
    }    
    
    /**
     * Converti l'objet Category en un tableau
     * @param Model_Category $category
     * @return Array
     */
    private function objectToRow(Model_Category $category)
    {
        return array(
            'category_id' => $category->getCategoryId(),
            'name' => $category->getName(),
            'last_update' => $category->getLastUpdate()
        );
    }
    
    /**
     * Converti un tableau en un objet category
     * @param Array $data
     * @return Model_Category
     */
    private function rowToObject($data)
    {
        $category = new Model_Category;
        $category->setCategoryId($data['category_id'])
        ->setName($data['name'])
        ->setLastUpdate($data['last_update']);
        return $category;
    }
}