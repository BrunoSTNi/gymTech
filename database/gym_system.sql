-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gym_system
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `manufacturer` varchar(100) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `last_maintenance` date DEFAULT NULL,
  `next_maintenance` date DEFAULT NULL,
  `status` enum('ativo','manutencao','inativo') DEFAULT 'ativo',
  `creates_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipments`
--

LOCK TABLES `equipments` WRITE;
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;
INSERT INTO `equipments` VALUES (1,'Máquina de Supino Inclinado articulado','Musculação','MUS-001','Life Fitness','2025-01-15','2026-05-10','2026-11-10','inativo','2026-06-23 14:17:06'),(2,'Cadeira Extensora de Pernas','Musculação','MUS-002','Movement','2025-03-20','2026-06-18','2026-12-18','ativo','2026-06-23 14:18:31'),(3,'Esteira Ergométrica Profissional X7','Cardio','CAR-001','Matrix Fitness','2024-02-10','2026-06-05','2026-09-05','manutencao','2026-06-23 14:21:07'),(6,'Escada Ergometrica Funcional','Funcional','FUN-002','Matrix Fitness','2025-10-30','2025-10-30','2026-10-15','ativo','2026-06-23 14:22:55');
/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercises`
--

DROP TABLE IF EXISTS `exercises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `muscle_group` varchar(100) DEFAULT NULL,
  `equipment` varchar(100) DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `difficulty` varchar(30) DEFAULT NULL,
  `objective` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercises`
--

LOCK TABLES `exercises` WRITE;
/*!40000 ALTER TABLE `exercises` DISABLE KEYS */;
INSERT INTO `exercises` VALUES (1,'Supino Reto','Peito','Barra','https://www.instagram.com/reel/DRmdlGqihgE/','Deite no banco, segure a barra na largura dos ombros e empurre verticalmente após tocar levemente o peito.','2026-05-26 18:49:44','Iniciante','Hipertrofia'),(2,'Supino Inclinado','Peito','Halteres','','Realize o movimento em banco inclinado focando na contração da porção superior do peitoral.','2026-05-26 18:49:44','Iniciante','Hipertrofia'),(3,'Rosca Direta','Bíceps','Barra','','Segure a barra com pegada supinada na largura dos ombros. Flexione os cotovelos elevando a barra até próximo ao peito e retorne lentamente à posição inicial.','2026-05-26 18:49:44','Iniciante','Hipertrofia'),(4,'Puxada Frontal','Costas','Polia','','Puxe a barra em direção ao peito mantendo o tronco levemente inclinado e retornando de forma controlada.','2026-05-26 18:49:44','Iniciante','Hipertrofia'),(5,'Agachamento Livre','Pernas','Barra','','Desça até aproximadamente 90° de flexão dos joelhos mantendo a coluna neutra.','2026-05-26 18:49:44','Avançado','Hipertrofia'),(6,'Leg Press horizontal','Pernas','Máquina','','Empurre a plataforma sem estender completamente os joelhos.','2026-05-26 18:49:44','Iniciante','Hipertrofia'),(7,'Desenvolvimento','Ombros','Halteres','','Sentado ou em pé, empurre a barra ou os halteres acima da cabeça até quase a extensão completa dos braços e retorne controladamente.','2026-05-26 18:49:44','Intermediário','Hipertrofia'),(10,'Supino Declinado','Peito','Barra','','Realizado em banco declinado com foco na parte inferior do peitoral.','2026-06-03 20:15:17','Intermediário','Hipertrofia'),(11,'Crucifixo','Peito','Halteres','','Abra os braços em arco até sentir o alongamento do peitoral e retorne controladamente.','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(12,'Puxada Aberta Frontal','Costas','Polia','','Utilize pegada aberta e puxe a barra até a altura do peito focando na contração do dorsal.','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(13,'Puxada Fechada Frontal','Costas','Polia','','Utilize pegada neutra e puxe o acessório em direção ao peito mantendo os ombros estabilizados','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(14,'Remada Curvada','Costas','Barra','','Incline o tronco aproximadamente 45° e puxe a barra em direção ao abdômen mantendo a coluna neutra.','2026-06-03 20:15:17','Intermediário','Hipertrofia'),(15,'Serrote','Costas','Halteres','','Apoie um joelho e uma mão no banco e puxe o halter em direção ao quadril.','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(17,'Rosca Martelo','Bíceps','Halteres','','Segure os halteres com as palmas voltadas uma para a outra e realize a flexão dos cotovelos mantendo os punhos neutros','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(18,'Tríceps Corda','Tríceps','Polia','','Empurre a corda para baixo separando as mãos ao final do movimento.','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(19,'Tríceps Testa','Tríceps','Halteres','','Leve a barra em direção à testa e retorne à extensão dos cotovelos','2026-06-03 20:15:17','Intermediário','Hipertrofia'),(21,'Leg Press 45','Pernas','Máquina','','Empurre a plataforma sem estender completamente os joelhos.','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(22,'Cadeira Extensora','Pernas','Máquina','','Estenda os joelhos até próximo da extensão completa e retorne lentamente.','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(23,'Cadeira Flexora','Pernas','Máquina','','Flexione os joelhos aproximando os calcanhares dos glúteos.','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(24,'Mesa Flexora','Pernas','Máquina','','Flexione os joelhos contra a resistência da máquina mantendo o quadril apoiado','2026-06-03 20:15:17','Iniciante','Hipertrofia'),(25,'Stiff','Pernas','Halteres','','Incline o tronco mantendo a coluna neutra e leve a barra próxima às pernas durante todo o movimento.','2026-06-03 20:15:17','Intermediário','Hipertrofia'),(27,'Crucifixo Inclinado','Peito','Halteres','','Realize o mesmo movimento do crucifixo tradicional utilizando um banco inclinado entre 30° e 45°.','2026-07-02 19:58:34','Intermediário','Hipertrofia'),(28,'Peck Deck','Peito','Máquina','','Ajuste o banco para que as mãos fiquem alinhadas ao peito e aproxime os braços à frente do corpo controlando o retorno.','2026-07-02 20:01:23','Iniciante','Hipertrofia'),(29,'Crossover Alto','Peito','Polia','','Puxe os cabos em direção à frente e para baixo até que as mãos se encontrem à frente do quadril.','2026-07-02 20:02:38','Intermediário','Hipertrofia'),(30,'Crossover Baixo','Peito','Polia','','Puxe os cabos de baixo para cima em direção ao centro do peito','2026-07-02 20:03:06','Intermediário','Hipertrofia'),(31,'Supino Máquina','Peito','Máquina','','Empurre os braços da máquina até próximo da extensão completa dos cotovelos e retorne controladamente.','2026-07-02 20:03:33','Iniciante','Hipertrofia'),(32,'Supino com Halteres','Peito','Halteres','','Desça os halteres lateralmente até a linha do peito e empurre-os novamente para cima.','2026-07-02 20:03:53','Intermediário','Hipertrofia'),(33,'Remada Baixa','Costas','Polia','','Puxe o triângulo em direção ao abdômen mantendo a coluna ereta e retraindo as escápulas.','2026-07-02 20:05:44','Iniciante','Hipertrofia'),(34,'Remada Unilateral','Costas','Máquina','','Realize o movimento de puxada com um braço por vez, mantendo o tronco estável.','2026-07-02 20:06:03','Iniciante','Hipertrofia'),(35,'Remada Cavalinho','Costas','Barra','','Incline o tronco e puxe a barra em direção ao abdômen mantendo o peito aberto.','2026-07-02 20:06:38','Intermediário','Hipertrofia'),(36,'Barra Fixa','Costas','Barra','','Puxe o corpo até o queixo ultrapassar a barra e retorne lentamente.','2026-07-02 20:06:58','Avançado','Hipertrofia'),(37,'Pulldown','Costas','Polia','','Com os braços quase estendidos, empurre a barra em direção ao quadril utilizando principalmente os dorsais.','2026-07-02 20:39:23','Intermediário','Hipertrofia'),(38,'Levantamento Terra','Costas','Barra','','Levante a barra do solo mantendo a coluna neutra e a barra próxima ao corpo durante todo o movimento','2026-07-02 20:51:59','Avançado','Hipertrofia'),(39,'Desenvolvimento Arnold','Ombros','Halteres','','Inicie com os halteres à frente do rosto e as palmas voltadas para você, girando os braços durante a subida até finalizar com as palmas voltadas para frente.','2026-07-02 20:53:54','Intermediário','Hipertrofia'),(40,'Desenvolvimento Máquina','Ombros','Máquina','','Empurre os braços da máquina acima da cabeça e retorne lentamente à posição inicial.','2026-07-02 20:54:18','Iniciante','Hipertrofia'),(41,'Elevação Lateral','Ombros','Halteres','','Eleve os braços lateralmente até aproximadamente a altura dos ombros mantendo os cotovelos levemente flexionados.','2026-07-02 20:54:33','Iniciante','Hipertrofia'),(42,'Elevação Frontal','Ombros','Halteres','','Levante a carga à frente do corpo até a altura dos ombros e retorne lentamente.','2026-07-02 20:54:58','Iniciante','Hipertrofia'),(43,'Crucifixo Inverso','Ombros','Máquina','','Incline o tronco ou utilize a máquina e abra os braços lateralmente contraindo a parte posterior dos ombros.','2026-07-02 20:55:30','Intermediário','Hipertrofia'),(44,'Face Pull','Ombros','Polia','','Puxe a corda em direção ao rosto mantendo os cotovelos elevados e afastando as mãos ao final do movimento.','2026-07-02 20:55:47','Iniciante','Hipertrofia'),(45,'Remada Alta','Ombros','Barra','','Puxe a barra próxima ao corpo até a altura do peito mantendo os cotovelos elevados.','2026-07-02 20:56:10','Intermediário','Hipertrofia'),(46,'Encolhimento','Ombros','Halteres','','Eleve os ombros em direção às orelhas mantendo os braços estendidos durante todo o movimento.','2026-07-02 20:56:43','Iniciante','Hipertrofia'),(47,'Elevação Lateral na Polia','Ombros','Polia','','Realize a elevação lateral utilizando a polia baixa, mantendo o movimento controlado durante toda a amplitude','2026-07-02 20:57:06','Intermediário','Hipertrofia'),(48,'Rosca Alternada','Bíceps','Halteres','','Realize a flexão dos braços alternadamente, controlando a descida.','2026-07-03 11:18:46','Iniciante','Hipertrofia'),(49,'Rosca Concentrada','Bíceps','Halteres','','Apoie o cotovelo na parte interna da coxa e execute a flexão lentamente.','2026-07-03 11:19:24','Intermediário','Hipertrofia'),(50,'Rosca Scott','Bíceps','Barra','','Apoie os braços no banco Scott e realize a flexão completa dos cotovelos.','2026-07-03 11:19:52','Intermediário','Hipertrofia'),(51,'Rosca Inversa','Bíceps','Barra','','Execute a rosca utilizando pegada pronada','2026-07-03 11:20:45','Intermediário','Hipertrofia'),(52,'Rosca 21','Bíceps','Barra','','Faça 7 repetições da metade inferior, 7 da metade superior e 7 completas.','2026-07-03 11:21:08','Avançado','Hipertrofia'),(53,'Tríceps Pulley','Tríceps','Polia','','Estenda os cotovelos empurrando a barra até a extensão completa.','2026-07-03 11:21:43','Iniciante','Hipertrofia'),(54,'Tríceps Francês','Tríceps','Barra','','Flexione os cotovelos levando a carga atrás da cabeça e estenda novamente.','2026-07-03 11:22:41','Intermediário','Hipertrofia'),(55,'Tríceps Coice','Tríceps','Halteres','','Incline o tronco e estenda o braço para trás mantendo o cotovelo fixo.','2026-07-03 11:28:09','Intermediário','Hipertrofia'),(56,'Tríceps Banco','Tríceps','Peso Corporal','','Apoie as mãos no banco e realize a flexão dos cotovelos utilizando o peso corporal.','2026-07-03 11:28:33','Iniciante','Hipertrofia'),(57,'Mergulho em Paralelas','Tríceps','Peso Corporal','','Desça o corpo até aproximadamente 90° nos cotovelos e retorne.','2026-07-03 11:28:59','Avançado','Força'),(58,'Hack Machine','Pernas','Máquina','','','2026-07-03 11:36:37','Intermediário','Hipertrofia'),(59,'Afundo','Pernas','Halteres','','','2026-07-03 11:37:06','Intermediário','Hipertrofia'),(60,'Agachamento Búlgaro','Pernas','Halteres','','','2026-07-03 11:37:25','Intermediário','Hipertrofia'),(61,'Levantamento Terra Romeno','Pernas','Barra','','','2026-07-03 11:37:45','Intermediário','Hipertrofia'),(62,'Elevação Pélvica','Pernas','Barra','','','2026-07-03 11:38:06','Iniciante','Hipertrofia'),(63,'Coice na Polia','Pernas','Polia','','','2026-07-03 11:38:18','Iniciante','Hipertrofia'),(64,'Abdução','Pernas','Máquina','','','2026-07-03 11:38:31','Iniciante','Hipertrofia'),(65,'Panturrilha em Pé','Panturrilha','Smith','','','2026-07-03 11:38:54','Iniciante','Hipertrofia'),(66,'Panturrilha em Pé','Panturrilha','Máquina','','','2026-07-03 11:39:29','Iniciante','Hipertrofia'),(67,'Panturrilha Unilateral','Panturrilha','Peso Corporal','','','2026-07-03 11:39:51','Intermediário','Hipertrofia'),(68,'Abdominal Tradicional','Abdômen','Peso Corporal','','','2026-07-03 11:40:05','Iniciante','Hipertrofia'),(69,'Abdominal Infra','Abdômen','Peso Corporal','','','2026-07-03 11:40:16','Iniciante','Hipertrofia'),(70,'Abdominal Máquina','Abdômen','Máquina','','','2026-07-03 11:40:29','Iniciante','Hipertrofia'),(71,'Abdominal Oblíquo','Abdômen','Peso Corporal','','','2026-07-03 11:40:54','Iniciante','Hipertrofia'),(72,'Prancha','Abdômen','Peso Corporal','','','2026-07-03 11:41:07','Intermediário','Hipertrofia'),(73,'Prancha Lateral','Abdômen','Peso Corporal','','','2026-07-03 11:41:23','Intermediário','Hipertrofia'),(74,'Elevação de Pernas','Abdômen','Máquina','','','2026-07-03 11:41:44','Intermediário','Hipertrofia'),(75,'Caminhada na Esteira','Cardio','Outro','','','2026-07-03 11:42:36','Iniciante','Emagrecimento'),(76,'Corrida na Esteira','Cardio','Outro','','','2026-07-03 11:42:58','Intermediário','Emagrecimento'),(77,'Bicicleta Ergométrica','Cardio','Outro','','','2026-07-03 11:43:10','Iniciante','Emagrecimento'),(78,'Elíptico','Cardio','Outro','','','2026-07-03 11:43:27','Intermediário','Emagrecimento'),(79,'Escada','Cardio','Outro','','','2026-07-03 11:43:41','Intermediário','Emagrecimento');
/*!40000 ALTER TABLE `exercises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (1,'Básico',99.90,30,'Acesso livre à área de musculação e aeróbico em horários tradicionais. Taxa de matrícula padrão','2026-05-25 19:01:02'),(2,'Premium',149.90,30,'Acesso total à musculação + livre acesso a todas as aulas coletivas (Spinning, FitDance, Pilates, Yoga) + direito a levar 1 convidado por mês para treinar junto','2026-05-25 19:01:02'),(3,'VIP',299.90,30,'Acesso total à musculação e aulas + 1 avaliação física e bioimpedância por mês + acesso à área de SPA/Sauna + 2 sessões agendadas de consultoria com Personal Trainer da casa por mês','2026-05-25 19:01:02'),(6,'Anual Gold',89.90,365,'Acesso total + 1 avaliação física gratuita por trimestre + direito a trancar o plano por até 30 dias','2026-06-25 11:55:03'),(7,'Corporate Fit',69.90,30,'Acesso total + isenção da taxa de matrícula','2026-06-25 11:55:53'),(8,'Semestral Premium',104.90,180,'Acesso total + aulas coletivas + direito a 1 convidado por mês','2026-06-25 11:56:24');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `objective` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `plan_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `training_days` int(11) DEFAULT NULL,
  `experience_level` enum('beginner','intermediate','advanced') DEFAULT NULL,
  `limitations` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_plan` (`plan_id`),
  KEY `fk_student_user` (`user_id`),
  CONSTRAINT `fk_plan` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  CONSTRAINT `fk_student_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (13,'Bruno Stuani','bruno.stuani064@gmail.com',16,'Hipertrofia','2026-06-24 14:49:31',1,NULL,NULL,NULL,NULL),(14,'Bruna Vargas','bruna@gmail.com',19,'Emagrecimento','2026-06-24 14:49:54',3,NULL,NULL,NULL,NULL),(15,'Carlos','carlos@gmail.com',29,'Força','2026-06-24 14:50:14',2,NULL,NULL,NULL,NULL),(16,'Rodrigo','rodrigo@gmail.com',52,'Hipertrofia','2026-06-24 14:50:38',1,NULL,NULL,NULL,NULL),(17,'João Vitor','joaovitor@gmail.com',21,'Força','2026-06-25 14:52:00',7,NULL,NULL,NULL,NULL),(18,'Jonas Araujo','jonas@gamil.com',52,'Emagrecimento','2026-06-25 14:52:29',3,NULL,NULL,NULL,NULL),(19,'Luisa','luisa@gmail.com',15,'Hipertrofia','2026-06-25 14:52:49',6,NULL,NULL,NULL,NULL),(20,'Julia Rodrigues','julia@gmail.com',16,'Emagrecimento','2026-06-25 14:53:14',8,NULL,NULL,NULL,NULL),(21,'Nathan Silva','nathan@gmail.com',17,'Hipertrofia','2026-06-25 14:53:51',1,NULL,NULL,NULL,NULL),(22,'Emanuel Souza','emanuel@gmail.com',22,'Emagrecimento','2026-06-25 14:54:22',2,NULL,NULL,NULL,NULL),(23,'Bruno Silva','bruno@gmail.com',13,'Emagrecimento','2026-06-26 21:38:33',1,NULL,NULL,NULL,NULL),(24,'joao','joao@gmail.com',26,'Hipertrofia','2026-06-29 19:56:05',1,3,NULL,NULL,NULL),(25,'Sergio','sergio@gmail.com',14,'Emagrecimento','2026-07-06 21:04:45',1,4,5,'','');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student') DEFAULT 'student',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_login` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Bruno','admin@gym.com','$2y$10$Re4npqQ3tGuv24OJ.y41MelMhJzxr9ijh5Z//NZd3davOFW5VyuJG','admin','2026-05-25 14:13:45',0),(2,'Bruno Silva','bruno@gmail.com','$2y$10$84xYABcZ/uCi..gYfyEVK.bHfwHKkK6sW6W1ZJ9/bUKMkLnnSvTwG','student','2026-06-26 21:38:33',0),(3,'joao','joao@gmail.com','$2y$10$OQci7Z5GheKh3lmxt5rDoepjgXgOUFMmVq48PY3tMIS0XThhLm2c2','student','2026-06-29 19:56:05',0),(4,'Sergio','sergio@gmail.com','$2y$10$gVCJ0lCUMRrzLYVpOLUlg.vQXSimpCOCUWrytBnujexqIBsH1vvNa','student','2026-07-06 21:04:45',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workout_exercises`
