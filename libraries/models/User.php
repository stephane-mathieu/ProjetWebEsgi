<?php

namespace Models;



class User extends Model {


    //retourne les infos de lutilisateur choisis
    public function findAllInfoUser($email): array{

        //select les infos de lutilisateur choisis
        $query = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = '$email'");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $user=$query->fetchall();
        return $user;
    }

    public function findAllUser(): array{

        //select les infos de lutilisateur choisis
        $query = $this->pdo->prepare("SELECT * FROM `users`");
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $query->execute();
        $user=$query->fetchall();

        return $user;
    }

    
    //retourne les infos de lutilisateur choisis avec id
    public function findInfoUser($id):array{
        $requette = $this->pdo->prepare("SELECT * FROM `users` WHERE `id`= '$id'");
        $requette->setFetchMode(\PDO::FETCH_ASSOC);
        $requette->execute();
        $recuper=$requette->fetchall();
        return $recuper;
    
    }


    // update le password de l'utilisateur
    public function UpdatePassword($new_password,$id):void{

        $data = [
            "new_password"=>$new_password, 
            "id"=>$id,
        ] ;

        $query = "UPDATE users SET password= :new_password WHERE id = :id";
        $update = $this->pdo->prepare($query);
        $update->execute($data);
    }

    // insert le user dans la bdd
    public function InsertUser($firstname,$lastname,$email,$password,$number,$sexe,$login,$role):void{
        $data = [
            'firstname' =>$firstname,
            'lastname' =>$lastname,
            'email' =>$email,
            'number' =>$number,
            'password' =>$password,
            'sexe' =>$sexe,
            'login' =>$login,
            'role' =>$role,
        ];

        $query = "INSERT INTO users (email, firstname, lastname, password, sexe, number, login,role) VALUES (:email, :firstname, :lastname, :password, :sexe, :number, :login ,:role)";
        $insert_user = $this->pdo->prepare($query);
        $insert_user->execute($data);
    }

    public function deleteUsers($id){
        $query = $this->pdo->prepare("DELETE FROM `users` WHERE id = $id");
        $query->execute();
    }

    public function UpdateAll($email,$firstname,$lastname,$password,$address,$NumberPhone,$role,$id){
        $update = $this->pdo->prepare("UPDATE `users` SET `email`= '$email', `firstname`= '$firstname', `lastname`= '$lastname', `password`= '$password' , `address`= '$address', `number`= '$NumberPhone',`role`='$role' WHERE `id` = '$id'");
        $update->execute();
    }
    public function DisplayProfilebyGenre($sexe){
        $requette = $this->pdo->prepare("SELECT * FROM `users` WHERE `sexe`= '$sexe'");
        $requette->setFetchMode(\PDO::FETCH_ASSOC);
        $requette->execute();
        $recuper=$requette->fetchall();
        return $recuper;
    }

    public function findUserByLogin($login)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->bindParam(':login', $login, \PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$result) {
            return null;
        }

        return $result;
    }
    public function UpdatePhoto($photo = "", $id_user = "")
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE users SET img_profil=:photo WHERE id=:id_user");
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':id_user', $id_user);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public function updateLogin($newLogin, $id_user)
    {
        // Vérifier que le login n'existe pas déjà dans la base de données
        $query = $this->pdo->prepare('SELECT COUNT(*) AS count FROM users WHERE login = :login');
        $query->execute(array(':login' => $newLogin));
        $result = $query->fetch(\PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            throw new Exception('This login already exists in the database.');
        }

        // Mettre à jour le login de l'utilisateur
        $query = $this->pdo->prepare('UPDATE users SET login = :login WHERE id = :id');
        $query->execute(array(':login' => $newLogin, ':id' => $id_user));

        if ($query->rowCount() === 0) {
            throw new Exception('An error occurred while updating the login.');
        }
    }
    public function updatePhone($phone, $id_user){
        $data = [
            'phone'=>$phone,
            'id_user'=>$id_user
        ];

        $query = "UPDATE users SET number = :phone WHERE id = :id_user";
        $update = $this->pdo->prepare($query) ;
        $update->execute($data);
    }

    public function updateNom($nom, $id_user){
        $data = [
            'nom'=>$nom,
            'id_user'=>$id_user
        ];

        $query = "UPDATE users SET lastname = :nom WHERE id = :id_user";
        $update = $this->pdo->prepare($query) ;
        $update->execute($data);
    }

    public function updatePrenom($prenom, $id_user){
        $data = [
            'prenom'=>$prenom,
            'id_user'=>$id_user
        ];

        $query = "UPDATE users SET firstname = :prenom WHERE id = :id_user";
        $update = $this->pdo->prepare($query) ;
        $update->execute($data);
    }

    public function updateDescription($description, $id_user){
        $data = [
            'description'=>$description,
            'id_user'=>$id_user
        ];

        $query = "UPDATE users SET resume = :description WHERE id = :id_user";
        $update = $this->pdo->prepare($query) ;
        $update->execute($data);
    }

}

?>