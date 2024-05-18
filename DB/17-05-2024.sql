-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 17 2024 г., 12:04
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mycrm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_kassas`
--

CREATE TABLE `admin_kassas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `naqt` int(11) DEFAULT NULL,
  `plastik` int(11) DEFAULT NULL,
  `chegirma` int(11) DEFAULT NULL,
  `qaytarildi` int(11) DEFAULT NULL,
  `tashriflar` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin_kassas`
--

INSERT INTO `admin_kassas` (`id`, `filial_id`, `user_id`, `naqt`, `plastik`, `chegirma`, `qaytarildi`, `tashriflar`, `created_at`, `updated_at`) VALUES
(8, 22, 1, NULL, NULL, NULL, NULL, NULL, '2024-05-05 10:07:54', '2024-05-14 10:07:54');

-- --------------------------------------------------------

--
-- Структура таблицы `all_s_m_s`
--

CREATE TABLE `all_s_m_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `all_s_m_s`
--

INSERT INTO `all_s_m_s` (`id`, `admin`, `status`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Elshod Musurmonov', 'Yuborilmoqda', 'Salom', '2024-05-17 11:29:23', '2024-05-17 11:29:23'),
(2, 'Elshod Musurmonov', 'Yuborilmoqda', 'Assalomu alaykum', '2024-05-17 11:30:14', '2024-05-17 11:30:14'),
(3, 'Elshod Musurmonov', 'Yuborilmoqda', 'Barchasiga SMS habar jo\'natilmoqda', '2024-05-17 11:36:04', '2024-05-17 11:36:04'),
(4, 'Elshod Musurmonov', '2 ta sms yuborildi', 'Salomalaykum', '2024-05-17 11:48:30', '2024-05-17 11:49:02'),
(5, 'Elshod Musurmonov', '2 ta sms yuborildi', 'slaasdfsd erg df gdfg \\sdas fsdf sdf', '2024-05-17 11:52:22', '2024-05-17 11:52:26'),
(6, 'Elshod Musurmonov', '2 ta sms yuborildi', '65846546', '2024-05-17 11:54:32', '2024-05-17 11:54:35');

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `chegirma_days`
--

CREATE TABLE `chegirma_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `days` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `chegirma_days`
--

INSERT INTO `chegirma_days` (`id`, `filial_id`, `days`, `created_at`, `updated_at`) VALUES
(9, 22, 0, '2024-05-17 08:42:45', '2024-05-17 08:42:45');

-- --------------------------------------------------------

--
-- Структура таблицы `cours`
--

CREATE TABLE `cours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `cours_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `davomats`
--

CREATE TABLE `davomats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `guruh_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `techer_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `eslatmas`
--

CREATE TABLE `eslatmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_guruh_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(4, 'eae987ff-9c25-4d60-b5a3-f9f5c861b5cf', 'database', 'default', '{\"uuid\":\"eae987ff-9c25-4d60-b5a3-f9f5c861b5cf\",\"displayName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\TkunSendMessege\\\":2:{s:6:\\\"status\\\";s:10:\\\"kutilmoqda\\\";s:11:\\\"TKunMessege\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\TKunMessege\\\";s:2:\\\"id\\\";i:20;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'PDOException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:571\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(571): PDOStatement->execute()\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(800): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `se...\', Array)\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(60): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 (Connection: mysql, SQL: insert into `send_messeges` (`phone`, `text`, `status`, `updated_at`, `created_at`) values (+998908830450, Hurmatli DILSHOD XOLMURODOV! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi., Yuborildi, 2024-05-17 13:45:11, 2024-05-17 13:45:11)) in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:813\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(60): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#50 {main}', '2024-05-17 08:45:11'),
(5, 'a9796808-2ee7-4b93-a2fd-23b39cfeec32', 'database', 'default', '{\"uuid\":\"a9796808-2ee7-4b93-a2fd-23b39cfeec32\",\"displayName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\TkunSendMessege\\\":2:{s:6:\\\"status\\\";s:10:\\\"kutilmoqda\\\";s:11:\\\"TKunMessege\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\TKunMessege\\\";s:2:\\\"id\\\";i:21;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'PDOException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:571\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(571): PDOStatement->execute()\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(800): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `se...\', Array)\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(64): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 (Connection: mysql, SQL: insert into `send_messeges` (`phone`, `text`, `status`, `updated_at`, `created_at`) values (+998908830450, Hurmatli DILSHOD XOLMURODOV! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi., Yuborildi, 2024-05-17 13:50:28, 2024-05-17 13:50:28)) in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:813\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(64): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#50 {main}', '2024-05-17 08:50:28');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(6, '2bc8971a-c817-4ca2-ad47-70844296cf1a', 'database', 'default', '{\"uuid\":\"2bc8971a-c817-4ca2-ad47-70844296cf1a\",\"displayName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\TkunSendMessege\\\":2:{s:6:\\\"status\\\";s:10:\\\"kutilmoqda\\\";s:11:\\\"TKunMessege\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\TKunMessege\\\";s:2:\\\"id\\\";i:22;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'PDOException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:571\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(571): PDOStatement->execute()\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(800): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `se...\', Array)\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(65): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 (Connection: mysql, SQL: insert into `send_messeges` (`phone`, `text`, `status`, `updated_at`, `created_at`) values (+998908830450, Hurmatli DILSHOD XOLMURODOV! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi., Yuborildi, 2024-05-17 13:53:09, 2024-05-17 13:53:09)) in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:813\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(65): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#50 {main}', '2024-05-17 08:53:09'),
(7, '8ccf3059-e977-4420-ab2c-312267ed720c', 'database', 'default', '{\"uuid\":\"8ccf3059-e977-4420-ab2c-312267ed720c\",\"displayName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\TkunSendMessege\",\"command\":\"O:24:\\\"App\\\\Jobs\\\\TkunSendMessege\\\":2:{s:6:\\\"status\\\";s:10:\\\"kutilmoqda\\\";s:11:\\\"TKunMessege\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:22:\\\"App\\\\Models\\\\TKunMessege\\\";s:2:\\\"id\\\";i:23;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}}\"}}', 'PDOException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:571\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(571): PDOStatement->execute()\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(800): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `se...\', Array)\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(65): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#50 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#52 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column \'text\' at row 1 (Connection: mysql, SQL: insert into `send_messeges` (`phone`, `text`, `status`, `updated_at`, `created_at`) values (+998908830450, Hurmatli DILSHOD XOLMURODOV! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi., Yuborildi, 2024-05-17 13:54:37, 2024-05-17 13:54:37)) in C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:813\nStack trace:\n#0 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(767): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `se...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(560): Illuminate\\Database\\Connection->run(\'insert into `se...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(524): Illuminate\\Database\\Connection->statement(\'insert into `se...\', Array)\n#3 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `se...\', Array)\n#4 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3561): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `se...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1971): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1338): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1303): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1142): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): Illuminate\\Database\\Eloquent\\Model->save()\n#10 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(359): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\SendMessege))\n#11 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): tap(Object(App\\Models\\SendMessege), Object(Closure))\n#12 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#13 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2339): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#14 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2351): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#15 C:\\xampp\\htdocs\\ATKO_MyCrm\\app\\Jobs\\TkunSendMessege.php(65): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#16 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\TkunSendMessege->handle()\n#17 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#18 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#19 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#20 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#21 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#22 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#23 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#24 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#25 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\TkunSendMessege), false)\n#26 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#27 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\TkunSendMessege))\n#28 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#29 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\TkunSendMessege))\n#30 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#31 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#32 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(139): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#35 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(122): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#36 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#37 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#38 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#39 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#40 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#41 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(212): Illuminate\\Container\\Container->call(Array)\n#42 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Command\\Command.php(279): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#44 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(1049): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(318): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\symfony\\console\\Application.php(169): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(196): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 C:\\xampp\\htdocs\\ATKO_MyCrm\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php(1183): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#49 C:\\xampp\\htdocs\\ATKO_MyCrm\\artisan(13): Illuminate\\Foundation\\Application->handleCommand(Object(Symfony\\Component\\Console\\Input\\ArgvInput))\n#50 {main}', '2024-05-17 08:54:37');

