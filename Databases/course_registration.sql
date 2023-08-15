-- course_registration database
-- mysql version
-- as of 14/08/2023 by Oenghus Walsh

CREATE DATABASE IF NOT EXISTS course_registration DEFAULT CHARSET = utf8;
USE course_registration;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    username            VARCHAR(255),
    email         VARCHAR(255),
    password_hash            VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS courses;
CREATE TABLE courses (
    id              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title            VARCHAR(255),
    description     VARCHAR(255),
    capacity     INTEGER
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO users ( id, username, email, password_hash ) VALUES ( 1, 'BSmith', 'bsmith@email.com', 'password1' );
INSERT INTO users ( id, username, email, password_hash ) VALUES ( 2, 'MSmith', 'msmith@email.com', 'password2' );
INSERT INTO users ( id, username, email, password_hash ) VALUES ( 3, 'FSmith', 'fsmith@email.com', 'password3' );

INSERT INTO courses ( id, title, description, capacity ) VALUES ( 101, 'Math', 'Advanced mathamatics', 20 );
INSERT INTO courses ( id, title, description, capacity ) VALUES ( 102, 'English', 'English writing and history', 20 );
INSERT INTO courses ( id, title, description, capacity ) VALUES ( 103, 'Accounting', 'Business accounting', 20 );
INSERT INTO courses ( id, title, description, capacity ) VALUES ( 104, 'Science', 'Bioligy and physics', 20 );



