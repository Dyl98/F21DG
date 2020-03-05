--Predetermined Data

DELETE FROM Roles;

INSERT into Roles VALUES 
(1,"Course Co-ordinator"),
(2,"Principal Investigator"),
(3,"Primary Supervisor"),
(4,"Secondary Supervisor"),
(5,"Group Supervisor"),
(6,"Teaching Assistant");

DELETE FROM Clasifications;

INSERT into Classifications VALUES
(1, "Teaching"),
(2, "Research"),
(3, "Administrative"),
(4, "External Activity"),
(5, "Other Authorised Engagement"),
(6, "Commercialisation");

DELETE FROM ClassificationRoles;

INSERT into ClassificationRoles VALUES
(1,1),
(2,2);

--Sample data

Insert into Staff VALUES
(1, "Dr.", "No", "EMG57", "Dr.No@hw.ac.uk", "+007", "Edinburgh"),
(2, "Ernst Stavro", "Blofeld", "MBG13", "esb2@hw.ac.uk", "003", "Edinburgh"),
(3, "Elliot", "Carver", "GRGIC2", "elliot.carver@hw.ac.uk", "+009", "Dubai");

Insert into Tasks VALUES
(1, "Kill James Bond", "A convoluted description for a convoluted, doomed-to-failure plan", 100, 4),
(2, "Radio-control of remote rockets", "Investigation into the use of radio-control to assume control of hostile remote rockets. Funded by Spectre.", 20, 2),
(3, "Find secluded private island", "Have to find a sufficiently secluded private island for a base of operations", 2,3),
(4, "Professional and Industrial Studies", "Course teaching students the realities of the Profesional and Industrial environment they will be expected to work in", 20, 1),
(5, "Big Data Management", "Course on managing big data and modern databases", 20, 1),
(6, "Board of Directors Meeting", "Regular meeting of the board of directors", 5, 3),
(7, "Consultancy for Government Agency", "Classified", 10, 4),
(8, "Paternity/Maternity Leave", "", 40, 5),
(9, "Technical Consultant for Spectre", "", 30, 6);

insert into CourseDetails VALUES
(4, "B81PS", "Profesional and Industrial Studies", 100),
(5, "F29BD", "Big Data Management", 160);

insert into ResearchDetails VALUES
(2, TRUE);

-- Date:
-- Type 1 Start
-- Type 2 End
-- Type 3 Start-and-end (one day long)

--Repeat:
-- Type 0 N/A
-- Type 1 Annual
-- Type 2 Monthly
-- Type 3 Weekly
-- Type 4 Semesterly
insert into Dates VALUES
(1,1,0, "2020/3/5"),
(2,1,0,"2020/3/1"),
(2,2,0,"2020/3/1"),
(3,1,0,"2020/2/29"),
(4,1,1, "2020/9/5"),
(4,2,1, "2020/12/1"),
(5,1,1, "2020/1/11"),
(5,2,1, "2020/4/1"),
(6,3,2, "2020/4/1"),
(7,1,0, "2020/2/10"),
(8,1,0, "2019/11/8"),
(8,2,0, "2020/2/12"),
(9,1,4, "2020/1/13"),
(9,2,4, "2020/1/20");

insert into StaffTasks VALUES
(1,1,34,NULL),
(2,1,33,NULL),
(3,1,33,NULL),
(1,2,100,2),
(1,3,100,NULL),
(2,4,100,1),
(2,5,50,NULL),
(3,5,50, 1),
(3,6,100,NULL),
(3,7,100,NULL),
(1,8,100,NULL),
(2,9,100,NULL);
