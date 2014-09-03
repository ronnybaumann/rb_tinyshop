# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_article"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_article;
CREATE TABLE tx_rbtinyshop_domain_model_article (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  categorys int(11) unsigned NOT NULL default '0',
  article_detail int(11) unsigned default '0',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('1', '6', '11', '1', '1408640948', '1408498297', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('10', '6', '11', '10', '1408623864', '1408623864', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('11', '6', '11', '11', '1408623868', '1408623868', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('12', '6', '11', '12', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('13', '6', '11', '13', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('14', '6', '11', '14', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('15', '6', '11', '15', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('16', '6', '11', '16', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('17', '6', '11', '17', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('18', '6', '11', '18', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('19', '6', '11', '19', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('20', '6', '11', '20', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('21', '6', '11', '21', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_article VALUES ('22', '6', '11', '22', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:9:"categorys";N;s:14:"article_detail";N;s:9:"starttime";N;s:7:"endtime";N;}');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_basketposition"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_basketposition;
CREATE TABLE tx_rbtinyshop_domain_model_basketposition (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  basket int(11) unsigned NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  article_number varchar(255) NOT NULL default '',
  price double(11,2) NOT NULL default '0.00',
  quantity double(11,2) NOT NULL default '0.00',
  image varchar(255) NOT NULL default '',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('131', '16', '0', 'Fusce id molestie massa 1', 'TS000001', '341.99', '1.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408963121', '1408963109', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('130', '16', '0', 'Fusce id molestie massa 2', 'TS000002', '341.99', '1.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408963114', '1408963102', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('122', '16', '68', 'Fusce id molestie massa 2', 'TS000002', '341.99', '3.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1409397465', '1408845654', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('123', '16', '68', 'Fusce id molestie massa 3', 'TS000003', '341.99', '3.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1409397465', '1408845654', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('120', '16', '67', 'Fusce id molestie massa 3', 'TS000003', '341.99', '2.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408845654', '1408845348', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('121', '16', '67', 'Fusce id molestie massa 2', 'TS000002', '341.99', '2.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408845654', '1408845348', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('124', '16', '69', 'Fusce id molestie massa 6', 'TS000006', '341.99', '1.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408902758', '1408866721', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('125', '16', '0', 'Fusce id molestie massa 3', 'TS000003', '341.99', '1.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408903728', '1408902758', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('126', '16', '0', 'Fusce id molestie massa 2', 'TS000002', '341.99', '1.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408903724', '1408903718', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('127', '16', '71', 'Fusce id molestie massa 2', 'TS000002', '341.99', '2.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408963074', '1408961645', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('128', '16', '71', 'Fusce id molestie massa 1', 'TS000001', '341.99', '1.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408963074', '1408963030', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basketposition VALUES ('129', '16', '0', 'Fusce id molestie massa 3', 'TS000003', '341.99', '2.00', 'fileadmin/user_upload/tiny-shop.de/Artikelbilder/1.jpg', '1408963117', '1408963074', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_tinyshop"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_tinyshop;
CREATE TABLE tx_rbtinyshop_domain_model_tinyshop (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  categorys int(11) unsigned NOT NULL default '0',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_tinyshop VALUES ('1', '5', 'Demoshop', '2', '1408489847', '1408489609', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:6:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:9:"categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_basket"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_basket;
CREATE TABLE tx_rbtinyshop_domain_model_basket (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  total double(11,2) NOT NULL default '0.00',
  user_uid int(11) unsigned default '0',
  basket_positions int(11) unsigned NOT NULL default '0',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_basket VALUES ('69', '16', '341.99', '37', '1', '1408902758', '1408866721', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basket VALUES ('70', '16', '0.00', '37', '0', '1409397459', '1408902758', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basket VALUES ('71', '16', '1025.97', '38', '2', '1408963074', '1408961645', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basket VALUES ('72', '16', '0.00', '38', '0', '1409397462', '1408963074', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basket VALUES ('68', '16', '2051.94', '36', '2', '1409397465', '1408845654', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_basket VALUES ('67', '16', '1367.96', '36', '2', '1408845654', '1408845348', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_order"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_order;
CREATE TABLE tx_rbtinyshop_domain_model_order (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  total double(11,2) NOT NULL default '0.00',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);





# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_category"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_category;
CREATE TABLE tx_rbtinyshop_domain_model_category (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  category int(11) unsigned NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  image int(11) unsigned NOT NULL default '0',
  sub_categorys int(11) unsigned NOT NULL default '0',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('1', '7', '0', 'Männer', '', '0', '2', '1408489705', '1408489705', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('2', '7', '1', 'Hosen', '', '0', '2', '1408489705', '1408489705', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('3', '7', '2', 'Kurz', '', '0', '0', '1408489705', '1408489705', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('4', '7', '2', 'Lang', '', '0', '0', '1408489705', '1408489705', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('12', '7', '1', 'Pullover', '', '0', '2', '1408489783', '1408489783', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('13', '7', '12', 'Kurz', '', '0', '0', '1408489783', '1408489783', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('14', '7', '12', 'Lang', '', '0', '0', '1408489783', '1408489783', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('15', '7', '0', 'Frauen', '', '0', '2', '1408489837', '1408489837', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('16', '7', '15', 'Schuhe', '', '0', '2', '1408489837', '1408489837', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('17', '7', '16', 'Flach', '', '0', '0', '1408489837', '1408489837', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('18', '7', '16', 'Hoch', '', '0', '0', '1408489837', '1408489837', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('19', '7', '15', 'Taschen', '', '0', '2', '1408489837', '1408489837', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('20', '7', '19', 'Klein', '', '0', '0', '1408489837', '1408489837', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_category VALUES ('21', '7', '19', 'Groß', '', '0', '0', '1408489837', '1408489837', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:8:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"title";N;s:11:"description";N;s:5:"image";N;s:13:"sub_categorys";N;s:9:"starttime";N;s:7:"endtime";N;}');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_price"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_price;
CREATE TABLE tx_rbtinyshop_domain_model_price (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  price double(11,2) NOT NULL default '0.00',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('1', '6', '341.99', '1408623844', '1408498389', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('10', '6', '341.99', '1408623864', '1408623864', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('11', '6', '341.99', '1408623868', '1408623868', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('12', '6', '341.99', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('13', '6', '341.99', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('14', '6', '341.99', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('15', '6', '341.99', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('16', '6', '341.99', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('17', '6', '341.99', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('18', '6', '341.99', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('19', '6', '341.99', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('20', '6', '341.99', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('21', '6', '341.99', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_price VALUES ('22', '6', '341.99', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_articledetail"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_articledetail;
CREATE TABLE tx_rbtinyshop_domain_model_articledetail (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  article_number varchar(255) NOT NULL default '',
  description text NOT NULL,
  main_image int(11) unsigned NOT NULL default '0',
  price int(11) unsigned default '0',
  images int(11) unsigned NOT NULL default '0',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('1', '6', 'Fusce id molestie massa 1', 'TS000001', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '1', '4', '1408649340', '1408498297', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('10', '6', 'Fusce id molestie massa 2', 'TS000002', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '10', '4', '1408649340', '1408623864', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('11', '6', 'Fusce id molestie massa 3', 'TS000003', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '11', '4', '1408649340', '1408623868', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('12', '6', 'Fusce id molestie massa 4', 'TS000004', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '12', '4', '1408649340', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('13', '6', 'Fusce id molestie massa 5', 'TS000005', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '13', '4', '1408649340', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('14', '6', 'Fusce id molestie massa 6', 'TS000006', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '14', '4', '1408649340', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('15', '6', 'Fusce id molestie massa 7', 'TS000007', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '15', '4', '1408649340', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('16', '6', 'Fusce id molestie massa 8', 'TS000008', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '16', '4', '1408649340', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('17', '6', 'Fusce id molestie massa 9', 'TS000009', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '17', '4', '1408649340', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('18', '6', 'Fusce id molestie massa 10', 'TS000010', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '18', '4', '1408649340', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('19', '6', 'Fusce id molestie massa 11', 'TS000011', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '19', '4', '1408649340', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('20', '6', 'Fusce id molestie massa 12', 'TS000012', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '20', '4', '1408649340', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('21', '6', 'Fusce id molestie massa 13', 'TS000013', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '21', '4', '1408649340', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');
INSERT INTO tx_rbtinyshop_domain_model_articledetail VALUES ('22', '6', 'Fusce id molestie massa 14', 'TS000014', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem', '1', '22', '4', '1408649340', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:14:"article_number";N;}');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_image"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_image;
CREATE TABLE tx_rbtinyshop_domain_model_image (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  articledetail int(11) unsigned NOT NULL default '0',
  image int(11) unsigned NOT NULL default '0',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('37', '6', '1', '1', '1408640917', '1408623805', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('38', '6', '1', '1', '1408623844', '1408623805', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('39', '6', '1', '1', '1408623844', '1408623805', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('40', '6', '1', '1', '1408623844', '1408623805', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('41', '6', '10', '1', '1408649299', '1408623864', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('42', '6', '10', '1', '1408623864', '1408623864', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('43', '6', '10', '1', '1408623864', '1408623864', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('44', '6', '10', '1', '1408623864', '1408623864', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('45', '6', '11', '1', '1408623868', '1408623868', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('46', '6', '11', '1', '1408623868', '1408623868', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('47', '6', '11', '1', '1408623868', '1408623868', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('48', '6', '11', '1', '1408623868', '1408623868', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('49', '6', '12', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('50', '6', '12', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('51', '6', '12', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('52', '6', '12', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('53', '6', '13', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('54', '6', '13', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('55', '6', '13', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('56', '6', '13', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('57', '6', '14', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('58', '6', '14', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('59', '6', '14', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('60', '6', '14', '1', '1408623876', '1408623876', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('61', '6', '15', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('62', '6', '15', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('63', '6', '15', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('64', '6', '15', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('65', '6', '16', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('66', '6', '16', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('67', '6', '16', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('68', '6', '16', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('69', '6', '17', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('70', '6', '17', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('71', '6', '17', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('72', '6', '17', '1', '1408623881', '1408623881', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('73', '6', '18', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('74', '6', '18', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('75', '6', '18', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('76', '6', '18', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('77', '6', '19', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('78', '6', '19', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('79', '6', '19', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('80', '6', '19', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('81', '6', '20', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('82', '6', '20', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('83', '6', '20', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('84', '6', '20', '1', '1408623885', '1408623885', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('85', '6', '21', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('86', '6', '21', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('87', '6', '21', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('88', '6', '21', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('89', '6', '22', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:5:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:5:"image";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('90', '6', '22', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('91', '6', '22', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_image VALUES ('92', '6', '22', '1', '1408623890', '1408623890', '1', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_domain_model_address"
#
DROP TABLE IF EXISTS tx_rbtinyshop_domain_model_address;
CREATE TABLE tx_rbtinyshop_domain_model_address (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  company varchar(255) NOT NULL default '',
  salutation varchar(255) NOT NULL default '',
  firstname varchar(255) NOT NULL default '',
  lastname varchar(255) NOT NULL default '',
  street varchar(255) NOT NULL default '',
  street_number varchar(255) NOT NULL default '',
  postcode varchar(255) NOT NULL default '',
  city varchar(255) NOT NULL default '',
  country varchar(255) NOT NULL default '',
  tstamp int(11) unsigned NOT NULL default '0',
  crdate int(11) unsigned NOT NULL default '0',
  cruser_id int(11) unsigned NOT NULL default '0',
  deleted tinyint(4) unsigned NOT NULL default '0',
  hidden tinyint(4) unsigned NOT NULL default '0',
  starttime int(11) unsigned NOT NULL default '0',
  endtime int(11) unsigned NOT NULL default '0',
  t3ver_oid int(11) NOT NULL default '0',
  t3ver_id int(11) NOT NULL default '0',
  t3ver_wsid int(11) NOT NULL default '0',
  t3ver_label varchar(255) NOT NULL default '',
  t3ver_state tinyint(4) NOT NULL default '0',
  t3ver_stage int(11) NOT NULL default '0',
  t3ver_count int(11) NOT NULL default '0',
  t3ver_tstamp int(11) NOT NULL default '0',
  t3ver_move_id int(11) NOT NULL default '0',
  sys_language_uid int(11) NOT NULL default '0',
  l10n_parent int(11) NOT NULL default '0',
  l10n_diffsource mediumblob,
  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY t3ver_oid (t3ver_oid,t3ver_wsid),
  KEY language (l10n_parent,sys_language_uid)
);


INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('16', '18', 'aritso - Internet Solutions', 'Herr', 'Ronny', 'Baumann', 'Salzpforte', '14', '97616', 'Bad Neustadt', 'Deutschland', '1408995095', '1408995095', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('15', '18', '', 'Herr', 'Ronny', 'Baumann', 'Schwabenberg', '9', '98617', 'Meiningen', 'Deutschland', '1408995095', '1408995095', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('9', '18', '', 'Herr', 'Ronny', 'Baumann', 'Schwabenberg', '9', '98617', 'Meiningen', 'Deutschland', '1408994196', '1408831851', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('10', '18', 'aritso - Internet Solutions', 'Herr', 'Ronny', 'Baumann', 'Salzpforte', '14', '97616', 'Bad Neustadt', 'Deutschland', '1408994196', '1408831851', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('11', '18', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '1408994196', '1408961619', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('12', '18', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '1408994196', '1408961619', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('13', '18', '', 'Herr', 'Ronny', 'Baumann', 'Schwabenberg', '9', '98617', 'Meiningen', 'Deutschland', '1408995073', '1408994443', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:1:{s:6:"hidden";N;}');
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('14', '18', 'aritso - Internet Solutions', 'Herr', 'Ronny', 'Baumann', 'Salzpforte', '14', '97616', 'Bad Neustadt', 'Deutschland', '1408995076', '1408994443', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', 'a:13:{s:16:"sys_language_uid";N;s:6:"hidden";N;s:7:"company";N;s:10:"salutation";N;s:9:"firstname";N;s:8:"lastname";N;s:6:"street";N;s:13:"street_number";N;s:8:"postcode";N;s:4:"city";N;s:7:"country";N;s:9:"starttime";N;s:7:"endtime";N;}');
INSERT INTO tx_rbtinyshop_domain_model_address VALUES ('8', '18', '', 'Herr', 'Ronny', 'Baumann', 'Schwabenberg', '9', '98617', 'Meiningen', 'Deutschland', '1408994196', '1408830617', '0', '1', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', NULL);


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_article_category_mm"
#
DROP TABLE IF EXISTS tx_rbtinyshop_article_category_mm;
CREATE TABLE tx_rbtinyshop_article_category_mm (
  uid_local int(11) unsigned NOT NULL default '0',
  uid_foreign int(11) unsigned NOT NULL default '0',
  sorting int(11) unsigned NOT NULL default '0',
  sorting_foreign int(11) unsigned NOT NULL default '0',
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);


INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('1', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('2', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('3', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('4', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('5', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('6', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('7', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('8', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '1', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '2', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '3', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '4', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '12', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '13', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '14', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '15', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '16', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '17', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '18', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '19', '12', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '20', '13', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('9', '21', '14', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('10', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('11', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('12', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('13', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('14', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('15', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('16', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('17', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('18', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('19', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('20', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('21', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('22', '21', '11', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '2', '1', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '3', '2', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '4', '3', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '12', '4', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '13', '5', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '14', '6', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '15', '7', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '16', '8', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '19', '9', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '20', '10', '0');
INSERT INTO tx_rbtinyshop_article_category_mm VALUES ('23', '21', '11', '0');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "tx_rbtinyshop_tinyshop_category_mm"
#
DROP TABLE IF EXISTS tx_rbtinyshop_tinyshop_category_mm;
CREATE TABLE tx_rbtinyshop_tinyshop_category_mm (
  uid_local int(11) unsigned NOT NULL default '0',
  uid_foreign int(11) unsigned NOT NULL default '0',
  sorting int(11) unsigned NOT NULL default '0',
  sorting_foreign int(11) unsigned NOT NULL default '0',
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);


INSERT INTO tx_rbtinyshop_tinyshop_category_mm VALUES ('1', '1', '1', '0');
INSERT INTO tx_rbtinyshop_tinyshop_category_mm VALUES ('1', '15', '2', '0');


# TYPO3 Extension Manager dump 1.1
#
# Host: mysql5.ronnys.webseiten.cc    Database: db430135_4
#--------------------------------------------------------


#
# Table structure for table "fe_users"
#
DROP TABLE IF EXISTS fe_users;
CREATE TABLE fe_users (
  tx_rbtinyshop_domain_model_user_billingaddress int(11) unsigned NOT NULL default '0',
  tx_rbtinyshop_domain_model_user_shippingaddress int(11) unsigned NOT NULL default '0'
);


INSERT INTO fe_users VALUES ('8', '0');
INSERT INTO fe_users VALUES ('9', '10');
INSERT INTO fe_users VALUES ('11', '12');
INSERT INTO fe_users VALUES ('13', '14');
INSERT INTO fe_users VALUES ('15', '16');


