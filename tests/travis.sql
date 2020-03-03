-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: csm
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.19.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `csm`
--

CREATE USER 'test'@'localhost' IDENTIFIED BY 'test';
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON *.* TO 'test'@'localhost';

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `csm` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `csm`;

--
-- Table structure for table `admin_tasks`
--

DROP TABLE IF EXISTS `admin_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_tasks` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `weighting` int(11) NOT NULL,
  `availability1` int(1) NOT NULL DEFAULT '0',
  `availability2` int(1) NOT NULL DEFAULT '0',
  `availability3` int(1) NOT NULL DEFAULT '0',
  `availability4` int(1) NOT NULL DEFAULT '0',
  `availability5` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_tasks`
--

LOCK TABLES `admin_tasks` WRITE;
/*!40000 ALTER TABLE `admin_tasks` DISABLE KEYS */;
INSERT INTO `admin_tasks` VALUES (26,'CS Director of PG Studies','',7,1,1,1,1,1),(5,'CS 1st Year Supervisor','',3,1,1,1,1,1),(6,'CS 2nd Year Supervisor','',2,1,1,1,1,1),(7,'CS 3rd Year Supervisor','Includes 3rd Year Group Projects',4,1,1,1,1,1),(8,'CS 4th/5th Year Supervisor','',3,1,1,1,1,1),(10,'CS BSc Comp Sci & MEng Soft Eng Director','',6,1,1,1,1,1),(11,'CS BSc Inf Sys Director','',6,1,1,1,1,1),(13,'CS Computer Users Convenor','',1,1,1,1,1,1),(139,'CS MSc BIM Director','Business Information Management',2,1,1,1,1,1),(141,'CS Dissertations - UGT','',2,1,1,1,1,0),(22,'CS Deputy Head','',5,1,1,1,1,1),(24,'CS Head of Department','',10,1,1,1,1,1),(25,'CS MEng Industrial Placements','',4,1,0,0,0,1),(27,'CS Admissions - UGT','',5,1,1,1,1,1),(28,'CS Admissions - PGT','',5,1,1,1,1,1),(29,'CS Disability Officer','Primary contact point',3,1,1,1,1,1),(30,'CS Seminar Co-ordinator','',1,1,1,1,1,1),(90,'_MATERNITY LEAVE','',1,1,0,0,0,0),(32,'MACS Head of School','',8,1,1,1,1,1),(34,'CS Admissions - PGR','Includes PhD Monitoring',4,1,1,1,1,1),(35,'CS Research Committee Co-Convenor','',2,1,1,1,1,1),(37,'HWU UG Studies Committee - MACS Reps','',2,1,1,1,1,1),(39,'SICSA Graduate Academy Rep','',2,1,1,1,1,1),(40,'SICSA HWU Nominated Rep','',1,1,1,1,1,1),(41,'CS Student-Staff Liaison','',2,1,1,1,1,1),(137,'HWU Honorary Degrees Committee','',1,1,1,1,1,1),(43,'CS Exchange Student Liaison','',1,1,1,1,1,1),(44,'CS Lab Helper Administration','',2,1,1,1,0,0),(45,'HWU Senate','',1,1,1,1,1,1),(48,'_LEAVE OF ABSENCE','',1,0,0,0,0,0),(50,'_SABBATICAL','',1,0,0,0,0,0),(52,'CS BCS Liaison','',1,1,1,1,1,1),(53,'MACS Academic Head (Dubai)','',6,1,1,1,1,1),(54,'CS Director of PG Studies (Dubai)','',6,1,1,1,1,1),(55,'CS Student-Staff Liaison UGT (Dubai)','',2,1,1,1,1,1),(56,'CS Admissions - PGT (Dubai)','',4,1,1,1,1,1),(57,'CS MSc CSM Director (Dubai)','Computer Systems Management - Dubai',2,1,1,1,1,1),(58,'CS MSc IT (SS) Director (Dubai)','IT (Software Systems) - Dubai',2,1,1,1,1,1),(59,'CS MSc IT (Bus) Director (Dubai)','IT (Business ) - Dubai',2,1,1,1,1,1),(60,'Dubai Course Directors Committee - MACS Rep','',2,1,1,1,1,1),(121,'MACS PGT Prog Administrator','PGT Progression',1,1,1,1,1,1),(61,'Dubai Inf & Fac Committee - MACS Rep','Infrastructure & Facilities',2,1,1,1,1,1),(62,'CS Timetabling (Dubai)','',2,1,1,1,1,1),(63,'CS Resource Allocation (Dubai)','',2,1,1,1,1,1),(64,'CS Grad Dip IT Director','',2,1,1,1,1,1),(65,'CS Recruitment Committee Convenor','',2,1,1,1,1,1),(66,'CS Recruitment (Dubai)','',3,1,1,1,1,1),(67,'CS Further Education Liaison','',2,1,1,1,1,1),(68,'CS Schools Liaison','',3,1,1,1,1,1),(70,'CS MSc AIA Director','Advanced Internet Applications',2,1,1,1,1,1),(71,'CS MSc AI Director','Artificial Intelligence',2,1,1,1,1,1),(73,'CS MSc IT (Bus) Director','IT (Business)',2,1,1,1,1,1),(183,'Head of Mentor Team','Head of CS special mentoring team',1,1,1,1,1,1),(75,'CS MSc IT (SS) Director','IT (Software Systems)',2,1,1,1,1,1),(86,'CS HEA Key Contact','',1,1,1,1,1,1),(78,'CS MSc SE Director','Software Engineering',2,1,1,1,1,1),(80,'CS MSc Computing Director','Distance/Flexible Learning (Independent Learners)',4,1,1,1,1,1),(81,'CS MSc IT (IS) Director','IT (Information Systems) - D/F L',3,1,1,1,1,1),(97,'CS BSc Comp Sys Director','Overall Comp Sys Director for all locations',3,1,1,1,1,1),(83,'CS MSc CSM Director','Computer Systems Management',2,1,1,1,1,1),(84,'CS Industrial Liaison','Includes Industrial Steering Board Chair',2,1,1,1,1,1),(87,'SICSA Knowledge Transfer Rep','',1,1,1,1,1,1),(88,'HWU PGR Co-ordinators Group - MACS Reps','',1,1,1,1,1,1),(156,'HWU Court','',1,1,1,1,1,1),(133,'SICSA CSE SEABIS Rep','Complex Systems Engineering Theme',1,1,1,1,1,1),(91,'_PATERNITY LEAVE','',1,0,0,0,0,0),(92,'_SECONDMENT','',1,0,0,0,0,0),(93,'SICSA CSE SEMANTICS Sub-Theme Leader','Complex Systems Engineering Theme',1,1,1,1,1,1),(132,'CS Student-Staff Liaison PGT (Dubai)','',2,1,1,1,1,1),(136,'CS Student Mentor','Member of the Mentoring Team',2,1,1,1,1,1),(98,'CS Distance Learning Co-ordinator','',5,1,1,1,1,1),(120,'MACS UGT Prog Administrator','UGT Progression',1,1,1,1,1,1),(100,'CS Robotics Lab Director','',2,1,1,1,1,1),(134,'CS MSc RAIS Director','CS side of EPS Robotics, Autonomous & Interactive Systems',1,1,1,1,1,1),(101,'CS Careers Officer','',1,1,1,1,1,1),(102,'CS Director of UG Studies (Dubai)','',6,1,1,1,1,1),(103,'CS Admissions - UGT (Dubai)','',4,1,1,1,1,1),(138,'CS Interaction Lab Director','Includes ISIS room',1,1,1,1,1,1),(106,'CS MSc ACS Director','Advanced Computer Science (by research)',1,1,1,1,1,1),(135,'CS Brazil Liaison','Academic and student exchange and recruitment',1,1,1,1,1,1),(108,'SICSA Committee Rep','',1,1,1,1,1,1),(110,'HWU CDI Theme Chair','Creativity, Design and Innovation Theme',2,1,1,1,1,1),(157,'ECR Deputy Director','HWU Deputy Director of Edinburgh Centre for Robotics',1,1,1,1,1,1),(112,'CS Open Day Co-ordinator','Open Day and UCAS Day Events',2,1,1,1,1,1),(113,'CS Distance Learning Manager','Includes Courseware Development',10,1,1,1,1,1),(114,'CS External Programmes Administrator','',10,1,1,1,1,1),(115,'CS Web Co-ordinator','',3,1,1,1,1,1),(116,'CS Timetabling','',3,1,1,1,1,1),(117,'OER Champion','Open Educational Resources',1,0,1,1,1,1),(119,'HWU Dean\'s Representative','',1,1,1,1,1,1),(122,'MACS PGR Administrator','',1,1,1,1,1,1),(123,'MACS Research Administrator','',1,1,1,1,1,1),(184,'MSc Dissertation Co-ordinator','',1,0,1,0,0,1),(124,'MACS UGT R&A Administrator','UGT Recruitment & Admissions',1,1,1,1,1,1),(125,'MACS PGT R&A Administrator','PGT Recruitment & Admissions',1,1,1,1,1,1),(126,'MACS Head of School PA','Personal Assistant',1,1,1,1,1,1),(127,'CS LEAPS Co-ordinator','LEAPS Summer Schools',1,1,1,1,1,1),(128,'CS Examinations Officer','',3,1,1,1,1,1),(129,'CS Examinations Officer (Dubai)','',2,1,1,1,1,1),(130,'SICSA Education Rep','',1,1,1,1,1,1),(140,'CS REF Champion','',4,1,1,0,1,1),(142,'CS Dissertations - PGT','',2,0,0,1,1,1),(143,'CS MEng Group Project & Master Class','',1,0,0,1,1,0),(144,'CS Director of EI2','Enterprise, Impact and Innovation',1,1,1,1,1,1),(145,'HWU PG Studies Committee - MACS Reps','',1,1,1,1,1,1),(146,'MACS PG Recruitment Group','',1,1,1,1,1,1),(147,'ECR Robotarium Steering Group','Lead for CS part of Robotarium West @ HWU',1,1,1,1,1,1),(148,'ECR Executive','Edinburgh Centre for Robotics Executive including RAS CDT',1,1,1,1,1,1),(149,'Professor Emeritus','',1,1,1,1,1,1),(150,'CS MSc AIwSMP Director','Artificial Intelligence with Speech and Multimodal Processing',1,1,1,1,1,1),(151,'CS MSc DS Director','Data Science',1,1,1,1,1,1),(152,'CS MSc SE Director (Dubai)','Software Engineering - Dubai',1,1,1,1,1,1),(153,'MACS Director of Learning & Teaching','',1,1,1,1,1,1),(154,'MACS Director of Research & Knowledge Transfer','',1,1,1,1,1,1),(158,'_ LEFT OR LEAVING','So long and thanks for all the fish',1,1,1,1,1,1),(159,'MACS Athena Swan SAT Leader','Self-Assessment Team',1,1,1,1,1,1),(160,'HWU ISC - MACS Rep','Information Services Committee',1,1,1,1,1,1),(161,'CS Director of UG Studies','',3,1,1,1,1,1),(162,'CS 3rd Year Supervisor (Dubai)','Includes 3rd Year Group Projects',4,1,1,1,1,1),(163,'CS 4th Year Supervisor (Dubai)','Includes Honours Dissertations',4,1,1,1,1,1),(164,'CS Dissertations - PGT (Dubai)','',2,0,0,1,1,1),(165,'CS 1st Year Supervisor (Dubai)','',3,1,1,1,1,1),(166,'CS 2nd Year Supervisor (Dubai)','',2,1,1,1,1,1),(167,'MACS Director of Academic Quality','',1,1,1,1,1,1),(168,'MACS Director of Administration','',1,1,1,1,1,1),(169,'MACS Financial Controller','',1,1,1,1,1,1),(170,'MACS Director of Research (Dubai)','',1,1,1,1,1,1),(171,'MACS Director of Internationalisation','',1,1,1,1,1,1),(172,'CS Disabilty Officer Deputy','Sharing case load and providing cover',2,1,1,1,1,1),(173,'CS MRes RAS Director','CS side of CDT MRes in Robotics and Autonomous Systems',1,1,1,1,1,1),(174,'MACS Technology Enhancement Group Convenor','',1,1,1,1,1,1),(175,'MACS Technology Enhancement Group','CS Members',1,1,1,1,1,1),(176,'HWU RMAS Committee and User Group','New Research Management System Project',1,1,1,1,1,1),(177,'HWU iHR Project Board','New iHR and iRecruit Projects',1,1,1,1,1,1),(178,'MACS Athena Swan Implementation Group','',1,1,1,1,1,1),(179,'HWU Curriculum Working Group - MACS Rep','',1,1,1,1,1,1),(180,'CS MSc Industrial Placements','',1,1,1,1,1,1),(181,'SICSA ESR Rep','Early Stage Researchers',1,1,1,1,1,1);
/*!40000 ALTER TABLE `admin_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_tasks_xref`
--

DROP TABLE IF EXISTS `admin_tasks_xref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_tasks_xref` (
  `staffid` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`staffid`,`adminid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_tasks_xref`
--

LOCK TABLES `admin_tasks_xref` WRITE;
/*!40000 ALTER TABLE `admin_tasks_xref` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_tasks_xref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `current_modules`
--

DROP TABLE IF EXISTS `current_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_modules` (
  `moduleid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriptor` varchar(255) NOT NULL,
  `weighting` int(11) NOT NULL,
  `availability1` int(1) NOT NULL DEFAULT '0',
  `availability2` int(1) NOT NULL DEFAULT '0',
  `availability3` int(1) NOT NULL DEFAULT '0',
  `availability4` int(1) NOT NULL DEFAULT '0',
  `availability5` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `current_modules`
--

LOCK TABLES `current_modules` WRITE;
/*!40000 ALTER TABLE `current_modules` DISABLE KEYS */;
INSERT INTO `current_modules` VALUES (19,'F27PX','Praxis','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27PX_2009',7,1,0,0,0,0),(17,'F27SA','Software Development 1','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27SA.pdf',7,1,0,0,0,0),(163,'F28SD','Software Design','',1,0,0,0,0,0),(108,'F27IS (Dubai)','Interactive Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27IS_2009',3,1,0,0,0,0),(21,'F27CS','Introduction to Computer Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27CS_2009',7,0,0,1,0,0),(22,'F27SB','Software Development 2','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27SB.pdf',6,0,0,1,0,0),(23,'F27TS','Technology in Society','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27TS_2009',2,0,0,1,0,0),(106,'F27SG','Software Development 3','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27SG.pdf',5,0,0,1,0,0),(25,'F28IN','Interaction Design','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28IN_2009',8,1,0,0,0,0),(26,'F28DA','Data Structures & Algorithms','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28DA_2009',6,1,0,0,0,0),(27,'F28WP ','Web Programming','',6,1,0,0,0,0),(130,'F29LP','Language Processors ','',6,0,0,1,0,0),(162,'F21AN','Advanced Network Security (Dubai)','',1,0,0,1,0,0),(29,'F28CD','Creative Design Project','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28CD_2009',4,0,0,1,0,0),(30,'F28DM','Database Management Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28DM_2009',8,0,0,1,0,0),(31,'F28PL','Programming Languages','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28PL_2009',5,1,0,0,0,0),(32,'F29SO','Software Engineering','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29SO_2009',7,1,0,0,0,0),(33,'F29AI','Artificial Intelligence & Intelligent Agents','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29AI_2009',6,1,0,0,0,0),(34,'F29KM','Knowledge Management','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29KM_2009',2,1,0,0,0,0),(36,'F29FA','Foundations 1','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29FA_2009',5,1,0,0,0,0),(37,'F29CT','Critical & Computational Thinking','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29CT_2009',2,1,0,0,0,0),(38,'F29PD','Professional Development','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29PD_2009',7,0,0,1,0,0),(39,'F29OC','Operating Systems & Concurrency','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29OC_2009',5,0,0,1,0,0),(40,'F28FS','Formal Specification','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28FS',6,0,0,1,0,0),(41,'F29SS','Sociotechnical & Soft Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29SS_2009',3,0,0,1,0,0),(43,'F29FB','Foundations 2','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29FB_2009',5,0,0,1,0,0),(44,'F20PA','Project: Research Methods & Req Eng','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F20PA_2009',1,1,0,0,0,0),(45,'F20PB','Project: Design & Implementation','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F20PB_2009',1,0,0,1,0,0),(46,'F20PC','Project: Testing & Presentation','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F20PC_2009',1,0,0,1,0,0),(47,'F21MC','Mobile Communications & Programming','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21MC_2009',3,1,0,0,0,0),(159,'F21DL','Data Mining & Machine learning','',1,1,0,0,0,0),(161,'F21AN','Advanced Network Security','',1,0,0,1,0,0),(49,'F21RS','Rigorous Methods for Software Engineering','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21RS',2,1,0,0,0,0),(50,'F21MA','3D Modelling and Animation','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21MA_2009',3,1,0,0,0,0),(51,'F21DO','Design for Online Learning','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21DO_2009',2,1,0,0,0,0),(140,'F21BD','Big Data Management','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21BD',1,0,0,1,0,0),(53,'F21RO','Intelligent Robotics','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21RO_2009',2,0,0,1,0,0),(54,'F21DP','Distributed and Parallel Technologies','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21DP_2009',2,0,0,1,0,0),(55,'F21EC','E-commerce Technology','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21EC_2009',5,0,0,1,0,0),(56,'F21IF','Information Systems Methodologies','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21IF_2009',4,1,0,0,0,0),(57,'F21NA','Network Applications','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21NA_2009',3,0,0,1,0,0),(121,'F28PL (Dubai)','Programming Languages','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28PL_2009',3,1,0,0,0,0),(59,'F21VE','Virtual & Augmented Realities','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21VE_2009',2,0,0,1,0,0),(60,'F21GP','Computer Games Programming','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21GP_2009',3,0,0,1,0,0),(61,'F21AD','Advanced Interaction Design','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21AD_2009',2,0,0,1,0,0),(62,'F21IL','Integrated Online Learning Environments','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21IL_2009',2,0,0,1,0,0),(156,'F27WD','Web Design and Databases','',3,0,0,1,0,0),(160,'F21BC','Biologically Inspired Computation','',1,1,0,0,0,0),(120,'F28DA (Dubai)','Data Structures & Algorithms','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28DA_2009',3,1,0,0,0,0),(65,'F21SM','Software Engineering Masterclass','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21SM_2009',1,0,0,1,0,0),(66,'F21DG','Design & Code Group Project','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21DG_2009',1,0,0,1,0,0),(67,'F21IA','Industrial Placement 1','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21IA_2009',1,1,0,0,0,0),(68,'F21IB','Industrial Placement 2','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21IB_2009',1,1,0,0,0,0),(69,'F21IC','Industrial Placement Monthly Reports','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21IC_2009',1,1,0,0,0,0),(70,'F21ID','Industrial Placement Final Report','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21ID_2009',1,1,0,0,0,0),(71,'F21DF','Databases and Information Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21DF_2009',2,1,0,0,0,0),(72,'F21SF','Software Engineering Foundations','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21SF_2009',3,1,0,0,0,0),(73,'F21AS','Advanced Software Engineering','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21AS_2009',3,0,0,1,0,0),(93,'F21AS (Dubai)','Advanced Software Engineering','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21AS_2009',1,0,0,1,0,0),(92,'F21EC (Dubai)','E-commerce Technology','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21EC_2009',1,0,0,1,0,0),(76,'F21RP','Research Methods and Project Planning','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21RP_2009',5,0,0,1,0,0),(94,'F21RP (Dubai)','Research Methods and Project Planning','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21RP_2009',2,0,0,1,0,0),(78,'F21MP','MSc Project & Dissertation (MSc)','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21MP_2009',1,0,0,0,0,1),(79,'F21SC','Industrial Programming','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21SC_2009.pdf',2,1,0,0,0,0),(119,'F28IN (Dubai)','Interaction Design','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28IN_2009',3,1,0,0,0,0),(91,'F20CL','Computing in the Classroom','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F20CL_2010.pdf',2,1,0,1,0,0),(107,'F21IF (Dubai)','Information Systems Methodologies','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21IF_2009',1,0,0,1,0,0),(96,'F21NA (Dubai)','Network Applications','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21NA_2009',1,0,0,1,0,0),(97,'F21CN (Dubai)','Computer Network Security','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21SE_2009.pdf',1,1,0,0,0,0),(98,'F21DF (Dubai)','Databases and Information Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21DF_2009',2,1,0,0,0,0),(99,'F21MC (Dubai)','Mobile Communications & Programming','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21MC_2009',2,1,0,0,0,0),(100,'F21SF (Dubai)','Software Engineering Foundations','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21SF_2009',2,1,0,0,0,0),(101,'F21SC (Dubai)','Industrial Programming','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21SC_2009.pdf',2,1,0,0,0,0),(102,'F21CN','Computer Network Security','http://www.macs.hw.ac.uk/cs/pgcourses/Courses/F21CN.pdf',3,1,0,0,0,0),(141,'F21CA','Conversational Agents and Spoken Language Processing','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21CA',2,0,0,1,0,0),(104,'F21RU','Research Paper Authorship','http://www.macs.hw.ac.uk/cs/pgcourses/Courses/F21RU.pdf',1,1,0,0,0,0),(109,'F27SA (Dubai)','Software Development 1','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27SA.pdf',3,1,0,0,0,0),(110,'F27PX (Dubai)','Praxis','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27PX_2009',2,1,0,0,0,0),(111,'F27WD (Dubai)','Web Design & Databases','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27WD.pdf',3,0,0,1,0,0),(112,'F27SB (Dubai)','Software Development 2','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27SB.pdf',3,0,0,1,0,0),(113,'F27SG (Dubai)','Software Development 3','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27SG.pdf',2,0,0,1,0,0),(114,'F27CS (Dubai)','Introduction to Computer Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27CS_2009',3,0,0,1,0,0),(115,'F21SM (Dubai)','Software Engineering Masterclass','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21SM_2009',1,0,0,1,0,0),(155,'F20CL (Dubai)','Computing in the Classroom','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F20CL_2010.pdf',1,1,0,1,0,0),(157,'F27IS','Interactive Systems','',3,1,0,0,0,0),(152,'F21RS (Dubai)','Rigorous Methods for Software Engineering','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21RS',1,1,0,0,0,0),(117,'F27EM','Emerging Technologies (Only CTI)','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F27EM_2009',1,1,0,1,0,1),(153,'F21AD (Dubai)','Advanced Interaction Design','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21AD_2009',1,0,0,1,0,0),(122,'F17LP','Logic & Proof','NKT cannot find a course descriptor - taught by Maths Dept in Edinburgh',6,1,0,0,0,0),(123,'F17LP (Dubai)','Logic & Proof','NKT cannot find a course descriptor',3,1,0,0,0,0),(154,'F21DE (Dubai)','Digital Knowledge Economy','',1,0,0,1,0,0),(142,'F21DV','Data Visualisation and Analytics','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21DV',1,1,0,0,0,0),(125,'F28DM (Dubai)','Database Management Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28DM_2009',3,0,0,1,0,0),(126,'F17FC (Dubai)','Discrete Maths','NKT cannot find a course descriptor',3,0,0,1,0,0),(127,'F17FC','Discrete Maths','NKT cannot find a course descriptor - taught by Maths Dept in Edinburgh',6,0,0,1,0,0),(128,'F28FS (Dubai)','Formal Specification','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28FS',3,0,0,1,0,0),(129,'F28SD (Dubai)','Software Design','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F28SD_2009',3,0,0,1,0,0),(131,'F29LP (Dubai)','Language Processors ','',3,0,0,1,0,0),(132,'F28WP (Dubai)','Web Programming','',3,1,0,0,0,0),(133,'F29SO (Dubai)','Software Engineering','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29SO_2009',2,1,0,0,0,0),(134,'F29AI (Dubai)','Artificial Intelligence & Intelligent Agents','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29AI_2009',2,1,0,0,0,0),(135,'F29GR (Dubai)','Computer Graphics','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29GR_2009',2,1,0,0,0,0),(136,'F29KM (Dubai)','Knowledge Management','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29KM_2009',2,1,0,0,0,0),(137,'F29PD (Dubai)','Professional Development','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29PD_2009',2,0,0,1,0,0),(138,'F29OC (Dubai)','Operating Systems & Concurrency','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29OC_2009',2,0,0,1,0,0),(139,'F29SS (Dubai)','Sociotechnical & Soft Systems','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29SS_2009',2,0,0,1,0,0),(143,'F29GR','Computer Graphics','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F29GR_2009',5,1,0,0,0,0),(144,'F21MA (Dubai)','3D Modelling and Animation','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21MA_2009',1,1,0,0,0,0),(145,'F21GP (Dubai)','Computer Games Programming','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21GP_2009',1,0,0,1,0,0),(146,'F21BD (Dubai)','Big Data Management','http://www.macs.hw.ac.uk/cs/localinfo/RAY/F21BD',1,0,0,1,0,0),(147,'F29DC (Dubai)','Data Communications and Networks','',2,1,0,0,0,0),(148,'F29DC','Data Communications and Networks','',5,1,0,0,0,0),(149,'F28HW','Hardware-Software Interface','',5,0,0,1,0,0),(150,'F28HW (Dubai)','Hardware-Software Interface','',2,0,0,1,0,0),(151,'F21DE','Digital Knowledge Economy','',2,0,0,1,0,0);
/*!40000 ALTER TABLE `current_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `current_modules_xref`
--

