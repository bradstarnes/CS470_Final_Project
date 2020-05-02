/* Database Requirements */ 
DROP schema IF EXISTS CS470RUNTIMETERROR; # For Dev Use. Remove for prod 
CREATE schema IF NOT EXISTS CS470RUNTIMETERROR;
USE CS470RUNTIMETERROR;


/** CREATE TABLES **/
CREATE TABLE `Donor` (
	`Donor_ID` 			INT NOT NULL AUTO_INCREMENT,
	`Donor_Type` 		VARCHAR(25),
	`Employee_ID` 		INT,
	`F_Name` 			VARCHAR(25),
	`L_Name` 			VARCHAR(25),
	`Company_Name` 		VARCHAR(50) DEFAULT NULL,
	CONSTRAINT `Donor_PK` PRIMARY KEY (`Donor_ID`)
); 
/* I'm questioning Employee_ID being stored here....
Donor_contact instead? Maybe needs its own table?
Would have a lot of repeated Employee_IDs*/

CREATE TABLE `Donations` (
	`Donation_ID` 		INT NOT NULL AUTO_INCREMENT,
	`Donation_Date` 	DATE,
	`Donor_ID` 			INT,
	`Amount` 			INT,
	CONSTRAINT `Donations_PK` PRIMARY KEY (`Donation_ID`)
); 

CREATE TABLE `Donor_Contact` (
	`Donor_ID` 			INT NOT NULL,
	`Email_Address` 	VARCHAR(25),
	`Primary_Phone` 	VARCHAR(25),
	`Secondary_Phone` 	VARCHAR(25),
	`Address` 			VARCHAR(25),
    CONSTRAINT `Donor_Contact_PK` PRIMARY KEY(`Donor_ID`)
); 

CREATE TABLE `Pet` (
	`Pet_ID` 			INT NOT NULL AUTO_INCREMENT,
	`Date_Arrived` 		DATE NOT NULL,
	`Time_In_Shelter` 	INT,
	`Image_URL` 		VARCHAR(150),
	`Breed` 			Varchar(30),
	`Type` 				VARCHAR(25),
	`Name` 				VARCHAR(25),
    `Gender`			VARCHAR(6),
	CONSTRAINT `Pet_PK` PRIMARY KEY (`Pet_ID`)
); 

CREATE TABLE `Pet_Customer` (
	`Pet_ID` 		INT NOT NULL,
	`Customer_ID` 	INT NOT NULL,
    `Adoption_Date` DATE NOT NULL,
	CONSTRAINT `Pet_Customer_PK` PRIMARY KEY (`Pet_ID`, `Customer_ID`)
); 
/*I moved adoption_date over to this table so that 
we wouldn't have a bunch of nulls in the Pet table*/

CREATE TABLE `Customer` (
	`Customer_ID` 		INT NOT NULL AUTO_INCREMENT,
	`SSN` 				VARCHAR(9) UNIQUE NOT NULL,
	`F_Name` 			VARCHAR(25),
	`L_Name` 			VARCHAR(25),
    CONSTRAINT `Customer_Valid_SSN` -- Makes sure ssn is valid input
		CHECK (`SSN` regexp('^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$')),
	CONSTRAINT `Customer_PK` PRIMARY KEY (`Customer_ID`)
); 

CREATE TABLE `Employee` (
	`Employee_ID` 		INT NOT NULL AUTO_INCREMENT,
	`Address` 			VARCHAR(50),
	`Salary` 			INT,
	`SSN` 				VARCHAR(9) UNIQUE NOT NULL,
	`F_Name` 			VARCHAR(25),
	`L_Name` 			VARCHAR(25),
    CONSTRAINT `Salary_Positive` CHECK (Salary > 0),
    CONSTRAINT `Employee_Valid_SSN` -- Makes sure ssn is valid input
		CHECK (`SSN` regexp('^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$')),
	CONSTRAINT `Employee_PK` PRIMARY KEY (`Employee_ID`)
); 

CREATE TABLE `Pet_Volunteer` (
	`Pet_ID` 			INT NOT NULL,
	`Volunteer_ID` 		INT NOT NULL,
	`DATE` 				DATE NOT NULL,
	`CARE` 				VARCHAR(50),
	CONSTRAINT `Pet_Volunteer_PK` PRIMARY KEY (`Pet_ID`, `Volunteer_ID`, `Date`)
); 
/* Volunteers may take care of multiple pets each day
	But it is implied a volunteer only has one care
    entry for one given pet per day*/ 


CREATE TABLE `Volunteer` (
	`Volunteer_ID` 		INT NOT NULL AUTO_INCREMENT,
	`Supervisor_ID` 	INT, /* What employee supervies them*/
	`SSN` 				VARCHAR(9) UNIQUE NOT NULL,
	`F_Name` 			VARCHAR(25),
	`L_Name` 			VARCHAR(25),
	`Address` 			VARCHAR(150) DEFAULT NULL,
    CONSTRAINT `Volunteer_Valid_SSN` -- Makes sure ssn is valid input
		CHECK (`SSN` regexp('^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$')),
	CONSTRAINT `Volunteer_PK` PRIMARY KEY (`Volunteer_ID`)
); 

/** ADD FOREIGN KEY CONSTRAINTS **/

ALTER TABLE donor ADD CONSTRAINT Donor_Employee_ID_FK 
	FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID); -- foreign key constraint

ALTER TABLE donations ADD CONSTRAINT Donations_Donor_ID_FK
	FOREIGN KEY (Donor_ID) REFERENCES Donor(Donor_ID); -- foreign key constraint

ALTER TABLE Donor_Contact ADD CONSTRAINT Donor_Contact_Donor_ID_FK
	FOREIGN KEY (Donor_ID) REFERENCES Donor(Donor_ID); -- foreign key constraint

ALTER TABLE Pet_Customer ADD CONSTRAINT Pet_Customer_Pet_ID_FK
	FOREIGN KEY (Pet_ID) REFERENCES Pet(Pet_ID); -- foreign key constraint
ALTER TABLE Pet_Customer ADD CONSTRAINT Pet_Customer_Customer_ID_FK
	FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID); -- foreign key constraint

ALTER TABLE Pet_Volunteer ADD CONSTRAINT Pet_Volunteer_Pet_ID_FK
	FOREIGN KEY (Pet_ID) REFERENCES Pet(Pet_ID); -- foreign key constraint
ALTER TABLE Pet_Volunteer ADD CONSTRAINT Pet_Volunteer_Volunteer_ID_FK
	FOREIGN KEY (Volunteer_ID) REFERENCES Volunteer(Volunteer_ID); -- foreign key constraint
    
ALTER TABLE Volunteer ADD CONSTRAINT Volunteer_Supervisor_ID_FK
	FOREIGN KEY (Supervisor_ID) REFERENCES Employee(Employee_ID); -- foreign key constraint
    
