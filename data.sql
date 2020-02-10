SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `translations` (`id`, `name`, `fr`, `en`) VALUES
(3, 'home.index', 'Index', 'Index'),
(4, 'home.signup', 'S\'inscrire', 'Sign up'),
(5, 'home.signin', 'Connexion', 'Login'),
(6, 'home.translate', 'Traductions', 'Translations'),
(7, 'translations.add', 'Ajouter', 'Add'),
(8, 'translations.name', 'Nom', 'Name'),
(9, 'translations.fr', 'FranÃ§ais', 'French'),
(10, 'translations.en', 'Anglais', 'English'),
(11, 'translations.save', 'Sauvegarder', 'Save'),
(12, 'translations.close', 'Fermer', 'Close'),
(13, 'translations.placeholder', 'Chercher une traduction', 'Find translation'),
(14, 'translations.saved', 'Traduction sauvegardÃ©e', 'Translation saved'),
(15, 'translations.title', 'Traductions', 'Translations'),
(16, 'index.title', 'Index', 'Index'),
(17, 'register.title', 'S\'inscrire', 'Sign up'),
(18, 'register.email', 'Email', 'Email'),
(19, 'register.name', 'Nom', 'Name'),
(20, 'register.firstname', 'PrÃ©nom', 'Firstname'),
(21, 'register.password', 'Mot de passe', 'Password'),
(22, 'register.password.verif', 'Confirmer', 'Confirm password'),
(23, 'account.register.mail.exist', 'Email dÃ©jÃ  existant', 'Email already used'),
(24, 'account.register.diff.pass', 'Mot de passes diffÃ©rents', 'Different passwords'),
(25, 'register.register', 'S\'inscrire', 'Sign up'),
(26, 'login.title', 'Connexion', 'Login'),
(27, 'login.email', 'Email', 'Email'),
(28, 'login.password', 'Mot de passe', 'Password'),
(29, 'login.login', 'Connexion', 'Login'),
(30, 'home.admin', 'Admin', 'Admin'),
(31, 'home.profil', 'Profile', 'Profil'),
(32, 'home.logout', 'DÃ©connexion', 'Logout'),
(33, 'profil.infos.name', 'Bonjour %name%', 'Hello %name%'),
(34, 'profil.infos.email', 'Votre email est : %email%', 'Your email is : %email%'),
(35, 'profil.infos.admin', 'Vous Ãªtes admin', 'You are admin'),
(36, 'profil.title', 'Profile', 'Profil'),
(37, 'admin.title', 'Admin', 'Admin'),
(38, 'login.bad.password', 'Mauvais mot de passe', 'Bad password'),
(39, 'account.register.success', 'Inscription rÃ©ussie', 'Sign up successful');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