DROP TABLE IF EXISTS `current_modules_xref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `current_modules_xref` (
  `staffid` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`staffid`,`moduleid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `current_modules_xref`
--

LOCK TABLES `current_modules_xref` WRITE;
/*!40000 ALTER TABLE `current_modules_xref` DISABLE KEYS */;
/*!40000 ALTER TABLE `current_modules_xref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `research_duties`
--

DROP TABLE IF EXISTS `research_duties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `research_duties` (
  `researchid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `researchtype` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `weighting` int(11) NOT NULL,
  `availability1` int(1) NOT NULL DEFAULT '0',
  `availability2` int(1) NOT NULL DEFAULT '0',
  `availability3` int(1) NOT NULL DEFAULT '0',
  `availability4` int(1) NOT NULL DEFAULT '0',
  `availability5` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`researchid`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `research_duties`
--

LOCK TABLES `research_duties` WRITE;
/*!40000 ALTER TABLE `research_duties` DISABLE KEYS */;
INSERT INTO `research_duties` VALUES (83,'EC EMOTE','PI','Aylett - 30.11.2015 - Artificial Embodied Tutors',5,1,1,1,1,1),(58,'EPSRC SPIRES','PI','Aylett - ??.??.???? -',1,1,1,1,1,1),(51,'EC SOCIETIES','CI','Williams - 31.03.2014 - Community Smart Spaces',9,1,1,1,1,1),(47,'EPSRC IMRC C-Tex','PI','Chantler - ??.??.???? - Creative Surface Textures',5,1,1,1,1,1),(22,'EPSRC PLATFORM','PI','Ireland - ??.??.2015 - Multiple Mathematical Reasoning Processes',10,1,1,1,1,1),(55,'EC SpaceBook','PI','Lemon - 28.02.2014 - Interactive City Guide',5,1,1,1,1,1),(29,'SFC SICSA','PI','Michaelson - 31.12.2015 - Scottish Informatics & Computer Science Alliance',7,1,1,1,1,1),(88,'SFC Inno. Vouch.','CI','Louchart - ??.??.??? - Serious Game Development (with Infinite Scotland)',1,1,1,1,1,1),(84,'EC EMOTE','CI','Hastie - 30.11.2015 - Artificial Embodied Tutors',5,1,0,1,1,1),(50,'EC SOCIETIES','PI','TaylorN - 31.03.2014 - Community Smart Spaces',9,1,1,1,1,1),(87,'EPSRC AI4FM','CI','Grov - 31.03.2014 - Automation of Proof Search in Formal Methods',1,1,1,1,1,1),(92,'EPSRC, EP/N017536/1','PI','MaDrIgAL - Verena',1,1,1,1,1,1),(95,'EPSRC EP/M005429/1','PI','DILiGENt - Verena ',1,1,1,1,1,1),(94,'EPSRC  EP/L026775/1','PI','GUI Project - Verena',1,1,1,1,1,1),(54,'EC JAMES','PI','Lemon - 31.01.2014 - Social Robotics',5,1,1,1,1,1),(57,'EPSRC SerenA','PI','Aylett - ??.??.???? -',1,1,1,1,1,1),(60,'EPSRC META','CI','Aylett - ??.??.???? -',1,1,1,1,1,1),(89,'EC ORIGIN','PI','Corne - 31.10.2015 - Community Energy Management',4,1,1,1,1,1),(90,'ESRC ADRC Scotland','PI','Gray - 31.10.2018 - Administrative Data Research Centre for Scotland. Data linkage.',1,1,1,1,1,1),(64,'EC PARLANCE','PI & Co-ordinator','Hastie - 30.09.2014 - Natural Conversation Engine',8,1,1,1,1,1),(86,'EPSRC','PI','Michaelson - ??.??.???? - Embedded Platforms for Image Processing',1,1,1,1,1,1),(85,'EC STAC','PI','Lemon - 31.05.2016 - Strategic Conversation',4,1,1,1,1,1),(70,'EPSRC Network','PI','Chantler - 31.05.2014 - ICT Perspectives',2,1,1,1,1,1),(75,'KTP Hydrafact','PI','Corne - ??.??.???? - Improvements to Thermodynamics Predictive Software',1,1,1,1,1,1),(76,'EPSRC RIDERS','PI','Aylett - 30.9.2014 - Interactive Drama, Role-play, Story-telling',2,1,1,1,1,1),(77,'EPSRC RIDERS','CI','Louchart - 30.9.2014 - Interactive Drama, Role-play, Story-telling',2,1,1,1,1,1),(78,'EPSRC IMRC','CI','Louchart - 30.9.2014 - Serious Games for Computer Aided Engineering',3,1,1,1,1,1),(79,'EPSRC IMRC','CI','Chantler - 30.9.2014 - Serious Games for Computer Aided Engineering',3,1,1,1,1,1),(82,'SFC SICSA SUMMIT','PI','TaylorN - 28.02.2014 - SICSA Smart Tourism Project',1,1,1,1,1,1);
/*!40000 ALTER TABLE `research_duties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `research_duties_xref`
--

DROP TABLE IF EXISTS `research_duties_xref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `research_duties_xref` (
  `staffid` int(11) NOT NULL,
  `researchid` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`staffid`,`researchid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `research_duties_xref`
--

LOCK TABLES `research_duties_xref` WRITE;
/*!40000 ALTER TABLE `research_duties_xref` DISABLE KEYS */;
/*!40000 ALTER TABLE `research_duties_xref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_members`
--

DROP TABLE IF EXISTS `staff_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_members` (
  `staffid` int(11) NOT NULL AUTO_INCREMENT,
  `forename` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `availability1` int(1) NOT NULL DEFAULT '0',
  `availability2` int(1) NOT NULL DEFAULT '0',
  `availability3` int(1) NOT NULL DEFAULT '0',
  `availability4` int(1) NOT NULL DEFAULT '0',
  `availability5` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`staffid`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_members`
--

LOCK TABLES `staff_members` WRITE;
/*!40000 ALTER TABLE `staff_members` DISABLE KEYS */;
INSERT INTO `staff_members` VALUES (18,'Jenny','Coady (4178)','J.Coady@hw.ac.uk',1,1,1,1,1),(17,'Hamish','Taylor (3427)','H.Taylor@hw.ac.uk',1,1,1,1,1),(19,'Jamie','Gabbay (3425)','M.Gabbay@hw.ac.uk',1,1,1,1,1),(21,'Lilia','Georgieva (8159)','L.Georgieva@hw.ac.uk',1,1,1,1,1),(24,'Dave','Corne (3410)','D.W.Corne@hw.ac.uk',1,1,1,1,1),(25,'Fairouz','Kamareddine (3868)','F.D.Kamareddine@hw.ac.uk',0,0,0,0,0),(26,'Greg','Michaelson (60%) (3422)','G.Michaelson@hw.ac.uk',1,1,1,1,1),(27,'Mike','Chantler (3352)','M.J.Chantler@hw.ac.uk',1,1,1,1,1),(29,'Rob','Pooley (60%) (3367)','R.J.Pooley@hw.ac.uk',1,1,1,1,1),(30,'Ruth','Aylett (60%) (4189)','R.S.Aylett@hw.ac.uk',1,1,1,1,1),(32,'Albert','Burger (3428)','A.G.Burger@hw.ac.uk',1,1,1,1,1),(33,'Andrew','Ireland (3409)','A.Ireland@hw.ac.uk',1,1,1,1,1),(70,'_NOT','LECTURED','',1,1,1,1,1),(35,'Nick','Taylor (3436)','N.K.Taylor@hw.ac.uk',1,1,1,1,1),(36,'Joe','Wells (3869)','Joe.Wells@hw.ac.uk',1,1,1,1,1),(37,'Peter','King (80%) (3433)','P.J.B.King@hw.ac.uk',1,1,1,1,1),(71,'_NOT YET','ASSIGNED','',1,1,1,1,1),(146,'Mohamed','Abdelshafy (Dubai)','M.Abdelshafy@hw.ac.uk',1,1,1,1,1),(130,'Gabriel','Lord (Maths) (8196)','G.J.Lord@hw.ac.uk',1,1,1,1,1),(72,'Steve','Gill (Dubai)','S.Gill@hw.ac.uk',1,1,1,1,1),(74,'Oliver','Lemon (3517)','O.Lemon@hw.ac.uk',1,1,1,1,1),(75,'Hans-Wolfgang','Loidl (3421)','H.Loidl@hw.ac.uk',1,1,1,1,1),(76,'Patricia','Vargas (4161)','P.A.Vargas@hw.ac.uk',1,1,1,1,1),(137,'Robbie','McArthur (Admin) (3507)','R.McArthur@hw.ac.uk',1,1,1,1,1),(127,'Gavin','Gibson (AMS) (3205)','G.J.Gibson@hw.ac.uk',1,1,1,1,1),(142,'Lynne','Baillie (4160)','L.Baillie@hw.ac.uk',1,1,1,1,1),(77,'Howard','Williams (Professor Emeritus)','M.H.Williams@hw.ac.uk',1,1,1,1,1),(136,'Catherine','Donnelly (AMS) (3251)','C.Donnelly@hw.ac.uk',1,1,1,1,1),(138,'Darren','Cunningham (Admin) (4360)','D.P.Cunningham@hw.ac.uk',1,1,1,1,1),(134,'_ Temp Cover - Samar','Ibrahim (Dubai)','S.Ibrahim@hw.ac.uk',1,1,1,1,1),(84,'Talal','Shaikh (Dubai)','T.A.G.Shaikh@hw.ac.uk',1,1,1,1,1),(135,'Hani','Ragab Hassen (Dubai)','H.RagabHassen@hw.ac.uk',1,1,1,1,1),(102,'Gudmund','Grov (3412)','G.Grov@hw.ac.uk',1,1,1,1,1),(147,'Ron ','Petrick','r.p.petrick@hw.ac.uk',1,1,1,1,1),(145,'_ Temp Cover - Esma','Lounes (Dubai)','el10@hw.ac.uk',1,1,0,0,0),(88,'Helen','Hastie (3344)','H.Hastie@hw.ac.uk',1,1,1,1,1),(119,'Jessica','Chen-Burger (80%) (3434)','Y.J.ChenBurger@hw.ac.uk',1,1,1,1,1),(92,'Verena','Rieser (4129)','V.T.Rieser@hw.ac.uk',1,1,1,1,1),(90,'Sven-Bodo','Scholz (3814)','S.Scholz@hw.ac.uk',1,1,1,1,1),(110,'Mark','Lawson (Maths) (3210)','M.V.Lawson@hw.ac.uk',1,0,0,0,0),(105,'Hind','Zantout (Dubai)','H.Zantout@hw.ac.uk',1,1,1,1,1),(94,'Jill','Gunn (Admin) (3334)','J.P.Gunn@hw.ac.uk',1,1,1,1,1),(104,'Claire','Porter (Admin) (3411)','C.Porter@hw.ac.uk',1,1,1,1,1),(116,'Alasdair','Gray (3429)','A.J.G.Gray@hw.ac.uk',1,1,1,1,1),(98,'Santy','Chumbe (3762)','S.Chumbe@hw.ac.uk',1,1,1,1,1),(99,'Lisa','Scott (3768)','L.J.Scott@hw.ac.uk',1,1,1,1,1),(100,'Rodi','Amiridou (Admin)  (8314)','R.Amiridou@hw.ac.uk',1,1,1,1,1),(101,'Phil','Barker (3278)','Phil.Barker@hw.ac.uk',1,1,1,1,1),(125,'Lisa','Kinnaird (Admin) (3432)','L.M.Kinnaird@hw.ac.uk',1,1,1,1,1),(107,'Amanda','Hearn (Admin) (8337)','A.K.Hearn@hw.ac.uk',1,1,1,1,1),(108,'June','Maxwell (Admin) (4152)','J.Maxwell@hw.ac.uk',1,1,1,1,1),(111,'Anatoly','Konechny (Maths) (3077)','A.Konechny@hw.ac.uk',0,0,1,0,0),(118,'Fiona','McNeill (50%) (3435)','F.McNeill@hw.ac.uk ',1,1,1,1,1),(129,'Jennie','Hansen (AMS) (3213)','J.Hansen@hw.ac.uk',1,1,1,1,1),(120,'Katrin','Lohan (8338)','K.Lohan@hw.ac.uk',1,1,1,1,1),(121,'Chris','Fensch (3416)','C.Fensch@hw.ac.uk',1,1,1,1,1),(122,'Michael','Lones (8434)','M.Lones@hw.ac.uk',1,1,1,1,1),(123,'Manuel','Maarek (3287)','M.Maarek@hw.ac.uk',1,1,1,1,1),(124,'Holly','Murphy (Admin)  (8176)','H.Murphy@hw.ac.uk',1,1,1,1,1),(126,'_NOT','RUNNING','',1,1,1,1,1),(128,'_ Temp Cover - Diana','Bental (8338)','D.S.Bental@hw.ac.uk',1,0,0,0,0),(132,'Mohammad','Hamdan (Dubai)','M.Hamdan@hw.ac.uk',1,1,1,1,1),(133,'Smitha','Kumar (Dubai)','Smitha.Kumar@hw.ac.uk',1,1,1,1,1),(139,'Stefano','Padilla (4166)','S.Padilla@hw.ac.uk',1,1,1,1,1),(140,'Tessa','Berg (8223)','T.Berg@hw.ac.uk',1,1,1,1,1),(141,'Mike','Just (3336)','M.Just@hw.ac.uk',1,1,1,1,1),(143,'Frank','Broz (3430)','F.Broz@hw.ac.uk',1,1,1,1,1),(144,'Sandra','McArthur (Admin) (4339)','S.M.McArthur@hw.ac.uk',1,1,1,1,1),(148,'Katya','Komendantskaya','e.komendantskaya@hw.ac.uk',0,0,0,0,0),(149,'_ TEMP Cover - Idress','Ibrahim','i.s.ibrahim@hw.ac.uk',1,1,1,1,1);
/*!40000 ALTER TABLE `staff_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `staff_short`
--

DROP TABLE IF EXISTS `staff_short`;
/*!50001 DROP VIEW IF EXISTS `staff_short`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `staff_short` AS SELECT 
 1 AS `staffid`,
 1 AS `name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `userpassword` varchar(255) DEFAULT NULL,
  `helpsys_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `mail_notify_enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'test','d8578edf8458ce06fbc5bb76a58c5ca4',1,0),(1,'nktaylor','92c6ba7db75f7483d67d0683bced232d',1,0),(6,'a','a',1,1),(7,'a','a',1,1),(8,'a','a',1,1),(9,'a','a',1,1),(10,'a','a',1,1),(11,'a','a',1,1),(12,'a','a',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `csm`
--

USE `csm`;

--
-- Final view structure for view `staff_short`
--

/*!50001 DROP VIEW IF EXISTS `staff_short`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`csm`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `staff_short` AS (select `staff_members`.`staffid` AS `staffid`,concat(trim(substring_index(`staff_members`.`surname`,_latin1'(',1)),_latin1', ',substring_index(`staff_members`.`forename`,_latin1' ',-(1))) AS `name` from `staff_members` where ((`staff_members`.`surname` <> _latin1'ASSIGNED') and (`staff_members`.`surname` <> _latin1'LECTURED'))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-03 19:56:46
