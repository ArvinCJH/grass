-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-04-14 11:18:34
-- 服务器版本： 10.1.36-MariaDB
-- PHP 版本： 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `address_manager_table`
--

CREATE TABLE `address_manager_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_detail` varchar(25) DEFAULT NULL COMMENT '详细地址',
  `address_default` int(11) DEFAULT NULL COMMENT '0 未选中 1选中',
  `receive_phone` varchar(12) DEFAULT NULL COMMENT '联系电话',
  `consignee` varchar(25) DEFAULT NULL COMMENT '收货人',
  `postal_code` varchar(25) DEFAULT NULL COMMENT '邮政编码',
  `province` varchar(25) DEFAULT NULL COMMENT '省',
  `city` varchar(25) DEFAULT NULL COMMENT '市',
  `region` varchar(25) DEFAULT NULL COMMENT '地区',
  `address_stress` varchar(25) DEFAULT NULL COMMENT '街道'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `address_manager_table`
--

INSERT INTO `address_manager_table` (`id`, `user_id`, `address_detail`, `address_default`, `receive_phone`, `consignee`, `postal_code`, `province`, `city`, `region`, `address_stress`) VALUES
(18, 1, '河源职业技术学院B区宿舍楼下', 0, '13825383075', '我', '529826', NULL, NULL, '河源职业技术学院', 'B区宿舍楼下'),
(19, 1, '河源市河源职业技术学院河源市河源职业技术学院', 1, '18344209482', '彩玲', '518000', NULL, NULL, '河源市河源职业技术学院', '河源市河源职业技术学院'),
(20, 2, '河源市河职院', 0, '18344209482', '小A', '518000', NULL, NULL, '河源市', '河职院'),
(21, 2, '广州市白云区', 0, '13825383075', '小C', '500000', NULL, NULL, '广州市', '白云区');

-- --------------------------------------------------------

--
-- 表的结构 `merchants_certification`
--

CREATE TABLE `merchants_certification` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `merchants_start`
--

