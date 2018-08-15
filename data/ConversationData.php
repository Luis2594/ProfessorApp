<?php

require_once '../data/Connector.php';
include_once '../domain/Conversation.php';

class ConversationData extends Connector {

    public function insert($conversation) {

        $query = "call insertForumConversation("
                . $conversation->getForumId() . ",'"
                . $conversation->getForumConversation() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function update($conversation) {
        $query = "call updateForumConversation("
                . $conversation->getForumConversationId() . ",'"
                . $conversation->getForumConversation() . "')";

        try {
            $result = $this->exeQuery($query);
            return $result;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function delete($id) {
        $query = 'call deleteForumConversation("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
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
            $this->Log(__METHOD__, $query);
        }
    }

    public function getConversation($id) {
        $query = 'call getForumConversationById("' . $id . '");';
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
            $this->Log(__METHOD__, $query);
        }
    }

    public function getConversationsByForum($id) {
        $query = 'call getForumConversationByForum(' . $id . ');';
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
            $this->Log(__METHOD__, $query);
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
            $this->Log(__METHOD__, $query);
        }
    }

}
