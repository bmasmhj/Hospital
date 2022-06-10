--website details
CREATE TABLE website (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
        websitename VARCHAR(200) NOT NULL ,
        websitelogo VARCHAR(255) NOT NULL ,
        description LONGTEXT,
        contact int(20),
        email VARCHAR(200) NOT NULL ,
        emergencynum int(20),
        marquedata VARCHAR(255) NOT NULL ,
        location VARCHAR(25) NOT NULL
)
    ENGINE = InnoDB;

--carousel
 CREATE TABLE carousel (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
        name VARCHAR(100) NOT NULL ,
        image VARCHAR(255) NOT NULL ,
        )
    ENGINE = InnoDB;

-- socialmedia
 CREATE TABLE socialmedia (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
        name VARCHAR(100) NOT NULL ,
        url VARCHAR(255) NOT NULL ,
        icon VARCHAR(255) NOT NULL ,

        )
    ENGINE = InnoDB;



-- doc details

-- docs  speciality list
 CREATE TABLE speciality (
        id INT NOT NULL AUTO_INCREMENT ,
        name VARCHAR(25) NOT NULL ,
        image VARCHAR(200) NOT NULL ,
        PRIMARY KEY  (id)
        )
    ENGINE = InnoDB;

-- doc list 
CREATE TABLE doctor (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
name VARCHAR(50) NOT NULL,
username VARCHAR(200),
password VARCHAR(255),
doccode VARCHAR(100) NOT NULL,
scheduledaystart VARCHAR(10),
scheduledaayend VARCHAR(10),
scheduletimestart TIME,
scheduletimeend TIME,

specialityid INT,
 FOREIGN KEY (specialityid) REFERENCES speciality(id)
)
ENGINE = InnoDB;

-- doc work experiences 
CREATE TABLE workexperiene (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    description  VARCHAR(255),
    docid INT,
    FOREIGN KEY (docid) REFERENCES doctor(id)
)
ENGINE = InnoDB;

-- doc educations 
CREATE TABLE education (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    description  VARCHAR(255),
    docid INT,
    FOREIGN KEY (docid) REFERENCES doctor(id)
)
ENGINE = InnoDB;


-- services

    -- regular service 
CREATE TABLE regularservices (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(200),
    codeid VARCHAR(200), 
    details LONGTEXT 
)
ENGINE = InnoDB;

-- health services 
CREATE TABLE healthservices (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(200),
    codeid VARCHAR(200), 
    details LONGTEXT 
)
ENGINE = InnoDB;

--  emergency services 
CREATE TABLE emergency (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    servicename VARCHAR(200),
    eservicecode VARCHAR(200), 
    details LONGTEXT 
)
ENGINE = InnoDB;


-- users
CREATE TABLE users ( 
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
name VARCHAR(255) ,
email VARCHAR(255) ,
phone INT(50),
address VARCHAR(255),
age INT,
sex TEXT
)
ENGINE = InnoDB;


-- admin 
CREATE TABLE admin (

id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
name VARCHAR(255) ,
email VARCHAR(255) ,
password VARCHAR(255)

)
ENGINE = InnoDB;

-- casher 
CREATE TABLE cashier (

id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
name VARCHAR(255) ,
email VARCHAR(255) ,
password VARCHAR(255)

)
ENGINE = InnoDB;



-- all records (appointment  , hospital reports) 
CREATE TABLE records (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    patientname VARCHAR(255),
    invoice VARCHAR(255),
    nameofrecord VARCHAR(255),
    detail VARCHAR(255),
    message VARCHAR(255),
    imageofrecord NULL VARCHAR(255)

)
ENGINE = InnoDB;


--payment history

CREATE TABLE payment (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    userid INT s,
    docid INT,
    recordid VARCHAR(255),
    nameofrecord VARCHAR(255),
    price VARCHAR(255),
    detail VARCHAR(255),
 FOREIGN KEY (userid) REFERENCES users(id)
 FOREIGN KEY (docid) REFERENCES doctor(id)


)
ENGINE = InnoDB;    

 --feedback 

 CREATE TABLE feedback (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255) ,
    email VARCHAR(255) ,
    message LONGTEXT 
)
ENGINE = InnoDB;    



