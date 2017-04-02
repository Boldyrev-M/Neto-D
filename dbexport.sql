-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `category`, `updated_at`) VALUES
(1,	'Категория один',	'2017-04-01 17:10:26'),
(3,	'КатТри',	NULL),
(4,	'Разное',	NULL);

DROP TABLE IF EXISTS `dirtywords`;
CREATE TABLE `dirtywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2017_03_15_100323_create_categories_table',	1),
(4,	'2017_03_15_101334_create_status_table',	1),
(5,	'2017_03_15_102323_create_questions_table',	1),
(6,	'2017_03_15_104301_create_dirtyWords_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `text` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `resolved` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_category_id_foreign` (`category_id`),
  KEY `questions_user_id_foreign` (`user_id`),
  CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`id`, `category_id`, `text`, `name`, `created`, `email`, `answer`, `user_id`, `resolved`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3,	1,	'Первый вопрос категории 1',	'User1',	'2017-03-30 10:05:07',	'e-mail@mail.com',	'Таков ответ на первый вопрос',	1,	'2017-04-01 15:00:00',	3,	NULL,	NULL,	NULL),
(4,	1,	'доколе?',	'admin',	'2017-03-30 10:05:36',	'admin@admin.admin',	'',	NULL,	NULL,	1,	NULL,	NULL,	NULL),
(5,	1,	'Как узнать id залогиненного юзера',	'admin',	'2017-03-30 11:00:58',	'e-mail@mail.com',	'',	NULL,	NULL,	1,	NULL,	NULL,	NULL),
(6,	3,	'Вопрос по третьей части\r\nто есть кател=гории',	'Вася',	'2017-04-01 12:30:06',	'vasya@vasya.com',	'',	NULL,	NULL,	1,	NULL,	NULL,	NULL),
(7,	1,	'Второй вопрос администраторам',	'Юзер',	'2017-04-01 08:18:15',	'mail@mail.mail',	'',	NULL,	NULL,	1,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `status` (`id`, `status`) VALUES
(1,	'awaiting'),
(2,	'hidden'),
(3,	'published');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'maxikb@mail.ru',	'$2y$10$qoOTM52r8ETTJi9l/GEJMei6iAEQn5oj1ZpQ2u3PJBRmj8gK5i59W',	'pXH16AV943v6ltd83iYBYLwi2Hes7odHFGYiHnwgMbBau6FXapH4uLHq6gGR',	NULL,	NULL);

-- 2017-04-02 13:21:27
