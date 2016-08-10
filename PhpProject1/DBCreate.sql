CREATE TABLE Movie (
  idMovie INT AUTO_INCREMENT,
  vcMovieName VARCHAR(25) NOT NULL,
  vcIMGSource VARCHAR(45),
  vcYTLink VARCHAR(100),

  PRIMARY KEY(idMovie)
);

CREATE TABLE MovieUsers (
  idUser INT AUTO_INCREMENT,
  vcUserName VARCHAR(10),
  vcUserPassword VARCHAR(15),
  iLevel INT,

  PRIMARY KEY (idUser)
);

CREATE TABLE MovieReviews (
  idReview INT AUTO_INCREMENT,
  vcText VARCHAR(250),
  fkUser INT NOT NULL,
  fkMovie INT NOT NULL,

  PRIMARY KEY (idReview),
  FOREIGN KEY (fkUser) REFERENCES MovieUsers(idUser),
  FOREIGN KEY (fkMovie) REFERENCES Movie(idMovie)
);