-- --------------------------------------------------------

--
-- Структура таблицы `filials`
--

CREATE TABLE `filials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_name` varchar(255) NOT NULL,
  `filial_addres` varchar(255) NOT NULL,
  `naqt` int(11) DEFAULT NULL,
  `xarajat_naqt` int(11) DEFAULT NULL,
  `plastik` int(11) DEFAULT NULL,
  `xarajat_plastik` int(11) DEFAULT NULL,
  `payme` int(11) DEFAULT NULL,
  `xarajat_payme` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `filials`
--

INSERT INTO `filials` (`id`, `filial_name`, `filial_addres`, `naqt`, `xarajat_naqt`, `plastik`, `xarajat_plastik`, `payme`, `xarajat_payme`, `created_at`, `updated_at`) VALUES
(22, 'ATKO', 'sds', 0, 0, 0, 0, 0, 0, '2024-05-17 08:42:45', '2024-05-17 08:42:45');

-- --------------------------------------------------------

--
-- Структура таблицы `filial_kassas`
--

CREATE TABLE `filial_kassas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `tulov_naqt` int(11) DEFAULT NULL,
  `tulov_naqt_chiqim` int(11) DEFAULT NULL,
  `tulov_naqt_chiqim_tasdiqlandi` int(11) DEFAULT NULL,
  `tulov_plastik` int(11) DEFAULT NULL,
  `tulov_plastik_chiqim` int(11) DEFAULT NULL,
  `tulov_plastik_chiqim_tasdiqlandi` int(11) DEFAULT NULL,
  `tulov_chegirma` int(11) DEFAULT NULL,
  `tulov_naqt_xarajat` int(11) DEFAULT NULL,
  `tulov_naqt_xarajat_tasdiqlandi` int(11) DEFAULT NULL,
  `tulov_plastik_xarajat` int(11) DEFAULT NULL,
  `tulov_plastik_xarajat_tasdiqlandi` int(11) DEFAULT NULL,
  `tulov_naqt_ish_haqi` int(11) DEFAULT NULL,
  `tulov_plastik_ish_haqi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `filial_kassas`
