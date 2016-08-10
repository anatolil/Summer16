CREATE TABLE MovieReviews (
  idReview INT AUTO_INCREMENT,
  vcText VARCHAR(250),
  fkUser INT NOT NULL,
  fkMovie INT NOT NULL,

  PRIMARY KEY (idReview),
  FOREIGN KEY (fkUser) REFERENCES MovieUsers(idUser),
  FOREIGN KEY (fkMovie) REFERENCES Movie(idMovie)
);

