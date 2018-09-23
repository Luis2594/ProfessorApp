<?php

require_once '../data/Connector.php';
include_once '../domain/Attendance.php';

class AttendanceData extends Connector {

    public function insert($attendance) {
        $query = "call insertAttendance("
                . $attendance->getCodStudent() . ","
                . $attendance->getCodProfessor() . ","
                . $attendance->getCodCourse() . ","
                . $attendance->getCodeGroup() . ","
                . $attendance->getIsPresent() . ",'"
                . $attendance->getJustification() . "')";
//        return $query;
        return $this->exeQuery($query);
    }

//    public function update($comment) {
//        $query = "call updateComment(" .
//                $comment->getId() . ",'" .
//                $comment->getComment() . "')";
//        try {
//            $result = $this->exeQuery($query);
//            $array = mysqli_fetch_array($result);
//            return trim($array[0]);
//        } catch (Exception $ex) {
//            $this->Log(__METHOD__, $query);
//        }
//    }
//
//    public function deteleComment($id) {
//        $query = 'call deteleComment("' . $id . '");';
//        try {
//            if ($this->exeQuery($query)) {
//                return TRUE;
//            } else {
//                return FALSE;
//            }
//        } catch (Exception $ex) {
//            $this->Log(__METHOD__, $query);
//        }
//    }
//
//    public function getAll() {
//        $query = 'call getAllComment();';
//        try {
//            $allInstitutions = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allInstitutions) > 0) {
//                while ($row = mysqli_fetch_array($allInstitutions)) {
//                    $currentInstitution = new Comment(
//                            $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $row['forumcommentperson']
//                    );
//                    array_push($array, $currentInstitution);
//                }
//            }
//            return $array;
//        } catch (Exception $ex) {
//            $this->Log(__METHOD__, $query);
//        }
//    }
//
//    public function getComment($id) {
//        $query = 'call getComment("' . $id . '");';
//        try {
//            $allInstitutions = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allInstitutions) > 0) {
//                while ($row = mysqli_fetch_array($allInstitutions)) {
//                    $currentInstitution = new Comment(
//                            $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $row['forumcommentperson']
//                    );
//                    array_push($array, $currentInstitution);
//                }
//            }
//            return $array;
//        } catch (Exception $ex) {
//            $this->Log(__METHOD__, $query);
//        }
//    }
//
//    public function getCommentsByUser($id) {
//        $query = 'call getCommentByUser("' . $id . '");';
//        try {
//            $allInstitutions = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allInstitutions) > 0) {
//                $business = new PersonBusiness();
//                while ($row = mysqli_fetch_array($allInstitutions)) {
//                    $person = $business->getPersonId($row['forumcommentperson']);
//                    $currentInstitution = new Comment(
//                            $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $person[0]->getPersonFirstName() . " " . $person[0]->getPersonFirstlastname()
//                    );
//                    array_push($array, $currentInstitution);
//                }
//            }
//            return $array;
//        } catch (Exception $ex) {
//            $this->Log(__METHOD__, $query);
//        }
//    }
//
//    public function getCommentsByConversation($id) {
//        $query = 'call getCommentByConversation("' . $id . '");';
//        try {
//            $allInstitutions = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allInstitutions) > 0) {
//                $business = new PersonBusiness();
//                while ($row = mysqli_fetch_array($allInstitutions)) {
//                    $person = $business->getPersonId($row['forumcommentperson']);
//                    $currentInstitution = new Comment(
//                            $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $person[0]->getPersonFirstName() . " " . $person[0]->getPersonFirstlastname()
//                    );
//                    array_push($array, $currentInstitution);
//                }
//            }
//            return $array;
//        } catch (Exception $ex) {
//            $this->Log(__METHOD__, $query);
//        }
//    }
}
