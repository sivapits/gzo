#
# Table structure for table 'tx_tntmitarbeiter_domain_model_staff'
#

CREATE TABLE tx_tntmitarbeiter_domain_model_staff (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tx_tntmitarbeiter_cv_data'
#
CREATE TABLE tx_tntmitarbeiter_cv_data (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uid_local` int(11) NOT NULL,
  `pid` int(11) DEFAULT '0' NOT NULL,
  `tstamp` int(11) unsigned DEFAULT '0' NOT NULL,
  `crdate` int(11) unsigned DEFAULT '0' NOT NULL,
  `cruser_id` int(11) unsigned DEFAULT '0' NOT NULL,
  `sys_language_uid` int(11) DEFAULT '0' NOT NULL,
  `l18n_parent` int(11) NOT NULL,
  `l18n_diffsource` tinytext NOT NULL,
  `title` text NOT NULL,
  `cvdata` text NOT NULL,
  `sorting` int(11) NOT NULL,
  `hidden` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
);

#
# Table structure for table 'tx_tntmitarbeiter_persons'
#

CREATE TABLE `tx_tntmitarbeiter_persons` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tstamp` int(11) NOT NULL DEFAULT '0',
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `crdate` int(11) NOT NULL DEFAULT '0',
  `cruser_id` int(11) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `search_atr` tinyint(4) NOT NULL DEFAULT '0',
  `hidden` tinyint(4) NOT NULL DEFAULT '0',
  `sorting` int(10) NOT NULL,
  `sys_language_uid` int(11) NOT NULL DEFAULT '0',
  `l18n_parent` int(11) NOT NULL DEFAULT '0',
  `l18n_diffsource` mediumblob NOT NULL,
  `title` tinytext NOT NULL,
  `first_name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `email` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `function` tinytext NOT NULL,
  `title_text` text NOT NULL,
  `cv` text NOT NULL,
  `documents` tinytext NOT NULL,
  `links` tinytext NOT NULL,
  `movie` tinytext NOT NULL,
  `image_sw` tinytext NOT NULL,
  `image_colour` tinytext NOT NULL,
  `teasertext` text NOT NULL,
  `position` tinytext NOT NULL,
  `department` tinytext NOT NULL,
  `membership` text NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `parent` (`pid`)
); 

#
# Table structure for table 'tx_tntmitarbeiter_departments'
#

CREATE TABLE `tx_tntmitarbeiter_departments` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tstamp` int(11) NOT NULL DEFAULT '0',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `cruser_id` int(11) NOT NULL DEFAULT '0',
  `sorting` int(10) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `hidden` tinyint(4) NOT NULL DEFAULT '0',
  `sys_language_uid` int(11) NOT NULL DEFAULT '0',
  `l18n_parent` int(11) NOT NULL DEFAULT '0',
  `l18n_diffsource` mediumblob NOT NULL,
  `title` tinytext NOT NULL,
  `department_lead` int(11) NOT NULL DEFAULT '0',
  `teammembers` text NOT NULL,
  `infopage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  KEY `parent` (`pid`)
);

#
# Table structure for table 'tx_tntmitarbeiter_departments_mm'
#
CREATE TABLE `tx_tntmitarbeiter_departments_mm` (
  `uid_local` int(11) NOT NULL DEFAULT '0',
  `uid_foreign` int(11) NOT NULL DEFAULT '0',
  `tablenames` varchar(255) NOT NULL DEFAULT '',
  `fieldname` varchar(255) NOT NULL DEFAULT '',
  `sorting` int(11) NOT NULL DEFAULT '0',
  `sorting_foreign` int(11) NOT NULL DEFAULT '0',
  KEY `uid_local_foreign` (`uid_local`,`uid_foreign`),
  KEY `uid_foreign_tablenames` (`uid_foreign`,`tablenames`)
);

#
# Table structure for table 'tx_tntmitarbeiter_membership_data'
#
CREATE TABLE `tx_tntmitarbeiter_membership_data` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uid_local` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `tstamp` int(11) NOT NULL,
  `crdate` int(11) NOT NULL,
  `cruser_id` int(11) NOT NULL,
  `sys_language_uid` int(11) NOT NULL,
  `l18n_parent` int(11) NOT NULL,
  `l18n_diffsource` tinytext NOT NULL,
  `title` text NOT NULL,
  `membership_details` text NOT NULL,
  `sorting` int(11) NOT NULL,
  `hidden` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
);


#
# Table structure for table 'tx_tntmitarbeiter_titletext_data'
#
CREATE TABLE `tx_tntmitarbeiter_titletext_data` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uid_local` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `tstamp` int(11) NOT NULL,
  `crdate` int(11) NOT NULL,
  `cruser_id` int(11) NOT NULL,
  `sys_language_uid` int(11) NOT NULL,
  `l18n_parent` int(11) NOT NULL,
  `l18n_diffsource` tinytext NOT NULL,
  `title` text NOT NULL,
  `title_data` text NOT NULL,
  `sorting` int(11) NOT NULL,
  `hidden` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
);

#
# Table structure for table 'tx_tntmitarbeiter_links'
#

CREATE TABLE `tx_tntmitarbeiter_links` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uid_local` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `tstamp` int(11) NOT NULL,
  `crdate` int(11) NOT NULL,
  `cruser_id` int(11) NOT NULL,
  `sys_language_uid` int(11) NOT NULL,
  `l18n_parent` int(11) NOT NULL,
  `l18n_diffsource` text NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `sorting` int(11) NOT NULL,
  `hidden` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
);

#
# Table structure for table 'tx_tntmitarbeiter_position'
#

CREATE TABLE  `tx_tntmitarbeiter_position` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tstamp` int(11) NOT NULL DEFAULT '0',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `cruser_id` int(11) NOT NULL DEFAULT '0',
  `sorting` int(10) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `hidden` tinyint(4) NOT NULL DEFAULT '0',
  `sys_language_uid` int(11) NOT NULL DEFAULT '0',
  `l18n_parent` int(11) NOT NULL DEFAULT '0',
  `l18n_diffsource` mediumblob NOT NULL,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `parent` (`pid`)
);

#
# Table structure for table 'tx_tntmitarbeiter_videos'
#

CREATE TABLE  `tx_tntmitarbeiter_videos` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uid_local` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `tstamp` int(11) NOT NULL,
  `crdate` int(11) NOT NULL,
  `cruser_id` int(11) NOT NULL,
  `sys_language_uid` int(11) NOT NULL,
  `l18n_parent` int(11) NOT NULL,
  `l18n_diffsource` text NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `sorting` int(11) NOT NULL,
  `hidden` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
);