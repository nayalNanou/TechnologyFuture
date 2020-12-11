-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: techwatch
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'bioelectronics','Bioelectronics is a field of research in the convergence of biology and electronics.'),(2,'transhuman','Transhuman is the concept of an intermediary from between human and posthuman. In other words, a transhuman is a being that resembles a human in most respects but who has powers and abilities beyond those of standard humans. These abilities might include improved intelligence, awareness, strength, or durability.'),(3,'biology','Biology is the natural science that studies life and living organisms, including their physical structure, chemical processes, molecular interactions, physiological mechanisms, development and evolution.');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `list_quote`
--

DROP TABLE IF EXISTS `list_quote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `list_quote` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `quote` text NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `list_quote`
--

LOCK TABLES `list_quote` WRITE;
/*!40000 ALTER TABLE `list_quote` DISABLE KEYS */;
INSERT INTO `list_quote` VALUES (1,'You be surprised of what you can achieve in science when you get rid of a little thing called...ethics','Josef Mengele');
/*!40000 ALTER TABLE `list_quote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `short_phrase`
--

DROP TABLE IF EXISTS `short_phrase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `short_phrase` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `phrase` varchar(255) NOT NULL,
  `technology_id` smallint unsigned NOT NULL,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `short_phrase`
--

LOCK TABLES `short_phrase` WRITE;
/*!40000 ALTER TABLE `short_phrase` DISABLE KEYS */;
INSERT INTO `short_phrase` VALUES (1,'Radio-frequency identification (RFID), (La radio-identification). An RFID tag consists of a tiny radio transponder; a radio receiver and transmitter.',1,'intro'),(2,'RFID automatically identify objects, collect data about them, and enter those data directly into computer systems with little or no human intervention.',1,'technical explanation part1'),(3,'RFID methods utilize radio waves to accomplish this.',1,'technical explanation part2'),(4,'Inventory management|Asset tracking|Personnel tracking|Controlling access to restricted areas|ID Badging|Supply chain management|Counterfeit prevent (e.g. in the pharmaceutical industry)',1,'RFID Applications'),(5,'RFID tags are used in many industries.',1,'RFID used in many industries'),(6,'An RFID tag attached to an automobile during production can be used to track its progress through the assembly line.',1,'RFID automobile'),(7,'RFID-tagged pharmaceuticals can be tracked through warehouses.',1,'RFID pharmaceuticals'),(8,'Implanting RFID microchips in livestock and pets enables positive identification of animals.',1,'Implanting RFID'),(9,'The human microchip implant usually contains a unique ID number that can be linked to information contained in an external database, such as personal identification, law enforcement, medical history, medications, allergies, and contact information.',1,'Human microchip implant'),(10,'Biohackers are enthusiastically getting chipped, many of them undergoing the DIY surgery in tattoo parlors.',1,'Biohackers DIY surgery'),(11,'The small radio frequency identification (RFID) chips are implanted in their hands or wrists',1,'Implanted hands wrists'),(12,'Eliminate many tedious rituals from their daily lives, like carrying a wallet or keys.',1,'Eliminate tedious rituals'),(13,'The chip can be programmed to open a home or office door electronically',1,'Home or door office'),(14,'can be used to make tap-and-go payments',1,'tap-and-go payments'),(15,'Chip implants could replace public transport cards',1,'RFID transport cards'),(16,'Personal medical data could also be stored on implanted RFID chips (blood type, allergies, ...)',1,'RFID medical data'),(17,'Since RFID tags can be attached to cash, clothing, and possessions, or implanted in animals and people, the possibility of reading personally-linked information without consent has raised serious privacy concerns.',1,'privacy concerns'),(18,'These concerns resulted in standard specifications development addressing privacy and security issues.',1,'standard specifications development'),(19,'ISO/IEC 18000 and ISO/IEC 29167 use on-chip cryptography methods for untraceability, tag and reader authentication, and over-the-air privacy.',1,'cryptography methods'),(20,'The type of biohackers currently gaining the most notoriety are the ones who experiment  outside of traditional lab spaces and institutions  on their own bodies with the hope of boosting their physical and cognitive performance.',1,'About biohackers');
/*!40000 ALTER TABLE `short_phrase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tech_image`
--

DROP TABLE IF EXISTS `tech_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tech_image` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(400) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `technology_id` smallint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tech_image`
--

