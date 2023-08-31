<?php
    //functions for interacting with Account Table in the Database

    function login_Acct($email, $password) {

        global $db;
        $query = 'SELECT *
                  FROM accounts
                  WHERE Acct_Email = :email AND Acct_Password = :Acct_Password
                  ORDER BY Acct_Id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':Acct_Password', $password);
        $statement->execute();
        $account = $statement->fetch();
        $statement->closeCursor();
        return $account;
    }

    function get_Acct($Acct_Id) {

        global $db;
        $query = 'SELECT * FROM accounts
                WHERE Acct_Id = :Acct_Id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':Acct_Id', $Acct_Id);
        $statement->execute();
        $account = $statement->fetch();
        $statement->closeCursor();
        return $account;
    }

    function delete_Acct($Acct_Id) {
        
        global $db;
        $query = 'DELETE FROM accounts
                WHERE Acct_Id = :Acct_Id';
        $statement = $db->prepare($query);
        $statement->bindValue(':Acct_Id', $Acct_Id);
        $statement->execute();
        $statement->closeCursor();
    }
    
    function add_Acct($Acct_Email, $Acct_Password, $Acct_Nickname, $Acct_Status) {

        global $db;
        $query = 'INSERT INTO accounts
                    (Acct_Email, Acct_Password, Acct_Nickname, Acct_Status)
                VALUES
                    (:Acct_Email, :Acct_Password, :Acct_Nickname, :Acct_Status)';

        $statement = $db->prepare($query);
        $statement->bindValue(':Acct_Email', $Acct_Email);
        $statement->bindValue(':Acct_Password', $Acct_Password);
        $statement->bindValue(':Acct_Nickname', $Acct_Nickname);
        $statement->bindValue(':Acct_Status', $Acct_Status);
        $account = $statement->execute();
        $statement->closeCursor();

        return $account;
    }
?>