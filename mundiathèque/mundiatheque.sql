CREATE DATABASE mundiatheque;

CREATE TABLE users(
    idUser int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username longtext NOT NULL ,
    email longtext NOT NULL,
    password longtext NOT NULL,
    typeUser longtext NOT NULL
);

CREATE TABLE book(
    idBook int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title longtext NOT NULL,
    description longtext NOT NULL,
    author longtext NOT NULL,
    genre longtext NOT NULL,
    state enum('VERY GOOD','GOOD','BAD') NOT NULL,
    quantity int(5) NOT NULL,
    imgFullNameBook longtext NOT NULL,
    keywords longtext NOT NULL
);
CREATE TABLE reservation(
    idUser int(11) NOT NULL REFERENCES users(idUser),
    idBook int(11) NOT NULL REFERENCES book(idBook),
    startDate datetime NOT NULL,
    endDate datetime NOT NULL,
    PRIMARY KEY (idUser, idBook)
);

CREATE TABLE notification(
    idNotification int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idUser int(11) NOT NULL,
    typeNotification enum('ALERT','CONFIRMATION') NOT NULL,
    FOREIGN KEY (idUser) REFERENCES users(idUser)
);

CREATE TABLE favourites(
    idUser int(11) NOT NULL REFERENCES users(idUser),
    idBook int(11) NOT NULL REFERENCES book(idBook),
    PRIMARY KEY (idUser, idBook)
);

CREATE TABLE comment(
    idComment int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    textComment longtext NOT NULL,
    idUser int(11) NOT NULL,
    idBook int(11) NOT NULL,
    FOREIGN KEY (idUser) REFERENCES users(idUser),
    FOREIGN KEY (idBook) REFERENCES book(idBook)
);

CREATE TABLE news(
  idNews int(11)   PRIMARY KEY NOT NULL AUTO_INCREMENT,
  textNews longtext NOT NULL,
  imgFullNameNews longtext NOT NULL
);

CREATE TABLE last_seen(
    idUser int(11) NOT NULL REFERENCES users (idUser),
    idBook int(11) NOT NULL REFERENCES book (idBook),
    seenDate int(11) NOT NULL ,
    PRIMARY KEY (idUser, idBook)
);

CREATE TABLE rating(
     idUser int(11) NOT NULL REFERENCES users (idUser),
     idBook int(11) NOT NULL REFERENCES book (idBook),
     bookRating float(11) NOT NULL,
     PRIMARY KEY (idUser, idBook)
);
