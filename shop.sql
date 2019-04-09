/*
Navicat MySQL Data Transfer

Source Server         : grass
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-09 18:51:55
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address_manager_table
-- ----------------------------
INSERT INTO `address_manager_table` VALUES ('1', '1', '0', '1', 'ddd', 'ddd', 'ddd', null, null, 'dd', 'ddd');
INSERT INTO `address_manager_table` VALUES ('2', '1', '0', '1', 'ddd', 'ddd', 'ddd', null, null, 'dd', 'ddd');
INSERT INTO `address_manager_table` VALUES ('3', '1', '0', '1', 'ddd', 'ddd', 'ddd', null, null, 'dd', 'ddd');
INSERT INTO `address_manager_table` VALUES ('4', '1', '0', '1', 'ddd', 'ddd', 'ddd', null, null, 'dd', 'ddd');
INSERT INTO `address_manager_table` VALUES ('5', '1', '0', '1', 'ddd', 'ddd', 'ddd', null, null, 'dd', 'ddd');

-- ----------------------------
-- Table structure for merchants_certification
-- ----------------------------
DROP TABLE IF EXISTS `merchants_certification`;
CREATE TABLE `merchants_certification` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of merchants_certification
-- ----------------------------

-- ----------------------------
-- Table structure for merchants_start
-- ----------------------------
DROP TABLE IF EXISTS `merchants_start`;
CREATE TABLE `merchants_start` (
  `id` int(11) NOT NULL,
  `merchants_id` int(11) DEFAULT NULL,
  `server` int(11) DEFAULT '5' COMMENT '服务星级',
  `describe` int(11) DEFAULT '5' COMMENT '描述星级',
  `quality` int(11) DEFAULT '5' COMMENT '质量星级',
  `average_star` int(11) DEFAULT '5' COMMENT '平均星级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of merchants_start
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
  `start_id` int(11) DEFAULT NULL COMMENT '星级 ID',
  `certification_id` int(11) NOT NULL DEFAULT '-1' COMMENT '商家认证',
  PRIMARY KEY (`id`,`certification_id`)
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
  `pic_url` varchar(255) DEFAULT NULL COMMENT '产品图片(展示)',
  `merchants_address` varchar(25) DEFAULT NULL COMMENT '商家地址',
  `merchants_sales` varchar(25) DEFAULT NULL COMMENT '是否在热卖',
  `merchants_serve` varchar(25) DEFAULT NULL COMMENT '本产品的商家服务',
  `product_classify_ids` text COMMENT '可选服务(list)',
  `quantity_available` bigint(20) DEFAULT NULL COMMENT '可购买数量（产品总数）',
  `quantity_purchased` bigint(20) DEFAULT NULL COMMENT '已购买数量(销售数)',
  `evaluate_num` int(11) DEFAULT NULL COMMENT '评论数',
  `evaluate_ids` text COMMENT '评论id',
  `collection_num` int(11) DEFAULT NULL COMMENT '收藏数',
  `collection_ids` text COMMENT '收藏id',
  `monthly_sale` int(11) DEFAULT NULL COMMENT '月销量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_table
-- ----------------------------
INSERT INTO `product_table` VALUES ('1', '一次性纸杯 奶茶咖啡打包杯外带杯100只特厚', '23', null, 'product_pic/ycxnczb100.webp', null, null, null, null, null, null, '10', null, '4544', null, '1000');
INSERT INTO `product_table` VALUES ('2', '加厚加大可机洗牛津布野餐垫防潮垫送妈咪包', '118', null, 'product_pic/jhjdkjxnjbycd.webp', null, null, null, null, null, null, '10', null, '1550', null, '400');
INSERT INTO `product_table` VALUES ('3', '2019春夏新款中长款防紫外线防晒衣女', '179', null, 'product_pic/cxxkzckfzwxfsy.webp', null, null, null, null, null, null, '8', null, '406', null, '840');
INSERT INTO `product_table` VALUES ('4', '大号紫砂茶叶罐普洱茶缸私藏密封茶缸茶叶桶', '218', null, 'product_pic/dhzscygpecgscmfcg.webp', null, null, null, null, null, null, '153', null, '724', null, '1520');
INSERT INTO `product_table` VALUES ('5', '牛皮纸敞口盒船盒鸡米花盒薯条盒炸鸡烤翅盒', '110', null, 'product_pic/npzckcchjmhhsth.webp', null, null, null, null, null, null, '28', null, '302', null, '280');
INSERT INTO `product_table` VALUES ('6', '酿酒机设备小型家用白酒纯露全自动烧酒家庭', '688', null, 'product_pic/njjsbxxjybjclqzdz.webp', null, null, null, null, null, null, '10', null, '19542', null, '468');

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
-- Table structure for user_certification
-- ----------------------------
DROP TABLE IF EXISTS `user_certification`;
CREATE TABLE `user_certification` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user_certification
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
  `certification_id` int(11) NOT NULL DEFAULT '-1' COMMENT '实名认证',
  PRIMARY KEY (`id`,`certification_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_table
-- ----------------------------
INSERT INTO `user_table` VALUES ('1', 'sgg', '123', '1', '2019-03-30', '13435500345', '1', '2', 'jiji6143@163.com', 'student', '-1');
