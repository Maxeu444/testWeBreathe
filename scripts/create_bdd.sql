DROP DATABASE IF EXISTS test_webreathe;
CREATE DATABASE IF NOT EXISTS test_webreathe
USE test_webreathe;

CREATE TABLE modules (
  id INT AUTO_INCREMENT PRIMARY KEY,
  type ENUM('motion sensor', 'camera') NOT NULL,
  capacite_max INT NOT NULL,
  description TEXT(500),
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE historique_fonctionnement (
  id INT AUTO_INCREMENT PRIMARY KEY,
  module_id INT NOT NULL,
  date_heure DATETIME NOT NULL,
  etat ENUM('en_ligne', 'hors_ligne') NOT NULL,
  taux_remplissage DECIMAL(5, 2),
  FOREIGN KEY (module_id) REFERENCES modules(id) ON DELETE CASCADE
);