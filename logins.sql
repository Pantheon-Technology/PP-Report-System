DROP TABLE IF EXISTS parents;
DROP TABLE IF EXISTS teacher;
DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS reportUpload;

CREATE TABLE IF NOT EXISTS `parents`(
`parentID` INT AUTO_INCREMENT PRIMARY KEY,
`parentUsername` CHAR(200) NOT NULL,
`password` VARCHAR(250) NOT NULL
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

SELECT * FROM `reportUpload`;
SELECT * FROM `admins`;
SELECT * FROM `teacher`;
SELECT * FROM `parents`;