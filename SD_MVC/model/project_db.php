<?php
    //functions for interacting with Project Table in the Database
    function get_project($Project_Id) {

        global $db;

        $query = 'SELECT * FROM projects
                WHERE Project_Id = :Project_Id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':Project_Id', $Project_Id);
        $statement->execute();
        $project = $statement->fetch();
        $statement->closeCursor();
        
        return $project;
    }

    function get_projects($Acct_Id) {

        global $db;

        $query = 'SELECT * 
                FROM projects
                WHERE Acct_Id = :Acct_Id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':Acct_Id', $Acct_Id);
        $statement->execute();
        $project = $statement->fetchAll();
        $statement->closeCursor();
        return $project;
    }

    function delete_project($Project_Id) {
        global $db;
        $query = 'DELETE FROM projects
                WHERE Project_Id = :Project_Id';
        $statement = $db->prepare($query);
        $statement->bindValue(':Project_Id', $Project_Id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_project($Project_Title, $Project_Manuscript, $Acct_Id) {
        global $db;
        $query = 'INSERT INTO projects
                    (Project_Title, Project_Manuscript, Acct_Id)
                VALUES
                    (:project_title, :project_manuscript, :acct_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':project_title', $Project_Title);
        $statement->bindValue(':project_manuscript', $Project_Manuscript); 
        $statement->bindValue(':acct_id', $Acct_Id);
        $statement->execute();
        $statement->closeCursor();
    }

    function update_project($project_id, $written, $last_saved, $time_saved) {

        global $db;

        $query = 'UPDATE projects
                SET  Project_Manuscript = :written, Project_LastUpdated = :last_saved, Project_TimeUpdated = :time_saved
                WHERE Project_Id = :Project_Id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':Project_Id', $project_id);
        $statement->bindValue(':written', $written);
        $statement->bindValue(':last_saved', $last_saved);
        $statement->bindValue(':time_saved', $time_saved);
        $statement->execute();
        $statement->closeCursor();
    }

?>