--

INSERT INTO `filial_kassas` (`id`, `filial_id`, `tulov_naqt`, `tulov_naqt_chiqim`, `tulov_naqt_chiqim_tasdiqlandi`, `tulov_plastik`, `tulov_plastik_chiqim`, `tulov_plastik_chiqim_tasdiqlandi`, `tulov_chegirma`, `tulov_naqt_xarajat`, `tulov_naqt_xarajat_tasdiqlandi`, `tulov_plastik_xarajat`, `tulov_plastik_xarajat_tasdiqlandi`, `tulov_naqt_ish_haqi`, `tulov_plastik_ish_haqi`, `created_at`, `updated_at`) VALUES
(16, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-17 08:42:45', '2024-05-17 08:42:45');

-- --------------------------------------------------------

--
-- Структура таблицы `guruhs`
--

CREATE TABLE `guruhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `techer_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `guruh_name` varchar(255) NOT NULL,
  `guruh_price` int(11) NOT NULL,
  `guruh_chegirma` int(11) NOT NULL,
  `guruh_admin_chegirma` int(11) NOT NULL,
  `techer_price` int(11) NOT NULL,
  `techer_bonus` int(11) NOT NULL,
  `guruh_status` varchar(255) NOT NULL,
  `guruh_start` varchar(255) NOT NULL,
  `guruh_end` varchar(255) DEFAULT NULL,
  `guruh_vaqt` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `guruh_times`
--

CREATE TABLE `guruh_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `guruh_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `times` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `guruh_users`
--

CREATE TABLE `guruh_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guruh_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `commit_start` varchar(255) NOT NULL,
  `admin_id_start` int(11) NOT NULL,
  `commit_end` varchar(255) DEFAULT NULL,
  `admin_id_end` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ish_haqis`
--

CREATE TABLE `ish_haqis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `summa` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `mavjud_ish_haqis`
--

CREATE TABLE `mavjud_ish_haqis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `naqt` varchar(255) NOT NULL,
  `plastik` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mavjud_ish_haqis`
--

INSERT INTO `mavjud_ish_haqis` (`id`, `filial_id`, `naqt`, `plastik`, `created_at`, `updated_at`) VALUES
(2, 22, '0', '0', '2024-05-17 08:42:45', '2024-05-17 08:42:45'),
(3, 23, '0', '0', '2024-05-17 10:07:24', '2024-05-17 10:07:24');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_06_081344_create_filials_table', 1),
(5, '2024_04_06_085103_create_filial_kassas_table', 1),
(6, '2024_04_06_130511_create_rooms_table', 1),
(7, '2024_04_06_134818_create_tulov_settings_table', 1),
(8, '2024_04_06_163936_create_admin_kassas_table', 1),
(9, '2024_04_06_191232_create_ish_haqis_table', 1),
(10, '2024_04_07_091323_create_cours_table', 1),
(11, '2024_04_07_093241_create_guruhs_table', 1),
(12, '2024_04_07_093954_create_guruh_times_table', 1),
(13, '2024_04_11_182046_create_user_histories_table', 1),
(14, '2024_04_11_193008_create_guruh_users_table', 1),
(15, '2024_04_12_100742_create_tulovs_table', 1),
(16, '2024_04_13_175230_create_moliyas_table', 1),
(17, '2024_04_14_162128_create_eslatmas_table', 1),
(18, '2024_04_17_122951_create_murojats_table', 1),
(19, '2024_04_17_162956_create_transactions_table', 1),
(20, '2024_04_17_170735_create_personal_access_tokens_table', 1),
(21, '2024_04_19_185602_create_davomats_table', 1),
(22, '2024_04_21_163347_create_sms_centars_table', 1),
(23, '2024_04_21_200050_create_tulov_deletes_table', 1),
(24, '2024_04_21_215630_create_chegirma_days_table', 1),
(25, '2024_04_24_102207_create_settings_table', 1),
(26, '2024_04_26_003717_create_sms_counters_table', 1),
(27, '2024_04_26_114923_create_tests_table', 1),
(28, '2024_04_26_160316_create_test_natijas_table', 1),
(29, '2024_05_13_143754_create_mavjud_ish_haqis_table', 1),
(30, '2024_05_17_023825_create_send_messeges_table', 2),
(31, '2024_05_17_115113_create_t_kun_messeges_table', 3),
(32, '2024_05_17_155821_create_all_s_m_s_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `moliyas`
--

CREATE TABLE `moliyas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `xodisa` varchar(255) NOT NULL,
  `summa` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `murojats`
--

CREATE TABLE `murojats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `send_messeges`
--

CREATE TABLE `send_messeges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `send_messeges`
--

INSERT INTO `send_messeges` (`id`, `phone`, `text`, `status`, `created_at`, `updated_at`) VALUES
(17, '+998908830450', 'Hurmatli DILSHOD XOLMURODOV! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi.', 'Yuborildi', '2024-05-17 08:56:12', '2024-05-17 08:56:12'),
(18, '+998945204004', 'Hurmatli ALIBEK! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi.', 'Yuborildi', '2024-05-17 08:56:13', '2024-05-17 08:56:13'),
(19, '+998908830450', 'Hurmatli DILSHOD XOLMURODOV! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi.', 'Yuborildi', '2024-05-17 08:59:29', '2024-05-17 08:59:31'),
(20, '+998945204004', 'Hurmatli ALIBEK! Sizni tug\'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog\'lik, istaklaringizni amalga oshirish va ko\'plab ijobiy his-tuyg\'ularni tilaymiz.\n Hurmat bilan ATKO o\'quv markazi jamoasi.', 'Yuborildi', '2024-05-17 08:59:31', '2024-05-17 08:59:32'),
(21, '+998908830450', 'Hurmatli Test hodim siz ATKO o\'quv markaziga o\'qituvchi lavozimiga ishga olindingiz.\nLogin: Test hodim\nParol: 34828351\nWebSayt: Web sayt manzili', 'Yuborildi', '2024-05-17 09:58:25', '2024-05-17 10:04:58'),
(22, '+998908830450', 'Dilshod Xolmurodov siz ATKO o\'quv markaziga ishga olindingiz.\nLogin: 12312312efwe\nParol: 12345678\nWeb sayt: Web sayt manzili', 'Yuborildi', '2024-05-17 10:05:54', '2024-05-17 10:05:57'),
(23, '+998908830450', 'Dilshod Xolmurodov siz ATKO o\'quv markaziga parolingiz yangilandi.\nLogin: 12312312efwe\nParol: 86735372\nWeb sayt: Web sayt manzili', 'Yuborildi', '2024-05-17 10:12:58', '2024-05-17 10:13:14'),
(24, '+998908830450', 'Dilshod Xolmurodov siz ATKO o\'quv markaziga parolingiz yangilandi.\nLogin: 12312312efwe\nParol: 57983463\nWeb sayt: Web sayt manzili', 'Yuborildi', '2024-05-17 10:15:20', '2024-05-17 10:15:39'),
(25, '+998908830450', 'Salomalaykum', 'Yuborildi', '2024-05-17 11:49:01', '2024-05-17 11:49:01'),
(26, '+998945204004', 'Salomalaykum', 'Yuborildi', '2024-05-17 11:49:02', '2024-05-17 11:49:02'),
(27, '+998908830450', 'slaasdfsd erg df gdfg \\sdas fsdf sdf', 'Yuborildi', '2024-05-17 11:52:25', '2024-05-17 11:52:25'),
(28, '+998945204004', 'slaasdfsd erg df gdfg \\sdas fsdf sdf', 'Yuborildi', '2024-05-17 11:52:26', '2024-05-17 11:52:26'),
(29, '+998908830450', '65846546', 'Yuborildi', '2024-05-17 11:54:33', '2024-05-17 11:54:33'),
(30, '+998945204004', '65846546', 'Yuborildi', '2024-05-17 11:54:35', '2024-05-17 11:54:35');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6juJkbXcTzYZJn1sSfLYDVVnMAiG9JrBcgdyuQdo', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 YaBrowser/24.4.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiODZDYzJDdXRWQVY1MjFjWDNHUHh6d2xZNUpGYjVZNE1GWDNrM0xaYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUyOiJodHRwOi8vbG9jYWxob3N0L0FUS09fTXlDcm0vcHVibGljL1N1cGVyYWRtaW4vZmlsaWFsIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MTU5MzY0MjA7fX0=', 1715947193);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `EndData` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Summa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `EndData`, `Username`, `Status`, `Summa`, `created_at`, `updated_at`) VALUES
(1, '2024-12-31', 'elshodatc1116', 'true', 15000, '2024-04-23 21:32:24', '2024-05-07 13:08:19');

