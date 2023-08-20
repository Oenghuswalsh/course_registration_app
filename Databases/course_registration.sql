-- course_registration database
-- mysql version
-- as of 14/08/2023 by Oenghus Walsh

CREATE DATABASE IF NOT EXISTS course_registration DEFAULT CHARSET = utf8;
USE course_registration;

DROP TABLE IF EXISTS user;
CREATE TABLE user (
    user_id              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name            VARCHAR(255),
    email         VARCHAR(255),
    password_hash            VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS courses;
CREATE TABLE courses (
    course_id              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title            VARCHAR(255),
    description     VARCHAR(255),
    capacity     INTEGER
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS profiles;
CREATE TABLE profiles (
    profile_id              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id   INTEGER,
    family_id   INTEGER,
    course_id   INTEGER,
    firstname   VARCHAR(255),
    lastname    VARCHAR(255),
    date_of_birth   VARCHAR(255),
    street_number   INTEGER,
    street_name VARCHAR(255),
    suburb  VARCHAR(255),
    city    VARCHAR(255),
    state   VARCHAR(255),
    country VARCHAR(255),
    spouse_name VARCHAR(255),
    number_of_dependents    INTEGER,
    course_1st_choice   VARCHAR(255),
    course_2nd_choice   VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS family_profile;
CREATE TABLE family_profile (
    family_id              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    profile_id   INTEGER,
    visa_type   VARCHAR(255),
    nationality VARCHAR(255),
    street_number   INTEGER,
    street_name VARCHAR(255),
    suburb  VARCHAR(255),
    city    VARCHAR(255),
    state   VARCHAR(255),
    country VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user ( user_id, name, email, password_hash ) VALUES ( 1, 'BSmith', 'bsmith@email.com', 'password1' );
INSERT INTO user ( user_id, name, email, password_hash ) VALUES ( 2, 'MSmith', 'msmith@email.com', 'password2' );
INSERT INTO user ( user_id, name, email, password_hash ) VALUES ( 3, 'FSmith', 'fsmith@email.com', 'password3' );

INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 101, 'Digital Marketing', 'Study the Power of Online Brands.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 102, 'Environmental Sustainability', 'Eco-conscious solutions for a greener future.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 103, 'Medician', 'Cutting-edge breakthroughs in healthcare science.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 104, 'Culinary Arts', 'Master multicultural cuisine creation techniques.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 105, 'Tourism and Hospitality', 'Excell in Hospitality strategies', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 106, 'Renewable Energy Engineering', 'Engineering a Greener Future Globally.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 107, 'Marine Biology', 'Particpate in protecting ocean ecosystems.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 108, 'Fashion Design', 'Study the trends shaping the fashion industry standards.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 109, 'Aerospace Engineering', 'Cutting-edge breakthroughs in areospace.', 20 );
INSERT INTO courses ( course_id, title, description, capacity ) VALUES ( 110, 'Global Business Strategy', 'Mastering International Market Strategies.', 20 );



