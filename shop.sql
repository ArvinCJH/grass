/*
Navicat MySQL Data Transfer

Source Server         : grass
Source Server Version : 50605
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50605
File Encoding         : 65001

Date: 2019-03-31 09:40:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address_manager_table
-- ----------------------------
DROP TABLE IF EXISTS `address_manager_table`;
CREATE TABLE `address_manager_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address_detail` varchar(25) DEFAULT NULL COMMENT '详细地址',
  `address_default` int(11) DEFAULT NULL COMMENT '0 未选中 1选中',
  `receive_phone` varchar(12) DEFAULT NULL COMMENT '联系电话',
  `consignee` varchar(25) DEFAULT NULL COMMENT '收货人',
  `postal_code` varchar(25) DEFAULT NULL COMMENT '邮政编码',
  `province` varchar(25) DEFAULT NULL COMMENT '省',
  `city` varchar(25) DEFAULT NULL COMMENT '市',
  `region` varchar(25) DEFAULT NULL COMMENT '地区',
  `address_stress` varchar(25) DEFAULT NULL COMMENT '街道',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address_manager_table
-- ----------------------------

-- ----------------------------
-- Table structure for merchants_table
-- ----------------------------
DROP TABLE IF EXISTS `merchants_table`;
CREATE TABLE `merchants_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '商家地址',
  `sales` bigint(20) DEFAULT '0' COMMENT '出售数量',
  `serve_list` varchar(255) DEFAULT NULL COMMENT '服务列表，7天无理由退货，包邮',
  `type` int(11) DEFAULT NULL COMMENT '商家类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of merchants_table
-- ----------------------------

-- ----------------------------
-- Table structure for product_classify_table
-- ----------------------------
DROP TABLE IF EXISTS `product_classify_table`;
CREATE TABLE `product_classify_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL COMMENT '产品分类介绍',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_classify_table
-- ----------------------------

-- ----------------------------
-- Table structure for product_table
-- ----------------------------
DROP TABLE IF EXISTS `product_table`;
CREATE TABLE `product_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `pic_urls` text COMMENT '产品图片集',
  `pic_url` varchar(25) DEFAULT NULL COMMENT '产品图片(展示)',
  `merchants_address` varchar(25) DEFAULT NULL COMMENT '商家地址',
  `merchants_sales` varchar(25) DEFAULT NULL COMMENT '是否在热卖',
  `merchants_serve` varchar(25) DEFAULT NULL COMMENT '本产品的商家服务',
  `product_classify_id` text COMMENT '可选服务(list)',
  `quantity_available` bigint(20) DEFAULT NULL COMMENT '可购买数量（产品总数）',
  `quantity_purchased` bigint(20) DEFAULT NULL COMMENT '已购买数量(销售数)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_table
-- ----------------------------

-- ----------------------------
-- Table structure for serve_table
-- ----------------------------
DROP TABLE IF EXISTS `serve_table`;
CREATE TABLE `serve_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '服务名称 包邮,无理由退货',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of serve_table
-- ----------------------------

-- ----------------------------
-- Table structure for shopping_car
-- ----------------------------
DROP TABLE IF EXISTS `shopping_car`;
CREATE TABLE `shopping_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,0) DEFAULT NULL,
  `product_pic_url` varchar(255) DEFAULT NULL,
  `purchase_quantity` int(11) DEFAULT '1' COMMENT '已选择的购买数量',
  `description` varchar(255) DEFAULT NULL COMMENT '商品描述，如：选中的颜色分类',
  `time` datetime DEFAULT NULL COMMENT '加入购物车的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopping_car
-- ----------------------------

-- ----------------------------
-- Table structure for user_table
-- ----------------------------
DROP TABLE IF EXISTS `user_table`;
CREATE TABLE `user_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `userpass` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL COMMENT '1 普通用户 2商家 3 管理员 0x00管理员',
  `birthday` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `user_year` int(11) DEFAULT NULL,
  `user_sex` smallint(6) DEFAULT NULL COMMENT 'man 0 ,girl 1',
  `user_mail` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL COMMENT '职业',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_table
-- ----------------------------
INSERT INTO `user_table` VALUES ('1', 'sgg', '123', '1', '2019-03-30', '13435500345', '1', '2', 'jiji6143@163.com', 'student');