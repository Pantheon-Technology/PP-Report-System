DROP TABLE IF EXISTS parents;
DROP TABLE IF EXISTS teacher;
DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS reportUpload;
DROP TABLE IF EXISTS legalUpload;

CREATE TABLE IF NOT EXISTS `parents`(
`parentID` INT AUTO_INCREMENT PRIMARY KEY,
`parentUsername` CHAR(200) NOT NULL,
`password` VARCHAR(250) NOT NULL,
`dateCreated` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`parentFName` VARCHAR(250),
`parentLName` VARCHAR(250),
`addressLine1` VARCHAR(250),
`addressLine2` VARCHAR(250),
`city` VARCHAR(250),
`postcode` VARCHAR(250),
`phoneNum` INT(11),
`eMail` VARCHAR(250),
`childFName` VARCHAR(250),
`childLName` VARCHAR(250),
`gender` VARCHAR(10),
`DOB` VARCHAR(10),
`school` VARCHAR(250),
`yearGroup` VARCHAR(10),
`health` Varchar(250),
`socialMedia` VARCHAR(10),
`travel` VARCHAR(10),
`firstAid` VARCHAR(10),
`securityPassword` VARCHAR(100),
`emergencyName1` VARCHAR(250),
`relation1` VARCHAR(250),
`emergencyPostcode1` VARCHAR(250),
`emergencyContactNum1` INT(11),
`emergencyName2` VARCHAR(250),
`relation2` VARCHAR(250),
`emergencyPostcode2` VARCHAR(250),
`emergencyContactNum2` INT(11),
`heardBy` VARCHAR(250),
`helpWithFees` Varchar(4),
`subject1` VARCHAR(20),
`subject2` VARCHAR(20),
`subject3` VARCHAR(20),
`exam` VARCHAR(20),
`desiredSchool` VARCHAR(20),
`additionalInfo` VARCHAR(200),
`inProgramme` VARCHAR(4),
`inClass` VARCHAR(4),
`inCamp` VARCHAR(4),
`onTrial` VARCHAR(4),
`onWaitingList` VARCHAR(4),
`feePaid` VARCHAR(4),
`T&CSigned` VARCHAR(4),
`firstInvoiceDate` VARCHAR(40),
`firstInvoiceAmount`INT(40)
);

CREATE TABLE IF NOT EXISTS `teacher`(
`teacherID` INT AUTO_INCREMENT PRIMARY KEY,
`teacherUsername` CHAR(200) NOT NULL,
`password` VARCHAR(250) NOT NULL
);

CREATE TABLE IF NOT EXISTS `admins`(
`adminID` INT AUTO_INCREMENT PRIMARY KEY,
`adminUsername` char(200) NOT NULL,
`password` VARCHAR(250) NOT NULL
);

CREATE TABLE IF NOT EXISTS `reportUpload`(
`parentUsername` Varchar(200),
`fileName` Varchar(200),
`file` VARCHAR(250)
);

CREATE TABLE IF NOT EXISTS `legalUpload`(
`parentUsername` Varchar(200),
`file` VARCHAR(250)
);

SELECT * FROM `reportUpload`;
SELECT * FROM `admins`;
SELECT * FROM `teacher`;
SELECT * FROM `parents`;
SELECT * FROM `legalUpload`;