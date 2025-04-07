-- MySQL dump 10.13  Distrib 8.0.22, for macos10.15 (x86_64)
--
-- Host: localhost    Database: ECareDB
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointment` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_user_id` int NOT NULL,
  `address` varchar(125) DEFAULT NULL,
  `doctor_doctor_id` int NOT NULL,
  PRIMARY KEY (`appointment_id`,`user_user_id`,`doctor_doctor_id`),
  KEY `fk_appointment_user_idx` (`user_user_id`),
  KEY `fk_appointmentt_doctor_idx` (`doctor_doctor_id`),
  CONSTRAINT `fk_appointment_user` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_appointmentt_doctor` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout` (
  `checkout_id` int NOT NULL,
  `user_id` int NOT NULL,
  `products` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`checkout_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `doctor_id` int NOT NULL AUTO_INCREMENT,
  `hospital_hospital_id` int NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Female','Male','Other') NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `license_number` varchar(45) DEFAULT NULL,
  `specialization` varchar(45) DEFAULT NULL,
  `education` varchar(125) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`doctor_id`,`hospital_hospital_id`),
  UNIQUE KEY `doctor_id_UNIQUE` (`doctor_id`),
  KEY `fk_doctor_hospital1_idx` (`hospital_hospital_id`),
  CONSTRAINT `fk_doctor_hospital1` FOREIGN KEY (`hospital_hospital_id`) REFERENCES `hospital` (`hospital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (4,76,'Lowe','Lodir','1895-08-05','Male','doctor578@gmail.com','0699577458','123 Main','Midrand','Gauteng','1685','License1','Cardiology','University of Pretoria','$2y$10$GSkbHfDJsmMlFDySBAY5VeQEKW49Rr18sUTTi.AgeEhr5qAh5nZ2W','assets/images/uploads/662b0bbb762980.49736204.jpg','2024-04-26 04:04:43','2024-04-26 16:15:08'),(9,76,'Mia','Morena','1887-12-25','Male','mia000@mail.com','063123456','44 Alsatian Rd\r\nGlen Austin AH','Midrand','Gauteng','1685','License02','Cardiology','University of Pretoria','$2y$10$hvBeo4tfKTGTr30Whspeb.K7/2a9wto4elIpLdonPWtwL8dkrB6JO','assets/images/uploads/6675b58394dc22.90334724.png','2024-06-21 19:16:51','2024-06-26 17:17:04');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hospital` (
  `hospital_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `province` varchar(45) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (11,'Cecilia Makiwane Hospital','Eastern Cape','4 Billie Rd, Mdantsane','East London','043 708 2111'),(12,'Duncan Village Day Hospital','Eastern Cape','Douglas Smith Highway','East London','043 742 4768'),(13,'Fort Grey TB Hospital','Eastern Cape','Farm Grey Dell Airport Phase 1, Fort Grey Location, Greenfields','East London','043 736 9850'),(14,'Frere Hospital','Eastern Cape','Amalinda Main Rd','East London','043 709 1111'),(15,'Life Beacon Bay Hospital','Eastern Cape','32 Quenera Dr','East London','043 711 5100'),(16,'East London Private Hospital','Eastern Cape','32 Albany St','East London','043 722 3128'),(17,'Life St Dominic\'s Hospital','Eastern Cape','45 St Marks Road','East London','043 707 9000'),(18,'Life St James Hospital','Eastern Cape','36 St James Road, Southernwood','East London','043 722 9685'),(19,'Life St. Marks Clinic','Eastern Cape','16 St Andrews Rd','East London','043 707 4400'),(20,'Nkqubela Chest Hospital','Eastern Cape','1124 Billie Rd, Mdantsane','Mdantsane','043 761 2131'),(21,'Bloemcare Psychiatric Hospital','Free State','11 A G Visser St','Bloemfontein','051 446 3242'),(22,'Nurture Hillandale Hospital','Free State','Woodland Hills Wildlife Estate 6, Woodland Hills Blvd','Bloemfontein','051 412 3300'),(23,'Mediclinic Bloemfontein','Free State','Kellner St & Parfitt Street, Westdene','Bloemfontein','051 404 6666'),(24,'Life Pasteur Hospital','Free State','54 Pasteur Dr','Bloemfontein','051 522 6601'),(25,'Life Rosepark Hospital','Free State','57 Gustav Cres','Bloemfontein','051 505 5111'),(26,'Pelonomi Private Hospital','Free State','121 Dr Belcher Road, Heidedal','Bloemfontein','051 407 1500'),(27,'Netcare Universitas Private Hospital','Free State','1 Logeman St','Bloemfontein','051 506 3500'),(28,'Free State Psychiatric Complex Hospital','Free State','35 Nico Van Der Merwe Avenue, Oranjesig','Bloemfontein','051 407 9911'),(29,'National District Hospital','Free State','Roth Ave & Kolbe Ave','Bloemfontein','051 493 9600'),(30,'Bongani Regional Hospital','Free State','Mothusi Road','Thabong','057 916 8000'),(31,'Ernest Oppenheimer Hospital','Free State','1 Power Rd','Welkom','057 900 9111'),(32,'Welkom Medi Clinic','Free State','Meulen Street','Welkom','057 916 5555'),(33,'Saint Helena Private Hospital','Free State','Hamlet Rd','Welkom','057 391 4611'),(53,'Cecilia Makiwane Hospital','Eastern Cape','4 Billie Rd, Mdantsane','East London','043 708 2111'),(54,'Duncan Village Day Hospital','Eastern Cape','Douglas Smith Highway','East London','043 742 4768'),(55,'Fort Grey TB Hospital','Eastern Cape','Farm Grey Dell Airport Phase 1, Fort Grey Location, Greenfields','East London','043 736 9850'),(56,'Frere Hospital','Eastern Cape','Amalinda Main Rd','East London','043 709 1111'),(57,'Life Beacon Bay Hospital','Eastern Cape','32 Quenera Dr','East London','043 711 5100'),(58,'East London Private Hospital','Eastern Cape','32 Albany St','East London','043 722 3128'),(59,'Life St Dominic\'s Hospital','Eastern Cape','45 St Marks Road','East London','043 707 9000'),(60,'Life St James Hospital','Eastern Cape','36 St James Road, Southernwood','East London','043 722 9685'),(61,'Life St. Marks Clinic','Eastern Cape','16 St Andrews Rd','East London','043 707 4400'),(62,'Nkqubela Chest Hospital','Eastern Cape','1124 Billie Rd, Mdantsane','Mdantsane','043 761 2131'),(63,'Bloemcare Psychiatric Hospital','Free State','11 A G Visser St','Bloemfontein','051 446 3242'),(64,'Nurture Hillandale Hospital','Free State','Woodland Hills Wildlife Estate 6, Woodland Hills Blvd','Bloemfontein','051 412 3300'),(65,'Mediclinic Bloemfontein','Free State','Kellner St & Parfitt Street, Westdene','Bloemfontein','051 404 6666'),(66,'Life Pasteur Hospital','Free State','54 Pasteur Dr','Bloemfontein','051 522 6601'),(67,'Life Rosepark Hospital','Free State','57 Gustav Cres','Bloemfontein','051 505 5111'),(68,'Pelonomi Private Hospital','Free State','121 Dr Belcher Road, Heidedal','Bloemfontein','051 407 1500'),(69,'Netcare Universitas Private Hospital','Free State','1 Logeman St','Bloemfontein','051 506 3500'),(70,'Free State Psychiatric Complex Hospital','Free State','35 Nico Van Der Merwe Avenue, Oranjesig','Bloemfontein','051 407 9911'),(71,'National District Hospital','Free State','Roth Ave & Kolbe Ave','Bloemfontein','051 493 9600'),(72,'Bongani Regional Hospital','Free State','Mothusi Road','Thabong','057 916 8000'),(73,'Ernest Oppenheimer Hospital','Free State','1 Power Rd','Welkom','057 900 9111'),(74,'Welkom Medi Clinic','Free State','Meulen Street','Welkom','057 916 5555'),(75,'Saint Helena Private Hospital','Free State','Hamlet Rd','Welkom','057 391 4611'),(76,'Bedford Gardens Hospital','Gauteng','7 Leicester Road, Bedford Gardens, Bedfordview','Johannesburg','011 677 8500'),(77,'Charlotte Maxeke Johannesburg Academic Hospital','Gauteng','Jubilee Rd','Johannesburg','011 488 4911'),(78,'Chris Hani Baragwanath Hospital','Gauteng','26 Chris Hani Rd','Johannesburg','011 933 8000'),(79,'Coronation Hospital','Gauteng','Corner Fuel and Oudtshoorn Street, Coronationville','Johannesburg','011 470 9000'),(80,'Gateway House','Gauteng','1 Campbell St','Johannesburg','011 440 0697'),(81,'Helen Joseph Hospital','Gauteng','1 Perth Rd, Westdene','Johannesburg','011 489 1011'),(82,'Leratong Hospital','Gauteng','1 Adcock St & Randfontein Road, Chamdor','Johannesburg','011 411 3500'),(83,'Mediclinic Morningside','Gauteng','Hill Roads, Sandton','Johannesburg','011 282 5000'),(84,'Mediclinic Sandton','Gauteng','Main Rd & Peter Place, Bryanston','Sandton','011 709 2000'),(85,'Nelson Mandela Children\'s Hospital','Gauteng','6 Jubilee Rd','Johannesburg','011 274 5600'),(86,'Netcare Garden City Hospital','Gauteng','35 Bartlett Rd','Mayfair West','011 495 5000'),(87,'Netcare Linksfield Hospital','Gauteng','24 12th Avenue, Orange Grove','Johannesburg','011 647 3400'),(88,'Milpark Hospital','Gauteng','9 Guild Rd, Parktown West','Johannesburg','011 480 5600'),(89,'Netcare Mulbarton Hospital','Gauteng','25 True N Rd, Mulbarton','Johannesburg','011 682 4300'),(90,'Netcare Olivedale Hospital','Gauteng','Netcare Olivedale Hospital, President Fouche & Windsor Way, Olivedale','Johannesburg','011 777 2000'),(91,'Netcare Park Lane Hospital','Gauteng','Junction Avenue & Park Lane, Hillbrow','Johannesburg','011 480 5600'),(92,'Netcare Pinehaven Hospital','Gauteng','1 Gateway Street, Pinehaven','Johannesburg','011 858 2000'),(93,'Netcare Rand Hospital','Gauteng','Selma Ave & Republic Rd, Bordeaux','Johannesburg','011 644 5300'),(94,'Netcare Rosebank Hospital','Gauteng','14 Sturdee Avenue, Rosebank','Johannesburg','011 328 0500'),(95,'Edendale Hospital','Kwazulu-Natal','Peter Kerchhoff St','PMB Central','033 395 4311'),(96,'Grey\'s Hospital','Kwazulu-Natal','50 Prince Alfred St','Pietermaritzburg','033 897 3000'),(97,'King Edward VIII Hospital','Kwazulu-Natal','Risecliff Rd','Durban Central','031 360 3000'),(98,'Prince Mshiyeni Memorial Hospital','Kwazulu-Natal','Ingwavuma Rd','Umlazi','031 907 8000'),(99,'St Aidans Hospital','Kwazulu-Natal','1 Manors Rd, Manor','Durban North','031 204 1300'),(100,'Netcare St Augustine\'s Hospital','Kwazulu-Natal','107 JB Marks Rd, Glenwood','Durban','031 268 5000'),(101,'Netcare The Bay Hospital','Kwazulu-Natal','2 Baumann Rd, Meer En See','Richards Bay','035 780 6111'),(102,'Netcare Umhlanga Hospital','Kwazulu-Natal','323 Umhlanga Rocks Drive, Umhlanga Rocks','Umhlanga','031 582 5500'),(103,'Ngwelezana Hospital','Kwazulu-Natal','Mount View Rd','Empangeni','035 787 0111'),(104,'Dr CN Phatudi Hospital','Limpopo','116 Marshall St','Maake','015 355 8000'),(105,'Ellisras Hospital','Limpopo','Munnik Ave','Lephalale','014 763 2226'),(106,'Lebowakgomo Hospital','Limpopo','Maraba St','Lebowakgomo','015 632 6921'),(107,'Letaba Hospital','Limpopo','Mooketsi','Letaba','015 303 8200'),(108,'Mankweng Hospital','Limpopo','Private Bag X1117','Polokwane','015 286 1000'),(109,'Matlala Hospital','Limpopo','Seshego B','Seshego','015 223 0327'),(110,'Mecklenburg Hospital','Limpopo','N11','Burgersfort','013 268 0114'),(111,'Messina Hospital','Limpopo','Schroeder St','Musina','015 534 0446'),(112,'Mokopane Hospital','Limpopo','66 Thabo Mbeki St','Mokopane','015 409 1000'),(113,'Nkhensani Hospital','Limpopo','Off N1 Rd','Malamulele','015 851 0100'),(114,'Ermelo Hospital','Mpumalanga','Smuts St','Ermelo','017 819 1500'),(115,'Evander Hospital','Mpumalanga','1 Oosthuizen St','Evander','017 632 8366'),(116,'Middelburg Provincial Hospital','Mpumalanga','Flos Rd','Middelburg','013 249 0000'),(117,'Rob Ferreira Hospital','Mpumalanga','4 Du Plooy St','Nelspruit','013 741 6066'),(118,'Sabie Hospital','Mpumalanga','R536','Sabie','013 764 1380'),(119,'Shongwe Hospital','Mpumalanga','R38','Barberton','013 712 5000'),(120,'Standerton Hospital','Mpumalanga','Krishna St','Standerton','017 712 9000'),(121,'Themba Hospital','Mpumalanga','Hospital Rd','Kabokweni','013 796 1100'),(122,'Tintswalo Hospital','Mpumalanga','R539','Acornhoek','013 795 5000'),(123,'Witbank Hospital','Mpumalanga','Smuts Ave','Witbank','013 653 9000'),(124,'Calvinia Hospital','Northern Cape','De Waal St','Calvinia','027 341 1481'),(125,'Carnarvon Hospital','Northern Cape','Kerk St','Carnarvon','053 382 3060'),(126,'De Aar Hospital','Northern Cape','Church St','De Aar','053 631 0511'),(127,'DFA Hospital','Northern Cape','Fritz Stockenström St','Upington','054 338 7200'),(128,'Hartswater Hospital','Northern Cape','Paling St','Hartswater','053 474 1078'),(129,'Kimberley Hospital','Northern Cape','Memorial Rd','Kimberley Central','053 802 9111'),(130,'Kuruman Hospital','Northern Cape','McGregor St','Kuruman','053 712 2411'),(131,'Prieska Hospital','Northern Cape','Barkley St','Prieska','053 353 6800'),(132,'Upington Hospital','Northern Cape','De Waal St','Upington','054 338 7200'),(133,'Victoria West Hospital','Northern Cape','Kruger St','Victoria West','053 621 0974'),(134,'Brits Hospital','North West','Meyer St','Brits Central','012 381 0000'),(135,'Klerksdorp Hospital','North West','3-23 Dolf St','Flamwood','018 406 4444'),(136,'Mafikeng Provincial Hospital','North West','Carrington Rd','Mafikeng','018 384 1721'),(137,'Orkney Hospital','North West','64 Kruger St','Orkney','018 473 0601'),(138,'Rustenburg Hospital','North West','Kerk St','Rustenburg','014 590 5000'),(139,'Tshepong Hospital','North West','Jourdan St','Klerksdorp','018 406 4300'),(140,'Vryburg Hospital','North West','Hospital St','Vryburg','053 927 6000'),(141,'Wolmaransstad Hospital','North West','36 Victoria St','Wolmaransstad','018 596 1700'),(142,'Potchefstroom Hospital','North West','Mooirivier Dr','Potchefstroom','018 294 7444'),(143,'Christian Barnard Memorial Hospital','North West','Rochelle St','Brits','012 252 8000'),(144,'Groote Schuur Hospital','Western Cape','Main Rd','Observatory','021 404 9111'),(145,'Mitchell\'s Plain Hospital','Western Cape','Fagan St','Mitchell\'s Plain','021 377 4444'),(146,'New Somerset Hospital','Western Cape','Beach Rd','Green Point','021 402 6911'),(147,'Red Cross War Memorial Children\'s Hospital','Western Cape','Klipfontein Rd','Rondebosch East','021 658 5111'),(148,'Tygerberg Hospital','Western Cape','Frans Conradie Dr','Tygerberg','021 938 4911'),(149,'Valkenberg Hospital','Western Cape','Seymour Rd','Valkenberg Estate','021 440 3111'),(150,'Victoria Hospital','Western Cape','Gate 2','Wynberg','021 799 1111'),(151,'Vincent Pallotti Hospital','Western Cape','Lustigan Rd','Pinelands','021 506 5111'),(152,'Karl Bremer Hospital','Western Cape','Michaelson Rd','Bellville','021 918 1911'),(153,'Melomed Gatesville','Western Cape','Gatesville','Athlone','021 699 0933');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `amount` double NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `postal_code` varchar(45) NOT NULL,
  `items` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `fk_user_id_idx` (`user_id`),
  CONSTRAINT `fk__user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `type` enum('service','product') DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `card_name` varchar(45) DEFAULT NULL,
  `card_number` varchar(45) DEFAULT NULL,
  `exp_date` varchar(45) DEFAULT NULL,
  `cvv` int DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `added_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (4,'Benadryl Allergy','assets/images/uploads/66782e838323a4.47716941.png','Allergy Medicine!','Allergens',75.66,150,'2024-06-23 16:17:39','2024-06-25 10:41:59'),(5,'Colda Flu','assets/images/uploads/66782edc07fce6.41328574.png','Cold Medicine','OTC MedicIne',50.99,150,'2024-06-23 16:19:08','2024-06-25 11:06:58');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `role` enum('Client','Doctor','Admin') DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `userId_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,NULL,'user','user','1212-12-12','Male','user@usereamil.com','0123456789','44 user street','Midrand','Gauteng','0000','$2y$10$73Jte9SYWGZGj36g4117ye9dLt1QY.F5DjI9JPk9VuNgF438PwIc6','2024-06-13 17:01:24','2024-06-13 17:01:24'),(5,NULL,'John','Doe','1887-12-04','Male','jdoe@mail.com','0123456789','123 Light St, Machine Rd','Milkovich','Gauteng','7845','$2y$10$WK4K7rwDPPnEVIEMBw.2BOo8weJx1IPJjUyKWWhPiPBOzs9sKqwwe','2024-06-21 01:22:35','2024-06-21 01:22:35'),(6,'Admin','admin','admin','1222-12-12','Male','admin@mail.com','00000000','address','Midrand','Gauteng',NULL,'0123456789','2024-06-23 16:03:12','2024-06-23 16:03:12');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-26 18:04:40
