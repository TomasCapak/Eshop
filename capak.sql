-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 06:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capak`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_groups`
--

CREATE TABLE `ci_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_groups`
--

INSERT INTO `ci_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `ci_kategorie`
--

CREATE TABLE `ci_kategorie` (
  `idKategorie` int(11) NOT NULL,
  `nazevKategorie` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `ci_kategorie`
--

INSERT INTO `ci_kategorie` (`idKategorie`, `nazevKategorie`) VALUES
(1, 'Elektro'),
(2, 'Potraviny'),
(3, 'Drogerie'),
(4, 'Auto-moto'),
(5, 'Knihy'),
(6, 'Sport'),
(7, 'Oblečení'),
(8, 'Zahrada');

-- --------------------------------------------------------

--
-- Table structure for table `ci_login_attempts`
--

CREATE TABLE `ci_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_objednavka`
--

CREATE TABLE `ci_objednavka` (
  `idObjednavka` int(11) NOT NULL,
  `DatumObjednavky` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `ci_objednavka`
--

INSERT INTO `ci_objednavka` (`idObjednavka`, `DatumObjednavky`) VALUES
(1, '2022-05-19 23:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `ci_objednavka_has_polozka`
--

CREATE TABLE `ci_objednavka_has_polozka` (
  `Objednavka_idObjednavka` int(11) NOT NULL,
  `Polozka_idPolozka` int(11) NOT NULL,
  `pocet` int(11) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `ci_objednavka_has_polozka`
--

INSERT INTO `ci_objednavka_has_polozka` (`Objednavka_idObjednavka`, `Polozka_idPolozka`, `pocet`, `cena`) VALUES
(1, 12, 12, 15500);

-- --------------------------------------------------------

--
-- Table structure for table `ci_podkategorie`
--

CREATE TABLE `ci_podkategorie` (
  `idPodkategorie` int(11) NOT NULL,
  `nazevPodkategorie` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `Kategorie_idKategorie_Podkategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `ci_podkategorie`
--

