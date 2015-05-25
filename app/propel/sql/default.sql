
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- message
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(32) NOT NULL,
    `subject` VARCHAR(64) NOT NULL,
    `email` VARCHAR(32),
    `phone` VARCHAR(32),
    `header_mail` TEXT,
    `body` TEXT,
    `ip_address` VARCHAR(16),
    `status` VARCHAR(16),
    `priority` VARCHAR(16),
    `source` VARCHAR(16),
    `overdue_date` DATETIME,
    `last_response_date` DATETIME,
    `creation_date` DATETIME,
    `modification_date` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `status_idx` (`status`),
    INDEX `priority_idx` (`priority`),
    INDEX `subject_idx` (`subject`),
    INDEX `email_idx` (`email`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