-- --------------------------------------------------------

--
-- Структура таблицы `sms_centars`
--

CREATE TABLE `sms_centars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `tkun` varchar(255) NOT NULL DEFAULT 'off',
  `tashrif` varchar(255) NOT NULL DEFAULT 'off',
  `tulov` varchar(255) NOT NULL DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sms_centars`
--

INSERT INTO `sms_centars` (`id`, `filial_id`, `tkun`, `tashrif`, `tulov`, `created_at`, `updated_at`) VALUES
(12, 22, 'on', 'off', 'off', '2024-05-17 08:42:45', '2024-05-17 08:45:02');

-- --------------------------------------------------------

--
-- Структура таблицы `sms_counters`
--

CREATE TABLE `sms_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maxsms` int(11) NOT NULL DEFAULT 0,
  `counte` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sms_counters`
--

INSERT INTO `sms_counters` (`id`, `maxsms`, `counte`, `created_at`, `updated_at`) VALUES
(1, 500, 18, '2024-04-25 14:41:28', '2024-05-17 11:58:57');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` int(11) NOT NULL,
  `Savol` varchar(255) NOT NULL,
  `TJavob` varchar(255) NOT NULL,
  `NJavob1` varchar(255) NOT NULL,
  `NJavob2` varchar(255) NOT NULL,
  `NJavob3` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `test_natijas`
