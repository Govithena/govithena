<?php

class Earnings
{
    public function getEarningsByInvestorByFilter($id, $status, $fromDate, $toDate)
    {
        try {
            $sql = "SELECT roi.roiId, roi.farmerId, roi.gigId, roi.amount, roi.description, roi.status, roi.approvedBy, DATE(roi.approvedTimestamp) as approvedDate, TIME(roi.approvedTimestamp) as approvedTime, DATE(roi.timestamp) as createdDate, TIME(roi.timestamp) AS createdTime, u.firstName, u.lastName, u.image, g.title, g.thumbnail, g.city From return_of_investment roi INNER JOIN user u ON roi.farmerId = u.uid INNER JOIN gig g ON roi.gigId = g.gigId WHERE roi.investorId = :id ";
            $data = ['id' => $id];

            if ($status != '') {
                $sql .= "AND roi.status = :status ";
                $data['status'] = $status;
            }

            if ($fromDate != '') {
                $sql .= "AND DATE(roi.timestamp) >= :fromDate ";
                $data['fromDate'] = $fromDate;
            }

            if ($toDate != '') {
                $sql .= "AND DATE(roi.timestamp) <= :toDate ";
                $data['toDate'] = $toDate;
            }

            $sql .= " ORDER BY roi.timestamp, roi.approvedTimestamp DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute($data);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getTotalEarningsByInvestor($id)
    {
        try {
            $sql = "SELECT SUM(amount) as totalEarnings FROM return_of_investment WHERE investorId = :id AND status = 'APPROVED' OR status = 'CLEARING'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getThisMonthEarningsByInvestor($id)
    {
        try {
            $sql = "SELECT SUM(amount) as thisMonthTotalEarnings FROM return_of_investment WHERE investorId = :id AND status = 'APPROVED' OR status = 'CLEARING' AND MONTH(timestamp) = MONTH(CURRENT_DATE()) AND YEAR(timestamp) = YEAR(CURRENT_DATE())";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getTotalClearingByInvestor($id)
    {
        try {
            $sql = "SELECT SUM(amount) as totalClearings FROM return_of_investment WHERE investorId = :id AND status = 'CLEARING'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getWithdrawalBalance($id)
    {
        try {
            $sql = "SELECT SUM(amount) AS withdrawalBalance FROM return_of_investment WHERE investorId = :id AND status = 'APPROVED'";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getMonthlyEarningsByInvestor($id)
    {
        try {
            $sql = "SELECT MONTHNAME(timestamp) as month, YEAR(timestamp) as year, SUM(amount) as totalEarnings FROM return_of_investment WHERE investorId = :investorId AND (status = 'APPROVED' OR status = 'CLEARING') GROUP BY MONTH(timestamp), YEAR(timestamp) ORDER BY YEAR(timestamp), MONTH(timestamp)";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getCategoryVsEarningsByInvestor($id)
    {
        try {
            $sql = "SELECT g.category, SUM(amount) as totalEarnings FROM return_of_investment roi INNER JOIN gig g ON roi.gigId = g.gigId WHERE roi.investorId = :investorId AND (roi.status = 'APPROVED' OR roi.status = 'CLEARING') GROUP BY g.category ORDER BY SUM(roi.amount) DESC";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['investorId' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function fetchEarningsByForDashboard($id)
    {
        try {
            $sql = "SELECT gig.title, roi.amount, DATE(roi.timestamp) as eDate, roi.status FROM return_of_investment roi INNER JOIN gig ON roi.gigId = gig.gigId WHERE roi.investorId = :id AND roi.status = 'APPROVED' OR roi.status = 'CLEARING'  ORDER BY roi.timestamp DESC LIMIT 5";
            $stmt = Database::getBdd()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ['success' => true, 'data' => $res];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
