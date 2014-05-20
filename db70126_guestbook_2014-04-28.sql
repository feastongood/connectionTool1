# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: internal-db.s70126.gridserver.com (MySQL 5.1.63-rel13.4)
# Database: db70126_guestbook
# Generation Time: 2014-04-29 00:39:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Events`;

CREATE TABLE `Events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `theme` varchar(255) NOT NULL DEFAULT '',
  `speaker` varchar(355) NOT NULL DEFAULT '',
  `date` varchar(255) NOT NULL DEFAULT 'DATE',
  `time` varchar(255) NOT NULL DEFAULT '',
  `venue` varchar(255) NOT NULL DEFAULT '',
  `address1` varchar(255) NOT NULL DEFAULT '',
  `address2` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL DEFAULT '',
  `state` varchar(255) NOT NULL DEFAULT '',
  `zip` varchar(255) NOT NULL DEFAULT '',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Events` WRITE;
/*!40000 ALTER TABLE `Events` DISABLE KEYS */;

INSERT INTO `Events` (`id`, `name`, `theme`, `speaker`, `date`, `time`, `venue`, `address1`, `address2`, `city`, `state`, `zip`, `dateCreated`)
VALUES
	(1,'Feast NYC','Empathy','Nancy Lublin','2014-02-22','6-8 pm ','Wild','320 W21st St','','NY','NY','10012','2014-03-04 17:18:03'),
	(2,'The Feast Worldwide NYC Dinner','All Hands On Deck','Courtney Baxter','2014-03-23','5:30 - 8:30pm','The Wooly','11 Barclay Street','','NY','NY','10007','2014-03-14 16:05:37');

/*!40000 ALTER TABLE `Events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Guests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Guests`;

CREATE TABLE `Guests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL DEFAULT '',
  `lname` varchar(255) NOT NULL DEFAULT '',
  `company` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `twitter` varchar(25) NOT NULL DEFAULT '',
  `location` varchar(255) NOT NULL DEFAULT '',
  `what` varchar(255) NOT NULL DEFAULT '',
  `why` varchar(255) NOT NULL DEFAULT '',
  `question` varchar(255) NOT NULL DEFAULT '',
  `event` int(25) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Guests` WRITE;
/*!40000 ALTER TABLE `Guests` DISABLE KEYS */;