--

CREATE TABLE `test_natijas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `guruh_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `savol_count` int(11) NOT NULL,
  `tugri_count` int(11) NOT NULL,
  `notugri_count` int(11) NOT NULL,
  `ball` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `owner_id` varchar(255) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `payme_time` varchar(255) DEFAULT NULL,
  `cancel_time` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `perform_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tulovs`
--

CREATE TABLE `tulovs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guruh_id` varchar(255) NOT NULL,
  `summa` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tulov_deletes`
--

CREATE TABLE `tulov_deletes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `summa` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tulov_settings`
--

CREATE TABLE `tulov_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `tulov_summa` int(11) NOT NULL,
  `chegirma` int(11) NOT NULL,
  `admin_chegirma` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `t_kun_messeges`
--

CREATE TABLE `t_kun_messeges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `t_kun_messeges`
--

INSERT INTO `t_kun_messeges` (`id`, `data`, `status`, `created_at`, `updated_at`) VALUES
(25, '2024-05-17', 'Yuborildi', '2024-05-17 08:59:27', '2024-05-17 08:59:32');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `tkun` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `smm` varchar(255) DEFAULT NULL,
  `balans` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `filial_id`, `name`, `phone`, `phone2`, `addres`, `tkun`, `type`, `status`, `about`, `smm`, `balans`, `email`, `email_verified_at`, `password`, `admin_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Elshod Musurmonov', '90 883 0450', '94 520 4004', 'Qarshi shahar', '1997-05-17', 'SuperAdmin', 'true', 'Create Register', 'Create Register', 0, 'elshodatc1116', NULL, '$2y$12$U4J19iLqrKqNCsTwsKgWHOsJoD1Gv626IMTnmqN2OYw7vyBYJ1Nke', '1', 'hZ8WbkpevifyiCFADXLzzmoCatwx8qLlUe38pjaMwEqXezVjUDuTEEfw8ly4', '2024-04-04 11:54:18', '2024-05-05 12:17:34'),
