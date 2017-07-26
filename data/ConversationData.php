<?php

require_once '../data/Connector.php';
include '../domain/Conversation.php';
//require_once './resource/log/ErrorHandler.php';


class ConversationData extends Connector {

    public function insert($conversation) {

        $query = "call insertConversation('"
                . $conversation->getForumId() . "','"
                . $conversation->getForumConversation() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($conversation) {
        $query = "call updateConversation("
                . $conversation->getForumConversationId() . ",'"
                . $conversation->getForumConversation() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deteleConversation($id) {
        $query = 'call deteleConversation("' . $id . '");';
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
        $query = 'call getAllConversation();';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    $currentInstitution = new Conversation(
                            $row['forumconversationid'], $row['forumid'], $row['forumconversation']
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getConversation($id) {
        $query = 'call getConversation("' . $id . '");';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    $currentInstitution = new Conversation(
                            $row['forumconversationid'], $row['forumid'], $row['forumconversation']
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getConversationsByUser($id) {
        $query = 'call getConversationByUser("' . $id . '");';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    $currentInstitution = new Conversation(
                            $row['forumconversationid'], $row['forumid'], $row['forumconversation']
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