CREATE TABLE `merchants_start` (
  `id` int(11) NOT NULL,
  `merchants_id` int(11) DEFAULT NULL,
  `server` int(11) DEFAULT '5' COMMENT '服务星级',
  `describe` int(11) DEFAULT '5' COMMENT '描述星级',
  `quality` int(11) DEFAULT '5' COMMENT '质量星级',
  `average_star` int(11) DEFAULT '5' COMMENT '平均星级'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `merchants_table`
--

CREATE TABLE `merchants_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '商家地址',
  `sales` bigint(20) DEFAULT '0' COMMENT '出售数量',
  `serve_list` varchar(255) DEFAULT NULL COMMENT '服务列表，7天无理由退货，包邮',
  `type` int(11) DEFAULT NULL COMMENT '商家类型',
  `start_id` int(11) DEFAULT NULL COMMENT '星级 ID',
  `certification_id` int(11) NOT NULL DEFAULT '-1' COMMENT '商家认证'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `product_classify_table`
--

CREATE TABLE `product_classify_table` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL COMMENT '产品分类介绍'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `product_table`
--

CREATE TABLE `product_table` (
  `id` int(11) NOT NULL,
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
  `monthly_sale` int(11) DEFAULT NULL COMMENT '月销量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `product_table`
--

INSERT INTO `product_table` (`id`, `name`, `price`, `pic_urls`, `pic_url`, `merchants_address`, `merchants_sales`, `merchants_serve`, `product_classify_ids`, `quantity_available`, `quantity_purchased`, `evaluate_num`, `evaluate_ids`, `collection_num`, `collection_ids`, `monthly_sale`) VALUES
(1, '一次性纸杯 奶茶咖啡打包杯外带杯100只特厚', 23, NULL, '/product_pic/ycxnczb100.webp', NULL, '30', NULL, NULL, NULL, NULL, 10, NULL, 4544, NULL, 1000),
(2, '加厚加大可机洗牛津布野餐垫防潮垫送妈咪包', 118, NULL, '/product_pic/jhjdkjxnjbycd.webp', NULL, '130', NULL, NULL, NULL, NULL, 10, NULL, 1550, NULL, 400),
(3, '2019春夏新款中长款防紫外线防晒衣女', 179, NULL, '/product_pic/cxxkzckfzwxfsy.webp', NULL, '220', NULL, NULL, NULL, NULL, 8, NULL, 406, NULL, 840),
(4, '大号紫砂茶叶罐普洱茶缸私藏密封茶缸茶叶桶', 218, NULL, '/product_pic/dhzscygpecgscmfcg.webp', NULL, '320', NULL, NULL, NULL, NULL, 153, NULL, 724, NULL, 1520),
(5, '牛皮纸敞口盒船盒鸡米花盒薯条盒炸鸡烤翅盒', 110, NULL, '/product_pic/npzckcchjmhhsth.webp', NULL, '125', NULL, NULL, NULL, NULL, 28, NULL, 302, NULL, 280),
(6, '酿酒机设备小型家用白酒纯露全自动烧酒家庭', 688, NULL, '/product_pic/njjsbxxjybjclqzdz.webp', NULL, '1200', NULL, NULL, NULL, NULL, 10, NULL, 19542, NULL, 468),
(7, '手工擦色夏季男士正装黄棕色皮鞋男 真牛皮商务方头', 25.9, '[\"/product_pic/190313u440x587.v1cAC.40.webp\",\"/product_pic/190313u440x587.v1cAC.40.webp\",\"/product_pic/190313u440x587.v1cAC.40.webp\"]', '/product_pic/190313u440x587.v1cAC.40.webp', NULL, '528', NULL, NULL, NULL, NULL, 201, NULL, 1024, NULL, 2024),
(8, '亮片不规则网纱裙半身裙女星空A字裙', 42, NULL, '/product_pic/TB23W5GbP7n.webp', NULL, '120', NULL, NULL, NULL, NULL, 7, NULL, 520, NULL, 375),
(9, '2019新款短袖V领收腰系带A字裙格子连衣裙女', 116, NULL, '/product_pic/O1CN01ZaAXPs1zLjL.webp', NULL, '528', NULL, NULL, NULL, NULL, 0, NULL, 16, NULL, 1),
(10, '春装女装半身裙黑色高腰中长网纱打底蓬蓬裙', 69.9, NULL, '/product_pic/O1CN01XFTVHx1OM3rZNlRzK.webp', NULL, '150', NULL, NULL, NULL, NULL, 2, NULL, 40, NULL, 20),
(11, '丝光棉圆领纯棉半袖T恤修身上衣春夏季韩版打底', 69, NULL, '/product_pic/TB15CHfhWmWBuNjy1XaY.webp', NULL, '210', NULL, NULL, NULL, NULL, 20, NULL, 1230, NULL, 123),
(12, '春夏2019韩版新款修身显瘦弹力高腰九分裤纯色', 35.8, NULL, '/product_pic/TB2rDWxXGSWBuNjSsrbXXa0mVX.webp', NULL, '120', NULL, NULL, NULL, NULL, 5, NULL, 50, NULL, 2);

-- --------------------------------------------------------

--
-- 表的结构 `serve_table`
--

CREATE TABLE `serve_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '服务名称 包邮,无理由退货'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shopping_car`
--

CREATE TABLE `shopping_car` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,0) DEFAULT NULL,
  `product_pic_url` varchar(255) DEFAULT NULL,
  `purchase_quantity` int(11) DEFAULT '1' COMMENT '已选择的购买数量',
  `description` varchar(255) DEFAULT NULL COMMENT '商品描述，如：选中的颜色分类',
  `time` datetime DEFAULT NULL COMMENT '加入购物车的时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_address_manager`
--

CREATE TABLE `user_address_manager` (
  `user_id` int(5) NOT NULL COMMENT '用户ID',
  `user_region` varchar(30) NOT NULL COMMENT '用户地区',
  `postal_code` varchar(10) NOT NULL COMMENT '邮政编码',
  `address_stress` varchar(25) NOT NULL COMMENT '街道地址',
  `consignee` varchar(8) NOT NULL COMMENT '收货人',
  `receive_phone` varchar(12) NOT NULL COMMENT '收货手机',
  `address_id` int(5) NOT NULL COMMENT '地址ID',
  `address_default` enum('1','2') NOT NULL DEFAULT '2' COMMENT '默认地址',
  `address_detail` varchar(50) NOT NULL COMMENT '详细地址'
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `user_address_manager`
--

INSERT INTO `user_address_manager` (`user_id`, `user_region`, `postal_code`, `address_stress`, `consignee`, `receive_phone`, `address_id`, `address_default`, `address_detail`) VALUES
(1, 'sdfsd', '514544', 'sdfsd1', '555555', '13435500345', 1, '2', 'sdfsdsdfsd1'),
(1, 'sdfsd', '514544', 'sdfsd2', '666666', '13435500345', 2, '1', 'sdfsdsdfsd2');

-- --------------------------------------------------------

--
-- 表的结构 `user_certification`
--

CREATE TABLE `user_certification` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `user_insert_test`
--

CREATE TABLE `user_insert_test` (
  `username` varchar(20) NOT NULL,
  `userpass` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

--
-- 转存表中的数据 `user_insert_test`
--

INSERT INTO `user_insert_test` (`username`, `userpass`, `user_email`) VALUES
('John', 'Doe', 'john@example.com'),
('username', 'password', 'envelope'),
('', '', ''),
('jiji6143@163.com', '123', 'jiji6143@163.com');

-- --------------------------------------------------------

--
-- 表的结构 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `userpass` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL COMMENT '1 普通用户 2商家 3 管理员 0x00管理员',
  `birthday` date DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `user_year` int(11) DEFAULT NULL,
  `user_sex` smallint(6) DEFAULT NULL COMMENT 'man 0 ,girl 1',
  `user_mail` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL COMMENT '职业',
  `certification_id` int(11) NOT NULL DEFAULT '-1' COMMENT '实名认证'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_table`
--

INSERT INTO `user_table` (`id`, `username`, `userpass`, `user_type`, `birthday`, `mobile`, `user_year`, `user_sex`, `user_mail`, `occupation`, `certification_id`) VALUES
(1, 'sgg', '123', '1', '2019-03-30', '13435500345', 1, 2, 'jiji6143@163.com', '学生', -1),
(2, 'cl', '123', NULL, '2017-11-01', '18344209482', NULL, 1, '1072705889@qq.com', '学生', -1);

--
-- 转储表的索引
--

--
-- 表的索引 `address_manager_table`
--
ALTER TABLE `address_manager_table`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `merchants_certification`
--
ALTER TABLE `merchants_certification`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `merchants_start`
--
ALTER TABLE `merchants_start`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `merchants_table`
--
ALTER TABLE `merchants_table`
  ADD PRIMARY KEY (`id`,`certification_id`);

--
-- 表的索引 `product_classify_table`
--
ALTER TABLE `product_classify_table`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `product_table`
--
ALTER TABLE `product_table`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `serve_table`
--
ALTER TABLE `serve_table`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `shopping_car`
--
ALTER TABLE `shopping_car`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_address_manager`
--
ALTER TABLE `user_address_manager`
  ADD PRIMARY KEY (`address_id`,`user_id`);

--
-- 表的索引 `user_certification`
--
ALTER TABLE `user_certification`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`,`certification_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `address_manager_table`
--
ALTER TABLE `address_manager_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `merchants_table`
--
ALTER TABLE `merchants_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `product_classify_table`
--
ALTER TABLE `product_classify_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `product_table`
--
ALTER TABLE `product_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `serve_table`
--
ALTER TABLE `serve_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `shopping_car`
--
ALTER TABLE `shopping_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user_address_manager`
--
ALTER TABLE `user_address_manager`
  MODIFY `address_id` int(5) NOT NULL AUTO_INCREMENT COMMENT '地址ID', AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
