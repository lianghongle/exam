DROP PROCEDURE IF EXISTS `sp_user_login`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_login`(IN _user_name VARCHAR(45))
BEGIN
	#Routine body goes here...
	SELECT * FROM jt_user u WHERE u.user_name = _user_name;
END
;;
DELIMITER ;