INSERT INTO `ci_podkategorie` (`idPodkategorie`, `nazevPodkategorie`, `Kategorie_idKategorie_Podkategorie`) VALUES
(1, 'Mobily', 1),
(2, 'Trička', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ci_polozka`
--

CREATE TABLE `ci_polozka` (
  `idPolozka` int(11) NOT NULL,
  `nazev` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `popis` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `fotka` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `Kategorie_idKategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `ci_polozka`
--

INSERT INTO `ci_polozka` (`idPolozka`, `nazev`, `popis`, `fotka`, `cena`, `Kategorie_idKategorie`) VALUES
(12, 'Notebook', 'asd', 'krabiceprojekt.png', 15500, 1),
(15, 'Chleba', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam', '1652475046krabiceprojekt.png', 35, 2),
(16, 'Gel', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla accumsan, elit sit amet varius semper,', '1652475102krabiceprojekt.png', 135, 3),
(17, 'Wrap', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '1652475145krabiceprojekt.png', 3500, 4),
(18, 'Book', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam,', '1652475191krabiceprojekt.png', 199, 5),
(19, 'Ball', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. ', '1652475223krabiceprojekt.png', 399, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('plp1s6fogmf2rme3dce9tcjufscbo5hn', '::1', 1652385143, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338353134333b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('0bmq5ssgjbhigq01j7rgamdgl8783l67', '::1', 1652386779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338363737393b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('nv3g0ekmsk2ccbf57t2h8bltjhism3ig', '::1', 1652387889, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338373838393b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('ig6oue8m9a4pl9f4vfpuikdip0e7i707', '::1', 1652388251, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338383235313b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('9jl0c5d5svmn9tooq8nlfla8jt2f9tr7', '::1', 1652388562, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338383536323b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('fvj8gfj3s8fvv6g85a533vv65thnh2p8', '::1', 1652388906, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338383930363b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('r13tfvsi1jrtgemde9hijsb0u29foqto', '::1', 1652389209, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338393230393b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d7374617475737c733a32393a2250726f6475637420496e736572746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a363a22737461747573223b733a333a226f6c64223b7d),
('usolkcjjrue24h4rtbafr80rcm92i59v', '::1', 1652389705, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323338393730353b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('riiecd5c5vohf2c4nr0bpc3ptd3d70nl', '::1', 1652390077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323339303037373b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('updfn11i5slk30p21s36n7dbkuk2d070', '::1', 1652390414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323339303431343b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('umh3e3mjqkchkqv9nolsk0cm18a0cnb3', '::1', 1652390804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323339303830343b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('4tbu1aq83hu922s6vej9pci6s283crco', '::1', 1652391818, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323339313831383b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('467cp6ea0qqbvdqo0h3kipc17hecp1p1', '::1', 1652391851, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323339313831383b636172747c613a313a7b733a353a226e617a6576223b613a313a7b733a383a227175616e74697479223b693a323b7d7d),
('ui3h00unnch8cm7uigb4op27m9k306ke', '::1', 1652456800, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323435363830303b),
('nr3i6fdcbbl2miims0t2bsa4740shnkh', '::1', 1652457862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323435373836323b),
('6tgkrr69p7rau94dopk42a87s2egb80k', '::1', 1652458329, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323435383332393b),
('thlp09ka5ujnldiv1ggjur0lt7anahls', '::1', 1652458634, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323435383633343b),
('aipv9ohc3t5egftg72t2jk8efakn530b', '::1', 1652458983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323435383938333b),
('acaj28ipfngu1eeueornsdq52831eq8r', '::1', 1652459392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323435393339323b),
('bsqhuvc1qjvn7vpm7d65gkn1u9t0anne', '::1', 1652459411, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323435393339323b),
('hki239trd5259c1escqtukbj1jh4jg27', '::1', 1652472473, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437323437333b),
('98n9if7fp1gsmmof3l6h0e6rh4gjd68d', '127.0.0.1', 1652472156, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437323135363b),
('bhni1j8ea4j55h0fi53ji2ui2538no1d', '::1', 1652472783, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437323738333b),
('usegmbv89tl70f9d8bejefhg37htec6b', '::1', 1652473391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437333339313b),
('d4cf2i80jgd79j6d7do0f3jd41p36mf2', '::1', 1652474058, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437343035383b),
('bc67p2bu2s7r8d4khbka7vbncvv4s46p', '::1', 1652474375, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437343337353b),
('7prsudk7f43l346e4uv9elfvcootj78a', '::1', 1652474736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437343733363b),
('3bs8tdpha51os3m6ge5nrcrvl6ddjts7', '::1', 1652475046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437353034363b),
('dfpa2a4givetavs52hho0n85rv55cg16', '::1', 1652478001, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437383030313b),
('cajthbb8ie5jqqe8duid0992o3sk76nq', '::1', 1652478001, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323437383030313b),
('muf8pkb4jop58fj3m8krc1sgd8ck6ilp', '::1', 1652539839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323533393833393b),
('58q6h4nih5ccs7g74m30i70b0lpa3dsv', '::1', 1652540586, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534303538363b),
('ug78df6vk5qsh5uc22495qepji0mh7jn', '::1', 1652540917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534303931373b),
('in6e1dkr1h6bp72at5beld4f5lo2a7c2', '::1', 1652541224, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534313232343b),
('rmsek3b7b5qdtfrure0cpg9t7rslvad5', '::1', 1652541538, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534313533383b),
('m4badugq3encejcaj2h5o1istou7f4an', '::1', 1652541921, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534313932313b),
('ih296jv8v8muagseol5b7aa2csgnrnqk', '::1', 1652542265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534323236353b),
('sak06gi8lsipn04uqft1aqqjv2nkb5cr', '::1', 1652542570, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534323537303b),
('1l6up22of8viuu0pqafg3h7984269n7n', '::1', 1652542926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534323932363b),
('8g940bn7pquqc2k7lssm0om2hgnb3oiu', '::1', 1652543424, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534333432343b),
('3s275l0nq8pg560rabjge7vp3gaa7c6u', '::1', 1652543791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534333739313b),
('sgam6sobt9nufd55nq3am20hkgrmfdbs', '::1', 1652544273, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534343237333b),
('26k4p4fgigupgf0fgo04krovb2llh01o', '::1', 1652544679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534343637393b7374617475737c733a32393a2250726f6475637420496e736572746564205375636365737366756c6c79223b5f5f63695f766172737c613a313a7b733a363a22737461747573223b733a333a226f6c64223b7d),
('8r74v77i01t4rlopn484d6tp71786o36', '::1', 1652545290, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534353239303b),
('h3oi9mbt49i1hgs899sej1ln99dvlfbh', '::1', 1652545798, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534353739383b),
('4hql2u423rpsvnn38v22udqfgn4hp12g', '::1', 1652546208, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534363230383b),
('33ll1acnbgi61d6vfj65t4kftada1db8', '::1', 1652546375, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323534363230383b),
('0h3585ak2uu3s8gnjonrujvcdfo2or1r', '::1', 1652610846, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323631303834363b),
('4pgs90o136bvbpnuapo5neh4c6p0n5c6', '::1', 1652610957, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635323631303834363b),
('4rvgpk6mtjnnvnj4d41r3tf5f3vja3qv', '::1', 1655672516, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635353637323531333b),
('2m0umc4efdi04nqg9fjmhh87t3p0mnmo', '::1', 1669560039, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393536303033393b),
('0mvncbbsc7beprul0863gs58l8djmfp0', '::1', 1669560467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393536303436373b),
('hu5qsl5f116hlhmmi2dg2m58do2d6a63', '::1', 1669563987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393536333938373b),
('jipielccv9sk4uj1pp2uedllrdqb0ugh', '::1', 1669564354, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393536343335343b),
('440s6nqn56undhcs6gin5ikoqmm869rk', '::1', 1669564822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393536343832323b),
('v8fnu87jr1fta7ft3k39smnuuvsoekga', '::1', 1669565332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393536353333323b),
('1r53hhpddlnl2brp470uaene1f2i018g', '::1', 1669569702, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393536393730323b),
('ho0c8qvs1q1holc3aaegj2dnr3nbe8tp', '::1', 1669570008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537303030383b),
('1gsgsiem3cs9g8dtjfhr2rnhnk8cdvpp', '::1', 1669570438, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537303433383b),
('jpgi64ojilcpltecjsd78gvvois0jlkl', '::1', 1669570785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537303738353b),
('17tnpgb6kb7ud5jbr9k3avjinupurksc', '::1', 1669571372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537313337323b),
('fllfe14g2r9bdhd7k18v8no84nln549l', '::1', 1669571907, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537313930373b),
('k6uu9fk5l7vrprb5ghj8g3bc0759dkn2', '::1', 1669572417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537323431373b),
('f0or48jmjb21rg64gmr9hmj2347vceud', '::1', 1669572723, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537323732333b),
('6a5e9s52kcb97hoksbptsekhur58627c', '::1', 1669573068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537333036383b),
('t20por04bmcu12v228rk2f4qsnj8buld', '::1', 1669573399, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537333339393b),
('in60530rbpu170qstdkec8misds59t94', '::1', 1669573706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537333730363b),
('irfk4k247idqeh9nab35v00rimag9kd5', '::1', 1669574270, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537343237303b),
('1oasp6ehnkvm331h8nrus3lr867bqjip', '::1', 1669574717, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537343731373b),
('76l0tfpe5t0g0kb9860lb6lu1spmtd15', '::1', 1669575047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537353034373b),
('s7f07l1392mmq47ufukfvos5vo5s11ju', '::1', 1669575813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537353831333b),
('ccsgv4hllismclg32jq0p8mh4djurc7u', '::1', 1669576164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537363136343b),
('rq7rrijda3cgvpaql0p9nru15p4fc4f2', '::1', 1669576630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537363633303b),
('ntca2npppt8g7q8r68nl4dgak2u6cl9h', '::1', 1669576974, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537363937343b),
('ni87nk0figlph6mspdd62tjiv9kan416', '::1', 1669578122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537383132323b),
('5ocf8clofr9enpquhdedq3l2ftndg7pf', '::1', 1669578587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537383538373b),
('lkuef5pv3j8c757i78khnpbhp8gl75a6', '::1', 1669579006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537393030363b),
('39rqm1pje37hndpahmta478nbbemdfnp', '::1', 1669579023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393537393030363b),
('2m7ttsh7g25i3vjtturf3vbh7p6debf7', '::1', 1669580695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393538303630373b);

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users_groups`
--

CREATE TABLE `ci_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users_groups`
--

INSERT INTO `ci_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_groups`
--
ALTER TABLE `ci_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_kategorie`
--
ALTER TABLE `ci_kategorie`
  ADD PRIMARY KEY (`idKategorie`);

--
-- Indexes for table `ci_login_attempts`
--
ALTER TABLE `ci_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_objednavka`
--
ALTER TABLE `ci_objednavka`
  ADD PRIMARY KEY (`idObjednavka`);

--
-- Indexes for table `ci_objednavka_has_polozka`
--
ALTER TABLE `ci_objednavka_has_polozka`
  ADD KEY `fk_Objednavka_has_Polozka_idx` (`Polozka_idPolozka`),
  ADD KEY `fk_Objednavka_has_Objednavka_idx` (`Objednavka_idObjednavka`);

--
-- Indexes for table `ci_podkategorie`
--
ALTER TABLE `ci_podkategorie`
  ADD PRIMARY KEY (`idPodkategorie`),
  ADD KEY `fk_Podkategorie_Kategorie` (`Kategorie_idKategorie_Podkategorie`);

--
-- Indexes for table `ci_polozka`
--
ALTER TABLE `ci_polozka`
  ADD PRIMARY KEY (`idPolozka`),
  ADD KEY `fk_Polozka_Kategorie` (`Kategorie_idKategorie`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `ci_users_groups`
--
ALTER TABLE `ci_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_groups`
--
ALTER TABLE `ci_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_kategorie`
--
ALTER TABLE `ci_kategorie`
  MODIFY `idKategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ci_login_attempts`
--
ALTER TABLE `ci_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_objednavka`
--
ALTER TABLE `ci_objednavka`
  MODIFY `idObjednavka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_podkategorie`
--
ALTER TABLE `ci_podkategorie`
  MODIFY `idPodkategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_polozka`
--
ALTER TABLE `ci_polozka`
  MODIFY `idPolozka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_users_groups`
--
ALTER TABLE `ci_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ci_objednavka_has_polozka`
--
ALTER TABLE `ci_objednavka_has_polozka`
  ADD CONSTRAINT `FOREIGNITEM` FOREIGN KEY (`Polozka_idPolozka`) REFERENCES `ci_polozka` (`idPolozka`),
  ADD CONSTRAINT `FOREIGNORDERS` FOREIGN KEY (`Objednavka_idObjednavka`) REFERENCES `ci_objednavka` (`idObjednavka`),
  ADD CONSTRAINT `fk_Objednavka_has_Objednavka` FOREIGN KEY (`Objednavka_idObjednavka`) REFERENCES `ci_objednavka` (`idObjednavka`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Objednavka_has_Polozka` FOREIGN KEY (`Polozka_idPolozka`) REFERENCES `ci_polozka` (`idPolozka`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Objednavka_has_Polozka_Objednavka1` FOREIGN KEY (`Objednavka_idObjednavka`) REFERENCES `ci_objednavka` (`idObjednavka`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Objednavka_has_Polozka_Polozka1` FOREIGN KEY (`Polozka_idPolozka`) REFERENCES `ci_polozka` (`idPolozka`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ci_podkategorie`
--
ALTER TABLE `ci_podkategorie`
  ADD CONSTRAINT `fk_Podkategorie_Kategorie` FOREIGN KEY (`Kategorie_idKategorie_Podkategorie`) REFERENCES `ci_kategorie` (`idKategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ci_polozka`
--
ALTER TABLE `ci_polozka`
  ADD CONSTRAINT `fk_Polozka_Kategorie` FOREIGN KEY (`Kategorie_idKategorie`) REFERENCES `ci_kategorie` (`idKategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ci_users_groups`
--
ALTER TABLE `ci_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `ci_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `ci_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