LOCK TABLES `tech_image` WRITE;
/*!40000 ALTER TABLE `tech_image` DISABLE KEYS */;
INSERT INTO `tech_image` VALUES (1,'https://pixfeeds.com/images/technology/rfid/1280-528888583-rfid-chip.jpg','RFID Chips',1),(2,'https://www.itjobs.ca/content/uploads/2017/09/Puce-RFID.jpg','RFID Chip tag',1),(3,'https://i.insider.com/583ef0aeba6eb602688b5bce?width=1100&format=jpeg','Exoskeletons improve strength',2),(4,'https://usbeketrica.com/media/3532/download/597b2fd86fa80.jpg','RFID Chip yellow eye background',1),(5,'https://images.techhive.com/images/article/2015/02/rfid_hand_1-100567230-primary.idge.jpg','RFID Chip on hand',1),(6,'https://www.silicon.fr/wp-content/uploads/2015/02/RFID-684x485.jpg','RFID Chip held',1),(7,'https://www.extremetech.com/wp-content/uploads/2016/02/Phoenix-Exoskeleton.jpg','Exoskeleton Crutches',2),(8,'https://www.lockheedmartin.com/content/dam/lockheed-martin/mfc/photo/exoskeleton-technologies/exoskeleton-military-masthead.jpg.pc-adaptive.full.medium.jpeg','Exoskeleton Military',2),(9,'https://industryeurope.com/downloads/5239/download/EUA1078.jpg?cb=cc17270bdac08221d57f9b54d0c802c4','Exoskeleton',2),(10,'https://www.therobotreport.com/wp-content/uploads/2017/08/ekso-rewalk-cyberdyne.jpg','Exoskeleton Cyberdyne',2),(11,'https://upload.wikimedia.org/wikipedia/commons/f/f5/RFID-Зураг.jpg','Electromagnetic Field',1),(12,'https://www.cxjrfidfactory.com/wp-content/uploads/2016/03/rfid-square-tag.jpg','RFID structure',1),(13,'https://pixfeeds.com/images/5/277854/1200-133759230-rfid-tag-in-hand.jpg','RFID tag in hand',1),(14,'https://blog.magestore.com/wp-content/uploads/2018/06/ingraphic.jpg','Inventory management',1),(15,'https://www.assetinfinity.com/blog/wp-content/uploads/2019/09/Useful-Asset-Tracking-Tips.jpg','Asset tracking',1),(16,'https://ja-si.com/wp-content/uploads/2016/06/RFID-Manpower-Tracking-1024x579.jpg','Personnel tracking',1),(17,'https://www.idwholesaler.com/learning-center/wp-content/uploads/2017/08/id-badge-on-lanyard.png','ID Badging',1),(18,'https://www.adestotech.com/wp-content/uploads/Abba-Logic-Header-Image.jpg','Controlling access to restricted areas',1),(19,'https://www.kepler-consulting.com/wp-content/uploads/2017/11/Fotolia_149344866_M.jpg','Supply chain management1',1),(20,'https://www.supplychainmovement.com/wp-content/uploads/2016/10/Kewill-Seamless-SC-Execution.jpg','Supply chain management2',1),(21,'https://blog.matthews.com.au/wp-content/uploads/how-wine-makers-can-beat-the-counterfeiters.jpg','AuthenticFake',1),(22,'https://www.luxtag.io/wp-content/uploads/2019/01/goods.png','Counterfeit goods',1),(23,'https://i1.wp.com/www.energeticsun.tech/wp-content/uploads/2019/03/various-industries.jpg','Industry1',1),(24,'https://www.tkpl.in/wp-content/uploads/2016/03/industries.jpg','Industry2',1),(25,'https://www.rfidup.com/wp-content/uploads/2019/11/rfid-in-auto-1.jpg','RFID in auto',1),(26,'https://www.tbsearch.fr/wp-content/uploads/2016/09/tbsearch-car-production-line.jpg','Car production line',1),(27,'https://m.schreiner-group.com/fileadmin/user_upload/Presse/pressebilder/SMP_Robust_RFID-Label.jpg','Pharmaceutical logistics',1),(28,'https://ig.solutions/wp-content/uploads/2018/08/ig-pharmacy-1.jpg','Future of Pharmacy',1),(29,'https://stmaaprodfwsite.blob.core.windows.net/assets/sites/1/2016/12/14-12-2016-Eartag-Life.jpg','Eartag life',1),(30,'https://assets.sbnation.com/assets/2604587/cow_rfid_scanning.jpg','Cow rfid scanning',1),(31,'https://www.dorfidtag.com/upfile/RFID%20animal%20tag375.png','Rfid animal identification',1),(32,'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Feline_identifying_microchip.JPG/250px-Feline_identifying_microchip.JPG','Microchip implant',1),(33,'https://images.theconversation.com/files/266913/original/file-20190401-177163-usyuq3.jpg','Pets microchip',1),(34,'http://www.sepicat.com/wp-content/uploads/2018/05/shutterstock_200078717-768x403.png','Cat microchip',1),(35,'https://www.dhresource.com/0x0/f2/albu/g9/M01/C8/90/rBVaVVyA6naABahdACbMcKNYmfs363.jpg/100sets-2-12mm-134-2khz-iso-pet-animal-tag.jpg','RFID animal ID',1),(36,'https://cdn.medicalfuturist.com/wp-content/uploads/2019/07/RFID-implant2.png','Implants x-ray',1),(37,'https://i.pinimg.com/originals/99/b3/d2/99b3d23a5aac249a0cf31eafc6a30546.jpg','RFID rice',1),(38,'https://clubfiftyone.co.uk/wp-content/uploads/2018/04/Club-51-Biohacking-Nutrients.jpg','Biohacking nutrients',1),(39,'https://cdn.vox-cdn.com/thumbor/ITGu9qzsUqdKu-Mxkn0kUg0LdVU=/1400x0/filters:no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/16501588/brain_chip_GettyImages_636351404.jpg','Brain chip',1),(40,'https://www.createdigital.org.au/wp-content/uploads/2018/07/biohack4-1.jpg','DNA biohacking',1),(41,'https://bitsofberlin.org/images/episode_1_cyborgs_rin.jpg','Magnet girl',1),(42,'https://cdn.vox-cdn.com/thumbor/xkrGUhYgH2f2_oI5ZovEvidBQ1g=/1400x1400/filters:format(jpeg)/cdn.vox-cdn.com/uploads/chorus_asset/file/16349818/GettyImages_875500044.jpg','What is biohacking',1),(43,'https://www.fluxtrends.com/wp-content/uploads/2018/09/biohacking.jpg','Biohacking cyborg',1),(44,'https://miro.medium.com/max/1384/1*uiuwJCrnpvQDjlGauSkjXQ.png','Biohacker goal',1),(45,'https://www.thegryphon.co.uk/wp-content/uploads/2018/05/crispr.png','Biohacking crispr',1),(46,'https://www.chicagotribune.com/resizer/DYqkE369PzOzC-prbqfqIYc1xTM=/1200x0/top/arc-anglerfish-arc2-prod-tronc.s3.amazonaws.com/public/DRBYMEBT4VGNLMGLWQ3TDUVWUY.jpg','Biohacker tattoo parlors1',1),(47,'https://static.coindesk.com/wp-content/uploads/2019/03/needleinhand2-1035x666.jpg','Biohacker tattoo parlors2',1),(48,'https://im.indiatimes.in/facebook/2018/Nov/rfid_microchip_1542628301_800x420.jpg','RFID Chip and skin',1),(49,'https://superhumantalks.com/wp-content/uploads/2020/10/RFID-tag-human.jpg','RFID NFC',1),(50,'https://amazing.zone/fotosblog/max/rfid_hand-min_(1).jpg','RFID hand x-ray2',1),(51,'https://buytravelnavigator.com/wp-content/uploads/2018/09/1-10.jpg','RFID wallet',1),(52,'https://ekladata.com/D9xahPUiOfHynyo-OYooK_N-ry4.jpg','RFID keys',1),(53,'https://miro.medium.com/max/940/1*-7POfw61meSp6dkM82hBXA.png','RFID home car computer',1),(54,'https://i.ytimg.com/vi/8J0Lvq1N6_s/maxresdefault.jpg','RFID open door',1),(55,'https://i.ytimg.com/vi/_ClBWybpQIM/maxresdefault.jpg','Swedish RFID',1),(56,'https://teslapayments.com/wp-content/uploads/2016/06/ring.jpg','Ring payment',1),(57,'https://i1.wp.com/zenlet.co/wp-content/uploads/2016/05/NFC.png','Contactless payments',1),(58,'https://www.whitehorse.vic.gov.au/sites/whitehorse.vic.gov.au/files/styles/page_banner/public/assets/images/Box%20Hill%20Tram%20002.jpg','Tram',1),(59,'https://www.intelligenttransport.com/wp-content/uploads/mumbai-metro-1-750x406.jpg','Mumbai metro',1),(60,'https://i.pinimg.com/originals/e8/a8/7f/e8a87f9863bcf4d98cb604b124baeb75.jpg','Public transport cards',1),(61,'https://www.dentalnewspk.com/wp-content/uploads/2017/12/medical-records.jpg','Medical history',1),(62,'https://ringmerdental.co.uk/wp-content/uploads/2018/10/medical-history.jpg','Patient medical history',1),(63,'https://www.wordtemplatesonline.net/wp-content/uploads/family-Medical-History-Form-Template.jpg','Personal medical data',1),(64,'https://365psd.com/images/istock/previews/8311/83116079-patient-medical-record-icon-flat-design.jpg','Computer patient medical data',1),(65,'https://lh3.googleusercontent.com/proxy/jCq1hXv_RAl7RoiHg6f_YDOdFmkTLY-bX8QgkDhO4P_Qx7I27XEfp3uv3YYkPYnWiVngQ_qtOpc2W2VwkGDB8sf7xi1wtlkf4kPpnf1suygiIkMhPAqMHmLUmaaezbu1UmiM9lIrwEX2mI6hNJsYaw','Privacy concerns',1),(66,'https://miro.medium.com/max/550/0*bGH6yQl_xJvWaZGa','RFID privacy',1),(67,'https://lh3.googleusercontent.com/proxy/OhbZpiHerL0QongLaa3BB3iswCAhoBv6rz6MzmEwKZb_4d0xR1k0dgwDjbgZlpmgYxtkI-XWb_g3IaBXYn7UyUwt4_TuSKCcrXw7lVksS05cvk2wDEFjL-N1ZNTeRhq5WE1zD-RuDInSmWGKFA','Hacker',1),(68,'https://media2.govtech.com/images/940*636/shutterstock_186333620.jpg','Hacker binary',1),(69,'https://tr2.cbsistatic.com/hub/i/r/2014/02/24/cd309b4b-16ea-446c-869c-1fbc6aba43f3/resize/1200x/79c869cab504742e908e361249ce4699/privacy_istock_022414.jpg','Privacy cryptography',1),(70,'https://www.red-gate.com/simple-talk/wp-content/uploads/2020/09/word-image-27.png','Padlock',1),(71,'https://www.itbusinessedge.com/imagesvr_ce/9483/PorembaPrivacyConcerns01.jpg','Addressing privacy concerns',1),(72,'https://www.commscope.com/siteassets/resources/standards/iso_iec_logos.jpg','ISO IEC',1),(73,'https://kajabi-storefronts-production.global.ssl.fastly.net/kajabi-storefronts-production/blogs/19054/images/QxYfSGfRRGWufkFCxj22_Largest-encryption-key-cracked.jpg','Cryptography key',1),(74,'https://news.mit.edu/sites/default/files/images/201906/Simpler-Cryptography.jpg','Cryptography key2',1),(75,'https://base.imgix.net/files/base/ebm/electronicdesign/image/2020/05/PROMOCryptographyHandbook_Ch5.5eceabbf11917.png','Cryptography text',1),(76,'https://thumbs.gfycat.com/CooperativeSpotlessDutchsmoushond-max-14mb.gif','Pewdiepie hmmm',1),(77,'https://vl-media.fr/wp-content/uploads/2018/12/hum.gif','Batman hmmm',1);
/*!40000 ALTER TABLE `tech_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technology`
--

DROP TABLE IF EXISTS `technology`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technology` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category_id` smallint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`category_id`),
  CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technology`
--

LOCK TABLES `technology` WRITE;
/*!40000 ALTER TABLE `technology` DISABLE KEYS */;
INSERT INTO `technology` VALUES (1,'RFID Chips',1),(2,'Exoskeletons',2),(3,'Augmented Vision',2),(4,'Smart Contact Lenses',2),(5,'3D Printed Body Parts',3),(6,'Brain-computer Interfaces',2),(7,'Designer Babies',3);
/*!40000 ALTER TABLE `technology` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-11  3:01:57
