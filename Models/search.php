<?php

class Search extends Model
{

    function search($terms)
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
}