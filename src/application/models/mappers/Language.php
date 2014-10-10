<?php

class Model_Mapper_Language
{
    private $languageTable;
    
    /**
     * Récupère plusieurs languages
     * @param string $where
     * @param integer $order
     * @param integer $count
     * @param integer $offset
     * @return boolean|multitype:Model_Language
     */
    public function fetchAll($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        $result = $this->getLanguageTable()->fetchAll($where, $order, $count, $offset);
        if (0 === $result->count()) {
            return false;
        }
        $languages = array();
        foreach ($result as $row) {
            $languages[] = $this->rowToObject($row);
        }
        return $languages;
    }

    
    /**
     * Fait le lien entre le model et ta table Language
     * @param Integer $languageId
     * @return boolean|Model_Language
     */
    public function find($languageId)
    {
        $result = $this->getLanguageTable()->find($languageId);
        if (0 === $result->count()) {
            return false;
        }
        
        return $this->rowToObject($result[0]);
    }
     
    
    /**
     * Lazy loading du DbTable Language
     * @return Model_DbTable_Language
     */
    private function getLanguageTable()
    {
        if (NULL === $this->languageTable) {
            $this->languageTable = new Model_DbTable_Language;
        }
        return $this->languageTable;
    }    

    /**
     * Converti l'objet Language en un tableau
     * @param Model_Language $language
     * @return Array
     */
    private function objectToRow(Model_Language $language)
    {
        return array(
            'language_id' => $language->getCategoryId(),
            'name' => $language->getName(),
            'last_update' => $language->getLastUpdate()
        );
    }
    
    /**
     * Converti un tableau en un objet language
     * @param Array $data
     * @return Model_Language
     */
    private function rowToObject($data)
    {
        $category = new Model_Language;
        $category->setLanguageId($data['language_id'])
        ->setName($data['name'])
        ->setLastUpdate($data['last_update']);
        return $category;
    }    
    
}