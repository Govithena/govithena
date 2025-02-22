<?php

class SearchGig extends Model
{

    function search1($terms)
    {
        try {
            $sql = "SELECT * FROM gig WHERE (title LIKE :key OR description LIKE :key OR category LIKE :key) ";

            if (isset($terms['location'])) {
                $sql .= "AND location = :location ";
            }

            if (isset($terms['category'])) {
                $sql .= "AND category = :category ";
            }

            if (isset($terms['price_range'])) {
                $sql .= "AND price_range = :price_range ";
            }

            $req = Database::getBdd()->prepare($sql);
            $req->execute($terms);

            if ($req->rowCount() > 0) {
                return $req->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }


    function search($terms)
    {
        try {
            $sql = "SELECT * FROM gig_search_view  WHERE (title LIKE :key OR category LIKE :key OR city LIKE :key ) ";
            // $sql = "SELECT * FROM gig INNER JOIN user ON gig.farmerId = user.uid WHERE (title LIKE :key OR description LIKE :key OR category LIKE :key OR location LIKE :key ) ";

            if (isset($terms['location'])) {
                $sql .= "AND location = :location ";
            }

            if (isset($terms['category'])) {
                $sql .= "AND category = :category ";
            }

            if (isset($terms['price_range'])) {
                $sql .= "AND price_range = :price_range ";
            }

            $req = Database::getBdd()->prepare($sql);
            $req->execute($terms);

            if ($req->rowCount() > 0) {
                return $req->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
