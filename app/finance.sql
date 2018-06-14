/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : finance

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-06-14 19:31:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lar_activity
-- ----------------------------
DROP TABLE IF EXISTS `lar_activity`;
CREATE TABLE `lar_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `activity_num` int(11) DEFAULT NULL COMMENT '绑定银行卡所送红包金额',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_activity
-- ----------------------------
INSERT INTO `lar_activity` VALUES ('1', '92', '50');
INSERT INTO `lar_activity` VALUES ('2', '75', '50');
INSERT INTO `lar_activity` VALUES ('3', '112', '50');
INSERT INTO `lar_activity` VALUES ('4', '112', '50');
INSERT INTO `lar_activity` VALUES ('5', '75', '50');
INSERT INTO `lar_activity` VALUES ('6', '75', '50');
INSERT INTO `lar_activity` VALUES ('7', '112', '50');
INSERT INTO `lar_activity` VALUES ('8', '112', '50');
INSERT INTO `lar_activity` VALUES ('9', '112', '50');
INSERT INTO `lar_activity` VALUES ('10', '112', '50');
INSERT INTO `lar_activity` VALUES ('11', '75', '50');
INSERT INTO `lar_activity` VALUES ('12', '75', '50');
INSERT INTO `lar_activity` VALUES ('13', '116', '50');
INSERT INTO `lar_activity` VALUES ('14', '116', '50');
INSERT INTO `lar_activity` VALUES ('15', '112', '100');
INSERT INTO `lar_activity` VALUES ('16', '122', '50');
INSERT INTO `lar_activity` VALUES ('17', '122', '50');
INSERT INTO `lar_activity` VALUES ('18', '122', '50');
INSERT INTO `lar_activity` VALUES ('19', '122', '50');
INSERT INTO `lar_activity` VALUES ('20', '122', '100');
INSERT INTO `lar_activity` VALUES ('21', '122', '100');
INSERT INTO `lar_activity` VALUES ('22', '106', '50');
INSERT INTO `lar_activity` VALUES ('23', '112', '50');
INSERT INTO `lar_activity` VALUES ('24', '114', '50');
INSERT INTO `lar_activity` VALUES ('25', '114', '100');
INSERT INTO `lar_activity` VALUES ('26', '75', '100');
INSERT INTO `lar_activity` VALUES ('27', '75', '50');
INSERT INTO `lar_activity` VALUES ('28', '112', '50');
INSERT INTO `lar_activity` VALUES ('29', '101', '50');
INSERT INTO `lar_activity` VALUES ('30', '128', '100');
INSERT INTO `lar_activity` VALUES ('31', '129', '50');

-- ----------------------------
-- Table structure for lar_admins
-- ----------------------------
DROP TABLE IF EXISTS `lar_admins`;
CREATE TABLE `lar_admins` (
  `admin_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_name` varchar(40) NOT NULL COMMENT '管理员名字',
  `admin_pwd` varchar(64) NOT NULL COMMENT '管理员密码',
  `admin_tel` varchar(11) NOT NULL COMMENT '管理员 联系方式',
  `last_ip` char(30) NOT NULL COMMENT '最后登录ip',
  `last_time` int(11) NOT NULL COMMENT '上一次的登录时间',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `last_area` char(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_admins
-- ----------------------------
INSERT INTO `lar_admins` VALUES ('1', 'shuaijie', 'e10adc3949ba59abbe56e057f20f883e', '17600025254', '180.175.116.36', '1499734612', '1497515719', '上海');
INSERT INTO `lar_admins` VALUES ('2', 'c', '63a9f0ea7bb98050796b649e85481845', '17600025254', '127.0.0.1', '1528975325', '1497515683', '');
INSERT INTO `lar_admins` VALUES ('3', 'liujun', '0192023a7bbd73250516f069df18b500', '17600025254', '180.175.116.36', '1499786439', '1497515639', '上海');
INSERT INTO `lar_admins` VALUES ('4', 'zhifeng', '56559eb65e77bf8261ce91fb555d0897', '17600025254', '180.175.28.91', '1500003036', '1497680783', '上海');
INSERT INTO `lar_admins` VALUES ('5', 'yang', '0192023a7bbd73250516f069df18b500', '17600025254', '127.0.0.1', '1499929639', '1497236846', '');
INSERT INTO `lar_admins` VALUES ('6', 'admin', '0192023a7bbd73250516f069df18b500', '17600025254', '180.175.28.91', '1500041238', '1497236846', '上海');
INSERT INTO `lar_admins` VALUES ('8', 'test', '0192023a7bbd73250516f069df18b500', '18401448261', '180.175.28.91', '1499390433', '1497797544', '上海');
INSERT INTO `lar_admins` VALUES ('9', 'demo', '0192023a7bbd73250516f069df18b500', '18401448261', '127.0.0.1', '1497797637', '1497797637', '上海');

-- ----------------------------
-- Table structure for lar_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `lar_admin_log`;
CREATE TABLE `lar_admin_log` (
  `log_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `adm_id` int(8) NOT NULL COMMENT '管理员名称',
  `login_time` varchar(11) NOT NULL COMMENT '登录时间',
  `handle` varchar(30) NOT NULL COMMENT '操作模块',
  `action` varchar(30) NOT NULL COMMENT '动作',
  `had_time` int(11) NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=639 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_admin_log
