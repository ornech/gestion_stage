<?php
class Login {
    private $conn;
    private $table_name = "user";

    public function __construct($db){
        $this->conn = $db;
    }

    public function login($login, $password){
        try{

            $user = $this->getUserByLogin($login);

            if ($user) {
                if (password_verify($password, $user['password']) && $login == $user['login'] && $user['inactif'] == 0) {
                    $_SESSION['username'] = $user['login']; // Stocker le nom d'utilisateur dans la session
                    $_SESSION['statut'] = $user['statut']; // Stocker le statut dans la session
                    $_SESSION['utilisateur'] = $user['nom'] . " " . $user['prenom']; // Stocker le nom et prenom dans la session
                    $_SESSION['userID'] = $user['id']; // Stocker l'id nom et prenom dans la session

                    if ($user['password_reset'] == 1) {
                        header("Location: password_reset.php?login=" . $user['id'] . "");
                    }

                    if($user["dateFirstConn"] == NULL) {
                        $this->firstConn($user['id']);
                        header("Location: index.php");
                    }
                    return true;
                }else if ($user['inactif'] == 1) {
                    return "Ce compte est désactivé, veuillez compter un administrateur pour dévérrouiller ce compte.";
                } else {
                return "Nom d'utilisateur ou mot de passe incorrect.";
                }
            }else{
                return "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            return "Erreur de connexion à la base de données: " . $e->getMessage();
        }
    }

    public function firstConn($id){
        $stmt = $this->conn->prepare("UPDATE $this->table_name SET dateFirstConn = NOW() WHERE id=:id and dateFirstConn IS NULL");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: router.php?page=login");
        exit;
    }

    public function getUserByLogin($login){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table_name WHERE login = :login AND isDeleted = 0");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

}
?>