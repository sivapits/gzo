#
# Table structure for table 'tx_tntbabygallery_babies'
#
CREATE TABLE  `tx_tntbabygallery_babies` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tstamp` int(11) NOT NULL DEFAULT '0',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `cruser_id` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `hidden` tinyint(4) NOT NULL DEFAULT '0',
  `starttime` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) NOT NULL DEFAULT '0',
  `fe_group` int(11) NOT NULL DEFAULT '0',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `sex` int(11) NOT NULL DEFAULT '0',
  `birthdate` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `imagepath` blob NOT NULL,
  `reserve1` varchar(50) NOT NULL DEFAULT '',
  `reserve2` varchar(50) NOT NULL DEFAULT '',
  `reserve3` varchar(50) NOT NULL DEFAULT '',
  `facebooklike` tinyint(4) NOT NULL DEFAULT '0',
  `googleplus` tinyint(4) NOT NULL DEFAULT '0',
  `twitter` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `parent` (`pid`)
);

#
# Table structure for table 'tx_tntbabygallery_ecardlog'
#
CREATE TABLE  `tx_tntbabygallery_ecardlog` (
  `uid` int(11) NOT NULL,
  `tstamp` int(11) NOT NULL,
  `crdate` int(11) NOT NULL,
  `cruser_id` int(11) NOT NULL,
  `recname` tinytext NOT NULL,
  `recemail` tinytext NOT NULL,
  `message` text NOT NULL,
  `sendername` tinytext NOT NULL,
  `senderemail` tinytext NOT NULL,
  `status` int(11) NOT NULL
);
