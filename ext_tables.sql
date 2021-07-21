#
# Table structure for table 'tx_detaktawebsite_domain_model_category'
#
CREATE TABLE tx_detaktawebsite_domain_model_category (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	headline varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	image varchar(255) DEFAULT '' NOT NULL,
	viewname varchar(255) DEFAULT '' NOT NULL,
	dirshortcut varchar(255) DEFAULT '' NOT NULL,
	hasdatasheet tinyint(1) unsigned DEFAULT '0' NOT NULL,
	nameforplugin varchar(255) DEFAULT '' NOT NULL,
	articles int(11) unsigned DEFAULT '0' NOT NULL,

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
# Table structure for table 'tx_detaktawebsite_domain_model_article'
#
CREATE TABLE tx_detaktawebsite_domain_model_article (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	category int(11) unsigned DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	description varchar(255) DEFAULT '' NOT NULL,
	part int(11) DEFAULT '0' NOT NULL,
	position double(11,2) DEFAULT '0.00' NOT NULL,
	approval varchar(255) DEFAULT '' NOT NULL,
	annex varchar(255) DEFAULT '' NOT NULL,
	temperature varchar(255) DEFAULT '' NOT NULL,
	diacstrength varchar(255) DEFAULT '' NOT NULL,
	dimension varchar(255) DEFAULT '' NOT NULL,
	standards varchar(255) DEFAULT '' NOT NULL,
	remark text NOT NULL,
	datasheet varchar(255) DEFAULT '' NOT NULL,
	image varchar(255) DEFAULT '' NOT NULL,
	separatline tinyint(1) unsigned DEFAULT '0' NOT NULL,
	desconly tinyint(1) unsigned DEFAULT '0' NOT NULL,
	ignorename tinyint(1) unsigned DEFAULT '0' NOT NULL,
	specialtype int(11) DEFAULT '0' NOT NULL,
	addclass varchar(255) DEFAULT '' NOT NULL,

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
# Table structure for table 'tx_detaktawebsite_domain_model_article'
#
CREATE TABLE tx_detaktawebsite_domain_model_article (

	category int(11) unsigned DEFAULT '0' NOT NULL,

);
