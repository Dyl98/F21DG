DROP TABLE IF EXISTS
StaffTasks,
CoTaught,
ClassificationRoles;

DROP TABLE IF EXISTS Staff;
DROP TABLE IF EXISTS Roles;
DROP TABLE IF EXISTS Dates;
DROP TABLE IF EXISTS CourseDetails;
DROP TABLE IF EXISTS ResearchDetails;
DROP TABLE IF EXISTS Tasks;
DROP TABLE IF EXISTS Classifications;
DROP TABLE IF EXISTS CalendarTranslations;
-- StaffID should ideally be externally defined, rather than auto incremented
--		Do staff have Matriculation numbers, or similar?
-- Office should match standard Heriot-Watt room identifiers (IE EMG44, GRGIC2)
-- Email at 256 characters encompases the absolute maximum length allowable by smtp standard RFC 5321
-- No idea of the maximum length for a phone extension, 11 should suffice. Varchar maintains leading 0s
CREATE TABLE Staff (
StaffID		int(8) PRIMARY KEY AUTO_INCREMENT,
Forename	varchar(32) NOT NULL,
Surname		varchar(32) NOT NULL,
Office 		varchar(8) NOT NULL,
Email		varchar(256) NOT NULL,
PhoneExt	varchar(11) NOT NULL,
Campus		varchar(32) NOT NULL
) ENGINE=INNODB;

CREATE TABLE Classifications (
ClassificationID	int(2) PRIMARY KEY,
Name			varchar(32)
) ENGINE=INNODB;

CREATE TABLE Roles (
RoleID		int(2) PRIMARY KEY AUTO_INCREMENT,
Name		varchar(32)
) ENGINE=INNODB;

CREATE TABLE ClassificationRoles (
ClassificationID	int(2) NOT NULL,
RoleID				int(2) NOT NULL,
PRIMARY KEY (ClassificationID, RoleID),
FOREIGN KEY (ClassificationID) REFERENCES Classifications (ClassificationID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (RoleID) REFERENCES Roles (RoleID) ON UPDATE CASCADE
) ENGINE=INNODB;

-- 4 digits for work units should suffice
CREATE TABLE Tasks (
TaskID			int(8) PRIMARY KEY AUTO_INCREMENT,
Name			varchar(64) NOT NULL,
Description		varchar(2048) NOT NULL,
WorkUnits		int(4) NOT NULL,
Classification	int(2) NOT NULL,
FOREIGN KEY (Classification) REFERENCES Classifications (ClassificationID) ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE Dates (
TaskID		int(8) NOT NULL,
DateType	int(2) NOT NULL,
RepeatType	int(2) NOT NULL,
TaskDate	DATE NOT NULL,
PRIMARY KEY (TaskID, DateType),
FOREIGN KEY (TaskID) REFERENCES Tasks (TaskID) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;


CREATE TABLE StaffTasks (
StaffID				int(8) NOT NULL,
TaskID				int(8) NOT NULL,
WorkloadPercentage	int(3) NOT NULL,
DesignatedRole		int(2),
PRIMARY KEY (StaffID, TaskID),
FOREIGN KEY (StaffID) REFERENCES Staff (StaffID) ON UPDATE CASCADE,
FOREIGN KEY (TaskID) REFERENCES Tasks (TaskID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (DesignatedRole) REFERENCES Roles (RoleID) ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE CourseDetails (
TaskID			int(8) PRIMARY KEY,
Code			varchar(8) NOT NULL UNIQUE,
Name			varchar(64) NOT NULL,
StudentCount	int(4) NOT NULL,
FOREIGN KEY (TaskID) REFERENCES Tasks (TaskID) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE CoTaught (
PrimaryTaskID	int(8) NOT NULL,
SecondaryTaskID	int(8) NOT NULL,
PRIMARY KEY (PrimaryTaskID, SecondaryTaskID),
FOREIGN KEY (PrimaryTaskID) REFERENCES CourseDetails (TaskID) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (SecondaryTaskID) REFERENCES CourseDetails (TaskID) ON UPDATE CASCADE ON DELETE CASCADE,
INDEX (SecondaryTaskID, PrimaryTaskID)
) ENGINE=INNODB;

CREATE TABLE ResearchDetails (
TaskID			int(8) PRIMARY KEY,
Funded			BOOL NOT NULL,
FOREIGN KEY (TaskID) REFERENCES Tasks (TaskID) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

-- Year here should be the start of the academic year
-- IE Year 2020/2021 stored as 2020
CREATE TABLE CalendarTranslations (
Year			int(4) PRIMARY KEY,
Semester1Start		DATE NOT NULL,
Semester2Start		DATE NOT NULL,
Semester3Start		DATE NOT NULL,
ChristmasBreakStart	DATE NOT NULL,
EasterBreakStart	DATE NOT NULL
) ENGINE=INNODB;
