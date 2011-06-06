SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `group` (
  `group_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

INSERT INTO `group` (`group_id`, `name`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'default'),
(4, 'editor');

CREATE TABLE IF NOT EXISTS `group_permission` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `group_id` int(6) NOT NULL,
  `permission_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

INSERT INTO `group_permission` (`id`, `group_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 2, 7),
(12, 2, 8),
(13, 2, 9),
(14, 2, 10),
(15, 2, 5);

CREATE TABLE IF NOT EXISTS `permission` (
  `permission_id` int(6) NOT NULL AUTO_INCREMENT,
  `permission` text NOT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `permission` (`permission_id`, `permission`) VALUES
(1, 'add user'),
(2, 'remove user'),
(3, 'edit user'),
(4, 'add news post'),
(5, 'edit news post'),
(6, 'delete news post'),
(7, 'ban user'),
(8, 'unban user'),
(9, 'sticky post'),
(10, 'unsticky post');

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `user` (`user_id`, `name`) VALUES
(1, 'Alan'),
(2, 'Mark');

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2);

CREATE TABLE IF NOT EXISTS `user_permission` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `permission_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `user_permission` (`id`, `user_id`, `permission_id`) VALUES
(1, 2, 4),
(2, 2, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
