<?php

require_once '../data/Connector.php';
include_once '../domain/File.php';

class FileData extends Connector
{

    public function insert($file)
    {
        $query = "call insertFile('" . $file->getDescription() . "','" .
        $file->getDate() . "'," . $file->getCourse() . "," .
        $file->getProfessor() . "," . $file->getYear() . "," .
        $file->getPeriod() . "," . $file->getGroup() . ",'" .
        $file->getGUID() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function update($file)
    {
        $query = "call updateFile(" . $file->getId() . ","
        . "'" . $file->getDescription() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function delete($id)
    {
        $query = 'call deleteFile(' . $id . ');';
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function get($id)
    {
        $query = 'call getFile(' . $id . ');';
        try {
            $allFiles = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allFiles) > 0) {
                while ($row = mysqli_fetch_array($allFiles)) {
                    return new File($row['fileid'], $row['filegroup'], $row['fileprofessor'],
                        $row['fileyear'], $row['fileperiod'], $row['filecourse'],
                        $row['filedescription'], $row['filedate'], $row['fileGUID']);
                }
            }

            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getFilesByFilters($course, $professor, $period, $year, $group)
    {
        $query = 'call getFileByFilters(' . $course . "," . $professor . "," . $year . "," . $period . "," . $group . ');';
        try {
            $allFiles = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allFiles) > 0) {
                while ($row = mysqli_fetch_array($allFiles)) {
                    $current = new File($row['fileid'], $row['filegroup'], $row['fileprofessor'],
                        $row['fileyear'], $row['fileperiod'], $row['filecourse'],
                        $row['filedescription'], $row['filedate'], $row['fileGUID']);
                    array_push($array, $current);
                }
            }

            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
