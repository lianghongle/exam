USE `jt_exam`;

DROP TABLE IF EXISTS `jt_user`;

CREATE TABLE `jt_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(25) NOT NULL COMMENT '用户名',
  `user_pass` varchar(45) NOT NULL COMMENT '登陆密码',
  `user_role` tinyint(4) DEFAULT NULL COMMENT '角色：1学生，2老师',
  `user_validate` bit(1) DEFAULT b'0' COMMENT '认证',
  `user_mobile` varchar(11) DEFAULT NULL COMMENT '手机号码',
  `user_email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间(注册时间)',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '最后一次修改时间',
  `last_lock_time` timestamp NULL DEFAULT NULL COMMENT '账号被锁定时间',
  `wrong_pwd_lock_times` smallint(2) DEFAULT NULL COMMENT '登陆失败次数',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `index_user_name` (`user_name`),
  UNIQUE KEY `index_user_mobile` (`user_mobile`),
  UNIQUE KEY `index_user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8

