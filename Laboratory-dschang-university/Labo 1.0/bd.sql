-- my data base

DROP DATABASE IF EXISTS lab;

CREATE DATABASE lab;
use lab;


CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL UNIQUE,
  `password` varchar(40) NOT NULL,
   PRIMARY KEY (`id_admin`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`id_admin`,`username`,`email`,`password`) VALUES( 1,'Fotso','fotyvarosly@gmail.com','123456789');

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL UNIQUE,
  `authtoken` varchar(40) NOT NULL UNIQUE,
  `password` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(10) NOT NULL DEFAULT 'user',
  `status` varchar(25) NOT NULL DEFAULT 'Non Actif',
  `image` varchar(50) NOT NULL,
   PRIMARY KEY (`id_user`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `article` (
  `id_arti` INT(10) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) NOT NULL,
  `lien` varchar(40) NOT NULL,
  `resume` varchar(40) NOT NULL,
  `id_user_post` INT(10) NOT NULL,
  `auteurs` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_arti`),
   CONSTRAINT fka FOREIGN KEY (`id_user_post`) REFERENCES user(`id_user`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `arti_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `comment_sender_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
   -- CONSTRAINT fkca FOREIGN KEY (`arti_id`) REFERENCES article(`id_arti`)

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like_unlike`
--

CREATE TABLE `tbl_like_unlike` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `like_unlike` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_like_unlike`
--
ALTER TABLE `tbl_like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_like_unlike`
--
ALTER TABLE `tbl_like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;



CREATE TABLE `probleme` (
  `id_pb` int(10) NOT NULL AUTO_INCREMENT,
  `id_sender` int(10) NOT NULL,
  `messageP` varchar(1000) NOT NULL,
  `dateP` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   PRIMARY KEY (`id_pb`),
   CONSTRAINT fkap FOREIGN KEY (`id_sender`) REFERENCES user(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `reponse` (
  `id_rp` int(10) NOT NULL AUTO_INCREMENT,
  `problem_id` int(50) NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `messageR` varchar(1000) NOT NULL,
  `dateR` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
   PRIMARY KEY (`id_rp`),
   CONSTRAINT fkar FOREIGN KEY (`problem_id`) REFERENCES probleme(`id_pb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `subcribeNotification` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `status` INT(10) DEFAULT NULL,
  `email_user` varchar(1000) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `evenement_futur` (
  `id_even` INT(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_even`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `evenement_pass` (
  `id_even` INT(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_even`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `gallery` (
  `id_img` INT(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `video` (
  `id_vid` INT(10) NOT NULL AUTO_INCREMENT,
  `video` varchar(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_vid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `document` (
  `id_doc` INT(10) NOT NULL AUTO_INCREMENT,
  `file`  varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `partenaire_university` (
  `id_part` INT(10) NOT NULL AUTO_INCREMENT,
  `lien` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `partenaire_collaborator` (
  `id_part` INT(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id_part`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `contatc_us` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `email_sender` varchar(40) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `chats` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `id_sender` INT(10) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;





-- Etudiant/collaborateur

INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 1,'asset/alimentation/collaborateur/Josue_R.png','Josué TCHOUANTI FOTSO','PhD in Applied Mathematics  Research interests:My research work focus on the development of stochastic individual based models in population dynamics and analysis of their scaling limits for large populations and slow or fast dynamics, with a main interest in bacterial growth in the chemostat. I mainly deal with measure-valued stochastic processes for structured populations, Stochastic differential equations, Ordinary differential equations and Partial differential equations.I am also interested in the development of statistical tests of independence for stochastic point processes with a main application to the detection of neural synchronization. In this vein, I mainly deal with mean-field models of spiking neural networks and Hawkes processes.','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 2,'asset/alimentation/collaborateur/Yves_R.png','Yves Fotso Fotso','PhD in Applied Mathematics Research interests: Development, analysis and control of mathematical models in epidemiology and ecology with the main application crop protection. I deal with Mathematical models that rely on (but not limited to) Ordinary differential equations (ODEs), Partial differential equations (PDEs), Impulsive differential equations (IDEs) and also the problems of optimization and optimal control.','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 3,'asset/alimentation/collaborateur/Descriptif_Thierry.png','Descriptif_Thierry','currently works as Postdoc researcher at the Faculty of Computer Science and naXys Institute, University of Namur.Thierry does research in Complex Networks and their application, Opinion dynamics, Dynamical systems, collective behavior and consensus, Hypergraph Theory ect.','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 4,'asset/alimentation/collaborateur/SIMO.png','SIMO Gaël Rosain','is an instructor in the physics department of the University of Dschang in Dschang, Cameroon. He obtained a master\'s degree in electronics, electrical engineering and automation at the same university in 2017 and also did his PhD there.His main research work focuses on the analysis of collective behavior in complex networks. He is also strongly interested in automation and the application of data sciences to the industrial world.','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 5,'asset/alimentation/collaborateur/Moclis_LAMBU.png','Moclis_LAMBU','Système complexes multi couches, Interruptions brusques, Synchronisation, états chimère, Système Neurologique.Objectifs : Déterminer l’influence des interruptions sur la dynamique des réseaux de neurones biologique.','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 6,'asset/alimentation/collaborateur/ZEMTCHOUFrancis rolphe.png','ZEMTCHOU Francis rolphe','Mail : franciszemtchou9@gmail.com .Etudiant chercheur à l’université de Dschang, département de physique. Travaille actuellement dans les domaines de la récolte d’énergie et de la synchronisation des systèmes mécaniques.Nous cherchons le moyen d’optimiser les rendements énergétique de certains types de capteurs pour ainsi rendre plus accessible les sources d’énergie propres environnantes.Nous cherchons le moyen d’optimiser les rendements énergétique de certains types de capteurs pour ainsi rendre plus accessible les sources d’énergie propres environnantes.','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 7,'asset/alimentation/collaborateur/NGUEFOUEMELIVenceslas.png','NGUEFOUE MELI Venceslas','PhD student, University of Dschang.URMACETS (Unité de Recherche de Matière Condensée, d’Electronique et de Traitement de Signal)','2018/05/10');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 8,'asset/alimentation/collaborateur/carinePhoto.png','SIMO FOTSO Carine','Ph.D student in physics in the field of Machine learning and optimal control applied to biological systems','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 9,'asset/alimentation/collaborateur/Photo_Joyceline.png','FEUKENG TEUMENE Joyceline','Systèmes Complexes,Effets de la nature (climat) --Dynamique des populations animales','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 10,'asset/alimentation/collaborateur/FOUELIFACKNGUE.png','FOUELIFACK NGUESSAP Ediline Laurence','Field of research: Neuroscience and machine learning.  Complex systems present complex spatial temporal behaviors namely chimera, coherent, incoherent state, multichimera state, clusters ... There are strong indications that such behaviors may be generally ubiquitous in natural systems containing a large number of interconnected elements. Biological systems present surprising partial or total behaviors linked to the self-organization of the elements that constitute them. These are then considered as complex dynamical systems. ','2022/02/01');
INSERT INTO `partenaire_collaborator` (`id_part`,`image`,`nom`,`description`,`date`) VALUES( 11,'asset/alimentation/collaborateur/MEGUEDONGYOTA.png','MEGUEDONG YOTA Adèle','Etudiante chercheuse dans la modélisation des systèmes complexes.Il sera question pour nous de Caractériser les différents comportements dans un réseau à base de l’information.','2022/02/01');

-- universite
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 1,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 2,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 3,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 4,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 5,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 6,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 7,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');
INSERT INTO `partenaire_university` (`id_part`,`lien`,`image`,`nom`,`date`) VALUES( 8,'https://www.univ-dschang.org','asset/alimentation/universite/UDS.jpg','visite','2022/02/01');



-- evenement

INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 1,'asset/alimentation/gallery/1.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 2,'asset/alimentation/gallery/2.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 3,'asset/alimentation/gallery/3.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 4,'asset/alimentation/gallery/4.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 5,'asset/alimentation/gallery/5.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 6,'asset/alimentation/gallery/6.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 7,'asset/alimentation/gallery/7.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 8,'asset/alimentation/gallery/8.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 9,'asset/alimentation/gallery/9.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 10,'asset/alimentation/gallery/10.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `evenement_pass` (`id_even`,`image`,`nom`,`description`,`date`) VALUES( 11,'asset/alimentation/gallery/11.jpg','seminaire','Seminaire du Labo','2018/05/10');


-- gallery

INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 1,'asset/alimentation/gallery/1.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 2,'asset/alimentation/gallery/2.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 3,'asset/alimentation/gallery/3.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 4,'asset/alimentation/gallery/4.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 5,'asset/alimentation/gallery/5.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 6,'asset/alimentation/gallery/6.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 7,'asset/alimentation/gallery/7.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 8,'asset/alimentation/gallery/8.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 9,'asset/alimentation/gallery/9.jpg','visite','Visite Of Prof Belverly','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 10,'asset/alimentation/gallery/10.jpg','seminaire','Seminaire du Labo','2018/05/10');
INSERT INTO `gallery` (`id_img`,`image`,`nom`,`description`,`date`) VALUES( 11,'asset/alimentation/gallery/11.jpg','seminaire','Seminaire du Labo','2018/05/10');

