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
ALTER TABLE `parents` add `site` varchar(20);
select * from `parents`;

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
`comment` VARCHAR(1000),
`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
alter table `reportUpload` add `file2` varchar(250);
alter table `reportUpload` add `file3` varchar(250);
alter table `reportUpload` add `file4` varchar(250);

select * from `reportUpload`;

ALTER TABLE `reportUpload` add `comment` VARCHAR(1000);

CREATE TABLE IF NOT EXISTS `legalUpload`(
`parentUsername` Varchar(200),
`file` VARCHAR(250)
);

CREATE TABLE IF NOT EXISTS `incidents`(
`incidentNumber` INT AUTO_INCREMENT PRIMARY KEY,
`studentName` Varchar(250),
`date` VARCHAR(100),
`time` VARCHAR(10),
`issueType` VARCHAR(20),
`desc` VARCHAR (250),
`reffered` VARCHAR(10),
`otherReffered` VARCHAR(10),
`followUp` VARCHAR(250),
`whoFollowedUp` VARCHAR(20),
`reportedBy` VARCHAR(20)
);
ALTER TABLE `incidents` add `witness1` VARCHAR(2000);
ALTER TABLE `incidents` add `w1name` VARCHAR(30);

ALTER TABLE `incidents` add `witness2` VARCHAR(2000);
ALTER TABLE `incidents` add `w2name` VARCHAR(30);

ALTER TABLE `incidents` add `witness3` VARCHAR(2000);
ALTER TABLE `incidents` add `w3name` VARCHAR(30);
ALTER TABLE `incidents` add `fullName` VARCHAR(150);

alter table `incidents` add `reportedOn` TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

select * from incidents;

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
SELECT * FROM school;


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
alter table `schoolStudent` add `DOB` varchar(15);
alter table `schoolStudent` add `Mobile`int(15);
alter table `schoolStudent` add `Email` varchar(80);
alter table `schoolStudent` add `EmergencyContactName1` varchar(40);
alter table `schoolStudent` add `EmergencyContactRelationship1` varchar(30);
alter table `schoolStudent` add `EmergencyContactPhone1` varchar(15);
alter table `schoolStudent` add `EmergencyContactName2` varchar(40);
alter table `schoolStudent` add `EmergencyContactRelationship2` varchar(30);
alter table `schoolStudent` add `EmergencyContactPhone2` varchar(15);
alter table `schoolStudent` add `AddressLine1` varchar(150);
alter table `schoolStudent` add `AddressLine2` varchar(150);
alter table `schoolStudent` add `PostCode` varchar(12);
alter table `schoolStudent` add `AdditionalInformation` varchar(3000);

SELECT * FROM `schoolStudent`;


DROP TABLE IF EXISTS `schoolStudentFiles`;

CREATE TABLE IF NOT EXISTS `schoolStudentFiles`(
`studentUsername` VARCHAR(100),
`fileName` VARCHAR(150),
`file` VARCHAR(150),
`teacher` VARCHAR(50),
`school` VARCHAR(100),
`date` TIMESTAMP DEFAULT current_timestamp
);

alter table `schoolStudentFiles` add `file2` varchar(250);
alter table `schoolStudentFiles` add `file3` varchar(250);
alter table `schoolStudentFiles` add `file4` varchar(250);
alter table `schoolStudentFiles` add `file5` varchar(250);
alter table `schoolStudentFiles` add `comment` varchar(2000);

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

CREATE TABLE IF NOT EXISTS `timesheet`(
`employee_name` VARCHAR(50),
`date` VARCHAR (50) DEFAULT NULL,
`hours_worked` INT(50) DEFAULT NULL,
`milage` INT(50) DEFAULT NULL,
`tunnel` VARCHAR(5),
`project` VARCHAR(40) DEFAULT NULL,
`confirmation` VARCHAR(5) DEFAULT NULL,
`archived` INT DEFAULT 0,
`weekCommencing` VARCHAR(50) DEFAULT NULL,
`date_upload` TIMESTAMP DEFAULT current_timestamp 
);

CREATE TABLE IF NOT EXISTS `homework`(
`parentUsername` VARCHAR(100),
`fileName` VARCHAR(150),
`subject` VARCHAR(150),
`file` VARCHAR(150),
`date` TIMESTAMP DEFAULT current_timestamp
);

CREATE TABLE IF NOT EXISTS `meetingMinutes`(
`subject` VARCHAR (100),
`summary` VARCHAR (100),
`file` VARCHAR (250),
`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `timeTable`(
`classID` INT PRIMARY KEY auto_increment NOT NULL,
`subject` VARCHAR(50),
`teacher` VARCHAR(50),
`link` VARCHAR(500),
`date` VARCHAR(15),
`time` VARCHAR(7),
`desc` VARCHAR(1000),
`studentList` VARCHAR(1000),
`additionalComments` VARCHAR (1000)
);

