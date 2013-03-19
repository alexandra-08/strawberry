
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100),
    `gender` VARCHAR(10),
    `city` VARCHAR(50),
    `active` TINYINT(1),
    `team_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `user_FI_1` (`team_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- team
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(100),
    `city` VARCHAR(100),
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
