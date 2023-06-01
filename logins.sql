DROP TABLE IF EXISTS parents;
DROP TABLE IF EXISTS teacher;
DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS reportUpload;
DROP TABLE IF EXISTS legalUpload;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `incidents`;
DROP TABLE IF EXISTS `school`;
DROP TABLE IF EXISTS `schoolStudent`;
DROP TABLE IF EXISTS `changeRequests`;

CREATE TABLE IF NOT EXISTS `posts`(
eventID Int PRIMARY KEY NOT NULL AUTO_INCREMENT,
eventImg varchar(100),
eventName varchar(100),
eventDesc varchar(300),
`postDate` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

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
`firstInvoiceAmount`INT(40),
`archived` INT(3) DEFAULT 0
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
`file` VARCHAR(250),
`teacher` VARCHAR(250),
`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `legalUpload`(
`parentUsername` Varchar(200),
`file` VARCHAR(250)
);

CREATE TABLE IF NOT EXISTS `incidents`(
`incidentNumber` INT AUTO_INCREMENT PRIMARY KEY,
`studentName` Varchar(250),
`date` VARCHAR(100),
`time` VARCHAR(10),
`issueType` VARCHAR(10),
`desc` VARCHAR (250),
`reffered` VARCHAR(10),
`otherReffered` VARCHAR(10),
`followUp` VARCHAR(250),
`whoFollowedUp` VARCHAR(20),
`reportedBy` VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS `school`(
`schoolID` INT PRIMARY KEY AUTO_INCREMENT,
`schoolName` VARCHAR(100),
`authority` VARCHAR(100),
`authorityName` VARCHAR(100),
`password` VARCHAR(300),
`contactName` VARCHAR(100),
`contactEmail` VARCHAR(100),
`contactNumber` VARCHAR(15),
`financeName` VARCHAR(100),
`financeEmail` VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS `schoolStudent`(
`studentID` INT PRIMARY KEY AUTO_INCREMENT,
`studentName` VARCHAR(100),
`studentUsername` VARCHAR(100),
`password` VARCHAR(300),
`schoolName` VARCHAR(100),
`schoolYear` VARCHAR(10),
`SEND` VARCHAR(1000),
`EHCP` VARCHAR(10),
`PEP` varchar(10),
`PEPauth` VARCHAR(100),
`subject1` VARCHAR(10),
`subject2` VARCHAR(10),
`subject3` VARCHAR(10),
`otherSubjects` VARCHAR(200),
`preferredDate` VARCHAR(35),
`otherPreferred` VARCHAR(100),
`preferredTime` VARCHAR(40),
`allocatedTutor` VARCHAR(50),
`dbs` VARCHAR(50),
`trn` VARCHAR(50),
`register` VARCHAR(10),
`PEPfile` VARCHAR(250),
`EHCPfile` VARCHAR(250)
);

DROP TABLE IF EXISTS `schoolStudentFiles`;

CREATE TABLE IF NOT EXISTS `schoolStudentFiles`(
`studentUsername` VARCHAR(100),
`fileName` VARCHAR(150),
`file` VARCHAR(150),
`teacher` VARCHAR(50),
`school` VARCHAR(100),
`date` TIMESTAMP DEFAULT current_timestamp
);

select * from `schoolStudentFiles`;

CREATE TABLE IF NOT EXISTS `changeRequests`(
`requestID` INT PRIMARY KEY auto_increment,
`studentName` VARCHAR(100),
`sessionDate` VARCHAR(50),
`sessionTime` VARCHAR(5),
`reason` VARCHAR(7),
`comments` VARCHAR(3000),
`date` TIMESTAMP DEFAULT current_timestamp
);

SELECT * FROM `changeRequests`;


CREATE TABLE IF NOT EXISTS `cancellations`(
`cancellationID` INT PRIMARY KEY auto_increment,
`studentName` VARCHAR(100),
`comments` VARCHAR(3000),
`date` TIMESTAMP DEFAULT current_timestamp
);

SELECT * FROM `cancellations`;

SELECT * FROM `reportUpload`;
SELECT * FROM `admins`;
SELECT * FROM `teacher`;
SELECT * FROM `parents`;
SELECT * FROM `legalUpload`;
SELECT * FROM `posts`;
SELECT * FROM `incidents`;
select * from `school`;
select * from `schoolStudent`;