-- ----------------------------
INSERT INTO `lar_admin_log` VALUES ('334', '4', '1499765390', 'info', '网站信息', '1499765391');
INSERT INTO `lar_admin_log` VALUES ('335', '4', '1499765390', 'user', '会员列表', '1499765398');
INSERT INTO `lar_admin_log` VALUES ('336', '4', '1499765390', 'pledge_list', '会员抵押物管理', '1499765407');
INSERT INTO `lar_admin_log` VALUES ('337', '4', '1499765390', 'loan', '借款管理', '1499765409');
INSERT INTO `lar_admin_log` VALUES ('338', '4', '1499765390', 'admin_recharge', '用户充值管理', '1499765411');
INSERT INTO `lar_admin_log` VALUES ('339', '4', '1499765390', 'red_packets_list', '用户红包管理', '1499765412');
INSERT INTO `lar_admin_log` VALUES ('340', '4', '1499765390', 'red_packets_addlist', '红包列表', '1499765415');
INSERT INTO `lar_admin_log` VALUES ('341', '4', '1499765390', 'user', '会员列表', '1499765416');
INSERT INTO `lar_admin_log` VALUES ('342', '4', '1499763749', 'admin_income', '网站收益统计', '1499765436');
INSERT INTO `lar_admin_log` VALUES ('343', '4', '1499763749', 'info', '网站信息', '1499765441');
INSERT INTO `lar_admin_log` VALUES ('344', '4', '1499765390', 'user', '会员列表', '1499765442');
INSERT INTO `lar_admin_log` VALUES ('345', '4', '1499763749', 'uppw', '修改密码', '1499765443');
INSERT INTO `lar_admin_log` VALUES ('346', '4', '1499765390', 'user', '会员列表', '1499765443');
INSERT INTO `lar_admin_log` VALUES ('347', '4', '1499763749', 'info', '网站信息', '1499765444');
INSERT INTO `lar_admin_log` VALUES ('348', '4', '1499765390', 'user', '会员列表', '1499765447');
INSERT INTO `lar_admin_log` VALUES ('349', '4', '1499765390', 'user', '会员列表', '1499765448');
INSERT INTO `lar_admin_log` VALUES ('350', '4', '1499763749', 'uppw', '修改密码', '1499765449');
INSERT INTO `lar_admin_log` VALUES ('351', '4', '1499765390', 'user', '会员列表', '1499765451');
INSERT INTO `lar_admin_log` VALUES ('352', '4', '1499765390', 'user', '会员列表', '1499765452');
INSERT INTO `lar_admin_log` VALUES ('353', '4', '1499765390', 'user', '会员列表', '1499765453');
INSERT INTO `lar_admin_log` VALUES ('354', '4', '1499763749', 'nev_list', '后台导航', '1499765453');
INSERT INTO `lar_admin_log` VALUES ('355', '4', '1499765390', 'user', '会员列表', '1499765454');
INSERT INTO `lar_admin_log` VALUES ('356', '4', '1499765390', 'user', '会员列表', '1499765455');
INSERT INTO `lar_admin_log` VALUES ('357', '4', '1499765390', 'user', '会员列表', '1499765458');
INSERT INTO `lar_admin_log` VALUES ('358', '4', '1499765390', 'user', '会员列表', '1499765460');
INSERT INTO `lar_admin_log` VALUES ('359', '4', '1499765390', 'user', '会员列表', '1499765464');
INSERT INTO `lar_admin_log` VALUES ('360', '4', '1499765390', 'user', '会员列表', '1499765466');
INSERT INTO `lar_admin_log` VALUES ('361', '4', '1499763749', 'article_list', '文章管理', '1499765471');
INSERT INTO `lar_admin_log` VALUES ('362', '4', '1499763749', 'adv', '首页轮播', '1499765472');
INSERT INTO `lar_admin_log` VALUES ('363', '4', '1499763749', 'news_list', '网站新闻', '1499765473');
INSERT INTO `lar_admin_log` VALUES ('364', '4', '1499763749', 'adv', '首页轮播', '1499765474');
INSERT INTO `lar_admin_log` VALUES ('365', '4', '1499765390', 'recall', '会员召回', '1499765522');
INSERT INTO `lar_admin_log` VALUES ('366', '4', '1499763749', 'node_add', '权限添加', '1499765588');
INSERT INTO `lar_admin_log` VALUES ('367', '4', '1499763749', 'admin_log', '管理员日志', '1499765589');
INSERT INTO `lar_admin_log` VALUES ('368', '4', '1499763749', 'role_add', '角色添加', '1499765590');
INSERT INTO `lar_admin_log` VALUES ('369', '4', '1499763749', 'admin_note', '权限管理', '1499765591');
INSERT INTO `lar_admin_log` VALUES ('370', '4', '1499763749', 'role_add', '角色添加', '1499765607');
INSERT INTO `lar_admin_log` VALUES ('371', '4', '1499763749', 'node_add', '权限添加', '1499765608');
INSERT INTO `lar_admin_log` VALUES ('372', '4', '1499763749', 'user', '会员列表', '1499765612');
INSERT INTO `lar_admin_log` VALUES ('373', '4', '1499763749', 'user', '会员列表', '1499765622');
INSERT INTO `lar_admin_log` VALUES ('374', '4', '1499763749', 'user', '会员列表', '1499765625');
INSERT INTO `lar_admin_log` VALUES ('375', '4', '1499763749', 'user', '会员列表', '1499765629');
INSERT INTO `lar_admin_log` VALUES ('376', '4', '1499763749', 'user', '会员列表', '1499765631');
INSERT INTO `lar_admin_log` VALUES ('377', '4', '1499763749', 'pledge_list', '会员抵押物管理', '1499765714');
INSERT INTO `lar_admin_log` VALUES ('378', '4', '1499763749', 'user', '会员列表', '1499765719');
INSERT INTO `lar_admin_log` VALUES ('379', '4', '1499763749', 'admin_recharge', '用户充值管理', '1499765724');
INSERT INTO `lar_admin_log` VALUES ('380', '4', '1499763749', 'user', '会员列表', '1499765726');
INSERT INTO `lar_admin_log` VALUES ('381', '4', '1499763749', 'pledge_list', '会员抵押物管理', '1499765768');
INSERT INTO `lar_admin_log` VALUES ('382', '3', '1499776588', 'info', '网站信息', '1499776589');
INSERT INTO `lar_admin_log` VALUES ('383', '3', '1499776588', 'admin_income', '网站收益统计', '1499776592');
INSERT INTO `lar_admin_log` VALUES ('384', '3', '1499776621', 'info', '网站信息', '1499776622');
INSERT INTO `lar_admin_log` VALUES ('385', '3', '1499776872', 'info', '网站信息', '1499776873');
INSERT INTO `lar_admin_log` VALUES ('386', '3', '1499776872', 'admin_income', '网站收益统计', '1499776882');
INSERT INTO `lar_admin_log` VALUES ('387', '3', '1499776872', 'info', '网站信息', '1499776883');
INSERT INTO `lar_admin_log` VALUES ('388', '3', '1499776872', 'uppw', '修改密码', '1499776885');
INSERT INTO `lar_admin_log` VALUES ('389', '3', '1499776872', 'nev_list', '后台导航', '1499776886');
INSERT INTO `lar_admin_log` VALUES ('390', '3', '1499776872', 'article_list', '文章管理', '1499776887');
INSERT INTO `lar_admin_log` VALUES ('391', '3', '1499776872', 'adv', '首页轮播', '1499776888');
INSERT INTO `lar_admin_log` VALUES ('392', '3', '1499776872', 'news_list', '网站新闻', '1499776888');
INSERT INTO `lar_admin_log` VALUES ('393', '3', '1499776872', 'admin_income', '网站收益统计', '1499776889');
INSERT INTO `lar_admin_log` VALUES ('394', '3', '1499776899', 'info', '网站信息', '1499776900');
INSERT INTO `lar_admin_log` VALUES ('395', '4', '1499777857', 'info', '网站信息', '1499777858');
INSERT INTO `lar_admin_log` VALUES ('396', '4', '1499777857', 'node_add', '权限添加', '1499777863');
INSERT INTO `lar_admin_log` VALUES ('397', '4', '1499777857', 'role_add', '角色添加', '1499777864');
INSERT INTO `lar_admin_log` VALUES ('398', '4', '1499777857', 'node_add', '权限添加', '1499777865');
INSERT INTO `lar_admin_log` VALUES ('399', '4', '1499777857', 'role_add', '角色添加', '1499777884');
INSERT INTO `lar_admin_log` VALUES ('400', '4', '1499777857', 'info', '网站信息', '1499777904');
INSERT INTO `lar_admin_log` VALUES ('401', '4', '1499777857', 'admin_note', '权限管理', '1499777905');
INSERT INTO `lar_admin_log` VALUES ('402', '4', '1499777857', 'admin_log', '管理员日志', '1499777916');
INSERT INTO `lar_admin_log` VALUES ('403', '4', '1499777857', 'user', '会员列表', '1499777927');
INSERT INTO `lar_admin_log` VALUES ('404', '4', '1499777857', 'pledge_list', '会员抵押物管理', '1499777929');
INSERT INTO `lar_admin_log` VALUES ('405', '4', '1499777857', 'user', '会员列表', '1499777930');
INSERT INTO `lar_admin_log` VALUES ('406', '4', '1499777857', 'userexport', '用户excel导出', '1499777932');
INSERT INTO `lar_admin_log` VALUES ('407', '4', '1499777857', 'pledge_list', '会员抵押物管理', '1499777943');
INSERT INTO `lar_admin_log` VALUES ('408', '4', '1499777857', 'loan', '借款管理', '1499777944');
INSERT INTO `lar_admin_log` VALUES ('409', '4', '1499777857', 'admin_recharge', '用户充值管理', '1499777951');
INSERT INTO `lar_admin_log` VALUES ('410', '4', '1499777857', 'admin_recharge_update', 'admin_recharge_update', '1499777953');
INSERT INTO `lar_admin_log` VALUES ('411', '4', '1499777857', 'admin_recharge', '用户充值管理', '1499777953');
INSERT INTO `lar_admin_log` VALUES ('412', '4', '1499777857', 'red_packets_list', '用户红包管理', '1499777956');
INSERT INTO `lar_admin_log` VALUES ('413', '4', '1499777857', 'red_packets_list', '用户红包管理', '1499777960');
INSERT INTO `lar_admin_log` VALUES ('414', '4', '1499777857', 'red_packets_addlist', '红包列表', '1499777962');
INSERT INTO `lar_admin_log` VALUES ('415', '4', '1499777857', 'article_list', '文章管理', '1499777971');
INSERT INTO `lar_admin_log` VALUES ('416', '4', '1499777857', 'adv', '首页轮播', '1499777974');
INSERT INTO `lar_admin_log` VALUES ('417', '4', '1499777857', 'news_list', '网站新闻', '1499777976');
INSERT INTO `lar_admin_log` VALUES ('418', '4', '1499777857', 'admin_income', '网站收益统计', '1499777980');
INSERT INTO `lar_admin_log` VALUES ('419', '4', '1499777857', 'info', '网站信息', '1499777989');
INSERT INTO `lar_admin_log` VALUES ('420', '4', '1499777857', 'uppw', '修改密码', '1499777993');
INSERT INTO `lar_admin_log` VALUES ('421', '4', '1499777857', 'nev_list', '后台导航', '1499778001');
INSERT INTO `lar_admin_log` VALUES ('422', '4', '1499765390', 'info', '网站信息', '1499778508');
INSERT INTO `lar_admin_log` VALUES ('423', '4', '1499765390', 'info', '网站信息', '1499778509');
INSERT INTO `lar_admin_log` VALUES ('424', '4', '1499781623', 'info', '网站信息', '1499781624');
INSERT INTO `lar_admin_log` VALUES ('425', '4', '1499781623', 'cache_clean', 'cache_clean', '1499781628');
INSERT INTO `lar_admin_log` VALUES ('426', '4', '1499781623', 'info', '网站信息', '1499781630');
INSERT INTO `lar_admin_log` VALUES ('427', '4', '1499781623', 'article_list', '文章管理', '1499781748');
INSERT INTO `lar_admin_log` VALUES ('428', '4', '1499781623', 'adv', '首页轮播', '1499781750');
INSERT INTO `lar_admin_log` VALUES ('429', '4', '1499781623', 'news_list', '网站新闻', '1499781751');
INSERT INTO `lar_admin_log` VALUES ('430', '4', '1499781623', 'adv', '首页轮播', '1499781753');
INSERT INTO `lar_admin_log` VALUES ('431', '4', '1499781623', 'user', '会员列表', '1499781758');
INSERT INTO `lar_admin_log` VALUES ('432', '4', '1499781623', 'admin_recharge', '用户充值管理', '1499781775');
INSERT INTO `lar_admin_log` VALUES ('433', '4', '1499781623', 'admin_recharge', '用户充值管理', '1499781780');
INSERT INTO `lar_admin_log` VALUES ('434', '4', '1499781623', 'admin_recharge', '用户充值管理', '1499781781');
INSERT INTO `lar_admin_log` VALUES ('435', '4', '1499781623', 'admin_recharge', '用户充值管理', '1499781783');
INSERT INTO `lar_admin_log` VALUES ('436', '4', '1499781623', 'admin_recharge', '用户充值管理', '1499781785');
INSERT INTO `lar_admin_log` VALUES ('437', '4', '1499781623', 'red_packets_list', '用户红包管理', '1499781788');
INSERT INTO `lar_admin_log` VALUES ('438', '4', '1499781623', 'red_packets_addlist', '红包列表', '1499781803');
INSERT INTO `lar_admin_log` VALUES ('439', '4', '1499781623', 'info', '网站信息', '1499781823');
INSERT INTO `lar_admin_log` VALUES ('440', '4', '1499781623', 'info', '网站信息', '1499781913');
INSERT INTO `lar_admin_log` VALUES ('441', '4', '1499781623', 'user', '会员列表', '1499782108');
INSERT INTO `lar_admin_log` VALUES ('442', '4', '1499781623', 'pledge_list', '会员抵押物管理', '1499782110');
INSERT INTO `lar_admin_log` VALUES ('443', '4', '1499781623', 'admin_recharge', '用户充值管理', '1499782116');
INSERT INTO `lar_admin_log` VALUES ('444', '4', '1499781623', 'pledge_list', '会员抵押物管理', '1499782119');
INSERT INTO `lar_admin_log` VALUES ('445', '4', '1499781623', 'pledge_list', '会员抵押物管理', '1499782127');
INSERT INTO `lar_admin_log` VALUES ('446', '4', '1499781623', 'admin_recharge', '用户充值管理', '1499782131');
INSERT INTO `lar_admin_log` VALUES ('447', '4', '1499781623', 'red_packets_list', '用户红包管理', '1499782137');
INSERT INTO `lar_admin_log` VALUES ('448', '4', '1499781623', 'red_packets_addlist', '红包列表', '1499782145');
INSERT INTO `lar_admin_log` VALUES ('449', '4', '1499781623', 'admin_income', '网站收益统计', '1499782225');
INSERT INTO `lar_admin_log` VALUES ('450', '4', '1499781623', 'admin_income', '网站收益统计', '1499782407');
INSERT INTO `lar_admin_log` VALUES ('451', '4', '1499781623', 'info', '网站信息', '1499782430');
INSERT INTO `lar_admin_log` VALUES ('452', '4', '1499781623', 'nev_list', '后台导航', '1499782520');
INSERT INTO `lar_admin_log` VALUES ('453', '4', '1499781623', 'adm_nav_save', '侧栏保存', '1499782531');
INSERT INTO `lar_admin_log` VALUES ('454', '4', '1499781623', 'nev_list', '后台导航', '1499782532');
INSERT INTO `lar_admin_log` VALUES ('455', '4', '1499781623', 'node_add', '权限添加', '1499782636');
INSERT INTO `lar_admin_log` VALUES ('456', '4', '1499781623', 'role_add', '角色添加', '1499782644');
INSERT INTO `lar_admin_log` VALUES ('457', '4', '1499781623', 'admin_note', '权限管理', '1499782673');
INSERT INTO `lar_admin_log` VALUES ('458', '4', '1499781623', 'admin_note', '权限管理', '1499782698');
INSERT INTO `lar_admin_log` VALUES ('459', '4', '1499781623', 'info', '网站信息', '1499782709');
INSERT INTO `lar_admin_log` VALUES ('460', '3', '1499786439', 'info', '网站信息', '1499786439');
INSERT INTO `lar_admin_log` VALUES ('461', '4', '1499765390', 'info', '网站信息', '1499787526');
INSERT INTO `lar_admin_log` VALUES ('462', '4', '1499765390', 'user', '会员列表', '1499787527');
INSERT INTO `lar_admin_log` VALUES ('463', '4', '1499765390', 'userinfo', '会员信息查看', '1499789723');
INSERT INTO `lar_admin_log` VALUES ('464', '5', '1499929639', 'info', '网站信息', '1499929641');
INSERT INTO `lar_admin_log` VALUES ('465', '5', '1499929639', 'admin_income', '网站收益统计', '1499929650');
INSERT INTO `lar_admin_log` VALUES ('466', '5', '1499929639', 'admin_income', '网站收益统计', '1499929652');
INSERT INTO `lar_admin_log` VALUES ('467', '5', '1499929639', 'admin_income', '网站收益统计', '1499929654');
INSERT INTO `lar_admin_log` VALUES ('468', '5', '1499929639', 'red_packets_addlist', '红包列表', '1499929661');
INSERT INTO `lar_admin_log` VALUES ('469', '5', '1499929639', 'red_packets_add', '红包添加', '1499929676');
INSERT INTO `lar_admin_log` VALUES ('470', '5', '1499929639', 'red_packets_add', '红包添加', '1499929676');
INSERT INTO `lar_admin_log` VALUES ('471', '4', '1500003036', 'info', '网站信息', '1500003037');
INSERT INTO `lar_admin_log` VALUES ('472', '4', '1500003036', 'pledge_list', '会员抵押物管理', '1500003041');
INSERT INTO `lar_admin_log` VALUES ('473', '4', '1500003036', 'is_check', '抵押物验证', '1500003052');
INSERT INTO `lar_admin_log` VALUES ('474', '4', '1500003036', 'is_check', '抵押物验证', '1500003082');
INSERT INTO `lar_admin_log` VALUES ('475', '4', '1500003036', 'is_check', '抵押物验证', '1500003087');
INSERT INTO `lar_admin_log` VALUES ('476', '4', '1500003036', 'pledge_list', '会员抵押物管理', '1500003110');
INSERT INTO `lar_admin_log` VALUES ('477', '4', '1500003036', 'is_check', '抵押物验证', '1500003127');
INSERT INTO `lar_admin_log` VALUES ('478', '4', '1500003036', 'is_check', '抵押物验证', '1500003133');
INSERT INTO `lar_admin_log` VALUES ('479', '4', '1500003036', 'pledge_list', '会员抵押物管理', '1500003157');
INSERT INTO `lar_admin_log` VALUES ('480', '4', '1500003036', 'pledge_list', '会员抵押物管理', '1500003478');
INSERT INTO `lar_admin_log` VALUES ('481', '4', '1500003036', 'is_check', '抵押物验证', '1500003486');
INSERT INTO `lar_admin_log` VALUES ('482', '6', '1500038239', 'info', '网站信息', '1500038240');
INSERT INTO `lar_admin_log` VALUES ('483', '6', '1500038239', 'user', '会员列表', '1500038247');
INSERT INTO `lar_admin_log` VALUES ('484', '6', '1500038239', 'pledge_list', '会员抵押物管理', '1500038250');
INSERT INTO `lar_admin_log` VALUES ('485', '6', '1500038239', 'loan', '借款管理', '1500038253');
INSERT INTO `lar_admin_log` VALUES ('486', '6', '1500038239', 'info', '网站信息', '1500039246');
INSERT INTO `lar_admin_log` VALUES ('487', '6', '1500038239', 'info', '网站信息', '1500039287');
INSERT INTO `lar_admin_log` VALUES ('488', '6', '1500038239', 'loan', '借款管理', '1500039353');
INSERT INTO `lar_admin_log` VALUES ('489', '6', '1500038239', 'loan', '借款管理', '1500039385');
INSERT INTO `lar_admin_log` VALUES ('490', '6', '1500038239', 'info', '网站信息', '1500039387');
INSERT INTO `lar_admin_log` VALUES ('491', '6', '1500038239', 'pledge_list', '会员抵押物管理', '1500039389');
INSERT INTO `lar_admin_log` VALUES ('492', '6', '1500038239', 'loan', '借款管理', '1500039391');
INSERT INTO `lar_admin_log` VALUES ('493', '6', '1500038239', 'loan_check', 'loan_check', '1500039405');
INSERT INTO `lar_admin_log` VALUES ('494', '6', '1500039983', 'info', '网站信息', '1500039984');
INSERT INTO `lar_admin_log` VALUES ('495', '6', '1500039983', 'pledge_list', '会员抵押物管理', '1500039988');
INSERT INTO `lar_admin_log` VALUES ('496', '6', '1500039983', 'pledge_list', '会员抵押物管理', '1500040074');
INSERT INTO `lar_admin_log` VALUES ('497', '6', '1500039983', 'is_check', '抵押物验证', '1500040082');
INSERT INTO `lar_admin_log` VALUES ('498', '6', '1500039983', 'loan', '借款管理', '1500040604');
INSERT INTO `lar_admin_log` VALUES ('499', '6', '1500039983', 'loan', '借款管理', '1500041021');
INSERT INTO `lar_admin_log` VALUES ('500', '6', '1500039983', 'loan', '借款管理', '1500041023');
INSERT INTO `lar_admin_log` VALUES ('501', '6', '1500039983', 'loan', '借款管理', '1500041026');
INSERT INTO `lar_admin_log` VALUES ('502', '6', '1500039983', 'loan', '借款管理', '1500041188');
INSERT INTO `lar_admin_log` VALUES ('503', '6', '1500041238', 'info', '网站信息', '1500041238');
INSERT INTO `lar_admin_log` VALUES ('504', '6', '1500041238', 'loan', '借款管理', '1500041296');
INSERT INTO `lar_admin_log` VALUES ('505', '6', '1500041238', 'loan_check', 'loan_check', '1500041330');
INSERT INTO `lar_admin_log` VALUES ('506', '6', '1500041238', 'info', '网站信息', '1500041505');
INSERT INTO `lar_admin_log` VALUES ('507', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500041509');
INSERT INTO `lar_admin_log` VALUES ('508', '6', '1500041238', 'loan', '借款管理', '1500041509');
INSERT INTO `lar_admin_log` VALUES ('509', '6', '1500041238', 'loan_check', 'loan_check', '1500041514');
INSERT INTO `lar_admin_log` VALUES ('510', '6', '1500041238', 'loan', '借款管理', '1500042038');
INSERT INTO `lar_admin_log` VALUES ('511', '6', '1500041238', 'loan', '借款管理', '1500042071');
INSERT INTO `lar_admin_log` VALUES ('512', '6', '1500041238', 'loan_check', 'loan_check', '1500042079');
INSERT INTO `lar_admin_log` VALUES ('513', '6', '1500041238', 'loan', '借款管理', '1500042348');
INSERT INTO `lar_admin_log` VALUES ('514', '6', '1500041238', 'loan_check', 'loan_check', '1500042353');
INSERT INTO `lar_admin_log` VALUES ('515', '6', '1500041238', 'loan', '借款管理', '1500042472');
INSERT INTO `lar_admin_log` VALUES ('516', '6', '1500041238', 'loan_check', 'loan_check', '1500042477');
INSERT INTO `lar_admin_log` VALUES ('517', '6', '1500041238', 'info', '网站信息', '1500042987');
INSERT INTO `lar_admin_log` VALUES ('518', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500042989');
INSERT INTO `lar_admin_log` VALUES ('519', '6', '1500041238', 'loan', '借款管理', '1500042992');
INSERT INTO `lar_admin_log` VALUES ('520', '6', '1500041238', 'loan_check', 'loan_check', '1500042995');
INSERT INTO `lar_admin_log` VALUES ('521', '6', '1500041238', 'loan', '借款管理', '1500043635');
INSERT INTO `lar_admin_log` VALUES ('522', '6', '1500041238', 'loan_check', 'loan_check', '1500043644');
INSERT INTO `lar_admin_log` VALUES ('523', '6', '1500041238', 'loan', '借款管理', '1500043740');
INSERT INTO `lar_admin_log` VALUES ('524', '6', '1500041238', 'loan', '借款管理', '1500043774');
INSERT INTO `lar_admin_log` VALUES ('525', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500043840');
INSERT INTO `lar_admin_log` VALUES ('526', '6', '1500041238', 'is_check', '抵押物验证', '1500043849');
INSERT INTO `lar_admin_log` VALUES ('527', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500043929');
INSERT INTO `lar_admin_log` VALUES ('528', '6', '1500041238', 'loan', '借款管理', '1500043930');
INSERT INTO `lar_admin_log` VALUES ('529', '6', '1500041238', 'loan_check', 'loan_check', '1500043940');
INSERT INTO `lar_admin_log` VALUES ('530', '6', '1500041238', 'info', '网站信息', '1500044117');
INSERT INTO `lar_admin_log` VALUES ('531', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500044119');
INSERT INTO `lar_admin_log` VALUES ('532', '6', '1500041238', 'loan', '借款管理', '1500044121');
INSERT INTO `lar_admin_log` VALUES ('533', '6', '1500041238', 'loan_check', 'loan_check', '1500044123');
INSERT INTO `lar_admin_log` VALUES ('534', '6', '1500041238', 'loan_check', 'loan_check', '1500044155');
INSERT INTO `lar_admin_log` VALUES ('535', '6', '1500041238', 'info', '网站信息', '1500044184');
INSERT INTO `lar_admin_log` VALUES ('536', '6', '1500041238', 'loan', '借款管理', '1500044187');
INSERT INTO `lar_admin_log` VALUES ('537', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500044277');
INSERT INTO `lar_admin_log` VALUES ('538', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500044348');
INSERT INTO `lar_admin_log` VALUES ('539', '6', '1500041238', 'is_check', '抵押物验证', '1500044355');
INSERT INTO `lar_admin_log` VALUES ('540', '6', '1500041238', 'loan', '借款管理', '1500044413');
INSERT INTO `lar_admin_log` VALUES ('541', '6', '1500041238', 'loan_check', 'loan_check', '1500044433');
INSERT INTO `lar_admin_log` VALUES ('542', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500045258');
INSERT INTO `lar_admin_log` VALUES ('543', '6', '1500041238', 'is_check', '抵押物验证', '1500045264');
INSERT INTO `lar_admin_log` VALUES ('544', '6', '1500041238', 'pledge_list', '会员抵押物管理', '1500045267');
INSERT INTO `lar_admin_log` VALUES ('545', '6', '1500041238', 'loan', '借款管理', '1500045269');
INSERT INTO `lar_admin_log` VALUES ('546', '6', '1500041238', 'loan', '借款管理', '1500045343');
INSERT INTO `lar_admin_log` VALUES ('547', '6', '1500041238', 'loan_check', 'loan_check', '1500045348');
INSERT INTO `lar_admin_log` VALUES ('548', '2', '1528356926', 'info', '网站信息', '1528356935');
INSERT INTO `lar_admin_log` VALUES ('549', '2', '1528356926', 'adv', '首页轮播', '1528356937');
INSERT INTO `lar_admin_log` VALUES ('550', '2', '1528356926', 'adv', '首页轮播', '1528356942');
INSERT INTO `lar_admin_log` VALUES ('551', '2', '1528356926', 'adv', '首页轮播', '1528356950');
INSERT INTO `lar_admin_log` VALUES ('552', '2', '1528356926', 'adv', '首页轮播', '1528356952');
INSERT INTO `lar_admin_log` VALUES ('553', '2', '1528356926', 'info', '网站信息', '1528357004');
INSERT INTO `lar_admin_log` VALUES ('554', '2', '1528356926', 'admin_income', '网站收益统计', '1528357024');
INSERT INTO `lar_admin_log` VALUES ('555', '2', '1528356926', 'info', '网站信息', '1528357025');
INSERT INTO `lar_admin_log` VALUES ('556', '2', '1528356926', 'uppw', '修改密码', '1528357027');
INSERT INTO `lar_admin_log` VALUES ('557', '2', '1528356926', 'info', '网站信息', '1528357028');
INSERT INTO `lar_admin_log` VALUES ('558', '2', '1528356926', 'uppw', '修改密码', '1528357055');
INSERT INTO `lar_admin_log` VALUES ('559', '2', '1528356926', 'nev_list', '后台导航', '1528357055');
INSERT INTO `lar_admin_log` VALUES ('560', '2', '1528356926', 'user', '会员列表', '1528357060');
INSERT INTO `lar_admin_log` VALUES ('561', '2', '1528356926', 'pledge_list', '会员抵押物管理', '1528357063');
INSERT INTO `lar_admin_log` VALUES ('562', '2', '1528356926', 'user', '会员列表', '1528357064');
INSERT INTO `lar_admin_log` VALUES ('563', '2', '1528356926', 'pledge_list', '会员抵押物管理', '1528357065');
INSERT INTO `lar_admin_log` VALUES ('564', '2', '1528356926', 'loan', '借款管理', '1528357066');
INSERT INTO `lar_admin_log` VALUES ('565', '2', '1528356926', 'admin_recharge', '用户充值管理', '1528357068');
INSERT INTO `lar_admin_log` VALUES ('566', '2', '1528356926', 'admin_recharge', '用户充值管理', '1528357069');
INSERT INTO `lar_admin_log` VALUES ('567', '2', '1528356926', 'loan', '借款管理', '1528357070');
INSERT INTO `lar_admin_log` VALUES ('568', '2', '1528356926', 'admin_recharge', '用户充值管理', '1528357080');
INSERT INTO `lar_admin_log` VALUES ('569', '2', '1528356926', 'red_packets_list', '用户红包管理', '1528357081');
INSERT INTO `lar_admin_log` VALUES ('570', '2', '1528356926', 'red_packets_addlist', '红包列表', '1528357082');
INSERT INTO `lar_admin_log` VALUES ('571', '2', '1528356926', 'node_add', '权限添加', '1528357094');
INSERT INTO `lar_admin_log` VALUES ('572', '2', '1528356926', 'role_add', '角色添加', '1528357095');
INSERT INTO `lar_admin_log` VALUES ('573', '2', '1528356926', 'admin_note', '权限管理', '1528357097');
INSERT INTO `lar_admin_log` VALUES ('574', '2', '1528356926', 'admin_note', '权限管理', '1528357098');
INSERT INTO `lar_admin_log` VALUES ('575', '2', '1528356926', 'admin_note', '权限管理', '1528357098');
INSERT INTO `lar_admin_log` VALUES ('576', '2', '1528356926', 'admin_note', '权限管理', '1528357099');
INSERT INTO `lar_admin_log` VALUES ('577', '2', '1528356926', 'admin_log', '管理员日志', '1528357099');
INSERT INTO `lar_admin_log` VALUES ('578', '2', '1528356926', 'admin_note', '权限管理', '1528357100');
INSERT INTO `lar_admin_log` VALUES ('579', '2', '1528356926', 'admin_log', '管理员日志', '1528357100');
INSERT INTO `lar_admin_log` VALUES ('580', '2', '1528356926', 'role_add', '角色添加', '1528357100');
INSERT INTO `lar_admin_log` VALUES ('581', '2', '1528356926', 'role_add', '角色添加', '1528357100');
INSERT INTO `lar_admin_log` VALUES ('582', '2', '1528356926', 'admin_log', '管理员日志', '1528357112');
INSERT INTO `lar_admin_log` VALUES ('583', '2', '1528356926', 'role_add', '角色添加', '1528357119');
INSERT INTO `lar_admin_log` VALUES ('584', '2', '1528356926', 'node_add', '权限添加', '1528357121');
INSERT INTO `lar_admin_log` VALUES ('585', '2', '1528356926', 'red_packets_list', '用户红包管理', '1528357130');
INSERT INTO `lar_admin_log` VALUES ('586', '2', '1528356926', 'admin_recharge', '用户充值管理', '1528357130');
INSERT INTO `lar_admin_log` VALUES ('587', '2', '1528356926', 'loan', '借款管理', '1528357131');
INSERT INTO `lar_admin_log` VALUES ('588', '2', '1528356926', 'pledge_list', '会员抵押物管理', '1528357132');
INSERT INTO `lar_admin_log` VALUES ('589', '2', '1528356926', 'user', '会员列表', '1528357133');
INSERT INTO `lar_admin_log` VALUES ('590', '2', '1528356926', 'pledge_list', '会员抵押物管理', '1528357134');
INSERT INTO `lar_admin_log` VALUES ('591', '2', '1528356926', 'user', '会员列表', '1528357138');
INSERT INTO `lar_admin_log` VALUES ('592', '2', '1528356926', 'userexport', '用户excel导出', '1528357139');
INSERT INTO `lar_admin_log` VALUES ('593', '2', '1528356926', 'user', '会员列表', '1528357145');
INSERT INTO `lar_admin_log` VALUES ('594', '2', '1528356926', 'recall', '会员召回', '1528357239');
INSERT INTO `lar_admin_log` VALUES ('595', '2', '1528356926', 'recall', '会员召回', '1528357247');
INSERT INTO `lar_admin_log` VALUES ('596', '2', '1528356926', 'info', '网站信息', '1528357312');
INSERT INTO `lar_admin_log` VALUES ('597', '2', '1528356926', 'cache_clean', 'cache_clean', '1528357314');
INSERT INTO `lar_admin_log` VALUES ('598', '2', '1528356926', 'info', '网站信息', '1528357315');
INSERT INTO `lar_admin_log` VALUES ('599', '2', '1528356926', 'cache_clean', 'cache_clean', '1528357316');
INSERT INTO `lar_admin_log` VALUES ('600', '2', '1528356926', 'info', '网站信息', '1528357317');
INSERT INTO `lar_admin_log` VALUES ('601', '2', '1528356926', 'cache_clean', 'cache_clean', '1528357318');
INSERT INTO `lar_admin_log` VALUES ('602', '2', '1528356926', 'info', '网站信息', '1528357319');
INSERT INTO `lar_admin_log` VALUES ('603', '2', '1528356926', 'cache_clean', 'cache_clean', '1528357326');
INSERT INTO `lar_admin_log` VALUES ('604', '2', '1528356926', 'info', '网站信息', '1528357327');
INSERT INTO `lar_admin_log` VALUES ('605', '2', '1528356926', 'loan_search', '借款搜索', '1528365080');
INSERT INTO `lar_admin_log` VALUES ('606', '2', '1528356926', 'user', '会员列表', '1528365101');
INSERT INTO `lar_admin_log` VALUES ('607', '2', '1528356926', 'a', 'a', '1528365109');
INSERT INTO `lar_admin_log` VALUES ('608', '2', '1528356926', 'admin_log', '管理员日志', '1528365141');
INSERT INTO `lar_admin_log` VALUES ('609', '2', '1528356926', 'admin_log', '管理员日志', '1528365183');
INSERT INTO `lar_admin_log` VALUES ('610', '2', '1528356926', 'a', 'a', '1528365220');
INSERT INTO `lar_admin_log` VALUES ('611', '2', '1528356926', 'a', 'a', '1528365229');
INSERT INTO `lar_admin_log` VALUES ('612', '2', '1528365258', 'info', '网站信息', '1528365258');
INSERT INTO `lar_admin_log` VALUES ('613', '2', '1528365258', 'loan', '借款管理', '1528365273');
INSERT INTO `lar_admin_log` VALUES ('614', '2', '1528365258', 'pledge_list', '会员抵押物管理', '1528365279');
INSERT INTO `lar_admin_log` VALUES ('615', '2', '1528365258', 'admin_note', '权限管理', '1528365284');
INSERT INTO `lar_admin_log` VALUES ('616', '2', '1528365258', 'role_add', '角色添加', '1528365285');
INSERT INTO `lar_admin_log` VALUES ('617', '2', '1528365258', 'node_add', '权限添加', '1528365286');
INSERT INTO `lar_admin_log` VALUES ('618', '2', '1528365258', 'admin_note', '权限管理', '1528365287');
INSERT INTO `lar_admin_log` VALUES ('619', '2', '1528365258', 'admin_log', '管理员日志', '1528365287');
INSERT INTO `lar_admin_log` VALUES ('620', '2', '1528365258', 'admin_note', '权限管理', '1528365288');
INSERT INTO `lar_admin_log` VALUES ('621', '2', '1528365258', 'red_packets_addlist', '红包列表', '1528365295');
INSERT INTO `lar_admin_log` VALUES ('622', '2', '1528365258', 'red_packets_list', '用户红包管理', '1528365295');
INSERT INTO `lar_admin_log` VALUES ('623', '2', '1528365258', 'admin_recharge', '用户充值管理', '1528365296');
INSERT INTO `lar_admin_log` VALUES ('624', '2', '1528365258', 'loan', '借款管理', '1528365297');
INSERT INTO `lar_admin_log` VALUES ('625', '2', '1528365258', 'pledge_list', '会员抵押物管理', '1528365297');
INSERT INTO `lar_admin_log` VALUES ('626', '2', '1528365258', 'user', '会员列表', '1528369917');
INSERT INTO `lar_admin_log` VALUES ('627', '2', '1528365258', 'user', '会员列表', '1528369934');
INSERT INTO `lar_admin_log` VALUES ('628', '2', '1528975324', 'info', '网站信息', '1528975326');
INSERT INTO `lar_admin_log` VALUES ('629', '2', '1528975324', 'adv', '首页轮播', '1528975609');
INSERT INTO `lar_admin_log` VALUES ('630', '2', '1528975324', 'pledge_list', '会员抵押物管理', '1528975610');
INSERT INTO `lar_admin_log` VALUES ('631', '2', '1528975324', 'pledge_list', '会员抵押物管理', '1528975611');
INSERT INTO `lar_admin_log` VALUES ('632', '2', '1528975324', 'red_packets_list', '用户红包管理', '1528975612');
INSERT INTO `lar_admin_log` VALUES ('633', '2', '1528975324', 'red_packets_addlist', '红包列表', '1528975612');
INSERT INTO `lar_admin_log` VALUES ('634', '2', '1528975324', 'loan', '借款管理', '1528975613');
INSERT INTO `lar_admin_log` VALUES ('635', '2', '1528975324', 'loan', '借款管理', '1528975614');
INSERT INTO `lar_admin_log` VALUES ('636', '2', '1528975324', 'user', '会员列表', '1528975615');
INSERT INTO `lar_admin_log` VALUES ('637', '2', '1528975324', 'pledge_list', '会员抵押物管理', '1528975615');
INSERT INTO `lar_admin_log` VALUES ('638', '2', '1528975324', 'userexport', '用户excel导出', '1528975617');

-- ----------------------------
-- Table structure for lar_admin_navigation
-- ----------------------------
DROP TABLE IF EXISTS `lar_admin_navigation`;
CREATE TABLE `lar_admin_navigation` (
  `nev_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nev_name` varchar(20) NOT NULL COMMENT '后台导航名',
  `nev_path` varchar(20) NOT NULL COMMENT '导航路由',
  `parent_id` varchar(4) NOT NULL COMMENT '父ID',
  `path` varchar(20) NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态（是否显示）',
  PRIMARY KEY (`nev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_admin_navigation
-- ----------------------------
INSERT INTO `lar_admin_navigation` VALUES ('1', '基本信息', 'parent', '0', '0', '1497626489', '1');
INSERT INTO `lar_admin_navigation` VALUES ('2', '栏目管理', 'parent', '0', '2', '1497267405', '1');
INSERT INTO `lar_admin_navigation` VALUES ('3', '用户管理', 'parent', '0', '3', '1497425302', '1');
INSERT INTO `lar_admin_navigation` VALUES ('4', '管理员管理', 'parent', '0', '4', '1497425302', '1');
INSERT INTO `lar_admin_navigation` VALUES ('5', '网站信息', 'info', '1', '1-5', '1497614256', '1');
INSERT INTO `lar_admin_navigation` VALUES ('6', '修改密码', 'uppw', '1', '1-6', '1497614331', '1');
INSERT INTO `lar_admin_navigation` VALUES ('7', '后台导航', 'nev_list', '1', '1-7', '1497614636', '1');
INSERT INTO `lar_admin_navigation` VALUES ('14', '文章管理', 'article_list', '2', '2-14', '1497615843', '1');
INSERT INTO `lar_admin_navigation` VALUES ('15', '首页轮播', 'adv', '2', '2-15', '1497615994', '1');
INSERT INTO `lar_admin_navigation` VALUES ('17', '用户管理列表', 'user', '3', '3-17', '1497616684', '1');
INSERT INTO `lar_admin_navigation` VALUES ('28', '用户抵押物管理', 'pledge_list', '3', '3-28', '1497617387', '1');
INSERT INTO `lar_admin_navigation` VALUES ('29', '权限添加', 'node_add', '4', '4-29', '1497620744', '1');
INSERT INTO `lar_admin_navigation` VALUES ('30', '角色添加', 'role_add', '4', '4-30', '1497617532', '1');
INSERT INTO `lar_admin_navigation` VALUES ('31', '用户借款管理', 'loan', '3', '3-31', '1497622133', '1');
INSERT INTO `lar_admin_navigation` VALUES ('35', '网站新闻', 'news_list', '2', '2-35', '1498478502', '1');
INSERT INTO `lar_admin_navigation` VALUES ('36', '权限管理', 'admin_note', '4', '4-36', '1497680966', '1');
INSERT INTO `lar_admin_navigation` VALUES ('37', '用户充值管理', 'admin_recharge', '3', '3-37', '1498545991', '1');
INSERT INTO `lar_admin_navigation` VALUES ('38', '网站收益', 'admin_income', '1', '1-38', '1498741212', '1');
INSERT INTO `lar_admin_navigation` VALUES ('39', '用户红包管理', 'red_packets_list', '3', '3-39', '1498748017', '1');
INSERT INTO `lar_admin_navigation` VALUES ('40', '用户红包列表', 'red_packets_addlist', '3', '3-40', '1498748050', '1');
INSERT INTO `lar_admin_navigation` VALUES ('44', '管理员日志', 'admin_log', '4', '4-44', '1499304008', '1');
INSERT INTO `lar_admin_navigation` VALUES ('45', '德玛西亚', 'adad', '2', '2-45', '1499219826', '0');
INSERT INTO `lar_admin_navigation` VALUES ('46', 'adssda', '111', '0', '46', '1499760698', '0');

-- ----------------------------
-- Table structure for lar_article
-- ----------------------------
DROP TABLE IF EXISTS `lar_article`;
CREATE TABLE `lar_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(50) NOT NULL,
  `article_content` varchar(255) NOT NULL,
  `add_time` varchar(11) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_article
-- ----------------------------
INSERT INTO `lar_article` VALUES ('32', '615256123', '681539816551623\r\n', '1499390029', '651256');
INSERT INTO `lar_article` VALUES ('30', '测试标题', '测试内容 ', '1497839197', 'admin');
INSERT INTO `lar_article` VALUES ('31', '测试标题3', '小腻腻', '1498292487', 'admin');

-- ----------------------------
-- Table structure for lar_a_r
-- ----------------------------
DROP TABLE IF EXISTS `lar_a_r`;
CREATE TABLE `lar_a_r` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `admin_id` int(11) NOT NULL COMMENT '管理员ID',
  `rote_id` int(11) NOT NULL COMMENT '角色ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_a_r
-- ----------------------------
INSERT INTO `lar_a_r` VALUES ('1', '1', '8');
INSERT INTO `lar_a_r` VALUES ('2', '2', '5');
INSERT INTO `lar_a_r` VALUES ('3', '3', '5');
INSERT INTO `lar_a_r` VALUES ('4', '4', '5');
INSERT INTO `lar_a_r` VALUES ('5', '5', '5');
INSERT INTO `lar_a_r` VALUES ('6', '6', '5');
INSERT INTO `lar_a_r` VALUES ('7', '8', '5');

-- ----------------------------
-- Table structure for lar_bids
-- ----------------------------
DROP TABLE IF EXISTS `lar_bids`;
CREATE TABLE `lar_bids` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID（投资人）',
  `product_id` int(11) NOT NULL COMMENT '借款ID',
  `bid_money` decimal(10,0) unsigned NOT NULL COMMENT '投资金额',
  `each_grows` decimal(10,2) NOT NULL COMMENT '投资收益',
  `create_time` int(11) NOT NULL COMMENT '投资时间',
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_bids
-- ----------------------------
INSERT INTO `lar_bids` VALUES ('1', '1', '10', '1000', '33.26', '1497941043');
INSERT INTO `lar_bids` VALUES ('94', '1', '11', '2000', '33.26', '1497941043');
INSERT INTO `lar_bids` VALUES ('95', '1', '11', '2000', '33.26', '1497941043');
INSERT INTO `lar_bids` VALUES ('96', '1', '11', '3000', '40.00', '1497941043');
INSERT INTO `lar_bids` VALUES ('97', '1', '11', '3000', '40.00', '1497941043');
INSERT INTO `lar_bids` VALUES ('98', '1', '11', '3000', '40.00', '1497941043');
INSERT INTO `lar_bids` VALUES ('99', '75', '11', '1000', '40.00', '1498142409');
INSERT INTO `lar_bids` VALUES ('100', '75', '11', '1000', '40.00', '1498142649');
INSERT INTO `lar_bids` VALUES ('101', '75', '11', '1000', '40.00', '1498142677');
INSERT INTO `lar_bids` VALUES ('107', '75', '11', '2000', '40.00', '1498181342');
INSERT INTO `lar_bids` VALUES ('108', '75', '11', '2000', '40.00', '1498181453');
INSERT INTO `lar_bids` VALUES ('127', '75', '14', '20000', '40.00', '1498266349');
INSERT INTO `lar_bids` VALUES ('128', '75', '9', '10000', '40.00', '1498268620');
INSERT INTO `lar_bids` VALUES ('129', '75', '9', '20000', '40.00', '1498286809');
INSERT INTO `lar_bids` VALUES ('130', '75', '9', '10000', '40.00', '1498290052');
INSERT INTO `lar_bids` VALUES ('131', '75', '9', '10000', '40.00', '1498290137');
INSERT INTO `lar_bids` VALUES ('132', '75', '9', '10000', '40.00', '1498290137');
INSERT INTO `lar_bids` VALUES ('133', '75', '12', '20000', '40.00', '1498290459');
INSERT INTO `lar_bids` VALUES ('134', '75', '12', '1000', '40.00', '1498290545');
INSERT INTO `lar_bids` VALUES ('135', '75', '12', '19000', '40.00', '1498389318');
INSERT INTO `lar_bids` VALUES ('141', '100', '13', '1000', '40.00', '1498400399');
INSERT INTO `lar_bids` VALUES ('142', '100', '9', '100', '56.97', '1498437367');
INSERT INTO `lar_bids` VALUES ('143', '100', '9', '100', '56.97', '1498437395');
INSERT INTO `lar_bids` VALUES ('144', '100', '9', '0', '56.97', '1498437427');
INSERT INTO `lar_bids` VALUES ('145', '100', '12', '10000', '56.97', '1498438351');
INSERT INTO `lar_bids` VALUES ('146', '100', '12', '7000', '56.97', '1498438389');
INSERT INTO `lar_bids` VALUES ('151', '78', '11', '19000', '56.97', '1498441340');
INSERT INTO `lar_bids` VALUES ('154', '75', '17', '5000', '300.00', '1498568424');
INSERT INTO `lar_bids` VALUES ('155', '75', '18', '20000', '2199.96', '1498661793');
INSERT INTO `lar_bids` VALUES ('156', '75', '18', '1000', '110.04', '1498718596');
INSERT INTO `lar_bids` VALUES ('157', '75', '29', '20000', '666.65', '1498804395');
INSERT INTO `lar_bids` VALUES ('158', '75', '29', '1000', '33.35', '1498804475');
INSERT INTO `lar_bids` VALUES ('159', '75', '29', '1000', '33.35', '1498804499');
INSERT INTO `lar_bids` VALUES ('160', '75', '29', '8000', '266.64', '1498804528');
INSERT INTO `lar_bids` VALUES ('161', '75', '29', '100', '3.35', '1498804545');
INSERT INTO `lar_bids` VALUES ('163', '75', '24', '2000', '66.65', '1498805800');
INSERT INTO `lar_bids` VALUES ('164', '106', '24', '5000', '166.64', '1498963125');
INSERT INTO `lar_bids` VALUES ('165', '75', '31', '20000', '900.00', '1498997258');
INSERT INTO `lar_bids` VALUES ('166', '75', '31', '20000', '900.00', '1498997271');
INSERT INTO `lar_bids` VALUES ('167', '75', '31', '20000', '900.00', '1498997297');
INSERT INTO `lar_bids` VALUES ('168', '75', '31', '20000', '900.00', '1498997298');
INSERT INTO `lar_bids` VALUES ('169', '75', '32', '20000', '1350.00', '1498999833');
INSERT INTO `lar_bids` VALUES ('170', '75', '38', '10000', '900.00', '1499042048');
INSERT INTO `lar_bids` VALUES ('171', '75', '24', '1000', '33.35', '1499044102');
INSERT INTO `lar_bids` VALUES ('172', '75', '24', '2950', '100.00', '1499052645');
INSERT INTO `lar_bids` VALUES ('173', '75', '24', '12000', '403.35', '1499052954');
INSERT INTO `lar_bids` VALUES ('174', '75', '24', '19950', '666.65', '1499053010');
INSERT INTO `lar_bids` VALUES ('175', '75', '39', '10950', '1095.00', '1499063465');
INSERT INTO `lar_bids` VALUES ('177', '75', '24', '2950', '100.00', '1499079801');
INSERT INTO `lar_bids` VALUES ('178', '75', '24', '2950', '100.00', '1499079801');
INSERT INTO `lar_bids` VALUES ('179', '75', '24', '19900', '666.65', '1499079836');
INSERT INTO `lar_bids` VALUES ('180', '116', '24', '3950', '133.35', '1499092903');
INSERT INTO `lar_bids` VALUES ('181', '75', '40', '2950', '250.00', '1499137863');
INSERT INTO `lar_bids` VALUES ('182', '75', '62', '3000', '325.00', '1499169598');
INSERT INTO `lar_bids` VALUES ('183', '75', '62', '1950', '1083.29', '1499181081');
INSERT INTO `lar_bids` VALUES ('184', '75', '62', '10000', '1083.29', '1499181108');
INSERT INTO `lar_bids` VALUES ('185', '75', '62', '10000', '1083.29', '1499181132');
INSERT INTO `lar_bids` VALUES ('186', '75', '61', '19900', '1866.62', '1499181880');
INSERT INTO `lar_bids` VALUES ('187', '75', '24', '2000', '66.65', '1499222992');
INSERT INTO `lar_bids` VALUES ('188', '75', '61', '1950', '186.62', '1499267626');
INSERT INTO `lar_bids` VALUES ('189', '116', '24', '3000', '100.00', '1499306241');
INSERT INTO `lar_bids` VALUES ('190', '106', '63', '2000', '159.96', '1499323476');
INSERT INTO `lar_bids` VALUES ('191', '75', '63', '1950', '159.96', '1499340633');
INSERT INTO `lar_bids` VALUES ('192', '75', '63', '1950', '159.96', '1499342316');
INSERT INTO `lar_bids` VALUES ('193', '75', '63', '1000', '80.03', '1499342972');
INSERT INTO `lar_bids` VALUES ('194', '75', '63', '1950', '159.96', '1499343016');
INSERT INTO `lar_bids` VALUES ('195', '75', '63', '10900', '879.96', '1499343110');
INSERT INTO `lar_bids` VALUES ('196', '75', '63', '7950', '800.04', '1499343277');
INSERT INTO `lar_bids` VALUES ('197', '75', '63', '6000', '480.00', '1499343345');
INSERT INTO `lar_bids` VALUES ('198', '75', '63', '2000', '159.96', '1499344014');
INSERT INTO `lar_bids` VALUES ('199', '75', '61', '2000', '186.62', '1499387853');
INSERT INTO `lar_bids` VALUES ('200', '75', '63', '1000', '80.03', '1499388220');
INSERT INTO `lar_bids` VALUES ('201', '75', '13', '1000', '30.00', '1499388399');
INSERT INTO `lar_bids` VALUES ('202', '116', '63', '2000', '159.96', '1499408433');
INSERT INTO `lar_bids` VALUES ('203', '75', '64', '20000', '900.00', '1499427390');
INSERT INTO `lar_bids` VALUES ('204', '112', '64', '20000', '900.00', '1499427758');
INSERT INTO `lar_bids` VALUES ('205', '114', '18', '3000', '330.00', '1499428264');
INSERT INTO `lar_bids` VALUES ('206', '75', '66', '2000', '200.04', '1499602773');
INSERT INTO `lar_bids` VALUES ('207', '75', '69', '20000', '3000.00', '1499696910');
INSERT INTO `lar_bids` VALUES ('208', '116', '68', '100', '4.97', '1499737164');
INSERT INTO `lar_bids` VALUES ('209', '75', '70', '20000', '3000.00', '1499739950');
INSERT INTO `lar_bids` VALUES ('210', '116', '68', '1000', '49.98', '1499740562');
INSERT INTO `lar_bids` VALUES ('211', '101', '68', '9900', '499.98', '1499759159');
INSERT INTO `lar_bids` VALUES ('212', '75', '66', '20000', '2000.04', '1499764013');
INSERT INTO `lar_bids` VALUES ('213', '101', '71', '1000', '90.00', '1499781347');
INSERT INTO `lar_bids` VALUES ('214', '75', '71', '7000', '630.00', '1499856568');
INSERT INTO `lar_bids` VALUES ('215', '75', '71', '1950', '180.00', '1499999444');
INSERT INTO `lar_bids` VALUES ('216', '129', '68', '8333', '416.64', '1500000771');
INSERT INTO `lar_bids` VALUES ('217', '75', '77', '10000', '1125.00', '1500041288');
INSERT INTO `lar_bids` VALUES ('218', '75', '78', '10000', '1500.00', '1500043896');
INSERT INTO `lar_bids` VALUES ('219', '75', '79', '8000', '960.00', '1500044401');
INSERT INTO `lar_bids` VALUES ('220', '75', '80', '15000', '2812.50', '1500045321');

-- ----------------------------
-- Table structure for lar_cash
-- ----------------------------
DROP TABLE IF EXISTS `lar_cash`;
CREATE TABLE `lar_cash` (
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `user_card` varchar(255) DEFAULT NULL COMMENT '银行卡号',
  `cash` varchar(255) DEFAULT NULL COMMENT '提现金额',
  `time` int(11) DEFAULT NULL COMMENT '提现时间',
  `cash_formalities` varchar(255) DEFAULT NULL COMMENT '提现手续费'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_cash
-- ----------------------------
INSERT INTO `lar_cash` VALUES ('75', '64456466', '150', '1498099160', '1.5');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '150', '1498099194', '1.5');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '150', '1498099233', '1.5');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '100', '1498099252', '1');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '130', '1498099358', '1.3');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '150', '1498101224', '1.5');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '100', '1498102069', '1');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '100', '1498102154', '1');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '100', '1498102161', '1');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '100', '1498103697', '1');
INSERT INTO `lar_cash` VALUES ('75', '64456466', '100', '1498103721', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498391477', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498391659', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '233', '1498391913', '2.33');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '233', '1498391914', '2.33');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393385', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393456', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393500', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393537', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393558', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393567', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393590', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393650', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393660', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393750', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393764', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393782', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393792', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393795', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '300', '1498393801', '3');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '400', '1498393807', '4');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '400', '1498393863', '4');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498393899', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '300', '1498393911', '3');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '300', '1498393914', '3');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '400', '1498393949', '4');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '400', '1498393970', '4');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '500', '1498393980', '5');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498393987', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '299', '1498393992', '2.99');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '800', '1498394024', '8');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498394031', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498394035', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '299', '1498394044', '2.99');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '399', '1498394050', '3.99');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '300', '1498394054', '3');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '101', '1498394085', '1.01');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498662350', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498662550', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498662786', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498663245', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498663270', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498665972', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498666188', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '200', '1498666575', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498803938', '1');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '2000', '1498804220', '20');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '100', '1498804304', '1');
INSERT INTO `lar_cash` VALUES ('106', '123131213431232', '200', '1499302655', '2');
INSERT INTO `lar_cash` VALUES ('75', '6513165156165', '1000', '1499603896', '10');
INSERT INTO `lar_cash` VALUES ('129', '11514616843249841616', '100000', '1500000935', '1000');