(2559, '22', 'DILSHOD XOLMURODOV', '90 883 0450', '94 520 4004', 'Qarshi shaxar', '1999-05-17', 'User', 'true', 'Tes', 'Telegram', NULL, '12011547807', NULL, '$2y$12$XpON2nBFsxT6ygLy70qVCuoBba2n09zjT6..Ec/fFbGYKuzjTwyCa', '1', NULL, '2024-05-17 08:43:21', '2024-05-17 08:43:21'),
(2560, '22', 'ALIBEK', '94 520 4004', '90 883 0450', 'Qarshi shaxar', '2024-05-17', 'User', 'true', 'rerq', 'Facebook', NULL, '5147806269', NULL, '$2y$12$EJM4uJ2ib0pcx5NwGEdp7uYAC/PYrVgJaTDgsguEV9dEmb7gyPKnS', '1', NULL, '2024-05-17 08:43:43', '2024-05-17 08:43:43'),
(2561, '22', 'Test hodim', '90 883 0450', '90 883 0450', '46546', '0123-12-21', 'Techer', 'true', '1231231', NULL, NULL, '123123', NULL, '$2y$12$Ap1ejPYJzYo2sXkFA5e2wemFCoZT7M2C72s7JObPNnWMvHTRJAui2', '1', NULL, '2024-05-17 09:58:25', '2024-05-17 09:58:25'),
(2562, '22', 'Dilshod Xolmurodov', '90 883 0450', '90 883 0450', '46546', '123123-03-21', 'Operator', 'true', '12f', NULL, NULL, '12312312efwe', NULL, '$2y$12$pZQBc0zE4/7ZTqv5qOJ0TeinwPVH5ETA5ppCIra7elglWYAVwWYfC', '1', NULL, '2024-05-17 10:05:54', '2024-05-17 10:15:20');

