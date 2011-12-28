DROP TABLE IF EXISTS sebicms_admin_master;

CREATE TABLE `sebicms_admin_master` (
  `admin_master_id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '1',
  `created_by` int(2) DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(2) DEFAULT '1',
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_master_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_admin_master VALUES("1","rajan","Rajan@123","Rajan","Rawal","rajan.rawal@ithinkinfotehc.com","temp","0","1","2011-12-12 12:12:12","1","2011-12-12 10:17:59","1","0");
INSERT INTO sebicms_admin_master VALUES("2","shahid","shahid@123","Shahid","Ahmed","shahid.ahmed@ithinkinfotech.com","temp","0","1","2011-12-15 14:54:40","1","2011-12-15 14:54:58","1","0");



DROP TABLE IF EXISTS sebicms_album_master;

CREATE TABLE `sebicms_album_master` (
  `album_master_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `default_image_id` int(5) DEFAULT '0',
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`album_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_album_master VALUES("1","flowers","0","1","2011-12-20 00:00:00","1","2011-12-20 11:58:02","1","0");
INSERT INTO sebicms_album_master VALUES("2","nature","0","1","2011-12-20 00:00:00","1","2011-12-20 12:36:15","1","0");



DROP TABLE IF EXISTS sebicms_blog_master;

CREATE TABLE `sebicms_blog_master` (
  `blog_master_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `date_release` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blog_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_blog_master VALUES("1","American Sentenced to Prison for Insulting Thai Monarchy - Fox News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("2","5 killed in tour helicopter crash near Lake Mead - Fox News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("3","Drug combos could hold off advanced breast cancer, studies say - Los Angeles Times","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("4","Charity founded by former Penn State coach and linked to abuse allegations","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("5","Mexico says Gadhafi son tried to enter country - USA Today","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("6","Police clear Occupy SF in early morning raid - San Jose Mercury News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("7","Wreath-laying ceremony at US Navy Memorial in Washington to mark 70 years","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("8","Pearl Harbor survivors return to ships after death - CBS News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("9","Cuomo Shifted Slowly - Wall Street Journal","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("10","Syria, Egypt and Middle East unrest - live updates - The Guardian","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("11","A moment to remember: Pearl Harbor survivors to disband after 70th anniversary - Detroit Free Press","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("12","Clinton: Syrians must oust Assad, move toward rule of law - Jerusalem Post","Blog edit test","BANGKOK � A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country&#39;s royal family by translating excerpts of a locally banned biography of the king and posting them online. The verdict is the latest so-called lese majeste punishment handed down in the Southeast Asian kingdom, which has come under increasing pressure at home and abroad to reform harsh legislation that critics say is an affront to freedom of expression. The 55-year-old Thai-born American, Joe Gordon, stood calmly with his ankles shackled in an orange prison uniform as the sentence was read out at a Bangkok criminal court. Judge Tawan Rodcharoen said the punishment, initially set at five years, was reduced because Gordon pleaded guilty in October. The sentence was relatively light compared to other recent cases. In November, 61-year-old Amphon Tangnoppakul was sentenced to 20 years in jail for sending four text messages deemed offensive to the crown. Gordon posted links the to banned biography of King Bhumibol Adulyadej several years ago while living in the U.S. state of Colorado, and his case has raised questions about the applicability of Thai law to acts committed by foreigners outside Thailand. Speaking after the verdict, Gordon said, &quot;I am an American citizen, and what happened was in America.&quot; He also said he had no expectation of being let off easy. &quot;This is just the system in Thailand,&quot; he said. Speaking later in Thai, he added: &quot;In Thailand, they put people in prison even if they don&#39;t have proof.&quot; Gordon had lived in the U.S. for about 30 years. He was detained in late May during a visit to his native country to seek treatment for arthritis and high blood pressure. After being repeatedly denied bail, he pleaded guilty in October in hopes of obtaining a lenient sentence. Thailand&#39;s lese majeste laws are the harshest in the world. They mandate that people found guilty of defaming the monarchy -- including the king, the queen and the heir to the throne -- face three to 15 years behind bars. The nation&#39;s 2007 Computer Crimes Act also contains provisions that have enabled prosecutors to increase lese majeste sentences. Read more: http://www.foxnews.com/world/2011/12/08/american-sentenced-to-prison-for-insulting-thai-monarchy/#ixzz1fwB1C61E ","2011-12-09 12:00:00","1","2011-12-08 13:12:40","2","2011-12-16 05:51:06","1","0");
INSERT INTO sebicms_blog_master VALUES("13","BP accuses Halliburton of destroying evidence in Gulf oil spill case - Washington Post","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_blog_master VALUES("14","Add New Blog Test","New blog","<em><strong>New blog text goes here..</strong></em>","2011-12-16 12:00:00","2","2011-12-16 00:00:00","2","2011-12-19 15:24:26","1","1");



DROP TABLE IF EXISTS sebicms_gallery_master;

CREATE TABLE `sebicms_gallery_master` (
  `gallery_master_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `album_master_id` int(3) NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gallery_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_gallery_master VALUES("13","Golden_Gate","4ef18a3db1fd4.jpg","1","1","2011-12-21 12:56:56","1","2011-12-21 12:56:56","1","0");
INSERT INTO sebicms_gallery_master VALUES("14","Cha Teau 5","1324475497.jpg","1","1","2011-12-21 12:56:59","1","2011-12-21 19:21:38","1","0");
INSERT INTO sebicms_gallery_master VALUES("15","turquie","4ef18e233c469.jpg","1","1","2011-12-21 01:13:34","1","2011-12-21 13:13:34","1","0");
INSERT INTO sebicms_gallery_master VALUES("16","venise","4ef18e2670b59.jpg","1","1","2011-12-21 01:13:37","1","2011-12-21 13:13:37","1","0");
INSERT INTO sebicms_gallery_master VALUES("17","village1","4ef18e29c8cd7.jpg","1","1","2011-12-21 01:13:40","1","2011-12-21 13:13:40","1","0");
INSERT INTO sebicms_gallery_master VALUES("18","Ajeeb Name","1324474865.jpg","2","1","2011-12-21 02:49:38","1","2011-12-21 14:49:38","1","0");
INSERT INTO sebicms_gallery_master VALUES("19","BruggeCanal","4ef1a4ab197e1.jpg","2","1","2011-12-21 02:49:42","1","2011-12-21 14:49:42","1","0");
INSERT INTO sebicms_gallery_master VALUES("20","buildings1","4ef1a4ae4dc7b.jpg","2","1","2011-12-21 02:49:45","1","2011-12-21 14:49:45","1","0");
INSERT INTO sebicms_gallery_master VALUES("21","buildings2","4ef1a4b18376a.jpg","2","1","2011-12-21 02:49:48","1","2011-12-21 14:49:48","1","0");
INSERT INTO sebicms_gallery_master VALUES("22","buildings3","4ef1a4b4b8f2a.jpg","2","1","2011-12-21 02:49:51","1","2011-12-21 14:49:51","1","0");
INSERT INTO sebicms_gallery_master VALUES("23","chateau1","4ef1a4b7ee7aa.jpg","2","1","2011-12-21 02:49:54","1","2011-12-21 14:49:55","1","0");



DROP TABLE IF EXISTS sebicms_group_master;

CREATE TABLE `sebicms_group_master` (
  `group_master_id` int(2) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `date_release` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_delete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`group_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_group_master VALUES("1","Default_group","2011-12-20 16:02:14","1","0");
INSERT INTO sebicms_group_master VALUES("2","Readers","2011-12-20 16:02:14","1","0");
INSERT INTO sebicms_group_master VALUES("3","my group edit","","1","1");
INSERT INTO sebicms_group_master VALUES("4","my dsaf","","1","1");
INSERT INTO sebicms_group_master VALUES("5","dsfa sfs","","1","1");
INSERT INTO sebicms_group_master VALUES("6","group 2","","1","1");
INSERT INTO sebicms_group_master VALUES("7","group 3","","1","1");



DROP TABLE IF EXISTS sebicms_group_subscriber_mapper;

CREATE TABLE `sebicms_group_subscriber_mapper` (
  `gs_mapper_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Group subscriber mapping table',
  `group_id` int(2) NOT NULL,
  `subscriber_id` int(5) NOT NULL,
  PRIMARY KEY (`gs_mapper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_group_subscriber_mapper VALUES("1","1","1");
INSERT INTO sebicms_group_subscriber_mapper VALUES("2","1","2");
INSERT INTO sebicms_group_subscriber_mapper VALUES("3","1","3");
INSERT INTO sebicms_group_subscriber_mapper VALUES("4","1","4");
INSERT INTO sebicms_group_subscriber_mapper VALUES("5","1","5");
INSERT INTO sebicms_group_subscriber_mapper VALUES("6","2","6");
INSERT INTO sebicms_group_subscriber_mapper VALUES("7","2","7");
INSERT INTO sebicms_group_subscriber_mapper VALUES("8","2","8");
INSERT INTO sebicms_group_subscriber_mapper VALUES("10","2","10");
INSERT INTO sebicms_group_subscriber_mapper VALUES("11","2","11");
INSERT INTO sebicms_group_subscriber_mapper VALUES("12","1","6");
INSERT INTO sebicms_group_subscriber_mapper VALUES("13","1","7");
INSERT INTO sebicms_group_subscriber_mapper VALUES("14","2","3");
INSERT INTO sebicms_group_subscriber_mapper VALUES("15","2","4");
INSERT INTO sebicms_group_subscriber_mapper VALUES("16","2","2");
INSERT INTO sebicms_group_subscriber_mapper VALUES("17","2","5");



DROP TABLE IF EXISTS sebicms_news_master;

CREATE TABLE `sebicms_news_master` (
  `news_master_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `date_release` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_news_master VALUES("1","American Sentenced to Prison for Insulting Thai Monarchy - Fox News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("2","5 killed in tour helicopter crash near Lake Mead - Fox News","","BANGKOK&nbsp; A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country&#39;s royal family by translating excerpts of a locally banned biography of the king and posting them online. The verdict is the latest so-called lese majeste punishment handed down in the Southeast Asian kingdom, which has come under increasing pressure at home and abroad to reform harsh legislation that critics say is an affront to freedom of expression. The 55-year-old Thai-born American, Joe Gordon, stood calmly with his ankles shackled in an orange prison uniform as the sentence was read out at a Bangkok criminal court. Judge Tawan Rodcharoen said the punishment, initially set at five years, was reduced because Gordon pleaded guilty in October. The sentence was relatively light compared to other recent cases. In November, 61-year-old Amphon Tangnoppakul was sentenced to 20 years in jail for sending four text messages deemed offensive to the crown. Gordon posted links the to banned biography of King Bhumibol Adulyadej several years ago while living in the U.S. state of Colorado, and his case has raised questions about the applicability of Thai law to acts committed by foreigners outside Thailand. Speaking after the verdict, Gordon said, &quot;I am an American citizen, and what happened was in America.&quot; He also said he had no expectation of being let off easy. &quot;This is just the system in Thailand,&quot; he said. Speaking later in Thai, he added: &quot;In Thailand, they put people in prison even if they don&#39;t have proof.&quot; Gordon had lived in the U.S. for about 30 years. He was detained in late May during a visit to his native country to seek treatment for arthritis and high blood pressure. After being repeatedly denied bail, he pleaded guilty in October in hopes of obtaining a lenient sentence. Thailand&#39;s lese majeste laws are the harshest in the world. They mandate that people found guilty of defaming the monarchy -- including the king, the queen and the heir to the throne -- face three to 15 years behind bars. The nation&#39;s 2007 Computer Crimes Act also contains provisions that have enabled prosecutors to increase lese majeste sentences. Read more: http://www.foxnews.com/world/2011/12/08/american-sentenced-to-prison-for-insulting-thai-monarchy/#ixzz1fwB1C61E ","news_1324275656.jpg","2011-12-09 12:00:00","1","2011-12-08 13:12:40","1","2011-12-19 12:43:34","1","0");
INSERT INTO sebicms_news_master VALUES("3","Drug combos could hold off advanced breast cancer, studies say - Los Angeles Times","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("4","Charity founded by former Penn State coach and linked to abuse allegations","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("5","Mexico says Gadhafi son tried to enter country - USA Today","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("6","Police clear Occupy SF in early morning raid - San Jose Mercury News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("7","Wreath-laying ceremony at US Navy Memorial in Washington to mark 70 years","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("8","Pearl Harbor survivors return to ships after death - CBS News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("9","Cuomo Shifted Slowly - Wall Street Journal","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("10","Syria, Egypt and Middle East unrest - live updates - The Guardian","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("11","A moment to remember: Pearl Harbor survivors to disband after 70th anniversary - Detroit Free Press","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_news_master VALUES("12","Zend: Where can i place custom classes in zend folder structure?","Rajan Sub Title","This is the sample content for <strong>news</strong>","table.JPG","2012-01-01 12:00:00","1","2011-12-08 13:12:40","1","2011-12-19 12:43:34","1","0");
INSERT INTO sebicms_news_master VALUES("13","BP accuses Halliburton of destroying evidence in Gulf oil spill case - Washington Post","","http://www.google.com#Rajana-Rawal<br />
INSERT INTO sebicms_news_master VALUES("14","This is Newly Updated news","Breaking news","Madhuri Dikshit is about to launch a <span style=\"color:#ff0000;\"><strong>new channel</strong></span>","news_1324443168.jpg","2013-12-01 12:00:00","1","2011-12-16 00:00:00","1","2011-12-21 10:22:48","1","0");
INSERT INTO sebicms_news_master VALUES("15","Rick Perry compares himself to Tim Tebow at Iowa debate - Los Angeles Times","","Perry has courted those voters with increasing frequency, releasing a controversial campaign ad last week that objected to service in the armed forces by openly gay men and women.&nbsp; Tebow, a former <a class=\"taxInlineTagLink\" href=\"http://www.latimes.com/topic/sports/football/college-football/heisman-trophy-EVSPR000087.topic\" id=\"EVSPR000087\" title=\"Heisman Trophy\">Heisman Trophy</a>-winning quarterback for the University of Florida, is widely known to be a born-again Christian.","news_1324042319.jpg","2013-12-02 12:00:00","1","2011-12-16 00:00:00","1","2011-12-19 15:21:38","1","1");



DROP TABLE IF EXISTS sebicms_newsletter_master;

CREATE TABLE `sebicms_newsletter_master` (
  `news_letter_master_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `date_release` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_letter_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_newsletter_master VALUES("1","American Sentenced to Prison for Insulting Thai Monarchy - Fox News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("2","5 killed in tour helicopter crash near Lake Mead - Fox News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("3","Drug combos could hold off advanced breast cancer, studies say - Los Angeles Times","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("4","Charity founded by former Penn State coach and linked to abuse allegations","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("5","Mexico says Gadhafi son tried to enter country - USA Today","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("6","Police clear Occupy SF in early morning raid - San Jose Mercury News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("7","Wreath-laying ceremony at US Navy Memorial in Washington to mark 70 years","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("8","Pearl Harbor survivors return to ships after death - CBS News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("9","Cuomo Shifted Slowly - Wall Street Journal","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("10","Syria, Egypt and Middle East unrest - live updates - The Guardian","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("11","A moment to remember: Pearl Harbor survivors to disband after 70th anniversary - Detroit Free Press","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_newsletter_master VALUES("12","edit Clinton: Syrians must oust Assad, move toward rule of law - Jerusalem Post ","test da df sdfsdf","BANGKOK � A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country&#39;s royal family by translating excerpts of a locally banned biography of the king and posting them online. The verdict is the latest so-called lese majeste punishment handed down in the Southeast Asian kingdom, which has come under increasing pressure at home and abroad to reform harsh legislation that critics say is an affront to freedom of expression. The 55-year-old Thai-born American, Joe Gordon, stood calmly with his ankles shackled in an orange prison uniform as the sentence was read out at a Bangkok criminal court. Judge Tawan Rodcharoen said the punishment, initially set at five years, was reduced because Gordon pleaded guilty in October. The sentence was relatively light compared to other recent cases. In November, 61-year-old Amphon Tangnoppakul was sentenced to 20 years in jail for sending four text messages deemed offensive to the crown. Gordon posted links the to banned biography of King Bhumibol Adulyadej several years ago while living in the U.S. state of Colorado, and his case has raised questions about the applicability of Thai law to acts committed by foreigners outside Thailand. Speaking after the verdict, Gordon said, &quot;I am an American citizen, and what happened was in America.&quot; He also said he had no expectation of being let off easy. &quot;This is just the system in Thailand,&quot; he said. Speaking later in Thai, he added: &quot;In Thailand, they put people in prison even if they don&#39;t have proof.&quot; Gordon had lived in the U.S. for about 30 years. He was detained in late May during a visit to his native country to seek treatment for arthritis and high blood pressure. After being repeatedly denied bail, he pleaded guilty in October in hopes of obtaining a lenient sentence. Thailand&#39;s lese majeste laws are the harshest in the world. They mandate that people found guilty of defaming the monarchy -- including the king, the queen and the heir to the throne -- face three to 15 years behind bars. The nation&#39;s 2007 Computer Crimes Act also contains provisions that have enabled prosecutors to increase lese majeste sentences. Read more: http://www.foxnews.com/world/2011/12/08/american-sentenced-to-prison-for-insulting-thai-monarchy/#ixzz1fwB1C61E ","2011-12-20 12:00:00","1","2011-12-08 13:12:40","2","2011-12-20 11:32:40","1","0");
INSERT INTO sebicms_newsletter_master VALUES("13","BP accuses Halliburton of destroying evidence in Gulf oil spill case - Washington Post","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.



DROP TABLE IF EXISTS sebicms_page_master;

CREATE TABLE `sebicms_page_master` (
  `page_master_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `date_release` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_page_master VALUES("1","American Sentenced to Prison for Insulting Thai Monarchy - Fox News","American Sentenced to Prison for Insulting Thai Monarchy - Fox News","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("2","5 killed in tour helicopter crash near Lake Mead - Fox News","5 killed in tour helicopter crash near Lake Mead - Fox News","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("3","Drug combos could hold off advanced breast cancer, studies say - Los Angeles Times","Drug combos could hold off advanced breast cancer, studies say - Los Angeles Times","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("4","Charity founded by former Penn State coach and linked to abuse allegations","Charity founded by former Penn State coach and linked to abuse allegations","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("5","Mexico says Gadhafi son tried to enter country - USA Today","Mexico says Gadhafi son tried to enter country - USA Today","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("6","Police clear Occupy SF in early morning raid - San Jose Mercury News","Police clear Occupy SF in early morning raid - San Jose Mercury News","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("7","Wreath-laying ceremony at US Navy Memorial in Washington to mark 70 years","Wreath-laying ceremony at US Navy Memorial in Washington to mark 70 years","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("8","Pearl Harbor survivors return to ships after death - CBS News","Pearl Harbor survivors return to ships after death - CBS News","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("9","Cuomo Shifted Slowly - Wall Street Journal","Cuomo Shifted Slowly - Wall Street Journal","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("10","Syria, Egypt and Middle East unrest - live updates - The Guardian","Syria, Egypt and Middle East unrest - live updates - The Guardian","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("11","A moment to remember: Pearl Harbor survivors to disband after 70th anniversary - Detroit Free Press","A moment to remember: Pearl Harbor survivors to disband after 70th anniversary - Detroit Free Press","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_page_master VALUES("12","Clinton","Clinton: Syrians must oust Assad, move toward rule of law - Jerusalem Post","BANGKOK � A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country&#39;s royal family by translating excerpts of a locally banned biography of the king and posting them online. The verdict is the latest so-called lese majeste punishment handed down in the Southeast Asian kingdom, which has come under increasing pressure at home and abroad to reform harsh legislation that critics say is an affront to freedom of expression. The 55-year-old Thai-born American, Joe Gordon, stood calmly with his ankles shackled in an orange prison uniform as the sentence was read out at a Bangkok criminal court. Judge Tawan Rodcharoen said the punishment, initially set at five years, was reduced because Gordon pleaded guilty in October. The sentence was relatively light compared to other recent cases. In November, 61-year-old Amphon Tangnoppakul was sentenced to 20 years in jail for sending four text messages deemed offensive to the crown. Gordon posted links the to banned biography of King Bhumibol Adulyadej several years ago while living in the U.S. state of Colorado, and his case has raised questions about the applicability of Thai law to acts committed by foreigners outside Thailand. Speaking after the verdict, Gordon said, &quot;I am an American citizen, and what happened was in America.&quot; He also said he had no expectation of being let off easy. &quot;This is just the system in Thailand,&quot; he said. Speaking later in Thai, he added: &quot;In Thailand, they put people in prison even if they don&#39;t have proof.&quot; Gordon had lived in the U.S. for about 30 years. He was detained in late May during a visit to his native country to seek treatment for arthritis and high blood pressure. After being repeatedly denied bail, he pleaded guilty in October in hopes of obtaining a lenient sentence. Thailand&#39;s lese majeste laws are the harshest in the world. They mandate that people found guilty of defaming the monarchy -- including the king, the queen and the heir to the throne -- face three to 15 years behind bars. The nation&#39;s 2007 Computer Crimes Act also contains provisions that have enabled prosecutors to increase lese majeste sentences. Read more: http://www.foxnews.com/world/2011/12/08/american-sentenced-to-prison-for-insulting-thai-monarchy/#ixzz1fwB1C61E ","sample.jpg","2011-12-08 13:12:50","1","2011-12-08 13:12:40","2","2011-12-19 18:20:20","1","1");
INSERT INTO sebicms_page_master VALUES("13","BP accuses Halliburton of destroying evidence in Gulf oil spill case - Washington Post","BP accuses Halliburton of destroying evidence in Gulf oil spill case - Washington Post","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.



DROP TABLE IF EXISTS sebicms_press_master;

CREATE TABLE `sebicms_press_master` (
  `press_master_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `date_release` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_by` int(2) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`press_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_press_master VALUES("1","American Sentenced to Prison for Insulting Thai Monarchy - Fox News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("2","5 killed in tour helicopter crash near Lake Mead - Fox News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("3","Drug combos could hold off advanced breast cancer, studies say - Los Angeles Times","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("4","Charity founded by former Penn State coach and linked to abuse allegations","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("5","Mexico says Gadhafi son tried to enter country - USA Today","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("6","Police clear Occupy SF in early morning raid - San Jose Mercury News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("7","Wreath-laying ceremony at US Navy Memorial in Washington to mark 70 years","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("8","Pearl Harbor survivors return to ships after death - CBS News","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("9","Cuomo Shifted Slowly - Wall Street Journal","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.
INSERT INTO sebicms_press_master VALUES("10","Syria, Egypt and Middle East unrest - live updates - The Guardian","","BANGKOK � A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country&#39;s royal family by translating excerpts of a locally banned biography of the king and posting them online. The verdict is the latest so-called lese majeste punishment handed down in the Southeast Asian kingdom, which has come under increasing pressure at home and abroad to reform harsh legislation that critics say is an affront to freedom of expression. The 55-year-old Thai-born American, Joe Gordon, stood calmly with his ankles shackled in an orange prison uniform as the sentence was read out at a Bangkok criminal court. Judge Tawan Rodcharoen said the punishment, initially set at five years, was reduced because Gordon pleaded guilty in October. The sentence was relatively light compared to other recent cases. In November, 61-year-old Amphon Tangnoppakul was sentenced to 20 years in jail for sending four text messages deemed offensive to the crown. Gordon posted links the to banned biography of King Bhumibol Adulyadej several years ago while living in the U.S. state of Colorado, and his case has raised questions about the applicability of Thai law to acts committed by foreigners outside Thailand. Speaking after the verdict, Gordon said, &quot;I am an American citizen, and what happened was in America.&quot; He also said he had no expectation of being let off easy. &quot;This is just the system in Thailand,&quot; he said. Speaking later in Thai, he added: &quot;In Thailand, they put people in prison even if they don&#39;t have proof.&quot; Gordon had lived in the U.S. for about 30 years. He was detained in late May during a visit to his native country to seek treatment for arthritis and high blood pressure. After being repeatedly denied bail, he pleaded guilty in October in hopes of obtaining a lenient sentence. Thailand&#39;s lese majeste laws are the harshest in the world. They mandate that people found guilty of defaming the monarchy -- including the king, the queen and the heir to the throne -- face three to 15 years behind bars. The nation&#39;s 2007 Computer Crimes Act also contains provisions that have enabled prosecutors to increase lese majeste sentences. Read more: http://www.foxnews.com/world/2011/12/08/american-sentenced-to-prison-for-insulting-thai-monarchy/#ixzz1fwB1C61E ","2011-12-08 12:00:00","1","2011-12-08 13:12:40","2","2011-12-19 06:39:07","1","0");
INSERT INTO sebicms_press_master VALUES("11","A moment to remember: Pearl Harbor survivors to disband after 70th anniversary - Detroit Free Press","edit dfa sdf dsf dsf","BANGKOK � A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country&#39;s royal family by translating excerpts of a locally banned biography of the king and posting them online. The verdict is the latest so-called lese majeste punishment handed down in the Southeast Asian kingdom, which has come under increasing pressure at home and abroad to reform harsh legislation that critics say is an affront to freedom of expression. The 55-year-old Thai-born American, Joe Gordon, stood calmly with his ankles shackled in an orange prison uniform as the sentence was read out at a Bangkok criminal court. Judge Tawan Rodcharoen said the punishment, initially set at five years, was reduced because Gordon pleaded guilty in October. The sentence was relatively light compared to other recent cases. In November, 61-year-old Amphon Tangnoppakul was sentenced to 20 years in jail for sending four text messages deemed offensive to the crown. Gordon posted links the to banned biography of King Bhumibol Adulyadej several years ago while living in the U.S. state of Colorado, and his case has raised questions about the applicability of Thai law to acts committed by foreigners outside Thailand. Speaking after the verdict, Gordon said, &quot;I am an American citizen, and what happened was in America.&quot; He also said he had no expectation of being let off easy. &quot;This is just the system in Thailand,&quot; he said. Speaking later in Thai, he added: &quot;In Thailand, they put people in prison even if they don&#39;t have proof.&quot; Gordon had lived in the U.S. for about 30 years. He was detained in late May during a visit to his native country to seek treatment for arthritis and high blood pressure. After being repeatedly denied bail, he pleaded guilty in October in hopes of obtaining a lenient sentence. Thailand&#39;s lese majeste laws are the harshest in the world. They mandate that people found guilty of defaming the monarchy -- including the king, the queen and the heir to the throne -- face three to 15 years behind bars. The nation&#39;s 2007 Computer Crimes Act also contains provisions that have enabled prosecutors to increase lese majeste sentences. Read more: http://www.foxnews.com/world/2011/12/08/american-sentenced-to-prison-for-insulting-thai-monarchy/#ixzz1fwB1C61E ","2011-12-08 12:00:00","1","2011-12-08 13:12:40","2","2011-12-19 06:38:09","1","0");
INSERT INTO sebicms_press_master VALUES("12","Clinton: Syrians must oust Assad, move toward rule of law - Jerusalem Post","edit press test","BANGKOK � A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country&#39;s royal family by translating excerpts of a locally banned biography of the king and posting them online. The verdict is the latest so-called lese majeste punishment handed down in the Southeast Asian kingdom, which has come under increasing pressure at home and abroad to reform harsh legislation that critics say is an affront to freedom of expression. The 55-year-old Thai-born American, Joe Gordon, stood calmly with his ankles shackled in an orange prison uniform as the sentence was read out at a Bangkok criminal court. Judge Tawan Rodcharoen said the punishment, initially set at five years, was reduced because Gordon pleaded guilty in October. The sentence was relatively light compared to other recent cases. In November, 61-year-old Amphon Tangnoppakul was sentenced to 20 years in jail for sending four text messages deemed offensive to the crown. Gordon posted links the to banned biography of King Bhumibol Adulyadej several years ago while living in the U.S. state of Colorado, and his case has raised questions about the applicability of Thai law to acts committed by foreigners outside Thailand. Speaking after the verdict, Gordon said, &quot;I am an American citizen, and what happened was in America.&quot; He also said he had no expectation of being let off easy. &quot;This is just the system in Thailand,&quot; he said. Speaking later in Thai, he added: &quot;In Thailand, they put people in prison even if they don&#39;t have proof.&quot; Gordon had lived in the U.S. for about 30 years. He was detained in late May during a visit to his native country to seek treatment for arthritis and high blood pressure. After being repeatedly denied bail, he pleaded guilty in October in hopes of obtaining a lenient sentence. Thailand&#39;s lese majeste laws are the harshest in the world. They mandate that people found guilty of defaming the monarchy -- including the king, the queen and the heir to the throne -- face three to 15 years behind bars. The nation&#39;s 2007 Computer Crimes Act also contains provisions that have enabled prosecutors to increase lese majeste sentences. Read more: http://www.foxnews.com/world/2011/12/08/american-sentenced-to-prison-for-insulting-thai-monarchy/#ixzz1fwB1C61E ","2011-12-22 12:00:00","1","2011-12-08 13:12:40","2","2011-12-19 18:42:31","1","1");
INSERT INTO sebicms_press_master VALUES("13","BP accuses Halliburton of destroying evidence in Gulf oil spill case - Washington Post","","BANGKOK �  A court in Thailand sentenced a U.S. citizen to two and a half years in prison Thursday for defaming the country\'s royal family by translating excerpts of a locally banned biography of the king and posting them online.



DROP TABLE IF EXISTS sebicms_subscriber_master;

CREATE TABLE `sebicms_subscriber_master` (
  `subscriber_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_delete` tinyint(1) DEFAULT '0',
  `created_by` int(2) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(2) DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscriber_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO sebicms_subscriber_master VALUES("1","infoedit@ithinkinfotech.com","info@ithinkinfotech.com","Infoedt","iThink","1","1","","","2","2011-12-22 06:42:24");
INSERT INTO sebicms_subscriber_master VALUES("2","info1@ithinkinfotech.com","info1@ithinkinfotech.com","Info 1","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("3","info2@ithinkinfotech.com","info2@ithinkinfotech.com","Info 2","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("4","info3@ithinkinfotech.com","info3@ithinkinfotech.com","Info 3","iTHink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("5","info4@ithinkinfotech.com","info4@ithinkinfotech.com","Info 4","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("6","info5@ithinkinfotech.com","info5@ithinkinfotech.com","Info 5","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("7","info6@ithinkinfotech.com","info6@ithinkinfotech.com","Info 6","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("8","info7@ithinkinfotech.com","info7@ithinkinfotech.com","Info 7","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("9","info8@ithinkinfotech.com","info8@ithinkinfotech.com","Info 8","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("10","info9@ithinkinfotech.com","info9@ithinkinfotech.com","Info 9","iThink","1","0","","","","");
INSERT INTO sebicms_subscriber_master VALUES("11","info10@ithinkinfotech.com","info10@ithinkinfotech.com","Info 10","iThink","1","0","","","2","2011-12-22 06:33:40");


