USE `jt_exam`;

DROP TABLE IF EXISTS `jt_user`;

CREATE TABLE `jt_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(25) DEFAULT NULL COMMENT '用户名',
  `user_pass` varchar(45) DEFAULT NULL COMMENT '登陆密码',
  `user_role` tinyint(4) DEFAULT NULL COMMENT '角色：1学生，2老师',
  `user_validate` bit(1) DEFAULT b'0' COMMENT '认证',
  `user_reg_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