-- ----------------------------
-- Table structure for lar_credits
-- ----------------------------
DROP TABLE IF EXISTS `lar_credits`;
CREATE TABLE `lar_credits` (
  `credit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL COMMENT '用户id',
  `credit_level` int(5) DEFAULT '0' COMMENT '用户信用等级',
  `credit_number` int(10) DEFAULT '550' COMMENT '用户信用积分',
  `user_arrears` decimal(10,2) DEFAULT '0.00' COMMENT '用户逾期欠款金额',
  `assess_time` varchar(50) DEFAULT NULL COMMENT '信用评估时间',
  `arrears_num` int(10) DEFAULT '0' COMMENT '逾期次数',
  `arrears_time` varchar(50) DEFAULT NULL COMMENT '预留字段',
  PRIMARY KEY (`credit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_credits
-- ----------------------------
INSERT INTO `lar_credits` VALUES ('3', '106', '0', '550', '0.00', '2017-06-24 00:51:26', '0', null);
INSERT INTO `lar_credits` VALUES ('4', '107', '0', '550', '0.00', '2017-06-24 00:51:26', '0', null);
INSERT INTO `lar_credits` VALUES ('6', '109', '0', '550', '0.00', '2017-06-24 10:51:26', '0', null);
INSERT INTO `lar_credits` VALUES ('7', '1', '0', '444', '0.00', '2017-06-24 10:51:26', '0', null);
INSERT INTO `lar_credits` VALUES ('8', '3', '0', '627', '0.00', '2017-06-24 10:51:26', '0', null);
INSERT INTO `lar_credits` VALUES ('10', '75', '0', '660', '0.00', '2017-06-24 10:51:26', '0', null);
INSERT INTO `lar_credits` VALUES ('11', '101', '0', '560', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('13', '112', '0', '562', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('14', '113', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('15', '114', '0', '555', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('16', '115', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('17', '78', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('18', '116', '0', '523', '0.00', '2017-06-24 10:51:26', '0', null);
INSERT INTO `lar_credits` VALUES ('19', '117', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('20', '118', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('21', '119', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('22', '120', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('23', '121', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('24', '122', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('25', '123', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('26', '124', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('27', '0', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('28', '125', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('29', '126', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('30', '127', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('31', '128', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('32', '129', '0', '560', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('33', '130', '0', '550', '0.00', null, '0', null);
INSERT INTO `lar_credits` VALUES ('34', '131', '0', '550', '0.00', null, '0', null);

-- ----------------------------
-- Table structure for lar_feng_trun
-- ----------------------------
DROP TABLE IF EXISTS `lar_feng_trun`;
CREATE TABLE `lar_feng_trun` (
  `turn_id` int(11) NOT NULL AUTO_INCREMENT,
  `trun_name` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `trun_reward` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trun_add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`turn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_feng_trun
-- ----------------------------
INSERT INTO `lar_feng_trun` VALUES ('1', '400积分', '1', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('2', '红包50元', '50.00', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('3', '谢谢参与', '0', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('4', '200积分', '2', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('5', '800积分', '5', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('6', '红包100元', '1', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('7', '红包50元', '1', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('8', '1000积分', '50.00', '1497547893');
INSERT INTO `lar_feng_trun` VALUES ('9', '200积分', '100.00', '1497547893');

-- ----------------------------
-- Table structure for lar_feng_u_t
-- ----------------------------
DROP TABLE IF EXISTS `lar_feng_u_t`;
CREATE TABLE `lar_feng_u_t` (
  `user_id` int(11) NOT NULL,
  `trun_name` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_feng_u_t
-- ----------------------------
INSERT INTO `lar_feng_u_t` VALUES ('75', '红包100元', '1498924800');
INSERT INTO `lar_feng_u_t` VALUES ('112', '100积分', '1498924800');
INSERT INTO `lar_feng_u_t` VALUES ('101', '200积分', '1498924800');
INSERT INTO `lar_feng_u_t` VALUES ('75', '200积分', '1499011200');
INSERT INTO `lar_feng_u_t` VALUES ('112', '200积分', '1499011200');
INSERT INTO `lar_feng_u_t` VALUES ('116', '红包50元', '1499011200');
INSERT INTO `lar_feng_u_t` VALUES ('119', '200积分', '1499184000');
INSERT INTO `lar_feng_u_t` VALUES ('112', null, '1499184000');
INSERT INTO `lar_feng_u_t` VALUES ('122', '红包100元', '1499184000');
INSERT INTO `lar_feng_u_t` VALUES ('75', '1000积分', '1499356800');
INSERT INTO `lar_feng_u_t` VALUES ('123', '200积分', '1499356800');
INSERT INTO `lar_feng_u_t` VALUES ('114', '200积分', '1499356800');
INSERT INTO `lar_feng_u_t` VALUES ('124', '红包100元', '1499356800');
INSERT INTO `lar_feng_u_t` VALUES ('75', '红包100元', '1499443200');
INSERT INTO `lar_feng_u_t` VALUES ('112', '200积分', '1499529600');
INSERT INTO `lar_feng_u_t` VALUES ('75', null, '1499529600');
INSERT INTO `lar_feng_u_t` VALUES ('112', '200积分', '1499616000');
INSERT INTO `lar_feng_u_t` VALUES ('75', '200积分', '1499616000');
INSERT INTO `lar_feng_u_t` VALUES ('101', '红包50元', '1499702400');
INSERT INTO `lar_feng_u_t` VALUES ('112', '1000积分', '1499702400');
INSERT INTO `lar_feng_u_t` VALUES ('128', '400积分', '1499875200');
INSERT INTO `lar_feng_u_t` VALUES ('128', '红包100元', '1499961600');

-- ----------------------------
-- Table structure for lar_financial_news
-- ----------------------------
DROP TABLE IF EXISTS `lar_financial_news`;
CREATE TABLE `lar_financial_news` (
  `news_id` int(5) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_link` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_addtime` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_cat` int(5) DEFAULT NULL COMMENT '1媒体报道2理财知识',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_financial_news
-- ----------------------------
INSERT INTO `lar_financial_news` VALUES ('311', '虚拟货币变庞氏骗局:亚欧币忽悠4万余人上当受骗', 'http://finance.sina.com.cn/money/lczx/2017-07-14/d', '07月14日 07:27', '2');
INSERT INTO `lar_financial_news` VALUES ('312', '比特币理财银行在瑞士私人银行开放 市场行情小幅反弹', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 17:11', '2');
INSERT INTO `lar_financial_news` VALUES ('313', '让高原的格桑花开得更绚烂', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:32', '2');
INSERT INTO `lar_financial_news` VALUES ('314', '在孩子心中种下创新和公益的种子', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:32', '2');
INSERT INTO `lar_financial_news` VALUES ('315', '邵宇：在市场实践中寻找真实的经济学', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:31', '2');
INSERT INTO `lar_financial_news` VALUES ('316', 'HYPEREAL黄柴铭：VR会成为生产力工具', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:31', '2');
INSERT INTO `lar_financial_news` VALUES ('317', '上海先生，“港脚商”，海盗商人', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:31', '2');
INSERT INTO `lar_financial_news` VALUES ('318', '萤萤星光 点亮梦想', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:31', '2');
INSERT INTO `lar_financial_news` VALUES ('319', '哇棒传媒颜鸿：传统广告可以和移动广告相融合', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:31', '2');
INSERT INTO `lar_financial_news` VALUES ('320', '安联儿童安全课堂：关注民工子弟安全教育', 'http://finance.sina.com.cn/money/lczx/2017-07-13/d', '07月13日 13:31', '2');
INSERT INTO `lar_financial_news` VALUES ('321', '母公司SPI退市几成定局 绿能宝兑付更无望', 'http://www.wangdaidongtai.com/article-34605-1.html', '1499985702', '1');
INSERT INTO `lar_financial_news` VALUES ('322', '人工智能来袭 金融行业迎来下岗潮', 'http://www.wangdaidongtai.com/article-34607-1.html', '1499990260', '1');
INSERT INTO `lar_financial_news` VALUES ('323', '“国际大腕”借贷宝合规存疑：无存管且涉嫌', 'http://www.wangdaidongtai.com/article-34604-1.html', '1499993004', '1');
INSERT INTO `lar_financial_news` VALUES ('324', '史上最严互联网车险规定落地：或仅限于提供', 'http://www.wangdaidongtai.com/article-34584-1.html', '1499986180', '1');
INSERT INTO `lar_financial_news` VALUES ('325', '移动支付份额2年5倍 互联网金融或成腾讯下', 'http://www.wangdaidongtai.com/article-34585-1.html', '1499990974', '1');
INSERT INTO `lar_financial_news` VALUES ('326', 'T金所涉嫌自融 背靠TCL就可高枕无忧？', 'http://www.wangdaidongtai.com/article-34575-1.html', '1499990320', '1');
INSERT INTO `lar_financial_news` VALUES ('327', '24家平台逾期率调查：17家竟然比银行还要低', 'http://www.wangdaidongtai.com/article-34576-1.html', '1499993736', '1');
INSERT INTO `lar_financial_news` VALUES ('328', '超1800家违规互金平台仍在活跃 大学生、教', 'http://www.wangdaidongtai.com/article-34577-1.html', '1499990255', '1');
INSERT INTO `lar_financial_news` VALUES ('329', '珠宝商周大福做互联网金融 知道其中的风险', 'http://www.wangdaidongtai.com/article-34548-1.html', '1499986461', '1');
INSERT INTO `lar_financial_news` VALUES ('330', '银监会高层发声：P2P网贷平台必自律化、透', 'http://www.wangdaidongtai.com/article-15464-1.html', '1499986034', '1');

-- ----------------------------
-- Table structure for lar_goods
-- ----------------------------
DROP TABLE IF EXISTS `lar_goods`;
CREATE TABLE `lar_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_id` varchar(60) NOT NULL COMMENT '用户id',
  `type` tinyint(1) NOT NULL COMMENT '类型 1房产     2车辆',
  `pre_money` decimal(10,2) NOT NULL COMMENT '用户预算价格',
  `vale_money` decimal(10,2) NOT NULL COMMENT '实际评估的价值',
  `goods_name` varchar(60) NOT NULL COMMENT '质押的物品名称',
  `goods_img` varchar(200) NOT NULL COMMENT '相关图片（多图 ，分割）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态   0未抵押     1抵押中 2 已放款',
  `is_check` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否验证     0未验证      1已验证通过并评估',
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_goods
-- ----------------------------
INSERT INTO `lar_goods` VALUES ('1', '1', '1', '100000.00', '20000.00', '奔驰1', 'uploads/bids/2017/06/27/2017-06-27-09-35-55-5951b67b2f85f.jpg', '2', '1', '1498517355');
INSERT INTO `lar_goods` VALUES ('2', '1', '2', '100000.00', '300000.00', '别墅', 'uploads/bids/2017/06/27/2017-06-27-14-14-39-5951f7cfed1f9.jpg', '2', '1', '1498541080');
INSERT INTO `lar_goods` VALUES ('8', '6', '2', '100000.00', '300000.00', '奔驰2', 'uploads/18abbdf381fab354e76d8661a90acf67.png', '1', '1', '1498521679');
INSERT INTO `lar_goods` VALUES ('9', '1', '2', '100000.00', '20000.00', '奔驰1', 'uploads/bids/2017/06/27/2017-06-27-09-35-55-5951b67b2f85f.jpg', '1', '0', '1498521893');
INSERT INTO `lar_goods` VALUES ('10', '2', '1', '100000.00', '80000.00', '别墅', 'uploads/bids/2017/06/27/2017-06-27-14-14-39-5951f7cfed1f9.jpg', '2', '1', '1498514171');
INSERT INTO `lar_goods` VALUES ('11', '6', '2', '100000.00', '70000.00', '奔驰2', 'uploads/18abbdf381fab354e76d8661a90acf67.png', '1', '1', '1498514523');
INSERT INTO `lar_goods` VALUES ('12', '1', '2', '100000.00', '20000.00', '奔驰1', 'uploads/bids/2017/06/27/2017-06-27-09-35-55-5951b67b2f85f.jpg', '1', '0', '1498517355');
INSERT INTO `lar_goods` VALUES ('13', '2', '1', '100000.00', '100000.00', '别墅', 'uploads/bids/2017/06/27/2017-06-27-14-14-39-5951f7cfed1f9.jpg', '1', '1', '1498514080');
INSERT INTO `lar_goods` VALUES ('14', '6', '2', '100000.00', '80000.00', '奔驰2', 'uploads/18abbdf381fab354e76d8661a90acf67.png', '1', '1', '1498519679');
INSERT INTO `lar_goods` VALUES ('15', '1', '1', '100000.00', '20000.00', '宝马S6', 'uploads/bids/2017/06/27/2017-06-27-09-35-55-5951b67b2f85f.jpg', '1', '0', '1497527893');
INSERT INTO `lar_goods` VALUES ('16', '2', '1', '100000.00', '80000.00', '别墅', 'uploads/bids/2017/06/27/2017-06-27-14-14-39-5951f7cfed1f9.jpg', '1', '1', '1498144171');
INSERT INTO `lar_goods` VALUES ('17', '6', '2', '100000.00', '80000.00', '法拉利', 'uploads/18abbdf381fab354e76d8661a90acf67.png', '1', '1', '1498514523');
INSERT INTO `lar_goods` VALUES ('19', '75', '1', '1000000.00', '80000.00', '宝马S6', 'uploads/bids/2017/06/27/2017-06-27-09-35-55-5951b67b2f85f.jpg', '1', '1', '1498527355');
INSERT INTO `lar_goods` VALUES ('25', '75', '2', '200000.00', '120000.00', '法拉利', 'uploads/bids/2017/06/27/2017-06-27-14-14-39-5951f7cfed1f9.jpg', '1', '1', '1498544080');
INSERT INTO `lar_goods` VALUES ('24', '75', '2', '100000.00', '80000.00', '上海大众', 'uploads/bids/2017/06/27/2017-06-27-10-14-39-5951bf8f0d914.jpg', '1', '1', '1498529679');
INSERT INTO `lar_goods` VALUES ('23', '75', '2', '2000000.00', '10000.00', '劳斯莱斯幻影', 'uploads/bids/2017/06/27/2017-06-27-09-44-53-5951b8956bc61.jpg', '1', '1', '1498527893');
INSERT INTO `lar_goods` VALUES ('26', '75', '1', '50000.00', '0.00', '写字楼', 'uploads/bids/2017/06/27/2017-06-27-14-16-11-5951f82b2c8ca.jpg', '1', '1', '1498544171');
INSERT INTO `lar_goods` VALUES ('27', '75', '1', '1000000.00', '100000.00', '写字楼', 'uploads/bids/2017/06/27/2017-06-27-14-22-03-5951f98b1e2d4.jpeg', '2', '1', '1498544523');
INSERT INTO `lar_goods` VALUES ('28', '75', '2', '1000000.00', '900000.00', '比亚迪', 'uploads/bids/2017/06/28/2017-06-28-08-36-41-5952fa19b4ac5.jpg', '1', '1', '1498610201');
INSERT INTO `lar_goods` VALUES ('29', '111', '1', '500000.00', '500000.00', '休闲服', 'uploads/bids/2017/07/27/2017-07-27-19-08-59-5979c9cb37d3a.jpg', '1', '1', '1501153739');
INSERT INTO `lar_goods` VALUES ('30', '111', '1', '40000.00', '30000.00', '休闲', 'uploads/bids/2017/07/27/2017-07-27-20-28-18-5979dc62b9857.jpg', '1', '1', '1501158498');
INSERT INTO `lar_goods` VALUES ('31', '75', '1', '100000.00', '90000.00', 'www.baidu.com', 'uploads/bids/2017/06/30/2017-06-30-15-01-30-5955f74a5da52.jpg', '2', '1', '1498806090');
INSERT INTO `lar_goods` VALUES ('38', '116', '1', '15000.00', '20000.00', '奇瑞qq', 'uploads/bids/2017/07/02/2017-07-02-23-22-02-59590f9abaff7.jpg', '1', '1', '1499008922');
INSERT INTO `lar_goods` VALUES ('39', '116', '2', '20000.00', '20000.00', '奥迪派克峰', 'uploads/bids/2017/07/02/2017-07-02-23-30-55-595911afdfbd5.jpg', '1', '1', '1499009455');
INSERT INTO `lar_goods` VALUES ('40', '116', '1', '20000.00', '20000.00', 'www.yt0310.com', 'uploads/bids/2017/07/03/2017-07-03-10-01-27-5959a5770dd68.jpg', '2', '1', '1499047287');
INSERT INTO `lar_goods` VALUES ('41', '75', '2', '200000.00', '50000.00', '靳威洋', 'uploads/bids/2017/07/03/2017-07-03-14-27-37-5959e3d9d94f6.bmp', '2', '1', '1499063257');
INSERT INTO `lar_goods` VALUES ('42', '75', '2', '300000.00', '150000.00', '宝马V5', 'uploads/bids/2017/07/04/2017-07-04-15-10-17-595b3f594a1bb.bmp', '1', '1', '1499152217');
INSERT INTO `lar_goods` VALUES ('43', '75', '2', '100000.00', '80000.00', '狗蛋', 'uploads/bids/2017/07/04/2017-07-04-16-41-11-595b54a754984.png', '2', '1', '1499157671');
INSERT INTO `lar_goods` VALUES ('44', '119', '1', '99999999.99', '1.00', '美女一个', 'uploads/bids/2017/07/05/2017-07-05-19-56-57-595cd40917a93.png', '1', '1', '1499255817');
INSERT INTO `lar_goods` VALUES ('45', '106', '2', '1000000.00', '90000.00', '法拉利', 'uploads/bids/2017/07/06/2017-07-06-09-05-06-595d8cc2ece4a.bmp', '1', '1', '1499303106');
INSERT INTO `lar_goods` VALUES ('46', '112', '2', '1000000.00', '100000.00', '法拉利跑车', 'uploads/bids/2017/07/06/2017-07-06-14-23-03-595dd747d1b7f.png', '1', '1', '1499322183');
INSERT INTO `lar_goods` VALUES ('47', '116', '1', '40000.00', '40000.00', 'www.yt0310.com', 'uploads/bids/2017/07/07/2017-07-07-19-34-08-595f71b025b6f.jpg', '2', '1', '1499427248');
INSERT INTO `lar_goods` VALUES ('48', '114', '2', '1000000.00', '500000.00', '军孙子', 'uploads/bids/2017/07/07/2017-07-07-19-52-37-595f7605a8c3d.png', '2', '1', '1499428357');
INSERT INTO `lar_goods` VALUES ('51', '116', '1', '20000.00', '20000.00', '4444444', 'uploads/bids/2017/07/10/2017-07-10-22-26-10-59638e822854c.jpg', '1', '1', '1499696770');
INSERT INTO `lar_goods` VALUES ('52', '116', '1', '20000.00', '20000.00', '66666666666666', 'uploads/bids/2017/07/11/2017-07-11-10-23-54-596436bacb6a6.jpg', '1', '1', '1499739834');
INSERT INTO `lar_goods` VALUES ('53', '101', '2', '10000000.00', '900000.00', '宝马', 'uploads/bids/2017/07/11/2017-07-11-15-46-45-59648265b9c1a.jpg', '1', '1', '1499759205');
INSERT INTO `lar_goods` VALUES ('54', '101', '1', '200000.00', '100000.00', 'www.xlibb.top', 'uploads/bids/2017/07/11/2017-07-11-20-55-44-5964cad09337b.jpg', '1', '1', '1499777744');
INSERT INTO `lar_goods` VALUES ('55', '129', '2', '200000.00', '190000.00', '法拉利', 'uploads/bids/2017/07/14/2017-07-14-11-28-29-59683a5d09801.png', '1', '1', '1500002909');
INSERT INTO `lar_goods` VALUES ('56', '116', '1', '10000.00', '0.00', '111111111', 'uploads/bids/2017/07/14/2017-07-14-21-16-16-5968c42012e16.jpg', '1', '0', '1500038176');
INSERT INTO `lar_goods` VALUES ('57', '116', '1', '10000.00', '10000.00', '88888888888888888', 'uploads/bids/2017/07/14/2017-07-14-21-46-40-5968cb40b9c5e.jpg', '2', '1', '1500040000');
INSERT INTO `lar_goods` VALUES ('58', '75', '1', '10000.00', '10000.00', '222222222', 'uploads/bids/2017/07/14/2017-07-14-22-50-36-5968da3c7658e.jpg', '2', '1', '1500043836');
INSERT INTO `lar_goods` VALUES ('60', '116', '1', '10000.00', '8000.00', '衬衫', 'uploads/bids/2017/07/14/2017-07-14-22-58-58-5968dc3217106.jpg', '2', '1', '1500044338');
INSERT INTO `lar_goods` VALUES ('61', '116', '2', '18000.00', '15000.00', '20000', 'uploads/bids/2017/07/14/2017-07-14-23-14-11-5968dfc3eb11b.jpg', '2', '1', '1500045251');

-- ----------------------------
-- Table structure for lar_income
-- ----------------------------
DROP TABLE IF EXISTS `lar_income`;
CREATE TABLE `lar_income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(30) NOT NULL COMMENT '日期',
  `income` decimal(10,2) DEFAULT '0.00' COMMENT '网站收益',
  `pv` int(10) DEFAULT '0' COMMENT 'ip访问量',
  `uv` int(10) DEFAULT '0' COMMENT '用户访问量',
  `liquid_assets` decimal(10,2) DEFAULT '0.00' COMMENT '流动资产',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_income
-- ----------------------------
INSERT INTO `lar_income` VALUES ('10', '1499011200', '6738.34', '100', '7', '284383.92');
INSERT INTO `lar_income` VALUES ('11', '1499097600', '3274.99', '66', '8', '184383.92');
INSERT INTO `lar_income` VALUES ('19', '1499184000', '4738.34', '61', '10', '0.00');
INSERT INTO `lar_income` VALUES ('22', '1499270400', '191.99', '741', '12', '44571.54');
INSERT INTO `lar_income` VALUES ('23', '1499356800', '1473.29', '182', '99', '574989.70');
INSERT INTO `lar_income` VALUES ('24', '1499443200', '65.01', '199', '241', '17901.67');
INSERT INTO `lar_income` VALUES ('25', '1499529600', '43.33', '127', '118', '6787.18');
INSERT INTO `lar_income` VALUES ('26', '1499616000', '141.66', '536', '29', '47178.87');
INSERT INTO `lar_income` VALUES ('27', '1499702400', '212.50', '679', '43', '32370.89');
INSERT INTO `lar_income` VALUES ('28', '1499788800', '0.00', '71', '55', '0.00');
INSERT INTO `lar_income` VALUES ('29', '1499875200', '0.00', '74', '35', '0.00');
INSERT INTO `lar_income` VALUES ('30', '1499961600', '1161.83', '396', '76', '26895.36');
INSERT INTO `lar_income` VALUES ('31', '1500048000', '0.00', '4', '4', '0.00');
INSERT INTO `lar_income` VALUES ('32', '1528300800', '0.00', '37', '2', '0.00');
INSERT INTO `lar_income` VALUES ('33', '1528905600', '0.00', '77', '2', '0.00');

-- ----------------------------
-- Table structure for lar_integral
-- ----------------------------
DROP TABLE IF EXISTS `lar_integral`;
CREATE TABLE `lar_integral` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `integral` int(11) NOT NULL COMMENT '积分',
  `end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_integral
-- ----------------------------
INSERT INTO `lar_integral` VALUES ('1', '400', '1497613901');
INSERT INTO `lar_integral` VALUES ('75', '1000', '1497615373');
INSERT INTO `lar_integral` VALUES ('86', '200', '1497536978');
INSERT INTO `lar_integral` VALUES ('101', '200', '1498830836');
INSERT INTO `lar_integral` VALUES ('107', '200', '1498209335');
INSERT INTO `lar_integral` VALUES ('114', '200', '1498830836');

-- ----------------------------
-- Table structure for lar_invite
-- ----------------------------
DROP TABLE IF EXISTS `lar_invite`;
CREATE TABLE `lar_invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `invite_id` int(11) NOT NULL COMMENT '邀请人ID',
  `be_invite_id` int(11) DEFAULT NULL COMMENT '被邀请人ID',
  `invite_time` int(11) DEFAULT NULL COMMENT '邀请时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_invite
-- ----------------------------
INSERT INTO `lar_invite` VALUES ('6', '86', '88', '1497536978');
INSERT INTO `lar_invite` VALUES ('7', '6', '78', '1497613901');
INSERT INTO `lar_invite` VALUES ('9', '1', '107', '1498208957');
INSERT INTO `lar_invite` VALUES ('10', '107', '109', '1498209334');
INSERT INTO `lar_invite` VALUES ('44', '75', null, null);
INSERT INTO `lar_invite` VALUES ('34', '119', null, null);
INSERT INTO `lar_invite` VALUES ('37', '75', null, null);
INSERT INTO `lar_invite` VALUES ('38', '75', null, null);
INSERT INTO `lar_invite` VALUES ('39', '75', null, null);
INSERT INTO `lar_invite` VALUES ('40', '123', null, null);
INSERT INTO `lar_invite` VALUES ('41', '114', null, null);
INSERT INTO `lar_invite` VALUES ('51', '112', null, null);
INSERT INTO `lar_invite` VALUES ('52', '112', null, null);
INSERT INTO `lar_invite` VALUES ('53', '112', null, null);
INSERT INTO `lar_invite` VALUES ('54', '112', null, null);
INSERT INTO `lar_invite` VALUES ('55', '112', null, null);
INSERT INTO `lar_invite` VALUES ('56', '112', null, null);
INSERT INTO `lar_invite` VALUES ('62', '112', null, null);
INSERT INTO `lar_invite` VALUES ('61', '112', null, null);
INSERT INTO `lar_invite` VALUES ('59', '101', null, null);
INSERT INTO `lar_invite` VALUES ('60', '101', null, null);
INSERT INTO `lar_invite` VALUES ('65', '112', null, null);
INSERT INTO `lar_invite` VALUES ('66', '128', null, null);
INSERT INTO `lar_invite` VALUES ('67', '128', null, null);

-- ----------------------------
-- Table structure for lar_logs
-- ----------------------------
DROP TABLE IF EXISTS `lar_logs`;
CREATE TABLE `lar_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `u_id` int(11) NOT NULL COMMENT '操作人ID',
  `user_id` int(11) NOT NULL COMMENT '还款用户',
  `money` decimal(10,0) NOT NULL COMMENT '金额',
  `project_id` int(11) DEFAULT NULL COMMENT '借款ID',
  `create_time` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_logs
-- ----------------------------

-- ----------------------------
-- Table structure for lar_node
-- ----------------------------
DROP TABLE IF EXISTS `lar_node`;
CREATE TABLE `lar_node` (
  `node_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '权限ID',
  `node_title` varchar(30) NOT NULL COMMENT '权限标题',
  `node_path` varchar(30) NOT NULL COMMENT '权限路径',
  `parent_id` int(8) NOT NULL COMMENT '父级权限ID',
  `path` varchar(20) NOT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_node
-- ----------------------------
INSERT INTO `lar_node` VALUES ('1', '网站信息', 'info', '0', '0');
INSERT INTO `lar_node` VALUES ('2', '修改密码', 'uppw', '0', '2');
INSERT INTO `lar_node` VALUES ('3', '后台导航', 'nev_list', '0', '3');
INSERT INTO `lar_node` VALUES ('4', '文章管理', 'article_list', '0', '4');
INSERT INTO `lar_node` VALUES ('5', '首页轮播', 'adv', '0', '5');
INSERT INTO `lar_node` VALUES ('6', '会员列表', 'user', '0', '6');
INSERT INTO `lar_node` VALUES ('7', '会员抵押物管理', 'pledge_list', '0', '7');
INSERT INTO `lar_node` VALUES ('8', '权限添加', 'node_add', '0', '8');
INSERT INTO `lar_node` VALUES ('9', '角色添加', 'role_add', '0', '9');
INSERT INTO `lar_node` VALUES ('10', '借款管理', 'loan', '0', '10');
INSERT INTO `lar_node` VALUES ('12', '文章添加', 'article_add', '4', '4-12');
INSERT INTO `lar_node` VALUES ('13', '文章删除', 'article_del', '4', '4-13');
INSERT INTO `lar_node` VALUES ('14', '文章修改', 'article_update', '4', '4-14');
INSERT INTO `lar_node` VALUES ('15', '轮播图添加', 'adv_add', '5', '5-15');
INSERT INTO `lar_node` VALUES ('16', '轮播图删除', 'adv_del', '5', '5-16');
INSERT INTO `lar_node` VALUES ('17', '轮播图修改', 'adv_upd', '5', '5-17');
INSERT INTO `lar_node` VALUES ('18', '侧栏添加', 'adm_nav', '3', '3-18');
INSERT INTO `lar_node` VALUES ('19', '侧栏修改', 'nev_upd', '3', '3-19');
INSERT INTO `lar_node` VALUES ('20', '侧栏删除', 'nev_del', '3', '3-20');
INSERT INTO `lar_node` VALUES ('21', '侧栏保存', 'adm_nav_save', '3', '3-21');
INSERT INTO `lar_node` VALUES ('22', '会员信息查看', 'userinfo', '6', '6-22');
INSERT INTO `lar_node` VALUES ('23', '会员信息审核', 'usercheck', '6', '6-23');
INSERT INTO `lar_node` VALUES ('24', '抵押物验证', 'is_check', '7', '7-24');
INSERT INTO `lar_node` VALUES ('26', '角色权限添加', 'add_role_rn', '25', '25-26');
INSERT INTO `lar_node` VALUES ('25', '权限管理', 'admin_note', '0', '25');
INSERT INTO `lar_node` VALUES ('27', '用户审核', 'userinfo', '6', '6-36');
INSERT INTO `lar_node` VALUES ('31', '用户借款管理', 'project', '6', '6-31');
INSERT INTO `lar_node` VALUES ('30', '管理员添加', 'admin_add', '25', '25-30');
INSERT INTO `lar_node` VALUES ('32', '借款搜索', 'loan_search', '10', '10-31');
INSERT INTO `lar_node` VALUES ('33', '会员信息审核', 'userCheck', '6', '6-33');
INSERT INTO `lar_node` VALUES ('34', '会员召回', 'recall', '6', '6-34');
INSERT INTO `lar_node` VALUES ('35', '会员发送邮件', 'mail', '6', '6-35');
INSERT INTO `lar_node` VALUES ('36', '网站新闻', 'news_list', '4', '4-36');
INSERT INTO `lar_node` VALUES ('37', '用户充值管理', 'admin_recharge', '3', '3-37');
INSERT INTO `lar_node` VALUES ('38', '用户充值管理', 'admin_recharge', '6', '6-38');
INSERT INTO `lar_node` VALUES ('46', '红包添加', 'red_packets_add', '3', '3-46');
INSERT INTO `lar_node` VALUES ('40', '网站收益统计', 'admin_income', '1', '1-40');
INSERT INTO `lar_node` VALUES ('41', '用户红包管理', 'red_packets_list', '3', '3-39');
INSERT INTO `lar_node` VALUES ('42', '红包列表', 'red_packets_addlist', '3', '3-40');
INSERT INTO `lar_node` VALUES ('43', '用户红包管理', 'red_packets_list', '6', '6-43');
INSERT INTO `lar_node` VALUES ('47', '红包生成', 'red_packets_add_do', '3', '3-47');
INSERT INTO `lar_node` VALUES ('45', '用户excel导出', 'userexport', '6', '6-45');
INSERT INTO `lar_node` VALUES ('48', '抵押物验证', 'is_check', '7', '7-48');
INSERT INTO `lar_node` VALUES ('54', '管理员日志', 'admin_log', '4', '4-44');
INSERT INTO `lar_node` VALUES ('55', '管理员日志', 'admin_log', '25', '25-55');
INSERT INTO `lar_node` VALUES ('56', '德玛西亚', 'adad', '2', '2-45');
INSERT INTO `lar_node` VALUES ('57', 'adssda', '111', '0', '46');

-- ----------------------------
-- Table structure for lar_order
-- ----------------------------
DROP TABLE IF EXISTS `lar_order`;
CREATE TABLE `lar_order` (
  `order_id` bigint(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_order
-- ----------------------------
INSERT INTO `lar_order` VALUES ('20170707164542367', '123', '0.01', '0', '2017-07-07 16:45:42');
INSERT INTO `lar_order` VALUES ('20170707172654181', '123', '1.00', '0', '2017-07-07 17:26:54');
INSERT INTO `lar_order` VALUES ('20170707173007206', '123', '0.01', '0', '2017-07-07 17:30:08');
INSERT INTO `lar_order` VALUES ('20170707173731121', '123', '0.01', '0', '2017-07-07 17:37:31');
INSERT INTO `lar_order` VALUES ('20170707174107183', '123', '0.01', '0', '2017-07-07 17:41:07');
INSERT INTO `lar_order` VALUES ('20170707174156127', '123', '0.01', '0', '2017-07-07 17:41:56');
INSERT INTO `lar_order` VALUES ('20170707174326189', '123', '0.01', '0', '2017-07-07 17:43:26');
INSERT INTO `lar_order` VALUES ('20170707174337198', '123', '10.00', '0', '2017-07-07 17:43:37');
INSERT INTO `lar_order` VALUES ('20170707174643222', '123', '0.01', '0', '2017-07-07 17:46:43');
INSERT INTO `lar_order` VALUES ('20170707174746111', '123', '0.01', '0', '2017-07-07 17:47:46');
INSERT INTO `lar_order` VALUES ('20170707174801212', '123', '0.01', '0', '2017-07-07 17:48:01');
INSERT INTO `lar_order` VALUES ('20170707174958129', '123', '0.01', '0', '2017-07-07 17:49:58');
INSERT INTO `lar_order` VALUES ('20170707175027141', '123', '0.01', '0', '2017-07-07 17:50:27');
INSERT INTO `lar_order` VALUES ('20170707175637205', '123', '0.01', '0', '2017-07-07 17:56:37');
INSERT INTO `lar_order` VALUES ('20170707175817162', '123', '0.01', '0', '2017-07-07 17:58:17');
INSERT INTO `lar_order` VALUES ('20170707175857130', '123', '0.01', '0', '2017-07-07 17:58:57');
INSERT INTO `lar_order` VALUES ('20170707175933133', '123', '0.01', '0', '2017-07-07 17:59:34');
INSERT INTO `lar_order` VALUES ('20170707184826178', '123', '0.01', '0', '2017-07-07 18:48:26');
INSERT INTO `lar_order` VALUES ('20170707185451176', '123', '0.10', '0', '2017-07-07 18:54:51');
INSERT INTO `lar_order` VALUES ('20170707185521135', '123', '0.10', '0', '2017-07-07 18:55:21');
INSERT INTO `lar_order` VALUES ('20170707185603135', '123', '0.10', '0', '2017-07-07 18:56:03');
INSERT INTO `lar_order` VALUES ('20170707185819176', '123', '0.01', '0', '2017-07-07 18:58:19');
INSERT INTO `lar_order` VALUES ('20170707190519195', '75', '0.01', '0', '2017-07-07 19:05:19');
INSERT INTO `lar_order` VALUES ('20170707204555219', '75', '10.00', '0', '2017-07-07 20:45:57');
INSERT INTO `lar_order` VALUES ('20170707220053122', '114', '0.10', '0', '2017-07-07 22:00:54');
INSERT INTO `lar_order` VALUES ('20170708161652118', '125', '0.01', '0', '2017-07-08 16:16:52');
INSERT INTO `lar_order` VALUES ('20170708164627174', '125', '0.01', '0', '2017-07-08 16:46:27');
INSERT INTO `lar_order` VALUES ('20170708165442160', '125', '0.01', '0', '2017-07-08 16:54:42');
INSERT INTO `lar_order` VALUES ('20170708165605187', '125', '0.01', '0', '2017-07-08 16:56:05');
INSERT INTO `lar_order` VALUES ('20170708170401148', '125', '0.01', '0', '2017-07-08 17:04:01');
INSERT INTO `lar_order` VALUES ('20170708171036147', '125', '0.01', '0', '2017-07-08 17:10:36');
INSERT INTO `lar_order` VALUES ('20170708171411199', '125', '0.01', '0', '2017-07-08 17:14:11');
INSERT INTO `lar_order` VALUES ('20170708171727188', '125', '0.01', '0', '2017-07-08 17:17:27');
INSERT INTO `lar_order` VALUES ('20170708172004126', '125', '0.01', '0', '2017-07-08 17:20:04');
INSERT INTO `lar_order` VALUES ('20170708172257188', '125', '0.01', '0', '2017-07-08 17:22:57');
INSERT INTO `lar_order` VALUES ('20170708180159187', '125', '0.01', '0', '2017-07-08 18:01:59');
INSERT INTO `lar_order` VALUES ('20170708182718115', '113', '0.01', '0', '2017-07-08 18:27:18');
INSERT INTO `lar_order` VALUES ('20170708182952212', '113', '0.01', '0', '2017-07-08 18:29:52');
INSERT INTO `lar_order` VALUES ('20170708183110181', '113', '0.01', '0', '2017-07-08 18:31:11');
INSERT INTO `lar_order` VALUES ('20170708183358146', '113', '0.01', '0', '2017-07-08 18:33:58');
INSERT INTO `lar_order` VALUES ('20170708183530142', '113', '0.01', '0', '2017-07-08 18:35:30');
INSERT INTO `lar_order` VALUES ('20170708183827161', '113', '0.01', '0', '2017-07-08 18:38:27');
INSERT INTO `lar_order` VALUES ('20170708184136127', '113', '0.01', '0', '2017-07-08 18:41:37');
INSERT INTO `lar_order` VALUES ('20170708184447213', '113', '0.01', '0', '2017-07-08 18:44:47');
INSERT INTO `lar_order` VALUES ('20170708184745113', '113', '0.01', '0', '2017-07-08 18:47:45');
INSERT INTO `lar_order` VALUES ('20170708184932220', '113', '0.01', '0', '2017-07-08 18:49:32');
INSERT INTO `lar_order` VALUES ('20170708185032125', '113', '0.01', '0', '2017-07-08 18:50:32');
INSERT INTO `lar_order` VALUES ('20170708185140113', '113', '0.01', '0', '2017-07-08 18:51:40');
INSERT INTO `lar_order` VALUES ('20170708185549215', '113', '0.01', '0', '2017-07-08 18:55:49');
INSERT INTO `lar_order` VALUES ('20170708185757191', '113', '0.01', '0', '2017-07-08 18:57:58');
INSERT INTO `lar_order` VALUES ('20170708190633215', '113', '0.01', '0', '2017-07-08 19:06:34');
INSERT INTO `lar_order` VALUES ('20170708190824192', '113', '0.01', '0', '2017-07-08 19:08:24');
INSERT INTO `lar_order` VALUES ('20170708191025173', '113', '0.01', '0', '2017-07-08 19:10:25');
INSERT INTO `lar_order` VALUES ('20170708191153152', '113', '0.01', '0', '2017-07-08 19:11:53');
INSERT INTO `lar_order` VALUES ('20170708191530216', '113', '0.01', '0', '2017-07-08 19:15:30');
INSERT INTO `lar_order` VALUES ('20170708192024130', '113', '0.01', '0', '2017-07-08 19:20:24');
INSERT INTO `lar_order` VALUES ('20170708192654196', '113', '0.01', '0', '2017-07-08 19:26:54');
INSERT INTO `lar_order` VALUES ('20170708193051198', '113', '0.01', '0', '2017-07-08 19:30:51');
INSERT INTO `lar_order` VALUES ('20170708193857215', '113', '0.01', '0', '2017-07-08 19:38:57');
INSERT INTO `lar_order` VALUES ('20170709210419161', '75', '0.01', '0', '2017-07-09 21:04:19');
INSERT INTO `lar_order` VALUES ('20170709210928191', '75', '0.02', '0', '2017-07-09 21:09:28');
INSERT INTO `lar_order` VALUES ('20170709213445154', '75', '0.01', '0', '2017-07-09 21:34:45');
INSERT INTO `lar_order` VALUES ('20170710205905129', '113', '0.01', '0', '2017-07-10 20:59:05');
INSERT INTO `lar_order` VALUES ('20170710205914148', '113', '0.02', '0', '2017-07-10 20:59:14');
INSERT INTO `lar_order` VALUES ('20170710210015185', '113', '0.02', '0', '2017-07-10 21:00:16');
INSERT INTO `lar_order` VALUES ('20170710210038133', '113', '0.01', '0', '2017-07-10 21:00:39');
INSERT INTO `lar_order` VALUES ('20170710211611176', '113', '0.01', '0', '2017-07-10 21:16:11');
INSERT INTO `lar_order` VALUES ('20170710211627193', '113', '200.00', '0', '2017-07-10 21:16:27');
INSERT INTO `lar_order` VALUES ('20170710211632190', '113', '20022.00', '0', '2017-07-10 21:16:32');
INSERT INTO `lar_order` VALUES ('20170710211921182', '113', '1.00', '0', '2017-07-10 21:19:22');
INSERT INTO `lar_order` VALUES ('20170711085034178', '101', '0.01', '0', '2017-07-11 08:50:34');
INSERT INTO `lar_order` VALUES ('20170711090137157', '101', '0.01', '0', '2017-07-11 09:01:37');
INSERT INTO `lar_order` VALUES ('20170711155257220', '101', '0.01', '0', '2017-07-11 15:52:57');
INSERT INTO `lar_order` VALUES ('20170711170834126', '113', '0.10', '0', '2017-07-11 17:08:35');
INSERT INTO `lar_order` VALUES ('20170713211334159', '128', '0.10', '0', '2017-07-13 21:13:34');
INSERT INTO `lar_order` VALUES ('20170714213448221', '131', '0.01', '0', '2017-07-14 21:34:48');
INSERT INTO `lar_order` VALUES ('20170714214324218', '131', '0.01', '0', '2017-07-14 21:43:24');
INSERT INTO `lar_order` VALUES ('20170714214455168', '131', '0.01', '0', '2017-07-14 21:44:55');
INSERT INTO `lar_order` VALUES ('20170714214636137', '131', '0.01', '0', '2017-07-14 21:46:36');
INSERT INTO `lar_order` VALUES ('9223372036854775807', '123', '1.00', '0', '2017-07-07 17:23:54');

-- ----------------------------
-- Table structure for lar_projects
-- ----------------------------
DROP TABLE IF EXISTS `lar_projects`;
CREATE TABLE `lar_projects` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `u_id` int(11) NOT NULL COMMENT '借款人ID',
  `goods_id` int(11) NOT NULL COMMENT '质押物ID',
  `project_sn` varchar(50) NOT NULL COMMENT '借款编号',
  `total_money` decimal(50,2) NOT NULL COMMENT '借款总额',
  `real_money` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT '投资额',
  `Interest_payable` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '需交利息   总借金额*(年利率/12)*月份',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `rate` int(5) NOT NULL COMMENT '年利率 1是10%以下  2是10%-12%，3是12-14%',
  `term` smallint(6) NOT NULL COMMENT '期限（月）',
  `projects_use` varchar(100) DEFAULT NULL COMMENT '借款用途',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `aud_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态  0未通过    1已通过',
  `product_status` varchar(4) NOT NULL DEFAULT '0' COMMENT '借款状态    0借款中    1已放款',
  `updated_at` varchar(50) DEFAULT NULL,
  `repay_way` tinyint(1) DEFAULT '1' COMMENT '还款方式1等额本息2到期连本带利',
  `goods_type` tinyint(1) DEFAULT '1' COMMENT '1域名 2车辆',
  `cate_id` tinyint(4) NOT NULL COMMENT '推荐项目，信用贷，高返利',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_projects
-- ----------------------------
INSERT INTO `lar_projects` VALUES ('9', '1', '1', 'SN1412317405', '50000.00', '50000.00', '4275.57', '公司资金周转', '13', '2', '临时周转', '1497236846', '1', '1', '2017-06-16 13:13:19', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('10', '3', '2', 'SN1497267405', '198999.00', '143000.00', '2653.32', '公司资金周转2', '8', '2', '卖身葬室友', '1497236846', '1', '0', '2017-06-19 02:39:25', '1', '2', '1');
INSERT INTO `lar_projects` VALUES ('11', '2', '2', 'SN1497267412', '199000.00', '199000.00', '1492.50', '公司资金周转3', '9', '1', '老婆跑了', '1497236846', '1', '1', '2017-06-17 01:02:08', '2', '1', '2');
INSERT INTO `lar_projects` VALUES ('12', '4', '1', 'SN1497261231', '199000.00', '122000.00', '1658.33', '公司资金周转4', '10', '1', '公司倒了', '1497236846', '1', '0', '2017-06-19 00:53:13', '2', '2', '2');
INSERT INTO `lar_projects` VALUES ('13', '1', '1', 'SN149754405', '199000.00', '199000.00', '5970.00', '公司资金周转5', '12', '3', '女友白血病求医', '1497236846', '0', '0', null, '2', '1', '3');
INSERT INTO `lar_projects` VALUES ('14', '1', '1', 'SN1491237405', '199000.00', '20000.00', '5472.50', '公司资金周转6', '11', '3', '买个皮肤', '1497236846', '0', '0', null, '2', '2', '3');
INSERT INTO `lar_projects` VALUES ('15', '75', '10', 'XW1498564761', '100000.00', '100000.00', '2666.66', 'daidaile', '8', '4', '卖身葬室友', '1498564761', '0', '1', '1498564761', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('16', '75', '27', 'FG1498566499', '100000.00', '100000.00', '6000.00', 'daidaile', '8', '4', '卖身葬室友', '1498566499', '0', '1', '1498566499', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('17', '75', '27', 'PR1498567202', '100000.00', '100000.00', '6000.00', '陈先生买车买房', '12', '6', '买车买房', '1498567202', '0', '1', '1498567202', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('18', '75', '28', 'YA1498611972', '900000.00', '24000.00', '999000.00', '隔壁老王贷款租房', '11', '12', '贷款租房', '1498611972', '0', '0', '1498611972', '1', '1', '1');
INSERT INTO `lar_projects` VALUES ('30', '75', '31', 'AW1498806344', '90000.00', '90000.00', '99000.00', '公司倒闭，贷款创业', '10', '12', '公司倒闭，贷款创业', '1498806344', '0', '1', '1498806344', '2', '1', '0');
INSERT INTO `lar_projects` VALUES ('39', '116', '40', 'LK1499047365', '20000.00', '20000.00', '22000.00', '筹款葬同桌', '10', '12', '葬同桌', '1499047365', '0', '1', '1499047365', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('40', '75', '41', 'AP1499063329', '50000.00', '50000.00', '54166.66', '卖肾贷款', '10', '10', '上网', '1499063329', '0', '1', '1499063329', '2', '1', '0');
INSERT INTO `lar_projects` VALUES ('61', '75', '42', 'PO1499154713', '150000.00', '23850.00', '164000.00', '没钱吃黄焖鸡了', '8', '14', '没钱吃黄焖鸡了', '1499154713', '0', '0', '1499154713', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('62', '75', '43', 'SJ1499157744', '80000.00', '80000.00', '88666.66', '卖狗蛋', '10', '13', '卖狗蛋', '1499157744', '0', '1', '1499157744', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('63', '106', '45', 'IX1499303172', '90000.00', '38700.00', '97200.00', '我们的工作地点', '8', '12', '拆迁', '1499303172', '0', '0', '1499303172', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('64', '116', '47', 'UH1499427309', '40000.00', '40000.00', '41800.00', '我不知道', '9', '6', '我不知道', '1499427309', '0', '1', '1499427309', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('65', '114', '48', 'HY1499428840', '500000.00', '500000.00', '525000.00', '军卖肾上网', '10', '6', '军儿子卖肾上网', '1499428840', '0', '1', '1499428840', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('66', '125', '49', 'PS1499506779', '39999.00', '22000.00', '44000.00', '大转盘js代码', '10', '12', '大转盘js代码', '1499506779', '0', '0', '1499506779', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('68', '112', '50', 'QA1499648050', '33333.00', '33333.00', '210000.00', '企业扩展', '10', '6', '企业扩展', '1499648050', '0', '0', '1499648050', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('71', '101', '53', 'YX1499759427', '900000.00', '9950.00', '981000.00', '测试标题', '9', '12', '买房', '1499759427', '0', '0', '1499759427', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('77', '116', '57', 'KP1500040716', '10000.00', '10000.00', '11125.00', '10000000000000000', '9', '15', '10000000000000000000', '1500040716', '0', '1', '1500040716', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('78', '75', '58', 'EP1500043878', '10000.00', '10000.00', '11500.00', '3333333333333333333', '15', '12', '33333333333333333', '1500043878', '0', '1', '1500043878', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('79', '116', '60', 'KD1500044381', '8000.00', '8000.00', '8960.00', 'wwwwwwwwwww', '12', '12', 'wwwwwwwwwwwwwww', '1500044381', '0', '1', '1500044381', '1', '1', '0');
INSERT INTO `lar_projects` VALUES ('80', '116', '61', 'XO1500045302', '15000.00', '15000.00', '17812.49', 'qqqqqqqqqqqqq', '15', '15', 'qqqqqqqqqqqqq', '1500045302', '0', '1', '1500045302', '2', '1', '0');

-- ----------------------------
-- Table structure for lar_projects_cate
-- ----------------------------
DROP TABLE IF EXISTS `lar_projects_cate`;
CREATE TABLE `lar_projects_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '贷款列表分类名称',
  `cate_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '贷款列表分类名称',
  `update_time` int(11) NOT NULL COMMENT '最后次修改时间',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_projects_cate
-- ----------------------------
INSERT INTO `lar_projects_cate` VALUES ('1', '推荐项目', '1497286846');
INSERT INTO `lar_projects_cate` VALUES ('2', '信用贷', '1497286846');
INSERT INTO `lar_projects_cate` VALUES ('3', '高返利', '1497286846');

-- ----------------------------
-- Table structure for lar_recharge
-- ----------------------------
DROP TABLE IF EXISTS `lar_recharge`;
CREATE TABLE `lar_recharge` (
  `recharge_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `recharge_sum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '充值金额',
  `recharge_time` datetime DEFAULT NULL COMMENT '充值时间',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `order_id` bigint(20) DEFAULT NULL,
  `info` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`recharge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_recharge
-- ----------------------------
INSERT INTO `lar_recharge` VALUES ('3', '0.01', '2017-07-06 09:49:35', '113', null, null);
INSERT INTO `lar_recharge` VALUES ('4', '0.01', '2017-07-07 19:37:11', '75', null, null);
INSERT INTO `lar_recharge` VALUES ('5', '0.01', '2017-07-08 16:07:30', '125', null, null);
INSERT INTO `lar_recharge` VALUES ('6', '0.01', '2017-07-08 16:16:22', '125', null, null);
INSERT INTO `lar_recharge` VALUES ('133', '0.01', '2017-07-08 19:39:07', '113', '20170708193857215', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"9svzy7scfaz1mlf841u4bhdppkofx2wa\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('134', '0.01', '2017-07-08 19:39:50', '113', '20170708183530142', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"36s96xjoq7yhoqvr003f2p16rdn11ola\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('135', '0.01', '2017-07-08 19:40:49', '113', '20170708190633215', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"fc1dtxr0cesimbhngybqrxhyvrpsk21l\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('136', '0.01', '2017-07-08 19:42:43', '113', '20170708183827161', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"dzvm6m01jrd8uweidnxqqwexp1apr2u7\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('137', '0.01', '2017-07-08 19:42:43', '113', '20170708190824192', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"sjozs8wkrsq7m431t45qzgdkscv09ak9\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('138', '0.01', '2017-07-08 19:44:42', '113', '20170708191025173', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"p8fgelrjkox3em9korzstxr9f9fi0fmp\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('139', '0.01', '2017-07-08 19:45:55', '113', '20170708184136127', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"oua9tsx9391u3kwp2fmk5r7n3ohfvqfu\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('140', '0.01', '2017-07-08 19:46:12', '113', '20170708191153152', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"cqdk7vyyyixk679ejq30eqzuwf7k5icz\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('141', '0.01', '2017-07-08 19:49:09', '113', '20170708184447213', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"la19f6ze66mc81t4ive1ov57qxbbymtn\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('142', '0.01', '2017-07-08 19:49:46', '113', '20170708191530216', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"7mceuvl45wufbrhtnc9wc2z0eyswvkzt\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('143', '0.01', '2017-07-08 19:52:04', '113', '20170708184745113', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"ygi86awvqclypz1eft25tzt80wdpx7zs\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('144', '0.01', '2017-07-08 19:53:47', '113', '20170708184932220', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"1tthn0ob9pz2fdg98cmbza4c874h1o1q\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('145', '0.01', '2017-07-08 19:54:42', '113', '20170708192024130', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"oefm0xfo6bezowwxymlqoiydl4f1r5qf\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('146', '0.01', '2017-07-08 19:54:49', '113', '20170708185032125', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"4bya48t41nboy0e8ocu0ueku01ybct4h\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('147', '0.01', '2017-07-08 19:56:05', '113', '20170708185140113', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"e0n895q6pdivlrkpl0y3htqkq30397mu\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('148', '0.01', '2017-07-08 20:00:13', '113', '20170708185549215', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"xcn6k36uh2yfrc91410hxt0zx2fbxcqo\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('149', '0.01', '2017-07-08 20:01:14', '113', '20170708192654196', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"a0g5k4xutmd65hqvxpc612v1ntdqn3b8\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('150', '0.01', '2017-07-08 20:01:34', '113', '20170708182718115', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"rcsw91jqvkugv8ssvqckqvk47zdhn35x\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('151', '0.01', '2017-07-08 20:02:18', '113', '20170708185757191', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"a76iz61rbxg2a77h1oc9fq5t4kuplxic\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('152', '0.01', '2017-07-08 20:04:13', '113', '20170708182952212', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"ixd59wg0acxc49g5bv8qyg6cht3xezc7\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('153', '0.01', '2017-07-08 20:05:06', '113', '20170708193051198', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"ee645ycdh26e7intn2jq7gc8wh5ccpe1\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070819');
INSERT INTO `lar_recharge` VALUES ('154', '0.01', '2017-07-08 20:05:24', '113', '20170708183110181', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"eg7k8jj26vlpzilfb07xpuhm3rbokcf2\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('155', '0.01', '2017-07-08 20:06:36', '125', '20170708180159187', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"clgn9b8fgbwpj25135qsta8scxd5nfk6\",\"openid\":\"oHZx6uLkd3Ex-tle_nEENgKbeYzo\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('156', '0.01', '2017-07-08 20:08:24', '113', '20170708183358146', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"zpdqaveqeylcfxvb29j1xp54tmayikd7\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070818');
INSERT INTO `lar_recharge` VALUES ('157', '0.01', '2017-07-08 20:18:44', '125', '20170708171411199', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"ri8juwgkqkn0mwwt1csbqvj9kfme9eoi\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070817');
INSERT INTO `lar_recharge` VALUES ('158', '0.01', '2017-07-08 20:21:51', '125', '20170708171727188', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"li3tqbhbwaaknb95zct5gejq3t0s9dn3\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070817');
INSERT INTO `lar_recharge` VALUES ('159', '0.01', '2017-07-08 20:24:42', '125', '20170708172004126', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"jhqdrg7uusarri9b6rg3q2suozyie9bz\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070817');
INSERT INTO `lar_recharge` VALUES ('160', '0.01', '2017-07-08 20:27:27', '125', '20170708172257188', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"eodb3gdfxpc3mr1sor2toljljug9czba\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070817');
INSERT INTO `lar_recharge` VALUES ('166', '0.02', '2017-07-09 21:09:41', '75', '20170709210928191', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"2\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"sgvwgi643kd22dv1kmdknbij2f19rxcz\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070921');
INSERT INTO `lar_recharge` VALUES ('167', '0.01', '2017-07-09 21:35:01', '75', '20170709213445154', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"q0ivp38epyeys8fzdsit5k01mxjgnotn\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017070921');
INSERT INTO `lar_recharge` VALUES ('168', '0.01', '2017-07-11 14:49:06', '112', null, null);
INSERT INTO `lar_recharge` VALUES ('169', '0.01', '2017-07-11 14:50:11', '112', null, null);
INSERT INTO `lar_recharge` VALUES ('170', '0.01', '2017-07-11 15:53:13', '101', '20170711155257220', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"av3jkuqjakdkwqh1woop56gn1y7e1ped\",\"openid\":\"oHZx6uCGZSIx-xgXhIoX-O8Xnx80\",\"out_trade_no\":\"2017071115');
INSERT INTO `lar_recharge` VALUES ('171', '0.01', '2017-07-14 21:35:19', '131', '20170714213448221', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"k2zmsn0kcooyd8tsvoixg4gxy0aosmfb\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017071421');
INSERT INTO `lar_recharge` VALUES ('172', '0.01', '2017-07-14 21:46:56', '131', '20170714214636137', '{\"appid\":\"wx426b3015555a46be\",\"attach\":\"test\",\"bank_type\":\"CFT\",\"cash_fee\":\"1\",\"fee_type\":\"CNY\",\"is_subscribe\":\"N\",\"mch_id\":\"1900009851\",\"nonce_str\":\"wn81pnk6aej3hasn7lv760e27coq7gza\",\"openid\":\"oHZx6uOfQ_jUiDHL2B4wLQvrU_8Q\",\"out_trade_no\":\"2017071421');

-- ----------------------------
-- Table structure for lar_redpackets
-- ----------------------------
DROP TABLE IF EXISTS `lar_redpackets`;
CREATE TABLE `lar_redpackets` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` float(255,0) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `profiles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_redpackets
-- ----------------------------
INSERT INTO `lar_redpackets` VALUES ('1', '红包50元', '50', null, '可以投资使用');
INSERT INTO `lar_redpackets` VALUES ('2', '红包100元', '100', null, '可以投资使用');

-- ----------------------------
-- Table structure for lar_repayments
-- ----------------------------
DROP TABLE IF EXISTS `lar_repayments`;
CREATE TABLE `lar_repayments` (
  `repay_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL COMMENT '还款人id',
  `product_id` int(5) DEFAULT NULL COMMENT '款项id',
  `issue` int(5) DEFAULT NULL COMMENT '第几期',
  `money` decimal(10,2) DEFAULT NULL COMMENT '多少钱',
  `status` int(5) DEFAULT '1',
  PRIMARY KEY (`repay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_repayments
-- ----------------------------
INSERT INTO `lar_repayments` VALUES ('13', '116', '64', '3', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('14', '127', '69', '3', '8958.33', '0');
INSERT INTO `lar_repayments` VALUES ('15', '127', '69', '4', '8958.33', '0');
INSERT INTO `lar_repayments` VALUES ('16', '127', '69', '5', '8958.33', '0');
INSERT INTO `lar_repayments` VALUES ('17', '116', '39', '12', '1833.33', '0');
INSERT INTO `lar_repayments` VALUES ('18', '116', '64', '3', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('19', '116', '64', '4', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('20', '116', '64', '4', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('21', '116', '64', '5', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('22', '116', '64', '4', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('23', '116', '64', '5', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('24', '116', '64', '6', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('25', '116', '64', '6', '6966.67', '0');
INSERT INTO `lar_repayments` VALUES ('26', '116', '69', '1', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('27', '116', '69', '2', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('28', '75', '62', '11', '6820.51', '0');
INSERT INTO `lar_repayments` VALUES ('29', '116', '69', '4', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('30', '116', '69', '3', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('31', '116', '69', '5', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('32', '116', '69', '6', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('33', '116', '69', '7', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('34', '116', '69', '8', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('35', '116', '69', '9', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('36', '116', '69', '10', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('37', '116', '69', '11', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('38', '116', '69', '12', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('39', '116', '70', '1', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('40', '116', '70', '2', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('41', '116', '70', '3', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('42', '116', '70', '4', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('43', '116', '70', '5', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('44', '116', '70', '6', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('45', '116', '70', '7', '1916.67', '0');
INSERT INTO `lar_repayments` VALUES ('46', '116', '79', '1', '746.67', '0');
INSERT INTO `lar_repayments` VALUES ('47', '116', '80', '1', '17250.00', '0');
INSERT INTO `lar_repayments` VALUES ('48', '75', '62', '12', '6820.51', '1');
INSERT INTO `lar_repayments` VALUES ('49', '116', '79', '2', '746.67', '1');
INSERT INTO `lar_repayments` VALUES ('50', '116', '79', '3', '746.67', '1');
INSERT INTO `lar_repayments` VALUES ('51', '116', '79', '4', '746.67', '1');

-- ----------------------------
-- Table structure for lar_repays
-- ----------------------------
DROP TABLE IF EXISTS `lar_repays`;
CREATE TABLE `lar_repays` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水号',
  `product_sn` varchar(11) NOT NULL COMMENT '被操作的交易号',
  `user_id` int(30) NOT NULL COMMENT '操作该次的人员id',
  `total_month` int(11) NOT NULL COMMENT '需要还款的总月份',
  `every_month` decimal(10,2) NOT NULL COMMENT '每月的该还金额',
  `rep_date` int(30) NOT NULL COMMENT '还款日',
  `status` tinyint(5) NOT NULL DEFAULT '0' COMMENT '状态    0未还     1还款',
  `project_id` int(11) NOT NULL COMMENT '需要还款人款ID',
  PRIMARY KEY (`rep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_repays
-- ----------------------------
INSERT INTO `lar_repays` VALUES ('1', 'SN149726740', '75', '2', '66.67', '1498399071', '0', '10');
INSERT INTO `lar_repays` VALUES ('2', 'SN149726740', '75', '2', '66.67', '1498399151', '0', '10');
INSERT INTO `lar_repays` VALUES ('3', 'SN149726123', '101', '1', '41.67', '1498440397', '0', '12');
INSERT INTO `lar_repays` VALUES ('4', 'SN149726740', '101', '2', '13.33', '1498457674', '0', '10');
INSERT INTO `lar_repays` VALUES ('5', 'SN149726740', '101', '2', '6.67', '1498457984', '0', '10');
INSERT INTO `lar_repays` VALUES ('6', 'PR149856720', '75', '6', '50.00', '1498568424', '0', '17');
INSERT INTO `lar_repays` VALUES ('7', 'YA149861197', '75', '12', '183.33', '1498661793', '0', '18');
INSERT INTO `lar_repays` VALUES ('8', 'YA149861197', '75', '12', '9.17', '1498718596', '0', '18');
INSERT INTO `lar_repays` VALUES ('9', 'CT150115920', '75', '5', '133.33', '1498804395', '0', '29');
INSERT INTO `lar_repays` VALUES ('10', 'CT150115920', '75', '5', '6.67', '1498804475', '0', '29');
INSERT INTO `lar_repays` VALUES ('11', 'CT150115920', '75', '5', '6.67', '1498804499', '0', '29');
INSERT INTO `lar_repays` VALUES ('12', 'CT150115920', '75', '5', '53.33', '1498804528', '0', '29');
INSERT INTO `lar_repays` VALUES ('13', 'CT150115920', '75', '5', '0.67', '1498804545', '0', '29');
INSERT INTO `lar_repays` VALUES ('35', 'SJ149915774', '75', '13', '83.33', '1499181081', '0', '62');
INSERT INTO `lar_repays` VALUES ('15', 'GT150115704', '75', '5', '13.33', '1498805801', '0', '24');
INSERT INTO `lar_repays` VALUES ('16', 'GT150115704', '106', '5', '33.33', '1498963126', '0', '24');
INSERT INTO `lar_repays` VALUES ('17', 'VJ149899709', '75', '6', '150.00', '1498997258', '0', '31');
INSERT INTO `lar_repays` VALUES ('18', 'VJ149899709', '75', '6', '150.00', '1498997271', '0', '31');
INSERT INTO `lar_repays` VALUES ('19', 'VJ149899709', '75', '6', '150.00', '1498997297', '0', '31');
INSERT INTO `lar_repays` VALUES ('20', 'VJ149899709', '75', '6', '150.00', '1498997298', '0', '31');
INSERT INTO `lar_repays` VALUES ('21', 'JD149899898', '75', '9', '150.00', '1498999833', '0', '32');
INSERT INTO `lar_repays` VALUES ('22', 'AT149900965', '75', '12', '75.00', '1499042048', '0', '38');
INSERT INTO `lar_repays` VALUES ('23', 'GT150115704', '75', '5', '6.67', '1499044103', '0', '24');
INSERT INTO `lar_repays` VALUES ('24', 'GT150115704', '75', '5', '20.00', '1499052645', '0', '24');
INSERT INTO `lar_repays` VALUES ('25', 'GT150115704', '75', '5', '80.67', '1499052954', '0', '24');
INSERT INTO `lar_repays` VALUES ('26', 'GT150115704', '75', '5', '133.33', '1499053010', '0', '24');
INSERT INTO `lar_repays` VALUES ('27', 'LK149904736', '75', '12', '91.25', '1499063465', '0', '39');
INSERT INTO `lar_repays` VALUES ('28', 'LK149904736', '75', '12', '25.42', '1499063518', '0', '39');
INSERT INTO `lar_repays` VALUES ('29', 'GT150115704', '75', '5', '20.00', '1499079801', '0', '24');
INSERT INTO `lar_repays` VALUES ('30', 'GT150115704', '75', '5', '20.00', '1499079801', '0', '24');
INSERT INTO `lar_repays` VALUES ('31', 'GT150115704', '75', '5', '133.33', '1499079836', '0', '24');
INSERT INTO `lar_repays` VALUES ('32', 'GT150115704', '116', '5', '26.67', '1499092903', '0', '24');
INSERT INTO `lar_repays` VALUES ('33', 'AP149906332', '75', '10', '25.00', '1499137863', '0', '40');
INSERT INTO `lar_repays` VALUES ('34', 'SJ149915774', '75', '13', '25.00', '1499169598', '0', '62');
INSERT INTO `lar_repays` VALUES ('36', 'SJ149915774', '75', '13', '83.33', '1499181108', '0', '62');
INSERT INTO `lar_repays` VALUES ('37', 'SJ149915774', '75', '13', '83.33', '1499181132', '0', '62');
INSERT INTO `lar_repays` VALUES ('38', 'PO149915471', '75', '14', '133.33', '1499181881', '0', '61');
INSERT INTO `lar_repays` VALUES ('39', 'GT150115704', '75', '5', '13.33', '1499222992', '0', '24');
INSERT INTO `lar_repays` VALUES ('40', 'PO149915471', '75', '14', '13.33', '1499267626', '0', '61');
INSERT INTO `lar_repays` VALUES ('41', 'GT150115704', '116', '5', '20.00', '1499306242', '0', '24');
INSERT INTO `lar_repays` VALUES ('42', 'IX149930317', '106', '12', '13.33', '1499323477', '0', '63');
INSERT INTO `lar_repays` VALUES ('43', 'IX149930317', '75', '12', '13.33', '1499340633', '0', '63');
INSERT INTO `lar_repays` VALUES ('44', 'IX149930317', '75', '12', '13.33', '1499342316', '0', '63');
INSERT INTO `lar_repays` VALUES ('45', 'IX149930317', '75', '12', '6.67', '1499342972', '0', '63');
INSERT INTO `lar_repays` VALUES ('46', 'IX149930317', '75', '12', '13.33', '1499343016', '0', '63');
INSERT INTO `lar_repays` VALUES ('47', 'IX149930317', '75', '12', '73.33', '1499343110', '0', '63');
INSERT INTO `lar_repays` VALUES ('48', 'IX149930317', '75', '12', '66.67', '1499343277', '0', '63');
INSERT INTO `lar_repays` VALUES ('49', 'IX149930317', '75', '12', '40.00', '1499343345', '0', '63');
INSERT INTO `lar_repays` VALUES ('50', 'IX149930317', '75', '12', '13.33', '1499344014', '0', '63');
INSERT INTO `lar_repays` VALUES ('51', 'PO149915471', '75', '14', '13.33', '1499387853', '0', '61');
INSERT INTO `lar_repays` VALUES ('52', 'IX149930317', '75', '12', '6.67', '1499388220', '0', '63');
INSERT INTO `lar_repays` VALUES ('53', 'SN149754405', '75', '3', '10.00', '1499388399', '0', '13');
INSERT INTO `lar_repays` VALUES ('54', 'IX149930317', '116', '12', '13.33', '1499408433', '0', '63');
INSERT INTO `lar_repays` VALUES ('55', 'UH149942730', '75', '6', '150.00', '1499427390', '0', '64');
INSERT INTO `lar_repays` VALUES ('56', 'UH149942730', '112', '6', '150.00', '1499427758', '0', '64');
INSERT INTO `lar_repays` VALUES ('57', 'YA149861197', '114', '12', '27.50', '1499428264', '0', '18');
INSERT INTO `lar_repays` VALUES ('58', 'PS149950677', '75', '12', '16.67', '1499602773', '0', '66');
INSERT INTO `lar_repays` VALUES ('59', 'NS149969682', '75', '12', '250.00', '1499696910', '0', '69');
INSERT INTO `lar_repays` VALUES ('60', 'QA149964805', '116', '6', '0.83', '1499737164', '0', '68');
INSERT INTO `lar_repays` VALUES ('61', 'MM149973990', '75', '12', '250.00', '1499739950', '0', '70');
INSERT INTO `lar_repays` VALUES ('62', 'QA149964805', '116', '6', '8.33', '1499740562', '0', '68');
INSERT INTO `lar_repays` VALUES ('63', 'QA149964805', '101', '6', '83.33', '1499759159', '0', '68');
INSERT INTO `lar_repays` VALUES ('64', 'PS149950677', '75', '12', '166.67', '1499764013', '0', '66');
INSERT INTO `lar_repays` VALUES ('65', 'YX149975942', '101', '12', '7.50', '1499781347', '0', '71');
INSERT INTO `lar_repays` VALUES ('66', 'YX149975942', '75', '12', '52.50', '1499856568', '0', '71');
INSERT INTO `lar_repays` VALUES ('67', 'YX149975942', '75', '12', '15.00', '1499999444', '0', '71');
INSERT INTO `lar_repays` VALUES ('68', 'QA149964805', '129', '6', '69.44', '1500000771', '0', '68');
INSERT INTO `lar_repays` VALUES ('69', 'KP150004071', '75', '15', '75.00', '1500041288', '0', '77');
INSERT INTO `lar_repays` VALUES ('70', 'EP150004387', '75', '12', '125.00', '1500043896', '0', '78');
INSERT INTO `lar_repays` VALUES ('71', 'KD150004438', '75', '12', '80.00', '1500044401', '0', '79');
INSERT INTO `lar_repays` VALUES ('72', 'XO150004530', '75', '15', '187.50', '1500045321', '0', '80');

-- ----------------------------
-- Table structure for lar_rotes
-- ----------------------------
DROP TABLE IF EXISTS `lar_rotes`;
CREATE TABLE `lar_rotes` (
  `rote_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '角色ID ',
  `rote_name` varchar(30) NOT NULL COMMENT '角色名称',
  `rote_desc` varchar(30) NOT NULL,
  PRIMARY KEY (`rote_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_rotes
-- ----------------------------
INSERT INTO `lar_rotes` VALUES ('7', 'Reporter', '记者角色');
INSERT INTO `lar_rotes` VALUES ('6', 'developer', '管理网站');
INSERT INTO `lar_rotes` VALUES ('5', 'master', '最高权限');
INSERT INTO `lar_rotes` VALUES ('8', 'Guest', '游客');
INSERT INTO `lar_rotes` VALUES ('9', 'Admin', 'qqq');
INSERT INTO `lar_rotes` VALUES ('10', '记者', '1111');

-- ----------------------------
-- Table structure for lar_r_n
-- ----------------------------
DROP TABLE IF EXISTS `lar_r_n`;
CREATE TABLE `lar_r_n` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `rote_id` int(11) NOT NULL COMMENT '角色ID',
  `node_id` int(11) NOT NULL COMMENT '权限ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_r_n
-- ----------------------------
INSERT INTO `lar_r_n` VALUES ('2', '5', '1');
INSERT INTO `lar_r_n` VALUES ('3', '5', '10');
INSERT INTO `lar_r_n` VALUES ('4', '5', '2');
INSERT INTO `lar_r_n` VALUES ('5', '5', '3');
INSERT INTO `lar_r_n` VALUES ('6', '5', '18');
INSERT INTO `lar_r_n` VALUES ('7', '5', '19');
INSERT INTO `lar_r_n` VALUES ('8', '5', '20');
INSERT INTO `lar_r_n` VALUES ('9', '5', '21');
INSERT INTO `lar_r_n` VALUES ('10', '5', '4');
INSERT INTO `lar_r_n` VALUES ('11', '5', '12');
INSERT INTO `lar_r_n` VALUES ('12', '5', '13');
INSERT INTO `lar_r_n` VALUES ('13', '5', '14');
INSERT INTO `lar_r_n` VALUES ('14', '5', '5');
INSERT INTO `lar_r_n` VALUES ('15', '5', '15');
INSERT INTO `lar_r_n` VALUES ('16', '5', '16');
INSERT INTO `lar_r_n` VALUES ('17', '5', '17');
INSERT INTO `lar_r_n` VALUES ('18', '5', '6');
INSERT INTO `lar_r_n` VALUES ('19', '5', '22');
INSERT INTO `lar_r_n` VALUES ('20', '5', '23');
INSERT INTO `lar_r_n` VALUES ('21', '5', '7');
INSERT INTO `lar_r_n` VALUES ('22', '5', '24');
INSERT INTO `lar_r_n` VALUES ('23', '5', '8');
INSERT INTO `lar_r_n` VALUES ('24', '5', '9');
INSERT INTO `lar_r_n` VALUES ('25', '6', '1');
INSERT INTO `lar_r_n` VALUES ('26', '2', '5');
INSERT INTO `lar_r_n` VALUES ('27', '6', '2');
INSERT INTO `lar_r_n` VALUES ('28', '6', '3');
INSERT INTO `lar_r_n` VALUES ('29', '6', '18');
INSERT INTO `lar_r_n` VALUES ('30', '6', '19');
INSERT INTO `lar_r_n` VALUES ('31', '6', '20');
INSERT INTO `lar_r_n` VALUES ('32', '6', '21');
INSERT INTO `lar_r_n` VALUES ('33', '6', '4');
INSERT INTO `lar_r_n` VALUES ('34', '6', '12');
INSERT INTO `lar_r_n` VALUES ('35', '6', '13');
INSERT INTO `lar_r_n` VALUES ('36', '6', '14');
INSERT INTO `lar_r_n` VALUES ('37', '6', '5');
INSERT INTO `lar_r_n` VALUES ('38', '6', '15');
INSERT INTO `lar_r_n` VALUES ('39', '6', '16');
INSERT INTO `lar_r_n` VALUES ('40', '6', '17');
INSERT INTO `lar_r_n` VALUES ('41', '6', '6');
INSERT INTO `lar_r_n` VALUES ('42', '6', '22');
INSERT INTO `lar_r_n` VALUES ('43', '6', '23');
INSERT INTO `lar_r_n` VALUES ('44', '6', '7');
INSERT INTO `lar_r_n` VALUES ('45', '6', '24');
INSERT INTO `lar_r_n` VALUES ('46', '7', '1');
INSERT INTO `lar_r_n` VALUES ('47', '7', '10');
INSERT INTO `lar_r_n` VALUES ('48', '7', '2');
INSERT INTO `lar_r_n` VALUES ('49', '7', '3');
INSERT INTO `lar_r_n` VALUES ('50', '7', '4');
INSERT INTO `lar_r_n` VALUES ('51', '7', '12');
INSERT INTO `lar_r_n` VALUES ('52', '7', '13');
INSERT INTO `lar_r_n` VALUES ('53', '7', '14');
INSERT INTO `lar_r_n` VALUES ('54', '7', '5');
INSERT INTO `lar_r_n` VALUES ('55', '7', '15');
INSERT INTO `lar_r_n` VALUES ('56', '7', '16');
INSERT INTO `lar_r_n` VALUES ('57', '7', '17');
INSERT INTO `lar_r_n` VALUES ('58', '8', '1');
INSERT INTO `lar_r_n` VALUES ('59', '8', '3');
INSERT INTO `lar_r_n` VALUES ('60', '8', '4');
INSERT INTO `lar_r_n` VALUES ('61', '8', '5');
INSERT INTO `lar_r_n` VALUES ('62', '5', '25');
INSERT INTO `lar_r_n` VALUES ('63', '5', '26');
INSERT INTO `lar_r_n` VALUES ('64', '5', '27');
INSERT INTO `lar_r_n` VALUES ('65', '9', '25');
INSERT INTO `lar_r_n` VALUES ('66', '9', '26');
INSERT INTO `lar_r_n` VALUES ('67', '9', '3');
INSERT INTO `lar_r_n` VALUES ('68', '9', '18');
INSERT INTO `lar_r_n` VALUES ('69', '9', '19');
INSERT INTO `lar_r_n` VALUES ('70', '9', '20');
INSERT INTO `lar_r_n` VALUES ('71', '9', '21');
INSERT INTO `lar_r_n` VALUES ('72', '9', '4');
INSERT INTO `lar_r_n` VALUES ('73', '9', '12');
INSERT INTO `lar_r_n` VALUES ('74', '9', '13');
INSERT INTO `lar_r_n` VALUES ('75', '9', '14');
INSERT INTO `lar_r_n` VALUES ('76', '9', '5');
INSERT INTO `lar_r_n` VALUES ('77', '9', '15');
INSERT INTO `lar_r_n` VALUES ('78', '9', '16');
INSERT INTO `lar_r_n` VALUES ('79', '9', '17');
INSERT INTO `lar_r_n` VALUES ('80', '5', '28');
INSERT INTO `lar_r_n` VALUES ('82', '5', '30');
INSERT INTO `lar_r_n` VALUES ('83', '5', '31');
INSERT INTO `lar_r_n` VALUES ('84', '5', '32');
INSERT INTO `lar_r_n` VALUES ('85', '5', '33');
INSERT INTO `lar_r_n` VALUES ('86', '5', '34');
INSERT INTO `lar_r_n` VALUES ('87', '5', '35');
INSERT INTO `lar_r_n` VALUES ('88', '5', '36');
INSERT INTO `lar_r_n` VALUES ('89', '5', '37');
INSERT INTO `lar_r_n` VALUES ('90', '5', '38');
INSERT INTO `lar_r_n` VALUES ('91', '5', '39');
INSERT INTO `lar_r_n` VALUES ('92', '5', '40');
INSERT INTO `lar_r_n` VALUES ('93', '5', '41');
INSERT INTO `lar_r_n` VALUES ('94', '5', '42');
INSERT INTO `lar_r_n` VALUES ('95', '5', '43');
INSERT INTO `lar_r_n` VALUES ('96', '5', '44');
INSERT INTO `lar_r_n` VALUES ('97', '5', '45');
INSERT INTO `lar_r_n` VALUES ('98', '5', '46');
INSERT INTO `lar_r_n` VALUES ('99', '5', '47');
INSERT INTO `lar_r_n` VALUES ('100', '5', '48');
INSERT INTO `lar_r_n` VALUES ('101', '5', '49');
INSERT INTO `lar_r_n` VALUES ('102', '5', '50');
INSERT INTO `lar_r_n` VALUES ('103', '5', '51');
INSERT INTO `lar_r_n` VALUES ('104', '5', '52');
INSERT INTO `lar_r_n` VALUES ('105', '5', '53');
INSERT INTO `lar_r_n` VALUES ('106', '5', '54');
INSERT INTO `lar_r_n` VALUES ('107', '5', '55');
INSERT INTO `lar_r_n` VALUES ('108', '5', '56');
INSERT INTO `lar_r_n` VALUES ('109', '5', '57');
INSERT INTO `lar_r_n` VALUES ('110', '10', '1');
INSERT INTO `lar_r_n` VALUES ('111', '10', '40');
INSERT INTO `lar_r_n` VALUES ('112', '10', '3');
INSERT INTO `lar_r_n` VALUES ('113', '10', '18');
INSERT INTO `lar_r_n` VALUES ('114', '10', '19');
INSERT INTO `lar_r_n` VALUES ('115', '10', '20');
INSERT INTO `lar_r_n` VALUES ('116', '10', '21');
INSERT INTO `lar_r_n` VALUES ('117', '10', '37');
INSERT INTO `lar_r_n` VALUES ('118', '10', '41');
INSERT INTO `lar_r_n` VALUES ('119', '10', '42');
INSERT INTO `lar_r_n` VALUES ('120', '10', '46');
INSERT INTO `lar_r_n` VALUES ('121', '10', '47');
INSERT INTO `lar_r_n` VALUES ('122', '10', '4');
INSERT INTO `lar_r_n` VALUES ('123', '10', '12');
INSERT INTO `lar_r_n` VALUES ('124', '10', '13');
INSERT INTO `lar_r_n` VALUES ('125', '10', '14');
INSERT INTO `lar_r_n` VALUES ('126', '10', '36');
INSERT INTO `lar_r_n` VALUES ('127', '10', '54');
INSERT INTO `lar_r_n` VALUES ('128', '10', '5');
INSERT INTO `lar_r_n` VALUES ('129', '10', '15');
INSERT INTO `lar_r_n` VALUES ('130', '10', '16');
INSERT INTO `lar_r_n` VALUES ('131', '10', '17');

-- ----------------------------
-- Table structure for lar_slite
-- ----------------------------
DROP TABLE IF EXISTS `lar_slite`;
CREATE TABLE `lar_slite` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `img` varchar(255) NOT NULL COMMENT '图片',
  `sort` int(11) NOT NULL COMMENT '排序',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_slite
-- ----------------------------
INSERT INTO `lar_slite` VALUES ('6', '邀请好友', 'uploads/index_ads.png', '2', '1499066214');
INSERT INTO `lar_slite` VALUES ('10', '新浪托管', 'uploads/591acddb2e13c.jpg', '1', '1499342396');

-- ----------------------------
-- Table structure for lar_stages
-- ----------------------------
DROP TABLE IF EXISTS `lar_stages`;
CREATE TABLE `lar_stages` (
  `stages_id` int(5) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL COMMENT '用户id',
  `project_id` int(5) DEFAULT NULL COMMENT '用户所借款项的id',
  `stages_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '还款的日期',
  `stages_money` decimal(50,2) DEFAULT NULL COMMENT '每期该还的金额',
  `stsges_principal` decimal(50,2) DEFAULT NULL COMMENT '每期的本金',
  `stages_Interest` decimal(50,2) DEFAULT NULL COMMENT '每期的利息',
  `stages_date` int(5) DEFAULT NULL COMMENT '第几期还款',
  `stages_action` int(5) DEFAULT NULL COMMENT '1分期2到期全部还',
  `status` tinyint(4) DEFAULT '0' COMMENT '是否已还0未还 1 已还',
  PRIMARY KEY (`stages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_stages
-- ----------------------------
INSERT INTO `lar_stages` VALUES ('4', '3', '9', '1500998400', '126.77', '120.00', '6.77', '1', '1', '0');
INSERT INTO `lar_stages` VALUES ('5', '3', '9', '1503676800', '126.77', '120.00', '6.77', '2', '1', '0');
INSERT INTO `lar_stages` VALUES ('6', '3', '9', '1506355200', '126.77', '120.00', '6.77', '3', '1', '0');
INSERT INTO `lar_stages` VALUES ('7', '2', '11', '1470067200', '2066.00', '2000.00', '66.00', '1', '2', '0');
INSERT INTO `lar_stages` VALUES ('8', '4', '12', '1500988400', '2066.00', '2000.00', '66.00', '1', '2', '0');
INSERT INTO `lar_stages` VALUES ('11', '3', '10', '1500898400', '126.78', '120.01', '6.78', '1', '1', '0');
INSERT INTO `lar_stages` VALUES ('50', '116', '39', '1525276800', '1833.33', '1666.67', '166.67', '10', '1', '1');
INSERT INTO `lar_stages` VALUES ('51', '116', '39', '1527955200', '1833.33', '1666.67', '166.67', '11', '1', '1');
INSERT INTO `lar_stages` VALUES ('52', '116', '39', '1530547200', '1833.33', '1666.67', '166.67', '12', '1', '1');
INSERT INTO `lar_stages` VALUES ('292', '75', '61', '1533312000', '11714.29', '10714.29', '1000.00', '13', '1', '1');
INSERT INTO `lar_stages` VALUES ('293', '75', '61', '1535990400', '11714.29', '10714.29', '1000.00', '14', '1', '1');
INSERT INTO `lar_stages` VALUES ('294', '75', '62', '1501776000', '6820.51', '6153.85', '666.67', '1', '1', '1');
INSERT INTO `lar_stages` VALUES ('295', '75', '62', '1504454400', '6820.51', '6153.85', '666.67', '2', '1', '1');
INSERT INTO `lar_stages` VALUES ('296', '75', '62', '1507046400', '6820.51', '6153.85', '666.67', '3', '1', '1');
INSERT INTO `lar_stages` VALUES ('297', '75', '62', '1509724800', '6820.51', '6153.85', '666.67', '4', '1', '1');
INSERT INTO `lar_stages` VALUES ('298', '75', '62', '1512316800', '6820.51', '6153.85', '666.67', '5', '1', '1');
INSERT INTO `lar_stages` VALUES ('299', '75', '62', '1514995200', '6820.51', '6153.85', '666.67', '6', '1', '1');
INSERT INTO `lar_stages` VALUES ('300', '75', '62', '1517673600', '6820.51', '6153.85', '666.67', '7', '1', '1');
INSERT INTO `lar_stages` VALUES ('301', '75', '62', '1520092800', '6820.51', '6153.85', '666.67', '8', '1', '1');
INSERT INTO `lar_stages` VALUES ('302', '75', '62', '1522771200', '6820.51', '6153.85', '666.67', '9', '1', '1');
INSERT INTO `lar_stages` VALUES ('303', '75', '62', '1525363200', '6820.51', '6153.85', '666.67', '10', '1', '1');
INSERT INTO `lar_stages` VALUES ('304', '75', '62', '1528041600', '6820.51', '6153.85', '666.67', '11', '1', '1');
INSERT INTO `lar_stages` VALUES ('305', '75', '62', '1530633600', '6820.51', '6153.85', '666.67', '12', '1', '1');
INSERT INTO `lar_stages` VALUES ('306', '75', '62', '1533312000', '6820.51', '6153.85', '666.67', '13', '1', '0');
INSERT INTO `lar_stages` VALUES ('310', '106', '63', '1509897600', '8100.00', '7500.00', '600.00', '4', '1', '0');
INSERT INTO `lar_stages` VALUES ('311', '106', '63', '1512489600', '8100.00', '7500.00', '600.00', '5', '1', '0');
INSERT INTO `lar_stages` VALUES ('312', '106', '63', '1515168000', '8100.00', '7500.00', '600.00', '6', '1', '0');
INSERT INTO `lar_stages` VALUES ('313', '106', '63', '1517846400', '8100.00', '7500.00', '600.00', '7', '1', '0');
INSERT INTO `lar_stages` VALUES ('314', '106', '63', '1520265600', '8100.00', '7500.00', '600.00', '8', '1', '0');
INSERT INTO `lar_stages` VALUES ('315', '106', '63', '1522944000', '8100.00', '7500.00', '600.00', '9', '1', '0');
INSERT INTO `lar_stages` VALUES ('316', '106', '63', '1525536000', '8100.00', '7500.00', '600.00', '10', '1', '0');
INSERT INTO `lar_stages` VALUES ('317', '106', '63', '1528214400', '8100.00', '7500.00', '600.00', '11', '1', '0');
INSERT INTO `lar_stages` VALUES ('318', '106', '63', '1530806400', '8100.00', '7500.00', '600.00', '12', '1', '0');
INSERT INTO `lar_stages` VALUES ('319', '116', '64', '1502035200', '6966.67', '6666.67', '300.00', '1', '1', '1');
INSERT INTO `lar_stages` VALUES ('320', '116', '64', '1504713600', '6966.67', '6666.67', '300.00', '2', '1', '1');
INSERT INTO `lar_stages` VALUES ('321', '116', '64', '1507305600', '6966.67', '6666.67', '300.00', '3', '1', '1');
INSERT INTO `lar_stages` VALUES ('322', '116', '64', '1509984000', '6966.67', '6666.67', '300.00', '4', '1', '1');
INSERT INTO `lar_stages` VALUES ('323', '116', '64', '1512576000', '6966.67', '6666.67', '300.00', '5', '1', '1');
INSERT INTO `lar_stages` VALUES ('324', '116', '64', '1515254400', '6966.67', '6666.67', '300.00', '6', '1', '1');
INSERT INTO `lar_stages` VALUES ('325', '114', '65', '1502035200', '87500.00', '83333.33', '4166.67', '1', '1', '1');
INSERT INTO `lar_stages` VALUES ('326', '114', '65', '1504713600', '87500.00', '83333.33', '4166.67', '2', '1', '1');
INSERT INTO `lar_stages` VALUES ('327', '114', '65', '1507305600', '87500.00', '83333.33', '4166.67', '3', '1', '1');
INSERT INTO `lar_stages` VALUES ('328', '114', '65', '1509984000', '87500.00', '83333.33', '4166.67', '4', '1', '1');
INSERT INTO `lar_stages` VALUES ('329', '114', '65', '1512576000', '87500.00', '83333.33', '4166.67', '5', '1', '1');
INSERT INTO `lar_stages` VALUES ('330', '114', '65', '1515254400', '87500.00', '83333.33', '4166.67', '6', '1', '1');
INSERT INTO `lar_stages` VALUES ('331', '125', '66', '1502121600', '3666.67', '3333.33', '333.33', '1', '1', '1');
INSERT INTO `lar_stages` VALUES ('332', '125', '66', '1504800000', '3666.67', '3333.33', '333.33', '2', '1', '1');
INSERT INTO `lar_stages` VALUES ('333', '125', '66', '1507392000', '3666.67', '3333.33', '333.33', '3', '1', '1');
INSERT INTO `lar_stages` VALUES ('334', '125', '66', '1510070400', '3666.67', '3333.33', '333.33', '4', '1', '0');
INSERT INTO `lar_stages` VALUES ('335', '125', '66', '1512662400', '3666.67', '3333.33', '333.33', '5', '1', '0');
INSERT INTO `lar_stages` VALUES ('336', '125', '66', '1515340800', '3666.67', '3333.33', '333.33', '6', '1', '0');
INSERT INTO `lar_stages` VALUES ('337', '125', '66', '1518019200', '3666.67', '3333.33', '333.33', '7', '1', '0');
INSERT INTO `lar_stages` VALUES ('338', '125', '66', '1520438400', '3666.67', '3333.33', '333.33', '8', '1', '0');
INSERT INTO `lar_stages` VALUES ('339', '125', '66', '1523116800', '3666.67', '3333.33', '333.33', '9', '1', '0');
INSERT INTO `lar_stages` VALUES ('340', '125', '66', '1525708800', '3666.67', '3333.33', '333.33', '10', '1', '0');
INSERT INTO `lar_stages` VALUES ('341', '125', '66', '1528387200', '3666.67', '3333.33', '333.33', '11', '1', '0');
INSERT INTO `lar_stages` VALUES ('342', '125', '66', '1530979200', '3666.67', '3333.33', '333.33', '12', '1', '0');
INSERT INTO `lar_stages` VALUES ('343', '125', '67', '1502121600', '3666.67', '3333.33', '333.33', '1', '1', '0');
INSERT INTO `lar_stages` VALUES ('344', '125', '67', '1504800000', '3666.67', '3333.33', '333.33', '2', '1', '0');
INSERT INTO `lar_stages` VALUES ('345', '125', '67', '1507392000', '3666.67', '3333.33', '333.33', '3', '1', '0');
INSERT INTO `lar_stages` VALUES ('346', '125', '67', '1510070400', '3666.67', '3333.33', '333.33', '4', '1', '0');
INSERT INTO `lar_stages` VALUES ('347', '125', '67', '1512662400', '3666.67', '3333.33', '333.33', '5', '1', '0');
INSERT INTO `lar_stages` VALUES ('348', '125', '67', '1515340800', '3666.67', '3333.33', '333.33', '6', '1', '0');
INSERT INTO `lar_stages` VALUES ('349', '125', '67', '1518019200', '3666.67', '3333.33', '333.33', '7', '1', '0');
INSERT INTO `lar_stages` VALUES ('350', '125', '67', '1520438400', '3666.67', '3333.33', '333.33', '8', '1', '0');
INSERT INTO `lar_stages` VALUES ('351', '125', '67', '1523116800', '3666.67', '3333.33', '333.33', '9', '1', '0');
INSERT INTO `lar_stages` VALUES ('352', '125', '67', '1525708800', '3666.67', '3333.33', '333.33', '10', '1', '0');
INSERT INTO `lar_stages` VALUES ('353', '125', '67', '1528387200', '3666.67', '3333.33', '333.33', '11', '1', '0');
INSERT INTO `lar_stages` VALUES ('354', '125', '67', '1530979200', '3666.67', '3333.33', '333.33', '12', '1', '0');
INSERT INTO `lar_stages` VALUES ('355', '112', '68', '1502294400', '35000.00', '33333.33', '1666.67', '1', '1', '0');
INSERT INTO `lar_stages` VALUES ('356', '112', '68', '1504972800', '35000.00', '33333.33', '1666.67', '2', '1', '0');
INSERT INTO `lar_stages` VALUES ('357', '112', '68', '1507564800', '35000.00', '33333.33', '1666.67', '3', '1', '0');
INSERT INTO `lar_stages` VALUES ('358', '112', '68', '1510243200', '35000.00', '33333.33', '1666.67', '4', '1', '0');
INSERT INTO `lar_stages` VALUES ('359', '112', '68', '1512835200', '35000.00', '33333.33', '1666.67', '5', '1', '0');
INSERT INTO `lar_stages` VALUES ('360', '112', '68', '1515513600', '35000.00', '33333.33', '1666.67', '6', '1', '0');
INSERT INTO `lar_stages` VALUES ('361', '116', '69', '1502294400', '1916.67', '1666.67', '250.00', '1', '1', '1');
INSERT INTO `lar_stages` VALUES ('385', '101', '71', '1502380800', '81750.00', '75000.00', '6750.00', '1', '1', '0');
INSERT INTO `lar_stages` VALUES ('386', '101', '71', '1505059200', '81750.00', '75000.00', '6750.00', '2', '1', '0');
INSERT INTO `lar_stages` VALUES ('387', '101', '71', '1507651200', '81750.00', '75000.00', '6750.00', '3', '1', '0');
INSERT INTO `lar_stages` VALUES ('388', '101', '71', '1510329600', '81750.00', '75000.00', '6750.00', '4', '1', '0');
INSERT INTO `lar_stages` VALUES ('389', '101', '71', '1512921600', '81750.00', '75000.00', '6750.00', '5', '1', '0');
INSERT INTO `lar_stages` VALUES ('390', '101', '71', '1515600000', '81750.00', '75000.00', '6750.00', '6', '1', '0');
INSERT INTO `lar_stages` VALUES ('391', '101', '71', '1518278400', '81750.00', '75000.00', '6750.00', '7', '1', '0');
INSERT INTO `lar_stages` VALUES ('392', '101', '71', '1520697600', '81750.00', '75000.00', '6750.00', '8', '1', '0');
INSERT INTO `lar_stages` VALUES ('393', '101', '71', '1523376000', '81750.00', '75000.00', '6750.00', '9', '1', '0');
INSERT INTO `lar_stages` VALUES ('394', '101', '71', '1525968000', '81750.00', '75000.00', '6750.00', '10', '1', '0');
INSERT INTO `lar_stages` VALUES ('395', '101', '71', '1528646400', '81750.00', '75000.00', '6750.00', '11', '1', '0');
INSERT INTO `lar_stages` VALUES ('396', '101', '71', '1531238400', '81750.00', '75000.00', '6750.00', '12', '1', '0');
INSERT INTO `lar_stages` VALUES ('397', '116', '79', '1502640000', '746.67', '666.67', '80.00', '1', '1', '1');
INSERT INTO `lar_stages` VALUES ('398', '116', '79', '1505318400', '746.67', '666.67', '80.00', '2', '1', '1');
INSERT INTO `lar_stages` VALUES ('399', '116', '79', '1507910400', '746.67', '666.67', '80.00', '3', '1', '1');
INSERT INTO `lar_stages` VALUES ('400', '116', '79', '1510588800', '746.67', '666.67', '80.00', '4', '1', '1');
INSERT INTO `lar_stages` VALUES ('401', '116', '79', '1513180800', '746.67', '666.67', '80.00', '5', '1', '0');
INSERT INTO `lar_stages` VALUES ('402', '116', '79', '1515859200', '746.67', '666.67', '80.00', '6', '1', '0');
INSERT INTO `lar_stages` VALUES ('403', '116', '79', '1518537600', '746.67', '666.67', '80.00', '7', '1', '0');
INSERT INTO `lar_stages` VALUES ('404', '116', '79', '1520956800', '746.67', '666.67', '80.00', '8', '1', '0');
INSERT INTO `lar_stages` VALUES ('405', '116', '79', '1523635200', '746.67', '666.67', '80.00', '9', '1', '0');
INSERT INTO `lar_stages` VALUES ('406', '116', '79', '1526227200', '746.67', '666.67', '80.00', '10', '1', '0');
INSERT INTO `lar_stages` VALUES ('407', '116', '79', '1528905600', '746.67', '666.67', '80.00', '11', '1', '0');
INSERT INTO `lar_stages` VALUES ('408', '116', '79', '1531497600', '746.67', '666.67', '80.00', '12', '1', '0');
INSERT INTO `lar_stages` VALUES ('409', '116', '80', '1539446400', '17250.00', '15000.00', '2250.00', '1', '2', '1');

-- ----------------------------
-- Table structure for lar_total_revenue
-- ----------------------------
DROP TABLE IF EXISTS `lar_total_revenue`;
CREATE TABLE `lar_total_revenue` (
  `total_website_revenue` decimal(10,2) NOT NULL COMMENT '网站总收益',
  `floating_capital` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '流动资金'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lar_total_revenue
-- ----------------------------
INSERT INTO `lar_total_revenue` VALUES ('3856.27', '2536246.05');

-- ----------------------------
-- Table structure for lar_users
-- ----------------------------
DROP TABLE IF EXISTS `lar_users`;
CREATE TABLE `lar_users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(40) NOT NULL COMMENT '用户名称',
  `password` varchar(64) NOT NULL COMMENT '用户密码',
  `tel` varchar(15) NOT NULL COMMENT '用户手机号',
  `email` char(255) NOT NULL COMMENT '用户邮箱',
  `point` int(11) DEFAULT '0' COMMENT '用户积分',
  `create_time` int(11) NOT NULL COMMENT '注册时间',
  `last_ip` char(30) NOT NULL COMMENT '最后登录的ip',
  `last_time` int(11) NOT NULL COMMENT '上一次的登录时间',
  `open_id` varchar(64) DEFAULT NULL,
  `over_info` tinyint(1) DEFAULT '0' COMMENT '0未完善；1审核成功；2完善未审核',
  `activity_num` int(5) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_users
-- ----------------------------
INSERT INTO `lar_users` VALUES ('78', 'asan', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497427006', '127.0.0.1', '1528344753', '', '1', '1');
INSERT INTO `lar_users` VALUES ('2', 'xxcb', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497267405', '0.0.0.0', '1528354418', '', '1', '0');
INSERT INTO `lar_users` VALUES ('3', '测试3', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497267405', '0.0.0.0', '1497267405', '', '0', '1');
INSERT INTO `lar_users` VALUES ('4', '测试4', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497267405', '0.0.0.0', '1497267405', '', '0', '1');
INSERT INTO `lar_users` VALUES ('5', '测试5', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497267405', '0.0.0.0', '1497267405', '', '0', '1');
INSERT INTO `lar_users` VALUES ('6', '测试6', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497267405', '0.0.0.0', '1497267405', '', '0', '1');
INSERT INTO `lar_users` VALUES ('18', '213321sa', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1495267045', '127.0.0.1', '1495267045', null, '0', '1');
INSERT INTO `lar_users` VALUES ('117', 'wuxin', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498997333', '127.0.0.1', '1498997333', null, '0', '1');
INSERT INTO `lar_users` VALUES ('79', 'ali', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497451392', '127.0.0.1', '1497451392', null, '0', '1');
INSERT INTO `lar_users` VALUES ('118', 'fashi', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498997414', '127.0.0.1', '1498997414', null, '0', '1');
INSERT INTO `lar_users` VALUES ('75', 'test', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497421889', '127.0.0.1', '1500043836', 'qqrsceiTJg6xA', '1', '1');
INSERT INTO `lar_users` VALUES ('95', 'test1', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1497421889', '127.0.0.1', '1497688500', '', '0', '1');
INSERT INTO `lar_users` VALUES ('101', 'zhifeng', '63a9f0ea7bb98050796b649e85481845', '17600177310', '947280924@qq.com', '0', '1497941044', '127.0.0.1', '1499831821', 'qq9CZTvzsZuGw', '1', '1');
INSERT INTO `lar_users` VALUES ('102', 'demo', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498198366', '127.0.0.1', '1498206972', null, '1', '1');
INSERT INTO `lar_users` VALUES ('110', 'weixin', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498209693', '127.0.0.1', '1498209693', null, '0', '1');
INSERT INTO `lar_users` VALUES ('109', 'wangwu', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498209334', '127.0.0.1', '1498613367', null, '1', '1');
INSERT INTO `lar_users` VALUES ('107', 'lisi', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498208957', '127.0.0.1', '1498524729', null, '0', '1');
INSERT INTO `lar_users` VALUES ('106', 'fengyu', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498207196', '127.0.0.1', '1499322863', null, '1', '0');
INSERT INTO `lar_users` VALUES ('103', 'aadesda', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498202887', '127.0.0.1', '1499241774', null, '1', '0');
INSERT INTO `lar_users` VALUES ('113', 'shuaijie', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498829778', '', '1528960632', '', '1', '0');
INSERT INTO `lar_users` VALUES ('116', 'sandada', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498996895', '127.0.0.1', '1500044084', 'qq89hT9J8HImY', '1', '1');
INSERT INTO `lar_users` VALUES ('112', 'yang', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498743654', '127.0.0.1', '1500047197', 'qqIdibtfGHejs', '1', '0');
INSERT INTO `lar_users` VALUES ('114', 'ys', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498830836', '127.0.0.1', '1499604285', null, '1', '0');
INSERT INTO `lar_users` VALUES ('115', 'limazi', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1498880862', '127.0.0.1', '1499241397', null, '1', '1');
INSERT INTO `lar_users` VALUES ('119', 'liu6666', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499255731', '127.0.0.1', '1499302149', null, '1', '1');
INSERT INTO `lar_users` VALUES ('120', 'baosan', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499267710', '127.0.0.1', '1499267710', null, '0', '1');
INSERT INTO `lar_users` VALUES ('121', 'baosanjun', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499267921', '127.0.0.1', '1499267921', null, '0', '1');
INSERT INTO `lar_users` VALUES ('122', 'b1aosanjun', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499268156', '127.0.0.1', '1499268156', null, '0', '1');
INSERT INTO `lar_users` VALUES ('123', 'demo11', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499415409', '127.0.0.1', '1499415409', null, '1', '1');
INSERT INTO `lar_users` VALUES ('124', 'shanzezhao', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499431515', '222.128.173.104', '1499431515', null, '0', '1');
INSERT INTO `lar_users` VALUES ('125', 'lili', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499501095', '180.175.28.91', '1499501095', null, '1', '1');
INSERT INTO `lar_users` VALUES ('126', 'yii123456', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499605368', '180.175.116.36', '1499605368', null, '0', '1');
INSERT INTO `lar_users` VALUES ('127', 'adapa', '63a9f0ea7bb98050796b649e85481845', '17600177310', '616955067@qq.com', '0', '1499647119', '180.175.28.91', '1499647119', null, '0', '1');
INSERT INTO `lar_users` VALUES ('128', 'admin123', '63a9f0ea7bb98050796b649e85481845', '18210999763', '1257015959@qq.com', '0', '1499951510', '222.128.174.161', '1500000099', null, '0', '1');
INSERT INTO `lar_users` VALUES ('129', 'xuhuan', '63a9f0ea7bb98050796b649e85481845', '17600177310', '1460722855@qq.com', '0', '1498829778', '', '1500002820', '', '1', '0');
INSERT INTO `lar_users` VALUES ('130', '123456', '63a9f0ea7bb98050796b649e85481845', '', '', '0', '1500038377', '', '1500038401', '', '0', '1');
INSERT INTO `lar_users` VALUES ('131', '1111', '63a9f0ea7bb98050796b649e85481845', '', '111@qq.com', '0', '1500039113', '', '1500040060', 'qqjhwrk4hd.kM', '0', '1');

-- ----------------------------
-- Table structure for lar_user_assets
-- ----------------------------
DROP TABLE IF EXISTS `lar_user_assets`;
CREATE TABLE `lar_user_assets` (
  `user_id` varchar(60) NOT NULL COMMENT '用户ID',
  `user_assets` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户总资产',
  `user_recharge` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '用户充值金额',
  `user_loan` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '用户贷款金额',
  `upd_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_user_assets
-- ----------------------------
INSERT INTO `lar_user_assets` VALUES ('0', '0.00', '0', '0', '1499443215');
INSERT INTO `lar_user_assets` VALUES ('101', '89100.01', '0', '900000', '1497843623');
INSERT INTO `lar_user_assets` VALUES ('102', '100000.00', '0', '0', '1498198364');
INSERT INTO `lar_user_assets` VALUES ('103', '0.00', '0', '0', '1498202885');
INSERT INTO `lar_user_assets` VALUES ('106', '73700.00', '0', '90000', '1498207194');
INSERT INTO `lar_user_assets` VALUES ('107', '0.00', '0', '0', '1498208955');
INSERT INTO `lar_user_assets` VALUES ('109', '0.00', '0', '0', '1497843623');
INSERT INTO `lar_user_assets` VALUES ('110', '0.00', '0', '0', '1498209691');
INSERT INTO `lar_user_assets` VALUES ('112', '83408.35', '0', '200000', '1498743650');
INSERT INTO `lar_user_assets` VALUES ('113', '1.35', '0', '0', '1498829775');
INSERT INTO `lar_user_assets` VALUES ('114', '72000.00', '0', '500000', '1498830723');
INSERT INTO `lar_user_assets` VALUES ('115', '0.00', '0', '0', '1498880863');
INSERT INTO `lar_user_assets` VALUES ('116', '175246.59', '0', '713000', '1498996879');
INSERT INTO `lar_user_assets` VALUES ('117', '0.00', '0', '0', '1498997330');
INSERT INTO `lar_user_assets` VALUES ('118', '0.00', '0', '0', '1498997411');
INSERT INTO `lar_user_assets` VALUES ('119', '0.00', '0', '0', '1499255737');
INSERT INTO `lar_user_assets` VALUES ('120', '0.00', '0', '0', '1499267706');
INSERT INTO `lar_user_assets` VALUES ('121', '0.00', '0', '0', '1499267917');
INSERT INTO `lar_user_assets` VALUES ('122', '0.00', '0', '0', '1499268152');
INSERT INTO `lar_user_assets` VALUES ('123', '0.00', '0', '0', '1499415407');
INSERT INTO `lar_user_assets` VALUES ('124', '0.00', '0', '0', '1499431515');
INSERT INTO `lar_user_assets` VALUES ('125', '89000.18', '0', '80000', '1499501095');
INSERT INTO `lar_user_assets` VALUES ('126', '0.00', '0', '0', '1499605368');
INSERT INTO `lar_user_assets` VALUES ('127', '0.00', '0', '0', '1499647119');
INSERT INTO `lar_user_assets` VALUES ('128', '1000000.00', '0', '0', '1499951510');
INSERT INTO `lar_user_assets` VALUES ('129', '891667.00', '0', '0', '1500000173');
INSERT INTO `lar_user_assets` VALUES ('130', '0.00', '0', '0', '1500038377');
INSERT INTO `lar_user_assets` VALUES ('131', '0.02', '0', '0', '1500039113');
INSERT INTO `lar_user_assets` VALUES ('75', '5118376.04', '0', '1580000', '1497941043');
INSERT INTO `lar_user_assets` VALUES ('91', '12000.00', '0', '0', '1497941043');
INSERT INTO `lar_user_assets` VALUES ('92', '9070.00', '9000', '1000', '1497843623');

-- ----------------------------
-- Table structure for lar_user_card
-- ----------------------------
DROP TABLE IF EXISTS `lar_user_card`;
CREATE TABLE `lar_user_card` (
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `user_card` varchar(255) DEFAULT NULL COMMENT '银行卡号',
  `user_bank` varchar(255) DEFAULT NULL COMMENT '开户行',
  `card_type` varchar(255) DEFAULT '1' COMMENT '绑定状态    1绑定中     0解绑状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_user_card
-- ----------------------------
INSERT INTO `lar_user_card` VALUES ('92', '64456466', '天堂银行', '1');
INSERT INTO `lar_user_card` VALUES ('92', '644564666', '天堂银行', '1');
INSERT INTO `lar_user_card` VALUES ('92', '1654654646464', '天堂银行', '1');
INSERT INTO `lar_user_card` VALUES ('75', '6513165156165', '天堂银行', '1');
INSERT INTO `lar_user_card` VALUES ('75', '132123213123132', '农商银行', '1');
INSERT INTO `lar_user_card` VALUES ('112', '142123213123132', '工商银行', '1');
INSERT INTO `lar_user_card` VALUES ('112', '12313211231232', '中国银行', '1');
INSERT INTO `lar_user_card` VALUES ('75', '142126213123132', '中国银行', '1');
INSERT INTO `lar_user_card` VALUES ('75', '142126213123132', '中国银行', '1');
INSERT INTO `lar_user_card` VALUES ('75', '134183213123132', '商业银行', '1');
INSERT INTO `lar_user_card` VALUES ('112', '12313211231432', '中国银行', '1');
INSERT INTO `lar_user_card` VALUES ('112', '12313219231432', '建设银行', '1');
INSERT INTO `lar_user_card` VALUES ('116', '123123213213', '商业银行', '1');
INSERT INTO `lar_user_card` VALUES ('122', '1231232113213', '工商银行', '1');
INSERT INTO `lar_user_card` VALUES ('122', '123131211231232', '建设银行', '1');
INSERT INTO `lar_user_card` VALUES ('122', '22313211231232', '农商银行', '1');
INSERT INTO `lar_user_card` VALUES ('106', '123131213431232', '招商银行', '1');
INSERT INTO `lar_user_card` VALUES ('112', '199604184012', '建设银行', '1');
INSERT INTO `lar_user_card` VALUES ('114', '66666666666', '中国银行', '1');
INSERT INTO `lar_user_card` VALUES ('114', '7777777777', '华夏银行', '1');
INSERT INTO `lar_user_card` VALUES ('126', '16516546546546', '天堂银行', '1');
INSERT INTO `lar_user_card` VALUES ('129', '11514616843249841616', '农业银行', '1');

-- ----------------------------
-- Table structure for lar_user_grows
-- ----------------------------
DROP TABLE IF EXISTS `lar_user_grows`;
CREATE TABLE `lar_user_grows` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `wait_huai_captital` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '待还本金',
  `wait_huai_interest` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '待还利息',
  `wait_shou_captital` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '待收本金',
  `wait_shou_interest` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '待收利息',
  `total_grow` decimal(10,2) DEFAULT '0.00' COMMENT '累计收益',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_user_grows
-- ----------------------------
INSERT INTO `lar_user_grows` VALUES ('48', '75', '254670.31', '24666.64', '193451.61', '114804.21', '41038.08');
INSERT INTO `lar_user_grows` VALUES ('52', '79', '123.00', '143.00', '92333.34', '99842.50', '333.00');
INSERT INTO `lar_user_grows` VALUES ('68', '95', '34.00', '21.00', '92333.34', '99842.50', '12.00');
INSERT INTO `lar_user_grows` VALUES ('74', '101', '900000.00', '81000.00', '10900.00', '589.98', '589.98');
INSERT INTO `lar_user_grows` VALUES ('75', '102', '0.00', '0.00', '92333.34', '99842.50', '100.00');
INSERT INTO `lar_user_grows` VALUES ('76', '103', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('79', '106', '90000.00', '7200.00', '92333.34', '99842.50', '326.60');
INSERT INTO `lar_user_grows` VALUES ('80', '107', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('82', '109', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('83', '110', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('85', '112', '200000.00', '10000.00', '85666.68', '99692.50', '1050.00');
INSERT INTO `lar_user_grows` VALUES ('86', '113', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('87', '114', '500000.00', '25000.00', '92333.34', '99842.50', '330.00');
INSERT INTO `lar_user_grows` VALUES ('88', '115', '10000.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('89', '116', '628666.57', '634260.82', '93433.34', '99897.45', '448.26');
INSERT INTO `lar_user_grows` VALUES ('90', '117', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('91', '118', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('92', '119', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('93', '120', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('94', '121', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('95', '122', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('96', '123', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('97', '124', '0.00', '0.00', '92333.34', '99842.50', '0.00');
INSERT INTO `lar_user_grows` VALUES ('101', '125', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `lar_user_grows` VALUES ('102', '126', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `lar_user_grows` VALUES ('103', '127', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `lar_user_grows` VALUES ('104', '128', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `lar_user_grows` VALUES ('105', '129', '0.00', '0.00', '8333.00', '416.64', '416.64');
INSERT INTO `lar_user_grows` VALUES ('106', '130', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `lar_user_grows` VALUES ('107', '131', '0.00', '0.00', '0.00', '0.00', '0.00');

-- ----------------------------
-- Table structure for lar_user_infos
-- ----------------------------
DROP TABLE IF EXISTS `lar_user_infos`;
CREATE TABLE `lar_user_infos` (
  `user_info_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id号',
  `user_id` int(11) NOT NULL COMMENT '用户唯一ID号',
  `card_number` varchar(18) NOT NULL COMMENT '身份证号',
  `pay_pass` varchar(60) NOT NULL COMMENT '用户支付密码',
  `card_img` char(60) NOT NULL COMMENT '身份证图片路径',
  `create_time` int(11) NOT NULL COMMENT '添加时间',
  `card_name` varchar(30) NOT NULL,
  `is_lock` tinyint(4) NOT NULL DEFAULT '0' COMMENT '账户是否被锁定 1已锁定',
  PRIMARY KEY (`user_info_id`,`user_id`),
  UNIQUE KEY `uid` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of lar_user_infos
-- ----------------------------
INSERT INTO `lar_user_infos` VALUES ('1', '1', '130481199012214520', '96e79218965eb72c92a549dd5a330112', '1.jpg', '1497267405', '魏帅杰', '0');
INSERT INTO `lar_user_infos` VALUES ('2', '2', '130481199012214520', '96e79218965eb72c92a549dd5a330112', '1.jpg', '1497267405', '魏帅杰', '0');
INSERT INTO `lar_user_infos` VALUES ('3', '75', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-14-06-56-01-5940de019eaa2.jpg', '1497423361', '王之枫', '0');
INSERT INTO `lar_user_infos` VALUES ('5', '77', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-14-07-27-22-5940e55a1ceae.jpg', '1497425242', '王之枫', '0');
INSERT INTO `lar_user_infos` VALUES ('6', '6', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-14-07-27-30-5940e562b88e4.jpg', '1497425250', '王之枫', '0');
INSERT INTO `lar_user_infos` VALUES ('7', '94', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-14-07-28-22-5940e5967894c.jpg', '1497425302', '王之枫', '0');
INSERT INTO `lar_user_infos` VALUES ('9', '100', '130481199012214520', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/card/2017/06/2017-06-14-07-57-11-5940ec5771797.jpg', '1497427031', '魏帅杰', '0');
INSERT INTO `lar_user_infos` VALUES ('33', '101', '130481199012214517', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/07/2017-07-11-15-42-34-5964816a3d10d.png', '1499758954', '王之枫', '0');
INSERT INTO `lar_user_infos` VALUES ('26', '78', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/07/2017-07-02-20-41-14-5958e9ead8d34.jpg', '1498999274', '三大大', '0');
INSERT INTO `lar_user_infos` VALUES ('14', '102', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-23-06-15-55-594cb21b3b503.jpeg', '1498198555', '李四', '0');
INSERT INTO `lar_user_infos` VALUES ('15', '106', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-24-10-43-59-594dd1ef11f30.jpeg', '1498272239', '李四', '0');
INSERT INTO `lar_user_infos` VALUES ('20', '109', '130481199012214520', '', 'uploads/card/2017/06/2017-06-28-09-31-11-595306dff166f.jpeg', '1498613471', '王五', '0');
INSERT INTO `lar_user_infos` VALUES ('21', '111', '130481199012214520', '', 'uploads/card/2017/06/2017-06-28-09-31-11-595306dff166f.jpeg', '1498613471', '王五', '0');
INSERT INTO `lar_user_infos` VALUES ('22', '112', '130481199012214520', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/card/2017/06/2017-06-29-22-36-07-595510578d177.jpg', '1498746967', '羊咩咩', '0');
INSERT INTO `lar_user_infos` VALUES ('23', '113', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-30-21-41-08-595654f4d54fe.jpg', '1498830068', '魏帅杰', '0');
INSERT INTO `lar_user_infos` VALUES ('24', '114', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/06/2017-06-30-21-55-37-5956585984137.png', '1498830937', '杨帅', '0');
INSERT INTO `lar_user_infos` VALUES ('25', '116', '130481199012214520', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/07/2017-07-02-20-02-32-5958e0d87b9ab.jpg', '1498996952', '孙达伟', '0');
INSERT INTO `lar_user_infos` VALUES ('27', '115', '130481199012214520', '', 'uploads/card/2017/07/2017-07-05-15-59-07-595c9c4b7a834.jpg', '1499241547', '李四', '0');
INSERT INTO `lar_user_infos` VALUES ('28', '103', '130481199012214520', '', 'uploads/card/2017/07/2017-07-05-16-07-41-595c9e4d27d78.png', '1499242061', '啦啦', '0');
INSERT INTO `lar_user_infos` VALUES ('29', '119', '130481199012214520', '', 'uploads/card/2017/07/2017-07-05-19-56-25-595cd3e943e4f.jpg', '1499255785', '网通', '0');
INSERT INTO `lar_user_infos` VALUES ('30', '123', '130481199012214520', '', 'uploads/card/2017/07/2017-07-07-16-18-23-595f43cf30c7d.jpg', '1499415503', '测试', '0');
INSERT INTO `lar_user_infos` VALUES ('31', '125', '130481199012214520', '', 'uploads/card/2017/07/2017-07-08-17-36-48-5960a7b071f31.jpg', '1499506608', '啦啦', '0');
INSERT INTO `lar_user_infos` VALUES ('34', '129', '1111111111111111', '96e79218965eb72c92a549dd5a330112', 'uploads/card/2017/07/2017-07-14-10-46-35-5968308bb79aa.jpg', '1500000395', '钢铁侠', '0');

-- ----------------------------
-- Table structure for lar_user_redpackets
-- ----------------------------
DROP TABLE IF EXISTS `lar_user_redpackets`;
CREATE TABLE `lar_user_redpackets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '户用id',
  `end_time` varchar(50) DEFAULT NULL COMMENT '兑换时间',
  `state` tinyint(4) DEFAULT '0' COMMENT '1已使用  0未使用',
  `start_time` varchar(50) DEFAULT NULL COMMENT '兑换时间',
  `code` varchar(50) DEFAULT NULL COMMENT '验证码',
  `r_id` int(11) DEFAULT NULL COMMENT '红包id',
  `use_state` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lar_user_redpackets
-- ----------------------------
INSERT INTO `lar_user_redpackets` VALUES ('8', '1', '1499006730', '1', '1498401930', 'd7ef75e6166a0a1c6d900f285805f316', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('9', '1', '1499006774', '1', '1498401974', '292c789d16d25ace34046957a3d02e46', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('10', '101', '1499006863', '1', '1498402063', '3189798e490620887f76127ae4dcd0ca', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('11', '101', '1499081573', '1', '1498476773', '060dd11b5fe5c07f9af8348390fc6848', '2', '1');
INSERT INTO `lar_user_redpackets` VALUES ('42', '75', '1499436622', '1', '1498831822', '6efd92061e39e0d25026d81be0a06c88', '1', '1');
INSERT INTO `lar_user_redpackets` VALUES ('43', '75', '1499437065', '1', '1498832265', 'cb9f76fac1b86437f76276d5b88e0ac2', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('44', '112', '1499437408', '1', '1498832608', '193623bfc999a436096b9ba6f9c3cfcc', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('45', '112', '1499438265', '1', '1498833465', '7ee2f4efa920f2459a18aa01a79ba61a', '1', '1');
INSERT INTO `lar_user_redpackets` VALUES ('46', '112', '1499438924', '1', '1498834124', '11c38ae9191f19ba4820d5b2e37a783a', '1', '1');
INSERT INTO `lar_user_redpackets` VALUES ('47', '75', '1499606708', '1', '1499001908', '6783fbfa043a2ac03d80e0005e120a30', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('48', '75', '1499607214', '1', '1499002414', '004f5d32009425a21d7665bac1a491d6', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('49', '112', '1499437755', '1', '1498832955', '9b4a88e7766683cb11f1829f47457ddd', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('50', '116', '1499697263', '1', '1499092463', 'c9b6c170a570dc4acac6c90c1730b16b', '1', '1');
INSERT INTO `lar_user_redpackets` VALUES ('51', '122', '1499873573', '1', '1499268773', '92661529cdf1f7bf30286c68088762ee', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('52', '106', '1499906135', '1', '1499301335', '867ea0c6c172bb23010692f8095b6079', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('53', '112', '1499927188', '1', '1499322388', '923fb7e4b03f08cb2a7e8d65a3ef83c7', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('54', '75', '1500219631', '1', '1499614831', 'f94458ef3cb24c02d2229741979b5289', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('55', '101', '1500365376', '1', '1499760576', '39ffcab2184d998e1e0eb8adc9e076fd', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('56', '129', '1500605714', '1', '1500000914', '02938765b73253d138321d18e3425ea8', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('57', null, null, '0', null, '7acf4fb1ac05c074d11cc2a9ebf6b951', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('58', null, null, '0', null, '2726c2741a956ace272eb05b5be3fee3', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('59', null, null, '0', null, '70de967603df2a4a8b0081a58b266b5d', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('60', null, null, '0', null, 'f580b9cec7172a9123755e95bf081d31', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('61', null, null, '0', null, '6dc3168ed836513e6c23e2702bf39458', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('62', '122', '1499873748', '1', '1499268948', '29a961d58c9f61e08a57a0002eb5b7b3', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('63', '75', '1500105426', '1', '1499500626', '161ef0fa8a25a889d92995c52901e7c8', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('64', '122', '1499873928', '1', '1499269128', '37c7e61bc5fc25b9ae3f3960b0b0ee0b', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('65', '128', '1500605167', '1', '1500000367', 'd7a2eb1ccce1519a0432602b4725007a', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('66', null, null, '0', null, '314b080bd0bbb35d57e3adf6dbfe1576', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('67', null, null, '0', null, '1de14e15a33dfc76797e7efed0d7403f', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('68', null, null, '0', null, '9b1da90a38bb3dd88db44226f74515af', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('69', null, null, '0', null, '48d939f2af8d4dc8daed5d654ac20101', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('70', null, null, '0', null, 'f8d5d936ed9744be5d0a7a07025dd002', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('71', null, null, '0', null, '707650862a427db2e189a6eb53bcb76e', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('72', null, null, '0', null, '22d89ef95e5e8731e56fb46fea52ffbf', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('73', null, null, '0', null, '8edd716d9904981463355c6c6b643492', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('74', null, null, '0', null, '6b60589f0841cdc16695b6a1b5002f73', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('75', null, null, '0', null, '618295aad3edb2f81665a724154b979e', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('76', null, null, '0', null, '6f5bf1de8c605112f6bac5a8214df765', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('77', null, null, '0', null, '767de3d60676700ce48941fa5624dc0d', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('78', null, null, '0', null, '72720ec69a52eccfe7835401b7825869', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('79', null, null, '0', null, '3c705b2db5f55b07fb5bae6b77820e17', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('80', null, null, '0', null, 'e8e6c724f524fb1b3679586e6a655312', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('81', null, null, '0', null, '5b0e343b2c4273c99810b09dde6ad0ff', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('82', null, null, '0', null, '289a4582ab8f96173707abbcb7cc7423', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('83', null, null, '0', null, 'e768b41ac2cb1e659cc93f161231f24f', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('84', null, null, '0', null, 'b5c11a846b91976c75b07c60d39b2df4', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('85', null, null, '0', null, 'bf640e511234945e39e80d2afe7f83a8', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('86', null, null, '0', null, '09828ea784f26438a2ea015abdec6d1a', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('87', null, null, '0', null, '1928afd62a9b21027d541143ba7a24f2', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('88', '112', '1500221299', '1', '1499616499', 'e2825482df9523aac0c64b31481a180d', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('89', null, null, '0', null, '68dacef9266f348af04f2c88710fe144', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('90', null, null, '0', null, 'd04ef03774feabd0191efeda3dcf83a1', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('91', null, null, '0', null, 'b67ae51f7d549ac873f315461c83482e', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('92', null, null, '0', null, 'd24c5b9d059f8ce83e429df58f290a8a', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('93', null, null, '0', null, '335ac8991c3cfe4fcb5d93a9ecece3ab', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('94', null, null, '0', null, '1deae8f2c4299a0df3accbb063030d14', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('95', null, null, '0', null, '98e46175f7537d3f13fd194cf389a422', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('96', null, null, '0', null, '82e7040f0199c16e9657a3b63e92c128', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('97', null, null, '0', null, 'bf255ba2c7d963b80eb73fb76f52f913', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('98', '75', null, '0', null, '9b35632c7c8593626d4ed33609f1e14b', '2', '1');
INSERT INTO `lar_user_redpackets` VALUES ('99', '75', null, '0', null, '93a4e5b43343b0b91efe4be0fbf873ab', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('100', '101', null, '0', null, '45c40fd8d35d0a2ab6e8169644adacd1', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('101', '101', null, '0', null, '0ece69ed8d7d7f8d5abdf2c1e47b17f1', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('102', '101', null, '0', null, '47ae666636eee4cce49b4dad8d165bc5', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('103', '75', null, '0', null, '0fc0c7833960bda4685784b45df9abbf', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('104', '75', null, '0', null, '227d8fedb27e53c383b9bc1690031e3d', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('105', '75', null, '0', null, '1f410501ecbf9b0dd39aaf70f8bd451f', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('106', '112', '1499861688', '1', '1499256888', 'd4e34c58be4e98e5b2673c4a053ef84f', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('107', null, null, '0', null, '3159baa003d0233e2d94535dbd59da2a', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('108', null, null, '0', null, '95a3b39644d6b2d25c737fa96b3c26c6', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('109', '114', '1500089287', '1', '1499484487', '3b3b2420bed341da22eef5cece824624', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('110', null, null, '0', null, '00680b5bc094782153b4e36eca16edd0', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('111', null, null, '0', null, 'c4c52f872734cfad7af24921febc39ac', '2', '0');
INSERT INTO `lar_user_redpackets` VALUES ('112', null, null, '0', null, 'b9767cc7620254620807c43951b00f4b', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('113', null, null, '0', null, '7909850ce519e39a4c8c039a3fe17ed1', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('114', null, null, '0', null, '1fda8ff73915b3b3ea797d3bd44aa5b9', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('115', null, null, '0', null, 'eff054833417ad365fffdcfcc58a399a', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('116', null, null, '0', null, '07c89211225ac5ba60134000ffcad298', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('117', null, null, '0', null, '4891f5b2e79aca64e2d53f8f22d62395', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('118', null, null, '0', null, '2cc864b26b5a6fc234cf69227e182180', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('119', null, null, '0', null, '569a2cb6f3802100eb5e427054d4a4f2', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('120', null, null, '0', null, '2ff67b05bc393cf1f15e6904f4f0d06d', '1', '0');
INSERT INTO `lar_user_redpackets` VALUES ('121', null, null, '0', null, '2e7af3a1dcc27ae2b667b0ac135a5da6', '1', '0');
DROP TRIGGER IF EXISTS `node_nr`;
DELIMITER ;;
CREATE TRIGGER `node_nr` AFTER INSERT ON `lar_node` FOR EACH ROW begin 
	insert into lar_r_n(rote_id,node_id) values(5,new.node_id);
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `u_grows`;
DELIMITER ;;
CREATE TRIGGER `u_grows` AFTER INSERT ON `lar_users` FOR EACH ROW BEGIN
insert into  lar_user_grows(user_id) values ( new.user_id );
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `u_assets_del`;
DELIMITER ;;
CREATE TRIGGER `u_assets_del` BEFORE DELETE ON `lar_users` FOR EACH ROW BEGIN
  DELETE from lar_user_assets where user_id = old.user_id;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `u_up_del`;
DELIMITER ;;
CREATE TRIGGER `u_up_del` AFTER DELETE ON `lar_users` FOR EACH ROW BEGIN
  DELETE from lar_user_grows where user_id = old.user_id;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ass_credit`;
DELIMITER ;;
CREATE TRIGGER `ass_credit` AFTER INSERT ON `lar_user_assets` FOR EACH ROW BEGIN
		insert into lar_credits (user_id) values(new.user_id);
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `ass_cre_del`;
DELIMITER ;;
CREATE TRIGGER `ass_cre_del` AFTER DELETE ON `lar_user_assets` FOR EACH ROW BEGIN
	delete from lar_credits where user_id = old.user_id;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `grow_assets`;
DELIMITER ;;
CREATE TRIGGER `grow_assets` AFTER INSERT ON `lar_user_grows` FOR EACH ROW begin
insert into lar_user_assets(user_id,upd_time) values(new.user_id,unix_timestamp(now()));
end
;;
DELIMITER ;
