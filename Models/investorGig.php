<?php

class investorGig
{
    public function fetchAllActiveGigByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM investor_gig INNER JOIN gig ON investor_gig.gigId = gig.gigId WHERE investorId = :id AND investor_gig.status = 'ACTIVE' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => true, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllToReviewGigByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM investor_gig INNER JOIN gig ON investor_gig.gigId = gig.gigId WHERE investorId = :id AND investor_gig.status = 'TO_REVIEW' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => true, 'data' => $e->getMessage()];
        }
    }

    public function getCompletedGigsByInvestor($id)
    {
        try {
            $sql = "SELECT * FROM investor_gig INNER JOIN gig ON investor_gig.gigId = gig.gigId WHERE investorId = :id AND investor_gig.status = 'COMPLETED' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => true, 'data' => $e->getMessage()];
        }
    }

    public function markAsCompleted($gigId)
    {
        try {
            $sql = "UPDATE investor_gig SET status = 'COMPLETED' WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            return ['success' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function countActiveGigByInvestor($investorId)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM investor_gig WHERE investorId = :investorId AND status = 'ACTIVE'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function countCompletedGigByInvestor($investorId)
    {
        try {
            $sql = "SELECT COUNT(*) as count FROM investor_gig WHERE investorId = :investorId AND status = 'COMPLETED'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getTotalInvestmentForGigByInvestor($investorId, $gigId)
    {
        try {
            $sql = "SELECT sum(amount) as totalInvestment FROM investment WHERE investorId = :investorId AND gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId, 'gigId' => $gigId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getStartedDate($gigId)
    {
        try {
            $sql = "SELECT DATE(timestamp) as startDate FROM investor_gig WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }


    public function fetchAllByFarmer($id)
    {
        try {
            $sql = "SELECT ig.investorId, ig.gigId, ig.timestamp, gig.title, gig.category, gig.thumbnail as gimage, gig.city as gcity, user.firstName, user.lastName, user.city as ucity, user.image as uimage FROM investor_gig as ig INNER JOIN gig ON ig.gigId = gig.gigId INNER JOIN user ON ig.investorId = user.uid WHERE ig.farmerId = :id ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
    public function getCompletedGigsByFarmer($id)
    {
        try {
            $sql = "SELECT ig.investorId, ig.gigId, ig.timestamp, gig.title, gig.category, gig.thumbnail as gimage, gig.city as gcity, user.firstName, user.lastName, user.city as ucity, user.image as uimage FROM investor_gig as ig INNER JOIN gig ON ig.gigId = gig.gigId INNER JOIN user ON ig.investorId = user.uid WHERE ig.farmerId = :id AND ig.status='COMPLETED' ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchInvestorByGig($gigId)
    {
        try {
            $sql = "SELECT user.uid, user.firstName, user.lastName, user.image, user.city from user INNER JOIN investor_gig as ig ON ig.investorId = user.uid WHERE ig.gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function add($data)
    {
        try {
            $sql = "INSERT INTO investor_gig (investorId, gigId, farmerId) VALUES (:investorId, :gigId, :farmerId)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return false;
        }
    }


    public function getActiveGigCount($investorId)
    {
        try {
            $sql = "SELECT count(*) as gigCount FROM investor_gig WHERE investorId = :investorId AND status = 'ACTIVE' ";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function getCompletedGigCount($investorId)
    {
        try {
            $sql = "SELECT count(*) as gigCount FROM investor_gig WHERE investorId = :investorId AND status = 'COMPLETED'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
