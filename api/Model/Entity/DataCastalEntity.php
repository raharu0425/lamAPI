<?php
App::uses('Entity', 'Entity.ORM');

/**
 * DataQuest Entity
 *
 */
class DataCastalEntity extends Entity {

    public function getName2Identifer()
    {
        return $this->name . 'なんでもやれる';
    }

}
