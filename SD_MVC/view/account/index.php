<?php

//require session and database tools for website to work
require('../../model/database.php');
require('../../model/user_db.php');
require('../../model/project_db.php');
include('../../sessions.php');

// general variables needed for website to work
$showForm = false;
$action = filter_input(INPUT_POST, 'action');

// give $action anaction to do
if ($action == NULL) 
{
    $action = filter_input(INPUT_GET, 'action');

    if ($action == NULL) 
    {
        // change $action if session is set
        if(isset($_SESSION['account']))
        {
            $action = 'account';
        }
        else
        {
            $action = 'sign_in';
        }
    }
}

// all the possiblities to $action
switch($action)
{
    //stay logged in and go back to account page
    case 'account':

        $projects = get_projects($_SESSION['account']['Acct_Id']);

        include('account.php');

        break;
    
    // add a project in the account page
    case 'add_project':
        
        $account_id = filter_input(INPUT_POST, 'account_Id');
        $project_title = filter_input(INPUT_POST, 'project_title');
        $project_manuscript = "Type something here..."; //started statement in manuscript

        if ($project_title == NULL || $project_title == FALSE) 
        {
            $error = "Invalid project title.";
            include('../errors/error.php');
        } 
        else 
        { 
            add_project($project_title, $project_manuscript, $account_id);
            
            $projects = get_projects($account_id);
            include('account.php');
        }

        break;
    
    // delete a project in the account page
    case 'delete_project':

        $project_id = filter_input(INPUT_POST, 'project_Id');
        $account_id = filter_input(INPUT_POST, 'account_Id');

        if ($project_id == NULL || $project_id == FALSE) 
        {
            $error = "There was a problem deleting the project.";
            include('../errors/error.php');
        } 
        else if ($account_id == NULL || $account_id == FALSE)
        {
            $error = "There was a problem reloading the account.";
            include('../errors/error.php');
        }
        else 
        {
            delete_project($project_id);
            $projects = get_projects($account_id);
            $account = get_Acct($account_id);

            include('../account/account.php');

        }

        break;
    
    // selete a project to edit in the editor page
    case 'select_project':

        $project_id = filter_input(INPUT_POST, 'project_Id');
        
        if ($project_id === NULL || $project_id === FALSE) 
        {
            $error = "There was a problem loading the project.";
            include('../errors/error.php');
        } 
        else 
        { 
            $project = get_project($project_id);
            include('project_editor.php');
        }

        break;
    
    // show the add_project page in the account page
    case 'show_add_form':

        $account_id = filter_input(INPUT_POST, 'account_Id');
        $showForm = filter_input(INPUT_POST, 'show_add_form');
        
        $projects = get_projects($account_id);
        
        include('account.php');

        break;
    
    // sign in to the account page
    case 'sign_in':

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if ($email == NULL || $email == FALSE ||
            $password == NULL || $password == FALSE)
        {
            $error = "Invalid writer's data. Check all fields and try again.";
            include('../errors/error.php');
        } 
	    else 
        { 
            $account = login_Acct($email, $password);

            if ($account == NULL || $account == False)
            {
                $error = "Invalid user credentials. Check all fields and try again.";
                include('../account/sign_in.php');            
            }
            else
            {
                $_SESSION['account'] = array();
                $_SESSION['account'] = $account;
                $projects = get_projects($_SESSION['account']['Acct_Id']);

                include('../account/account.php');
            }
        }

        break;
    
    // sign out of the account page
    case 'sign_out':
        
        $_SESSION = array();
        unset($_SESSION['account']);
        session_destroy();

        header('Location: ../../index.php');

        break;
    
    // sign up to go to the account page
    case 'sign_up':

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $Acct_Nickname = filter_input(INPUT_POST, 'nickname');
        $Acct_Status = 'free';

        if ($email == NULL || $email == FALSE ||
            $password == NULL || $password == FALSE ||
            $Acct_Nickname == NULL || $Acct_Nickname == FALSE)
        {
            $error = "Invalid writer's data. Check all fields and try again.";
            include('../errors/error.php');
        }
	    else 
        { 
            // validate and add the account to the db
            $account = add_Acct($email, $password, $Acct_Nickname, $Acct_Status);

            if ($account == NULL || $account == False)
            {
                $error = "Account already exists. Check all fields and try again.";
                include('../account/sign_up.php');            
            }
            else
            {
            
                // log the new user in
                $_SESSION['account'] = array();
                $_SESSION['account'] = login_Acct($email, $password);

                // get zero projects since it is a new account
                $projects = get_projects($_SESSION['account']['Acct_Id']);

                include('../account/account.php');
            }
        }

        break;

    // update/edit a project in the editor page
    case 'update_project':  

        $project_id = filter_input(INPUT_POST, 'project_id');
        $written = filter_input(INPUT_POST, 'edit_project');
        $last_saved = filter_input(INPUT_POST, 'project_last_saved');
        $time_saved = filter_input(INPUT_POST, 'project_time_saved');

        update_project($project_id, $written, $last_saved, $time_saved);

        $message = "Saved successfully"; 

        // recall project to continue editing it
        $project = get_project($project_id);

        include('project_editor.php');

        break;
}
?>