--

DROP TABLE IF EXISTS `workout_exercises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workout_exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workout_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `sets` int(11) DEFAULT NULL,
  `reps` varchar(50) DEFAULT NULL,
  `rest_time` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exercise_id` (`exercise_id`),
  KEY `workout_exercises_ibfk_1` (`workout_id`),
  CONSTRAINT `workout_exercises_ibfk_1` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `workout_exercises_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workout_exercises`
--

LOCK TABLES `workout_exercises` WRITE;
/*!40000 ALTER TABLE `workout_exercises` DISABLE KEYS */;
INSERT INTO `workout_exercises` VALUES (6,8,2,4,'12','90',''),(7,8,10,3,'8-12','90',''),(8,8,11,4,'8-12','90',''),(9,8,1,3,'8-12','90',''),(10,8,18,4,'8-12','90',''),(11,8,19,4,'8-12','90',''),(111,27,11,3,'12-15','45','Gerado automaticamente pela IA'),(112,27,2,3,'12-15','45','Gerado automaticamente pela IA'),(113,27,31,3,'12-15','45','Gerado automaticamente pela IA'),(114,28,15,3,'12-15','45','Gerado automaticamente pela IA'),(115,28,33,3,'12-15','45','Gerado automaticamente pela IA'),(116,28,34,3,'12-15','45','Gerado automaticamente pela IA'),(117,29,62,3,'12-15','45','Gerado automaticamente pela IA'),(118,29,22,3,'12-15','45','Gerado automaticamente pela IA'),(119,29,63,3,'12-15','45','Gerado automaticamente pela IA'),(120,29,65,3,'12-15','45','Gerado automaticamente pela IA'),(121,29,66,3,'12-15','45','Gerado automaticamente pela IA'),(122,30,44,3,'12-15','45','Gerado automaticamente pela IA'),(123,30,41,3,'12-15','45','Gerado automaticamente pela IA'),(124,30,46,3,'12-15','45','Gerado automaticamente pela IA'),(125,31,48,3,'12-15','45','Gerado automaticamente pela IA'),(126,31,17,3,'12-15','45','Gerado automaticamente pela IA'),(127,31,3,3,'12-15','45','Gerado automaticamente pela IA'),(128,31,56,3,'12-15','45','Gerado automaticamente pela IA'),(129,31,18,3,'12-15','45','Gerado automaticamente pela IA'),(130,31,53,3,'12-15','45','Gerado automaticamente pela IA'),(131,31,71,3,'12-15','45','Gerado automaticamente pela IA'),(132,31,70,3,'12-15','45','Gerado automaticamente pela IA'),(133,31,68,3,'12-15','45','Gerado automaticamente pela IA');
/*!40000 ALTER TABLE `workout_exercises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workouts`
--

DROP TABLE IF EXISTS `workouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `workout_name` varchar(10) DEFAULT NULL,
  `objective` varchar(100) DEFAULT NULL,
  `training_days` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `trainer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_workout_trainer` (`trainer_id`),
  KEY `workouts_ibfk_1` (`student_id`),
  CONSTRAINT `fk_workout_trainer` FOREIGN KEY (`trainer_id`) REFERENCES `users` (`id`),
  CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workouts`
--

LOCK TABLES `workouts` WRITE;
/*!40000 ALTER TABLE `workouts` DISABLE KEYS */;
INSERT INTO `workouts` VALUES (8,13,'Treino A','Hipertrofia',5,'2026-06-25 10:59:50',NULL),(9,16,'Treino B','Hipertrofia',7,'2026-06-25 11:27:56',1),(10,21,'Treino A','Hipertrofia',5,'2026-06-30 11:26:54',1),(11,18,'Treino A','Hipertrofia',5,'2026-07-02 16:28:04',NULL),(27,25,'Treino A','Emagrecimento',5,'2026-07-06 21:09:07',NULL),(28,25,'Treino B','Emagrecimento',5,'2026-07-06 21:09:07',NULL),(29,25,'Treino C','Emagrecimento',5,'2026-07-06 21:09:07',NULL),(30,25,'Treino D','Emagrecimento',5,'2026-07-06 21:09:07',NULL),(31,25,'Treino E','Emagrecimento',5,'2026-07-06 21:09:07',NULL);
/*!40000 ALTER TABLE `workouts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-06 18:21:27
