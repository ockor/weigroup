/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : oelove

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-10-25 09:45:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_attention`
-- ----------------------------
DROP TABLE IF EXISTS `t_attention`;
CREATE TABLE `t_attention` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `fid` int(11) NOT NULL COMMENT '好友uid,用,分割,可以有多个',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_attention
-- ----------------------------
INSERT INTO `t_attention` VALUES ('51', '15', '1', '2014-10-24');
INSERT INTO `t_attention` VALUES ('52', '2', '1', '2014-10-25');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(32) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `birthday` date NOT NULL,
  `groupName` varchar(64) NOT NULL COMMENT '群名',
  `nickname` varchar(64) NOT NULL COMMENT '昵称',
  `address` varchar(512) NOT NULL,
  `company` varchar(256) NOT NULL,
  `industry` varchar(128) DEFAULT NULL COMMENT '行业',
  `school` varchar(64) DEFAULT NULL,
  `profession` varchar(64) DEFAULT NULL COMMENT '专业',
  `hobby` varchar(256) DEFAULT NULL,
  `ideal` varchar(128) DEFAULT NULL COMMENT '理想',
  `introduce` varchar(1000) DEFAULT NULL COMMENT '个人介绍',
  PRIMARY KEY (`id`,`userName`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '女', '2014-09-09', 'php交流群', '小情绪大快乐', '广西南宁', '传智播客有限公司', 'IT培训机构', '南宁职业技术学院', '软件技术', '旅游，逛街，吃喝玩乐', '拥有很多很多钱', '在完成上面的工作后,可以看到默认的删除界面的按钮样式,如果不经过改变,是如下的样子的');
INSERT INTO `t_user` VALUES ('2', 'qinjintian', 'e10adc3949ba59abbe56e057f20f883e', '男', '1992-04-26', 'IT技术交流1群', '海阔天空', '广西南宁市西乡塘区169号', '联想科技有限公司', 'IT', '南宁职业技术学院', '软件技术', '购物,旅游，看电影', '周游列国', '目前,在移Web开发领域中,除了使用如Android,iOS系统原生提供的API进行开发外,对于Web开发人员来说,最方便快捷的方法莫过于使用比如');
INSERT INTO `t_user` VALUES ('5', 'def', '950a4152c2b4aa3ad78bdd6b366cc179', '女', '2014-10-09', '321', '312', '312', '312', '312', '', '', '', '312', '312');
INSERT INTO `t_user` VALUES ('6', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '男', '2010-02-21', 'q', 'q', 'q', 'q', 'q', '', '', '', '', '');
INSERT INTO `t_user` VALUES ('8', 'yuanxingtao', 'e10adc3949ba59abbe56e057f20f883e', '男', '2015-01-22', '同城交流群', '追风少年', '南宁', '达内', 'IT', '', '', '', '爱你一万年', '我叫xxx，我喜欢爬山涉水。');
INSERT INTO `t_user` VALUES ('9', 'weizhang', 'e10adc3949ba59abbe56e057f20f883e', '女', '2014-10-09', '北京', '爱你一万年', '123', '1231', '321', '', '', '', '312', '321');
INSERT INTO `t_user` VALUES ('10', 'liujujian', 'e10adc3949ba59abbe56e057f20f883e', '女', '2014-10-09', '123', '312', '312', '312', '312', '', '', '', '312', '312');
INSERT INTO `t_user` VALUES ('11', 'chenzhi', '827ccb0eea8a706c4c34a16891f84e7b', '女', '2014-10-11', '34124', '4234', '423', '423', '423', '', '', '', '423', '423');
INSERT INTO `t_user` VALUES ('12', '434234', 'eae8dac2935380308f4c03918b9dc21b', '男', '2014-10-02', '423', '423', '423', '423', '423', '', '', '', '423', '423');
INSERT INTO `t_user` VALUES ('13', 'chenming', 'e10adc3949ba59abbe56e057f20f883e', '男', '2014-10-17', '414', '423', '423', '423', '423', '423423', '423423', '', '4234', '4324');
INSERT INTO `t_user` VALUES ('14', 'mojianwen', 'e10adc3949ba59abbe56e057f20f883e', '男', '2014-10-07', '3412312', '34123412', '413432', '423', '423423', '423423', '42342', '4234', '4324', '42342');
INSERT INTO `t_user` VALUES ('15', 'ludong', 'e10adc3949ba59abbe56e057f20f883e', '男', '2015-02-26', '陌生交流群', '蓦然回首', '南宁', '南职', 'IT', '信息工程学院', '软件技术', '交友', '发财，去旅游', '我叫陆东，来自xxx');
