create database if not exists ScribesDeskDatabase;

DROP TABLE if exists Projects;
DROP TABLE if exists Accounts;

create table ScribesDeskDatabase.Accounts (
    Acct_Id 		Integer 		NOT NULL AUTO_INCREMENT,
    Acct_Email 		varchar(255) 	UNIQUE,
    Acct_Password 	varchar(255),
    Acct_Nickname 	varchar(50),
    Acct_Status 	varchar(4),
    Primary Key (Acct_Id)
);

create table ScribesDeskDatabase.Projects (
    Project_Id 			Integer 	NOT NULL AUTO_INCREMENT,
    Project_Title 		varchar(150),
    Project_Manuscript 	LONGTEXT,
	Project_LastUpdated	Date,
	Project_TimeUpdated	Time,
    Acct_Id 			Integer,
    Primary Key (Project_Id),
    Foreign Key (Acct_Id) REFERENCES Accounts(Acct_Id)
);

/* Test records for Accounts table */
INSERT INTO Accounts (Acct_Id, Acct_Email, Acct_Password, Acct_Nickname, Acct_Status)
VALUES (1, "mstein@example.com", "t4bl3t", "Martin", "free");

INSERT INTO Accounts (Acct_Id, Acct_Email, Acct_Password, Acct_Nickname, Acct_Status)
VALUES (2, "jlatimer@example.com", "h1k3r", "Jacob", "free");

INSERT INTO Accounts (Acct_Id, Acct_Email, Acct_Password, Acct_Nickname, Acct_Status)
VALUES (3, "jparish@example.com", "fl0w3r", "Jessica", "free");

INSERT INTO Accounts (Acct_Id, Acct_Email, Acct_Password, Acct_Nickname, Acct_Status)
VALUES (4, "yrider@cats.com", "R1d3r32", "Yak_Rider", "free");

/* Test records for Projects table */
INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (1, "Forest Men", "Type Something here...", 1);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (2, "The Outback", "Type Something here...", 2);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (3, "Why Cats Don't Have Nine Lives", "Type Something here...", 3);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (4, "Amazon Jungle", "Type Something here...", 2);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (5, "Is Chocolate Healthy?", "Type Something here...", 1);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (6, "Is Coffee good for you?", "Type Something here...", 3);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (7, "The Bagel in the Stone", "Type Something here...", 4);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (8, "Why Iron Man Sucks", "Type Something here...", 4);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (9, "Databases VS File Systems", "Type Something here...", 3);

INSERT INTO Projects (Project_Id, Project_Title, Project_Manuscript, Acct_Id)
VALUES (10, "What Happened To V36T?", "Type Something here...", 2);