CREATE TABLE IF NOT EXISTS `equipmentRequest`(
`requestID` INT primary key not null auto_increment,
`equipment` VARCHAR (100),
`startDate` VARCHAR (50),
`startTime` VARCHAR(10),
`endDate` VARCHAR(50),
`endTime` VARCHAR(10),
`teacher` VARCHAR(100),
`photocopy` VARCHAR(300),
`granted` VARCHAR(3) default 0
);

CREATE TABLE IF NOT EXISTS `courseList`(
`courseID` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`courseTitle` VARCHAR(250),
`courseImage` VARCHAR(250),
`courseDesc` VARCHAR(2000),
`learningObjectives` VARCHAR(2000),
`credits` INT(100)
);

CREATE TABLE IF NOT EXISTS `bookings`(
`bookingID` INT PRIMARY KEY NOT NULL auto_increment,
`parentUsername` VARCHAR(250),
`email` VARCHAR(250),
`courseTitle` VARCHAR(250),
`childFName` VARCHAR(250),
`childLName` VARCHAR(250),
`date` timestamp default current_timestamp
);

CREATE TABLE IF NOT EXISTS `studentTimeTable`(
`parentUsername` VARCHAR(100),
`subject` VARCHAR(50),
`link` VARCHAR(500),
`date` VARCHAR(15),
`time` VARCHAR(7)
);

CREATE TABLE IF NOT EXISTS `courseContent`(
`ID` int primary key not null auto_increment,
`courseTitle` varchar(100),
`courseDesc` varchar(3000),
`subject` varchar(100),
`year` varchar(10),
`file1` varchar(300),
`file2` varchar(300),
`file3` varchar(300),
`file4` varchar(300),
`file5` varchar(300),
`file6` varchar(300),
`file7` varchar(300),
`link1` varchar(300),
`link2` varchar(300),
`link3` varchar(300),
`createdBy` varchar(300),
`date` timestamp default current_timestamp
);
select * from `courseContent`;

alter table `parents` add column `memberCredits` INT(3) DEFAULT 0;

CREATE TABLE IF NOT EXISTS `policies`(
`ID` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`fileName` varchar(200),
`file` varchar(250)
);
drop table `policies`;

CREATE TABLE IF NOT EXISTS `followUp`(
`ID` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`relatedId` INT NOT NULL,
`followUpDetail` VARCHAR(5000),
`followedUpBy` VARCHAR(250)
);

CREATE TABLE IF NOT EXISTS `resourcePack`(
`Id` INT PRIMARY KEY NOT NULL auto_increment,
`Subject` VARCHAR(250),
`Topic` VARCHAR(250),
`Level` varchar(250),
`LastModifiedDate` timestamp default current_timestamp,
`ModifiedBy` varchar(100),
`Tag1` varchar(100),
`Tag2` varchar(100),
`Tag3` varchar(100),
`Tag4` varchar(100),
`Tag5` varchar(100),
`Description` varchar(2000),
`filePath1` varchar(500),
`filePath2` varchar(500),
`filePath3` varchar(500),
`filePath4` varchar(500),
`filePath5` varchar(500),
`filePath6` varchar(500),
`filePath7` varchar(500),
`link1` varchar(500),
`link2` varchar(500),
`link3` varchar(500),
`createdBy` varchar(100)
);

drop table `resourcePack`;