<?php

class Farmer extends Model
{
    public function agrologists()
    {
        try {
            $sql = "SELECT LG.uid, user.firstName, user.lastName FROM login_credential LG INNER JOIN user ON LG.uid = user.uid WHERE LG.userType = :userType";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['userType' => ACTOR::AGROLOGIST]);
            $req = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['status' => true, 'data' => $req];
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function sendRequest($data)
    {
        try {
            $sql = "INSERT INTO agrologist_request (farmerId, agrologistId, message, status) VALUES (:farmerId, :agrologistId, :message, :status)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute([
                'farmerId' => $data['farmerId'],
                'agrologistId' => $data['agrologistId'],
                'message' => $data['message'],
                'status' => 'pending'
            ]);
            if ($stmt->rowCount() > 0) {
                return ['status' => true, 'data' => true];
            } else {
                return ['status' => true, 'data' => false];
            }
        } catch (Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }
}