-- --------------------------------------------------------

--
-- Структура таблицы `user_histories`
--

CREATE TABLE `user_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `summa` varchar(255) DEFAULT NULL,
  `xisoblash` varchar(255) DEFAULT NULL,
  `balans` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_histories`
--

INSERT INTO `user_histories` (`id`, `filial_id`, `user_id`, `status`, `type`, `summa`, `xisoblash`, `balans`, `created_at`, `updated_at`) VALUES
(2022, 22, 2559, 'Markazga tashrif', NULL, NULL, NULL, 0, '2024-05-17 08:43:21', '2024-05-17 08:43:21'),
(2023, 22, 2560, 'Markazga tashrif', NULL, NULL, NULL, 0, '2024-05-17 08:43:43', '2024-05-17 08:43:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_kassas`
--
ALTER TABLE `admin_kassas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `all_s_m_s`
--
ALTER TABLE `all_s_m_s`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `chegirma_days`
--
ALTER TABLE `chegirma_days`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `davomats`
--
ALTER TABLE `davomats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `eslatmas`
--
ALTER TABLE `eslatmas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `filials`
--
ALTER TABLE `filials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `filial_kassas`
--
ALTER TABLE `filial_kassas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guruhs`
--
ALTER TABLE `guruhs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guruh_times`
--
ALTER TABLE `guruh_times`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guruh_users`
--
ALTER TABLE `guruh_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ish_haqis`
--
ALTER TABLE `ish_haqis`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mavjud_ish_haqis`
--
ALTER TABLE `mavjud_ish_haqis`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moliyas`
--
ALTER TABLE `moliyas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `murojats`
--
ALTER TABLE `murojats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `send_messeges`
--
ALTER TABLE `send_messeges`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sms_centars`
--
ALTER TABLE `sms_centars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sms_counters`
--
ALTER TABLE `sms_counters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test_natijas`
--
ALTER TABLE `test_natijas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tulovs`
--
ALTER TABLE `tulovs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tulov_deletes`
--
ALTER TABLE `tulov_deletes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tulov_settings`
--
ALTER TABLE `tulov_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `t_kun_messeges`
--
ALTER TABLE `t_kun_messeges`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_histories`
--
ALTER TABLE `user_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_kassas`
--
ALTER TABLE `admin_kassas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `all_s_m_s`
--
ALTER TABLE `all_s_m_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `chegirma_days`
--
ALTER TABLE `chegirma_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `cours`
--
ALTER TABLE `cours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `davomats`
--
ALTER TABLE `davomats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=876;

--
-- AUTO_INCREMENT для таблицы `eslatmas`
--
ALTER TABLE `eslatmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `filials`
--
ALTER TABLE `filials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `filial_kassas`
--
ALTER TABLE `filial_kassas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `guruhs`
--
ALTER TABLE `guruhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT для таблицы `guruh_times`
--
ALTER TABLE `guruh_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2194;

--
-- AUTO_INCREMENT для таблицы `guruh_users`
--
ALTER TABLE `guruh_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT для таблицы `ish_haqis`
--
ALTER TABLE `ish_haqis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `mavjud_ish_haqis`
--
ALTER TABLE `mavjud_ish_haqis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `moliyas`
--
ALTER TABLE `moliyas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `murojats`
--
ALTER TABLE `murojats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `send_messeges`
--
ALTER TABLE `send_messeges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `sms_centars`
--
ALTER TABLE `sms_centars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `sms_counters`
--
ALTER TABLE `sms_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT для таблицы `test_natijas`
--
ALTER TABLE `test_natijas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tulovs`
--
ALTER TABLE `tulovs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT для таблицы `tulov_deletes`
--
ALTER TABLE `tulov_deletes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tulov_settings`
--
ALTER TABLE `tulov_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `t_kun_messeges`
--
ALTER TABLE `t_kun_messeges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2563;

--
-- AUTO_INCREMENT для таблицы `user_histories`
--
ALTER TABLE `user_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
