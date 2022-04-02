CREATE TABLE 'users' (
    'id' int(11) unsigned NOT NULL AUTO_INCREMENT,
    'name' varchar(75) NOT NULL,
    'password' varchar(255) NOT NULL,
    'email' varchar(100) NOT NULL,
    PRIMARY KEY ('id'),
    UNIQUE KEY 'email' ('email')
)