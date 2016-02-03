DROP PROCEDURE IF EXISTS `sp_user_reg`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_reg`(IN _user_name VARCHAR(45),IN _user_pass VARCHAR(45),IN _user_role TINYINT)
BEGIN
	#用户注册
	#user_role 1学生，2老师

	DECLARE _user_validate bit DEFAULT FALSE;
	
	#如果是学生角色，设置是否认证为true
	IF _user_role = 1 THEN
		SET _user_validate = TRUE;
	END IF;

	INSERT INTO jt_user(user_name,user_pass,user_role) VALUES(_user_name,_user_pass,_user_role);
	SELECT LAST_INSERT_ID();
END
;;
DELIMITER ;