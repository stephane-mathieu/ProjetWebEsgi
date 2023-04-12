<?php

namespace Models;

class MatchLike extends Model{
    public function createMatch($id_user, $id_profile) {
        $query = $this->pdo->prepare("SELECT * FROM `match` WHERE `id_user_likeur` = :id_user AND `id_user_liker` = :id_profile");
        $query->bindParam(':id_user', $id_user, \PDO::PARAM_INT);
        $query->bindParam(':id_profile', $id_profile, \PDO::PARAM_INT);
        $query->execute();
        $match = $query->fetch(\PDO::FETCH_ASSOC);

        if(empty($match)){
            $query = $this->pdo->prepare("SELECT * FROM `match` WHERE id_user_likeur  = '$id_user' AND id_user_liker = '$id_profile'");
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            $query->execute();
            $match=$query->fetchall();
        }

        if (!$match) {
            // le match n'existe pas, on l'ajoute avec un statut inactif
            $query = $this->pdo->prepare("INSERT INTO `match` (`id_user_likeur`, `id_user_liker`, `statut`,`statut2`) VALUES (:id_user, :id_profile, 'liked','inactive')");
            $query->bindParam(':id_user', $id_user, \PDO::PARAM_INT);
            $query->bindParam(':id_profile', $id_profile, \PDO::PARAM_INT);
            $query->execute();
        }
    }

    // Vérification si un match existe entre les deux utilisateurs
    public function updateMatch($liker_id, $liked_id, $statut) {
        $query = $this->pdo->prepare("SELECT * FROM `match` WHERE id_user_liker = '$liker_id' AND id_user_likeur = '$liked_id'");
        $query->execute();
        $result = $query->fetchall(\PDO::FETCH_ASSOC);

        if(!empty($result)) {
            if ($result[0]['statut'] == 'liked' && $result[0]['statut2'] == 'inactive') {
                // Si le statut est inactif, on passe le statut à actif et on retourne true pour indiquer un match
                $query = $this->pdo->prepare("UPDATE `match` SET  statut2 = 'liked' WHERE `id` = ?");
                $query->execute([$result[0]['id']]);

                $query = $this->pdo->prepare("SELECT * FROM `match` WHERE id_user_liker = '$liker_id' AND id_user_likeur = '$liked_id'");
                $query->execute();
                $result = $query->fetchall(\PDO::FETCH_ASSOC);

                if($result[0]['statut'] == 'liked' && $result[0]['statut2'] == 'liked'){
                    $query = $this->pdo->prepare("UPDATE `match` SET statut = 'active', statut2 = 'active' WHERE `id` = ?");
                    $query->execute([$result[0]['id']]);
                }
                return true;
            }
//            else if ($result[0]['statut'] == 'liked' && $statut == 'active') {
//                // Si le statut est liked et la requête demande un changement en actif, on met le statut à actif et on retourne true pour indiquer un match
//                $query = $this->pdo->prepare("UPDATE `match` SET statut = 'active', statut2 = 'active' WHERE `id` = ?");
//                $query->execute([$result[0]['id']]);
//                return true;
//            }
        } else {
            // Vérifier si une entrée existe pour le couple inversé
            $query = $this->pdo->prepare("SELECT * FROM `match` WHERE id_user_likeur = '$liked_id' AND id_user_liker = '$liker_id'");
            $query->execute();
            $result = $query->fetchall(\PDO::FETCH_ASSOC);

            if(!empty($result)) {
                // Si le statut est inactif, on passe le statut à actif et on retourne true pour indiquer un match
                $query = $this->pdo->prepare("UPDATE `match` SET  statut2 = 'liked' WHERE `id` = ?");
                $query->execute([$result[0]['id']]);

                $query = $this->pdo->prepare("SELECT * FROM `match` WHERE id_user_likeur = '$liker_id' AND id_user_liker = '$liked_id'");
                $query->execute();
                $result = $query->fetchall(\PDO::FETCH_ASSOC);

                if($result[0]['statut'] == 'liked' && $result[0]['statut2'] == 'liked'){
                    $query = $this->pdo->prepare("UPDATE `match` SET statut = 'active', statut2 = 'active' WHERE `id` = ?");
                    $query->execute([$result[0]['id']]);
                }
                return true;
            }
        }

        // Si on arrive ici, on n'a pas trouvé de match ou le match existe déjà avec un statut actif
        return false;
    }


    public function checkIFLiked($liker, $liked){

        $stmt =  $this->pdo->prepare("SELECT statut FROM `match` WHERE id_user_likeur = ? AND id_user_liker = ?");
        $stmt->execute([$liker, $liked]);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($result){
            return $result['status'];
        }else{
            return false;
        }
    }


    public function verifMatchHome($liker, $liked){

        $stmt =  $this->pdo->prepare("SELECT statut FROM `match` WHERE id_user_likeur = ? AND id_user_liker = ?");
        $stmt->execute([$liker, $liked]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($result){
            return $result['status'];
        }else{
            return false;
        }
    }


    public function findMatch($liker_id, $liked_id):Array {

        $query = $this->pdo->prepare("SELECT * FROM `match` WHERE id_user_liker = '$liked_id' AND id_user_likeur = '$liker_id'");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $match=$query->fetchall();
        var_dump($match);
        var_dump('match1');
        return $match;
    }


    public function findMatch2($liker_id, $liked_id):Array {

        $query = $this->pdo->prepare("SELECT * FROM `match` WHERE id_user_likeur  = '$liker_id' AND id_user_liker = '$liked_id'");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $match=$query->fetchall();
        var_dump($match);
        var_dump('match2');
        return $match;
    }
}
