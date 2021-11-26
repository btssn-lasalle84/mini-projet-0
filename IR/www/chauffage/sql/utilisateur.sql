USE mysql;
CREATE USER 'chauffage'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `chauffage`.* TO 'chauffage'@'%';
FLUSH PRIVILEGES;

