DROP schema IF EXISTS CS470RUNTIMETERROR;
CREATE schema IF NOT EXISTS CS470RUNTIMETERROR;
USE CS470RUNTIMETERROR;

CREATE TABLE `Donor` (
	`Donor_ID` INT NOT NULL AUTO_INCREMENT,
	`Donation_Total` INT,
	`Donor_Type` VARCHAR(25),
	`Employee_ID` INT,
	`F_Name` VARCHAR(25),
	`L_Name` VARCHAR(25),
	`Company_Name` VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (`Donor_ID`)
); 

CREATE TABLE `Donations` (
	`Donation_ID` INT NOT NULL AUTO_INCREMENT,
	`Donation_Date` DATETIME,
	`Donor_ID` INT,
	`Amount` INT,
	PRIMARY KEY (`Donation_ID`)
); 

CREATE TABLE `Donor_Contact` (
	`Donor_ID` INT NOT NULL,
	`Email_Address` VARCHAR(25),
	`Primary_Phone` VARCHAR(25),
	`Secondary_Phone` VARCHAR(25),
	`Address` VARCHAR(25)
); 

CREATE TABLE `Pet` (
	`Pet_ID` INT NOT NULL AUTO_INCREMENT,
	`Adoption_Date` DATETIME,
	`Date_Arrived` DATETIME,
	`Time_In_Shelter` INT,
	`Image_URL` VARCHAR(150),
	`Breed` Varchar(30),
	`Type` VARCHAR(25),
	`Name` VARCHAR(25),
	`Employee_ID` INT,
	PRIMARY KEY (`Pet_ID`)
); 

CREATE TABLE `Pet_Customer` (
	`Pet_ID` INT NOT NULL,
	`Customer_ID` INT NOT NULL,
	PRIMARY KEY (`Pet_ID`, `Customer_ID`)
); 

CREATE TABLE `Customer` (
	`Customer_ID` INT NOT NULL AUTO_INCREMENT,
	`SSN` INT,
	`F_Name` VARCHAR(25),
	`L_Name` VARCHAR(25),
	PRIMARY KEY (`Customer_ID`)
); 

CREATE TABLE `Employee` (
	`Employee_ID` INT NOT NULL AUTO_INCREMENT,
	`Address` VARCHAR(25),
	`Salary` INT,
	`SSN` INT,
	`F_Name` VARCHAR(25),
	`L_Name` VARCHAR(25),
	PRIMARY KEY (`Employee_ID`)
); 

CREATE TABLE `Pet_Volunteer` (
	`Pet_ID` INT NOT NULL AUTO_INCREMENT,
	`Volunteer_ID` INT,
	`DATE` DATETIME,
	`CARE` VARCHAR(50),
	PRIMARY KEY (`Pet_ID`)
); 

CREATE TABLE `Volunteer` (
	`Volunteer_ID` INT NOT NULL AUTO_INCREMENT,
	`Supervisor_ID` INT, /* What employee supervies them*/
	`SSN` INT,
	`F_Name` VARCHAR(25),
	`L_Name` VARCHAR(25),
	`Address` VARCHAR(150) DEFAULT NULL,
	PRIMARY KEY (`Volunteer_ID`)
); 
