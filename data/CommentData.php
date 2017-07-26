<?php

require_once '../data/Connector.php';
include '../domain/Comment.php';
include_once '../business/PersonBusiness.php';
//require_once './resource/log/ErrorHandler.php';


class CommentData extends Connector {

    public function insert($comment) {
        $query = "call insertComment('"
                . $comment->getComment() . "','"
                . $comment->getConversation() . "','"
                . $comment->getPerson() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($comment) {
        $query = "call updateComment(" .
                $comment->getId() . ",'" .
                $comment->getComment() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deteleComment($id) {
        $query = 'call deteleComment("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAll() {
        $query = 'call getAllComment();';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    $currentInstitution = new Comment(
                            $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $row['forumcommentperson']
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getComment($id) {
        $query = 'call getComment("' . $id . '");';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    $currentInstitution = new Comment(
                            $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], $row['forumcommentperson']
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCommentsByUser($id) {
        $query = 'call getCommentByUser("' . $id . '");';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                $business = new PersonBusiness();
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    $person = $business->getPersonId($row['forumcommentperson']);
                    $currentInstitution = new Comment(
                            $row['forumcommentid'], $row['forumcommentcomment'], $row['forumcommentforumconversation'], 
                            $person[0]->getPersonFirstName()." ".$person[0]->getPersonFirstlastname()
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
