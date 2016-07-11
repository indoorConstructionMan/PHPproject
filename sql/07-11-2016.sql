ALTER TABLE `chats_messages` DROP `content`;
ALTER TABLE `chats_messages` ADD `content` MEDIUMTEXT NOT NULL AFTER `id`;