INSERT INTO `Guests` (`id`, `fname`, `lname`, `company`, `email`, `twitter`, `location`, `what`, `why`, `question`, `event`, `avatar`, `dateCreated`)
VALUES
	(1,'Caroline','Scheinfeld','3WCircle','caroline@test.com','3WCircle','NY','am the founder and CEO of 3WCircle. A platform to redefine success, happiness and connection. ','I want to inspire women to connect authentically and realize they are not in alone in their life journeys. ','I want to inspire women to connect authentically and realize they are not in alone in their life journeys. ',1,'','2014-03-04 17:21:35'),
	(2,'Cara','Murphy','Conscious Magazine','cara@test.com','cmurphs12','NY','work at a type 1 diabetes nonprofit, an entrepreneur startup, and Conscious Magazine','why do you have to choose only one job? ','How can I fit more travel into my life?',1,'','2014-03-04 17:22:23'),
	(3,'Tash','Wong','Coastermatic','meilun@gmail.com','tashwong','United States','build with 0s and 1s','it\'s fun','When will I get to go to Mars?',1,'','2014-03-10 15:35:11'),
	(9,'Karen','Baker','The Feast','karen@feastongood.com','karenebaker','Brooklyn','create engaging dinner parties','I believe when people come together, magic happens','How do you create intimacy between total strangers at a dinner party? ',1,'','2014-03-17 08:59:24'),
	(18,'Katherine','Fisher','Gorilla Group','kate@katherine-fisher.com','lady__fisher','New York','design','interactions that occur around us is something that has great power when harnessed, and design principles, when applied, can be the spark','Design principles can be embodied and practiced \"non-designers\". How do we connect these different non-designers who follow Design thinking in their respective mediums so that we can become better mentors to one another?',2,'http://pbs.twimg.com/profile_images/427273632838991872/ypwqXv0G_bigger.jpeg','2014-03-18 11:11:54'),
	(10,'Jerri','Chou','The Feast','jerrichou@gmail.com','jchou','United States','bring people together to change the world','I want them to realize how powerful they really are together','how to connect people offline',1,'','2014-03-17 09:23:18'),
	(11,'Jerri','Chou','The Feast','jerrichou@gmail.com','jchou','United States','bring people together to change the world','I want them to realize how powerful they really are together','how to connect people offline',1,'http://pbs.twimg.com/profile_images/378800000052662950/e80254225099c4ef087ef7f063f5a91d_bigger.jpeg','2014-03-17 09:34:54'),
	(17,'Brittany','Wong','BW','something@feastongood.com','davidbellona','SF','am a doctor','i like to fix sick people','where do i get my white coat cleaned?',1,'http://pbs.twimg.com/profile_images/378800000826450358/0afcb961aa8f57110a4bd1714298680f_bigger.jpeg','2014-03-17 22:24:42'),
	(16,'David','Bellona','Twitter','tash@coastermatic.com','davidbellona','SF','make cool stuff at twitter','i like it','testing this tool',1,'http://pbs.twimg.com/profile_images/378800000052662950/e80254225099c4ef087ef7f063f5a91d_bigger.jpeg','2014-03-17 22:21:26'),
	(19,'Ariel','Kennan','','amkennan@gmail.com','arielmai','Brooklyn, NY','design technology in public spaces','everyone deserves dignified, intuitive experiences.','How do you get government to embrace design?',2,'http://pbs.twimg.com/profile_images/2263361105/an_bigger.jpg','2014-03-18 11:25:15'),
	(20,'Alana','Range','Radish Lab','alana@radishlab.com','radishlab','Brooklyn','use design to solve problems','the world needs simpler solutions to complicated problems.','Believing spring is something that happens in New York.',2,'http://pbs.twimg.com/profile_images/378800000250517273/00c4d9c63a631d898302f8d22151c1f7_bigger.png','2014-03-18 12:44:33'),
	(21,'Colleen','Hammond','Tribeca Film Institute','chammond@tribecafilminstitute.org','tribecafilmins','New York','champion diverse and exceptional storytellers','they have the power to humanize issues and be catalysts for change in their communities and around the world.','Not enough hours in the day!',2,'http://pbs.twimg.com/profile_images/378800000054919044/5434d03b2db131d814c5652760c2ab94_bigger.jpeg','2014-03-18 13:00:47'),
	(22,'Allie','Hoffman','Special Projects','allie.hoffman@gmail.com','alliepostpari','NYC','work in media','I believe in the power of media when combined w art & activism.','Staying consistently caffeinated. ',2,'http://pbs.twimg.com/profile_images/2329531045/9svn4tr0al4lurj4ni3g_bigger.jpeg','2014-03-18 13:02:23'),
	(23,'Courtney','Baxter','The OpEd Project','court@theopedproject.org','cbaxter27','New york','live/breath/sleep The OpEd Project','I believe that a world with the best ideas is not only an incredibly important mission, but also completely feasible. ','Creating a strong, thriving and distinctive organizational culture when almost everyone in our orbit is virtual. ',2,'http://pbs.twimg.com/profile_images/378800000723118823/c072e3d5f573cbc3491df8b2715b4b81_bigger.jpeg','2014-03-18 13:23:58'),
	(24,'Fatimah','Williams Castro','Beyond the Tenure Track','fatimahphd@gmail.com','fatimahphd','New York','train PhDs in career and personal development','high un- and underemployment rates among PhD holders.','How do I break down my big ideas into short articles, op-eds, guest blog posts? How do I strike the consistent tone across my diverse audiences?',2,'http://pbs.twimg.com/profile_images/3581571971/5ea561b54ec45cfc6f24785ae0e574cb_bigger.jpeg','2014-03-18 13:41:01'),
	(25,'Daria','Siegel','LaunchLM','dsiegel@downtownny.com','Launch_LM','New York City','economic development','I love NYC.','How to inspire action and build community?',2,'http://pbs.twimg.com/profile_images/378800000302977171/b02a25df0156a2be87c20731f551a8b6_bigger.jpeg','2014-03-18 14:59:11'),
	(26,'Adi','Herzberg ','Credit Suisse','adi.herzberg@gmail.com','','New York','am an attorney','I enjoy being a trusted advisor to people.','Figuring out how to make the most out of each day. ',2,'','2014-03-18 15:18:14'),
	(27,'Jeremy','Yap','Unemployed','jermyap@yahoo.com','jermyap','London','invest in start-ups','I constantly meet and get inspired by brilliant people.','Building legitimacy/intimacy in/with a city like New York (i just got here).',2,'http://pbs.twimg.com/profile_images/2401275940/9i0hkfvz5d1qd4nhonwm_bigger.jpeg','2014-03-18 15:53:56'),
	(28,'Rebecca','Chin','Startup Institute','rebecca@startupinstitute.com','rebeccaKchin','New York City','help people find a career they love','our time is valuable and true passion makes joy.','How to build a lasting community among 40-60 strangers in 8 weeks?',2,'http://pbs.twimg.com/profile_images/3117200902/16bb1a3d203eb65a5c18c7c89e386d6b_bigger.jpeg','2014-03-18 16:21:29'),
	(29,'Candice','Cook Simmons','The Cook Law Group, PLLC','candicescook@hotmail.com','CandiceSC1','New York','am passionate about assisting others in the execution of innovative products and programs  designed to inspire, encourage, and influence for the better','I find that there is a true value in supporting the growth of those who are willing to make a difference for the betterment of others. ','Monitoring the best way to scale without depreciating the value propositions of the work that we do internationally.',2,'http://pbs.twimg.com/profile_images/1427181608/DSC_1061_bigger.jpg','2014-03-19 13:32:13'),
	(30,'Tristan','Harris','Google','tristanh@gmail.com','tristanharris','New York','work on design ethics at Google','I want technology to amplify human potential, not amuse people to death.','How to influence change throughout an entire industry (technology), and change conversation.',2,'http://pbs.twimg.com/profile_images/1896031954/image1331716539_bigger.png','2014-03-19 13:46:43'),
	(31,'Jaya','Kollu','IQPC','jskollu@gmail.com','','New York, NY','am a conference producer','I love bringing people together for the purpose of intelligent conversation.','How do you get people to say \"yes\" when they have no idea who you are?',2,'','2014-03-19 13:51:47'),
	(32,'Ronit','Herzfeld','Discover Yourself','ronit@ronitherzfeld.com','rontiherzfeld','New York','am an integral psychotherapist','I am madly in love with humanity and am a passionate student of the human heart, mind and spirit.','Intercepting peoples incessant mind chatter and habitual behavior patterns long enough for us to explore and share our hearts true desires.',2,'','2014-03-19 14:05:56'),
	(33,'Kiley','Lambert','PopTech','kiley@poptech.org','kileylambert','New York City','work for PopTech','I believe in the power of bringing people together to solve problems.','How to maintain momentum and cohesiveness among such a diverse network. Bringing people together for an event is easy. Keeping them going is hard.',2,'http://pbs.twimg.com/profile_images/1304762747/surprised_baby_bigger.jpg','2014-03-19 14:08:51'),
	(34,'Andy','Cavatorta','http://andycavatorta.com','hellyeah@media.mit.edu','andycavatorta','Brooklyn','invent','I\'m excited about what I imagine.','Transitioning from work I love into my life\'s work.',2,'http://pbs.twimg.com/profile_images/2871111755/bcb78e35160714ea60292478f661feba_bigger.jpeg','2014-03-19 14:23:19'),
	(35,'Megan','Hannum','FundedBuy ','megan@fundedbuy.com','meganhannum','New York ','BD and Investor Relations at FundedBuy & New Role with Comcast Ventures','I love helping passionate people build & operate businesses. ','Managing my schedule & energy to be present with each person I meet with. ',2,'http://pbs.twimg.com/profile_images/3459581640/092378c1bd63660739a7e89fef103d08_bigger.jpeg','2014-03-19 14:25:14'),
	(36,'Bekka','Palmer','Bekka Palmer','hello@bekkapalmer.com','bekkapalmer','Brooklyn','take photos','it feels right.','Finding more projects I care about.',2,'http://pbs.twimg.com/profile_images/2975641877/5bdaedf9d7026be5aa8fb6901b5c1923_bigger.jpeg','2014-03-19 14:38:19'),
	(37,'Dinorah','Matias-Melendez','DMM Studio LLC','dinotias@rocketmail.com','dimm07','New York City','create inspiring & sustainable designs for you to live a happier life','great architecture & landscaping can be more powerful when is done  w/a holistic approach that protects the environment.','Not finding an easy way (with a limited budget) to learn and keep updated about all the materials that are REALLY green for construction purposes.',2,'http://pbs.twimg.com/profile_images/378800000858986943/DoFT5Pmt_bigger.jpeg','2014-03-19 14:42:02'),
	(38,'Mik','Pozin','Alliance for Downtown New York','mp.@pozin@gmail.com','MikPozin','New York','read, write, consume, synthesize, inspire, and am endlessly humbled','this ol\' pale blue dot is chockfull of folks making it smaller, better, and more compassionate.','Getting the world we created for ourselves to be more in sync with the world from which we found ourselves created.',2,'https://pbs.twimg.com/profile_images/1367810050/197470_1392649420228_1351920736_31486077_4233775_n_bigger.jpg','2014-03-19 15:34:26'),
	(39,'Tira','Harpaz','CollegeBound Advice','tira.harpaz@gmail.com','nycleanin','New York City','work with kids','I love having an impact on future generations.','Reinventing myself and getting a wider audience.',2,'http://pbs.twimg.com/profile_images/3533321589/23b933c9610cb13f5b18e5db81df23ef_bigger.jpeg','2014-03-19 15:43:49'),
	(40,'Carlo','Nerko','Nerko & Nerko, Inc.','NerkoandNerko@aol.com','','New York, NY','help people solve financial and accounting problems','I feel rewarded when people succeed in life.','Too many clients too little time...work and family balance.',2,'','2014-03-19 18:56:50'),
	(41,'danielle','kayembe','McCann Health','kkayembe@gmail.com','kkayembe','nyc','want to reimagine a world with new paradigms ','humanity is at a critical juncture','how to combine my passions around elevating wellness, women and africa',2,'http://pbs.twimg.com/profile_images/67250413/jane_bikes_bigger.jpg','2014-03-20 13:41:53'),
	(42,'Mary','Dove','Dove Counseling / NYC Lean In','dovecounselingnyc@gmail.com','MaryDoveLCSW','New York','am a psychotherapist and community builder','I love helping people discover their strengths and inner voice to create happier and more productive lives.','I would like to create a place for people to share their stories and inspire each other in order to discover, connect, learn and change.  We are our stories.',2,'http://pbs.twimg.com/profile_images/3486909951/f4a216e6e8c6ca540684e299c9b21130_bigger.png','2014-03-22 06:23:34'),
	(43,'ElizDziuk','ElizDziuk','NmmfDTKgsKNuB','',', <a href=\"http://dfssdf\"','New York','tPktPuEVzxFmHH','bEHhEXcAWCEGxv','http://dfsdfxwwww',0,'','2014-04-20 17:12:19');

/*!40000 ALTER TABLE `Guests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table publicids
# ------------------------------------------------------------

DROP TABLE IF EXISTS `publicids`;

CREATE TABLE `publicids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `public_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
