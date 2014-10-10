<?php

/**
 * Service Language
 * Utilisation du CRUD (Create Read Update Delete)
 * @author Jordane
 */
class Service_Language
{
    private $languageMapper;
    
    public function getList($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        return $this->getLanguageMapper()->fetchAll($where, $order, $count, $offset);
    }
    
    /**
     * Récupère une lite de langues et la converti en Array (utile pour un form)
     * @param string $where
     * @param string $order
     * @param string $count
     * @param string $offset
     * @return array
     */
    public function getListToArray($where = NULL, $order = NULL, $count = NULL, $offset = NULL)
    {
        $results = $this->getList($where = NULL, $order = NULL, $count = NULL, $offset = NULL);
        return $this->objectToRow($results);      
    }

    /**
     * Converti les langues en un tableau
     * @param Array $languages
     * @return Array
     */
    private function objectToRow($results)
    {
        $languages = array();
        foreach ($results as $language) {
            $languages[$language->getLanguageId()] = $language->getName();
        }
        return $languages;  
    }    
    
    
    /**
     * Lazy loading du mapper Language
     * @return Model_Mapper_Language
     */
    private function getLanguageMapper()
    {
        if (NULL === $this->languageMapper) {
            $this->languageMapper = new Model_Mapper_Language;
        }
        return $this->languageMapper;
    }

}