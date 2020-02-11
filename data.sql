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

INSERT INTO `translations` (`name`, `fr`, `en`) VALUES
('home.index', 'Index', 'Index'),
('home.signup', 'S\'inscrire', 'Sign up'),
('home.signin', 'Connexion', 'Login'),
('home.translate', 'Traductions', 'Translations'),
('translations.add', 'Ajouter', 'Add'),
('translations.name', 'Nom', 'Name'),
(translations.fr', 'Français', 'French'),
('translations.en', 'Anglais', 'English'),
('translations.save', 'Sauvegarder', 'Save'),
('translations.close', 'Fermer', 'Close'),
('translations.placeholder', 'Chercher une traduction', 'Find translation'),
('translations.saved', 'Traduction sauvegardée', 'Translation saved'),
('translations.title', 'Traductions', 'Translations'),
('index.title', 'Index', 'Index'),
('register.title', 'S\'inscrire', 'Sign up'),
('register.email', 'Email', 'Email'),
('register.name', 'Nom', 'Name'),
('register.firstname', 'Prénom', 'Firstname'),
('register.password', 'Mot de passe', 'Password'),
('register.password.verif', 'Confirmer', 'Confirm password'),
('account.register.mail.exist', 'Email déjà  existant', 'Email already used'),
('account.register.diff.pass', 'Mot de passes différents', 'Different passwords'),
('register.register', 'S\'inscrire', 'Sign up'),
('login.title', 'Connexion', 'Login'),
('login.email', 'Email', 'Email'),
('login.password', 'Mot de passe', 'Password'),
('login.login', 'Connexion', 'Login'),
('home.admin', 'Admin', 'Admin'),
('home.profil', 'Profile', 'Profil'),
('home.logout', 'Déconnexion', 'Logout'),
('profil.infos.name', 'Bonjour %name%', 'Hello %name%'),
('profil.infos.email', 'Votre email est : %email%', 'Your email is : %email%'),
('profil.infos.admin', 'Vous êtes admin', 'You are admin'),
('profil.title', 'Profile', 'Profil'),
('admin.title', 'Admin', 'Admin'),
('login.bad.password', 'Mauvais mot de passe', 'Bad password'),
('account.register.success', 'Inscription réussie', 'Sign up successful');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
