-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 avr. 2023 à 07:48
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `borrowings`
--

CREATE TABLE `borrowings` (
  `Borrowing_Code` int(11) NOT NULL,
  `Borrowing_Date` date DEFAULT NULL,
  `Borrowing_Return_Date` date DEFAULT NULL,
  `Collection_Code` int(11) NOT NULL,
  `Nickname` int(11) NOT NULL,
  `Reservation_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `Collection_Code` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author_Name` varchar(100) DEFAULT NULL,
  `Cover_Image` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Edition_Date` date DEFAULT NULL,
  `Buy_Date` date DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `collection`
--

INSERT INTO `collection` (`Collection_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Buy_Date`, `Status`, `type`, `size`) VALUES
(1, 'Red,White & Royal blue ', 'Casey McQuiston', '../images/Group 54.png', 'Good condition', '2019-05-14', '2019-12-01', 'Available', 'Book', '120'),
(2, 'The Cruel Prince', ' Holly Black', '../images/Group 55.jpg', 'New', '2017-01-02', '2020-03-01', 'Available', 'Book', '120'),
(3, 'Rich Dad Poor Dad', 'Robert Kiyosaki&Sharon L. Lechter', '../images/Group 53.png', 'New', '2000-04-01', '2001-03-01', 'Available', 'Book', '120'),
(4, 'The Hating Game', 'Peter Hutchings', '../images/Group 52.png', 'Acceptable', '2021-12-10', '2022-04-11', 'Available', 'Book', '120'),
(5, 'Ugly Love', 'Colleen Hoover', '../images/Group 49.png', 'Good condition', '2014-08-05', '2015-05-21', 'Available', 'Book', '120'),
(6, 'The law of Human Nature', 'Robert Greene', '../images/Group 50.png', 'New', '2018-10-16', '2018-12-04', 'Available', 'Book', '120'),
(7, 'The Seven Husbands of Evelyn Hugo', 'Taylor Jenkins Reid', '../images/Group 51.png', 'Good condition', '2017-06-13', '2017-09-01', 'Available', 'Book', '120'),
(8, 'Ego is The Enemy', 'Ryan Holiday', '../images/Group 61.jpg', 'Acceptable', '2017-06-14', '2018-01-20', 'Available', 'Book', '120'),
(9, 'The Book Thief', 'Markus Zusak', '../images/Group 56.webp', 'Quite worn', '2006-03-01', '2007-11-10', 'Available', 'Book', '120'),
(10, 'They Both Die at the End', 'Adam Silvera', '../images/Group 57.jpg', 'New', '2017-09-05', '2018-12-21', 'Available', 'Book', '120'),
(11, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', '../images/Group 47.png', 'Good condition', '2016-09-13', '2017-05-11', 'Available', 'Book', '120'),
(12, 'Call me by your Name', 'AndrÃ© Aciman', '../images/Group 48.png', 'Quite worn', '2007-01-23', '2008-06-21', 'Available', 'Book', '120'),
(13, 'The School for Good and Evil', ' Paul Feig', '../images/Group 58.jpg', 'Acceptable', '2022-10-18', '2023-01-01', 'Available', 'Book', '120'),
(14, 'Enola Holmes', 'Harry Bradbeer', '../images/Group 59.jpg', 'Good condition', '2020-09-23', '2020-12-11', 'Available', 'Book', '120'),
(15, 'Red Notice', ' Rawson Marshall Thurber', '../images/Group 60.jpg', 'Torn', '2023-03-01', '2021-11-04', 'Available', 'Book', '120');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `Nickname` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `CIN` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Penalty_Count` int(11) DEFAULT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Creation_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`Nickname`, `Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`, `Creation_Date`) VALUES
(1, 'ilias', '7173ea26ee2d2c6de8bff54988bc0928', 0, 'ilias@gmail.com', 'ilias@gmail.com', '0626916989', 'KB2323', 'Etudiant', 0, '2001-08-07', '0000-00-00'),
(4, 'admin', 'd982dd186b9a948fa00aeb20fc01ae8c', 1, 'admin house', 'admin@gmail.com', '062626262', 'KB56565', 'Etudiant', 0, '2001-08-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_Code` int(11) NOT NULL,
  `Reservation_Date` date DEFAULT NULL,
  `Reservation_Expiration_Date` date DEFAULT NULL,
  `Collection_Code` int(11) NOT NULL,
  `Nickname` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`Reservation_Code`, `Reservation_Date`, `Reservation_Expiration_Date`, `Collection_Code`, `Nickname`) VALUES
(5, '2023-04-03', '2023-04-03', 3, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`Borrowing_Code`),
  FOREIGN KEY (`Reservation_Code`),
REFERENCES `reservation`(`Reservation_Code`),
ON DELETE CASCADE;
  ADD UNIQUE KEY `Reservation_Code` (`Reservation_Code`),
  ADD KEY `Collection_Code` (`Collection_Code`),
  ADD KEY `Nickname` (`Nickname`)



--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`Collection_Code`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Nickname`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_Code`),
  ADD KEY `Collection_Code` (`Collection_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `Borrowing_Code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `collection`
--
ALTER TABLE `collection`
  MODIFY `Collection_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `Nickname` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`Collection_Code`) REFERENCES `collection` (`Collection_Code`),
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`),
  ADD CONSTRAINT `borrowings_ibfk_3` FOREIGN KEY (`Reservation_Code`) REFERENCES `reservation` (`Reservation_Code`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Collection_Code`) REFERENCES `collection` (`Collection_Code`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
