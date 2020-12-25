#
# Table structure for table 'tx_management_domain_model_category'
#
CREATE TABLE tx_management_domain_model_category (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_management_domain_model_brand'
#
CREATE TABLE tx_management_domain_model_brand (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_management_domain_model_type'
#
CREATE TABLE tx_management_domain_model_type (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_management_domain_model_status'
#
CREATE TABLE tx_management_domain_model_status (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_management_domain_model_priority'
#
CREATE TABLE tx_management_domain_model_priority (

	name varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_management_domain_model_product'
#
CREATE TABLE tx_management_domain_model_product (
	pimage int(11) unsigned NOT NULL default '0',
	invoice int(11) unsigned NOT NULL default '0',
	customer int(11) DEFAULT '0' NOT NULL,
	category int(11) DEFAULT '0' NOT NULL,
	brand int(11) DEFAULT '0' NOT NULL,
	serial varchar(255) DEFAULT '' NOT NULL,
	pdate int(11) DEFAULT '0' NOT NULL,
	amcstart int(11) DEFAULT '0' NOT NULL,
	amcexpire int(11) DEFAULT '0' NOT NULL,
	note varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_management_domain_model_ticket'
#
CREATE TABLE tx_management_domain_model_ticket (

	customer int(11) DEFAULT '0' NOT NULL,
	product int(11) DEFAULT '0' NOT NULL,
	technician int(11) DEFAULT '0' NOT NULL,
	type int(11) DEFAULT '0' NOT NULL,
	priority int(11) DEFAULT '0' NOT NULL,
	status int(11) DEFAULT '0' NOT NULL,
	place int(11) DEFAULT '0' NOT NULL,
	name varchar(255) DEFAULT '' NOT NULL,
	passcode varchar(255) DEFAULT '' NOT NULL,
	address varchar(255) DEFAULT '' NOT NULL,
	note varchar(255) DEFAULT '' NOT NULL

);

#
# Table structure for table 'tx_management_domain_model_message'
#
CREATE TABLE tx_management_domain_model_message (

	ticket int(11) DEFAULT '0' NOT NULL,
	user int(11) DEFAULT '0' NOT NULL,
	message varchar(255) DEFAULT '' NOT NULL,
	date int(11) DEFAULT '0' NOT NULL

);
