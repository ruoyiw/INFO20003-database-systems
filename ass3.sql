DROP TABLE IF EXISTS `OrderLineItem` ;
DROP TABLE IF EXISTS `Spatula` ;
DROP TABLE IF EXISTS `Order` ;

CREATE TABLE IF NOT EXISTS `Spatula` (
  `idSpatula` INT AUTO_INCREMENT,
  `ProductName` VARCHAR(50) NOT NULL,
  `Type` ENUM('Food', 'Drugs', 'Paints', 'Plaster') NOT NULL,
  `Size` VARCHAR(50) NOT NULL,
  `Colour` VARCHAR(50) NOT NULL,
  `Price` DECIMAL(10, 2),
  `QualityInStock` INT NOT NULL,
  PRIMARY KEY (`idSpatula`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `Order` (
  `idOrder` INT AUTO_INCREMENT,
  `RequestedTime` DATETIME NOT NULL,
  `ResponsibleStaffMember` VARCHAR(100) NOT NULL,
  `CustomerDetails` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idOrder`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `OrderLineItem` (
  `idSpatula` INT NOT NULL,
  `idOrder` INT NOT NULL,
  `Quantity` INT NOT NULL,
  PRIMARY KEY (`idSpatula`, `idOrder`),
    FOREIGN KEY (`idSpatula`)
    REFERENCES `Spatula` (`idSpatula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`idOrder`)
    REFERENCES `Order` (`idOrder`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;

INSERT INTO `Spatula` VALUES 
	(1,"S1","Food","70", "Red",5.00, 0),
	(2,"S2","Drugs","20", "Green",2.00,10),
	(3,"S3","Paints", "30", "Yellow",7.00,0),
	(4,"S4","Plaster","10", "Blue", 4.00,1),
	(5,"S5","Food", "60", "Orange",9.00,0),
    (6,"S6","Drugs","50", "White", 6.00,20),
	(7,"S7","Paints","40", "Black",8.00,0),
	(8,"S8","Plaster", "80", "Grey", 1.00,30),
	(9,"S9","Food","10", "Purple",10.00,0),
	(10,"S10","Drugs", "100", "Brown", 3.00,100);
    
INSERT INTO `Order` VALUES 
    (1, "2011-01-22 10:00:00", "SM1", "C1"),
    (2, "2002-01-01 09:00:00", "SM2", "C2"),
    (3, "1992-03-11 12:00:00", "SM3", "C3"),
    (4, "2012-02-14 23:00:00", "SM4", "C4"),
    (5, "2012-02-14 23:00:00", "SM5", "C5");
    
INSERT INTO `OrderLineItem` VALUES 
    (10, 1, 1),
    (10, 2, 1),
    (8, 2, 1),
    (10, 3, 1),
    (8, 3, 1),
    (6, 3, 1),
    (10, 4, 1),
    (8, 4, 1),
    (6, 4, 1),
    (4, 4, 1),
    (10, 5, 1),
    (8, 5, 1),
    (6, 5, 1),
    (4, 5, 1),
    (2, 5, 1);

