drop table StaffTasks;
drop table CoTaught;
drop table ClassificationRoles;

drop table Tasks;
drop table Staff;
drop table Roles;
drop table Dates;
drop table CourseDetails;
drop table ResearchDetails;
drop table Classifications;
drop table CalendarTranslations;
-- StaffID should ideally be externally defined, rather than auto incremented
--		Do staff have Matriculation numbers, or similar?
-- Office should match standard Heriot-Watt room identifiers (IE EMG44, GRGIC2)
-- Email at 256 characters encompases the absolute maximum length allowable by smtp standard RFC 5321
-- No idea of the maximum length for a phone extension, 11 should suffice. Varchar maintains leading 0s
create table Staff (
StaffID		int(8) primary key AUTO_INCREMENT,
Forename	varchar(32) not null,
Surname		varchar(32) not null,
Office 		varchar(8) not null,
Email		varchar(256) not null,
PhoneExt	varchar(11) not null,
Campus		varchar(32) not null
) ENGINE=INNODB;

CREATE TABLE Classifications (
ClassificationID	int(2) primary key,
Name			varchar(32)
) ENGINE=INNODB;

create table Roles (
RoleID		int(2) primary key AUTO_INCREMENT,
Name		varchar(32)
) ENGINE=INNODB;

create table ClassificationRoles (
ClassificationID	int(2) not null,
RoleID				int(2) not null,
primary key (ClassificationID, RoleID),
foreign key (ClassificationID) references Classifications (ClassificationID) on update cascade on delete cascade,
foreign key (RoleID) references Roles (RoleID) on update cascade
) ENGINE=INNODB;

-- 4 digits for work units should suffice
create table Tasks (
TaskID			int(8) primary key AUTO_INCREMENT,
Name			varchar(64) not null,
Description		varchar(256) not null,
WorkUnits		int(4) not null,
Classification	int(2) not null,
foreign key (Classification) references Classifications (ClassificationID) ON UPDATE CASCADE
) ENGINE=INNODB;

-- Year is the start year of the academic year
-- EG Academic year 2020 - 2021 is stored as year 2020
--create table AcademicDates (
--TaskID		int(8) not null,
--DateType	int(2) not null,
--Year		int(4) not null,
--Semester	int(1) not null,
--Week		int(2) not null,
--DayOfWeek	int(1) not null DEFAULT 1,
--primary key (TaskID, DateType),
--foreign key (TaskID) references Tasks (TaskID) on update cascade on delete cascade
--) ENGINE=INNODB;

create table Dates (
TaskID		int(8) not null,
DateType	int(2) not null,
TaskDate	DATE not null,
primary key (TaskID, DateType),
foreign key (TaskID) references Tasks (TaskID) on update cascade on delete cascade
) ENGINE=INNODB;


create table StaffTasks (
StaffID				int(8) not null,
TaskID				int(8) not null,
WorkloadPercentage	int(3) not null,
DesignatedRole		int(2),
primary key (StaffID, TaskID),
foreign key (StaffID) references Staff (StaffID) ON UPDATE CASCADE,
FOREIGN KEY (TaskID) references Tasks (TaskID) ON UPDATE CASCADE ON DELETE CASCADE,
foreign key (DesignatedRole) references Roles (RoleID) on update cascade
) ENGINE=INNODB;

create table CourseDetails (
TaskID			int(8) primary key,
Code			varchar(8) not null UNIQUE,
Name			varchar(64) not null,
StudentCount	int(4) not null,
foreign key (TaskID) references Tasks (TaskID) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

create table CoTaught (
PrimaryTaskID	int(8) not null,
SecondaryTaskID	int(8) not null,
primary key (PrimaryTaskID, SecondaryTaskID),
foreign key (PrimaryTaskID) references CourseDetails (TaskID) on update cascade on delete cascade,
foreign key (SecondaryTaskID) references CourseDetails (TaskID) on update cascade on delete cascade,
INDEX (SecondaryTaskID, PrimaryTaskID)
) ENGINE=INNODB;

create table ResearchDetails (
TaskID			int(8) primary key,
Funded			int(1) not null,
foreign key (TaskID) references Tasks (TaskID) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=INNODB;

--Year here should be the start of the academic year
-- IE Year 2020/2021 stored as 2020
create table CalendarTranslations (
Year			int(4) primary key,
Semester1Start		DATE not null,
Semester2Start		DATE not null,
Semester3Start		DATE not null,
ChristmasBreakStart	DATE not null,
EasterBreakStart	DATE not null
) ENGINE=INNODB;
