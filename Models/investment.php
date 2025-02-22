<?php

class Investment extends Model
{
    public function fetchAllBy($id)
    {
        try {
            $sql = "SELECT investment.id, investment.investorId, investment.gigId, investment.amount, DATE(investment.timestamp) as investedDate, gig.title, gig.thumbnail, gig.category, gig.cropCycle, gig.city FROM investment INNER JOIN gig ON investment.gigId = gig.gigId WHERE investment.investorId = :id ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchAllByUsingFilters($id, $category, $fromDate, $toDate)
    {
        try {

            $data = ["id" => $id];

            $sql = "SELECT investment.id, investment.investorId, investment.gigId, investment.amount, DATE(investment.timestamp) as investedDate, TIME(investment.timestamp) as investedTime, investment.description, user.firstName, user.lastName, user.image, gig.title, gig.thumbnail, gig.category FROM investment INNER JOIN user ON investment.farmerId = user.uid INNER JOIN gig ON investment.gigId = gig.gigId WHERE investment.investorId = :id ";

            if ($category != '') {
                $sql .= "AND gig.category = :category ";
                $data['category'] = $category;
            }
            if ($fromDate != '') {
                $sql .= "AND DATE(investment.timestamp) >= :fromDate ";
                $data['fromDate'] = $fromDate;
            }
            if ($toDate != '') {
                $sql .= "AND DATE(investment.timestamp) <= :toDate ";
                $data['toDate'] = $toDate;
            }
            $sql .= " ORDER BY investment.timestamp DESC";

            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function add($data)
    {
        try {
            $sql = "INSERT INTO investment (id, investorId, gigId, farmerId, amount, description) VALUES (:id, :investorId, :gigId, :farmerId, :amount, :description)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true, 'data' => true];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getInvestmentsByGigId($gigId)
    {
        try {
            $sql = "SELECT DATE(timestamp) as date, TIME(timestamp) as time, amount, description FROM investment WHERE gigId = :gigId ORDER BY timestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }


    public function getTotalInvestmentByInvestor($investorId)
    {
        try {
            $sql = "SELECT sum(amount) as totalInvestment FROM investment WHERE investorId = :investorId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
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

    public function getThisMonthTotalByInvestor($investorId)
    {
        try {
            $sql = "SELECT sum(amount) as thisMonthInvestment FROM investment WHERE investorId = :investorId AND MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp) = YEAR(CURRENT_DATE())";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
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

    public function getLastMonthTotalByInvestor($investorId)
    {
        try {
            $sql = "SELECT sum(amount) as lastMonthInvestment FROM investment WHERE investorId = :investorId AND MONTH(timestamp) = MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)) AND YEAR(timestamp) = YEAR(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $investorId]);
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

    public function getTotalInvestmentPerGigByInvestor($id)
    {
        try {
            $sql = "SELECT gigId, sum(amount) as totalInvestment FROM investment WHERE investorId = :investorId GROUP BY gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function save($data)
    {
        try {
            $sql = "INSERT INTO investment (id, investorId, gigId, farmerId, amount, description) VALUES (:id, :investorId, :gigId, :farmerId, :amount, :description)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            return ['success' => true, 'data' => true];
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

    public function getMonthlyInvestmentByInvestor($id)
    {
        try {
            $sql = "SELECT MONTHNAME(timestamp) as month, sum(amount) as totalInvestment FROM investment WHERE investorId = :investorId GROUP BY MONTH(timestamp), YEAR(timestamp) ORDER BY YEAR(timestamp), MONTH(timestamp)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($res) {
                return ['success' => true, 'data' => $res];
            } else {
                return ['success' => false, 'data' => 'No investment found'];
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getCategoryVsInvestmentsByInvestor($id)
    {
        try {
            $sql = "SELECT category, sum(amount) as totalInvestment FROM investment INNER JOIN gig ON investment.gigId = gig.gigId WHERE investment.investorId = :investorId GROUP BY category";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function fetchByInvestoIdFroDashboard($id)
    {
        try {
            $sql = "SELECT investment.id, investment.gigId, investment.amount, DATE(investment.timestamp) as investedDate, gig.title FROM investment INNER JOIN gig ON investment.gigId = gig.gigId WHERE investment.investorId = :id ORDER BY timestamp DESC LIMIT 5";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $row];
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }

    public function getInvestmentByGigId($gigId)
    {
        try {
            $sql = "SELECT id, investorId, farmerId, amount, description, DATE(timestamp) as investedDate, TIME(timestamp) as investedTime FROM investment WHERE gigId = :gigId";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['gigId' => $gigId]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($row) {
                return ['success' => true, 'data' => $row];
            } else {
                return ['success' => false, 'data' => false];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'data' => $e->getMessage()];
        }
    }
}
