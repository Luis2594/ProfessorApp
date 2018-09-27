<?php

include_once '../data/FileData.php';

class FileBusiness {

    private $data;

    public function FileBusiness() {
        return $this->data = new FileData();
    }

    public function insert($entity) {
        return $this->data->insert($entity);
    }

    public function get($id) {
        return $this->data->get($id);
    }

    public function update($entity) {
        return $this->data->update($entity);
    }

    public function delete($id) {
        return $this->data->delete($id);
    }
    
    public function getFilesByFilters($course, $professor, $period, $year, $group){
        return $this->data->getFilesByFilters($course, $professor, $period, $year, $group);
    }    
}
