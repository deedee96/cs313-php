CREATE TABLE user_log (
 user_id serial PRIMARY KEY,
 user_name varchar (80) NOT NULL UNIQUE,
 password varchar (80) NOT NULL
);

CREATE TABLE contact_information(
 contact_id SERIAL PRIMARY KEY,
 address_1 VARCHAR(250) NOT NULL,
 address_2 VARCHAR(250),
 state CHAR(2) NOT NULL,
 zip char(5) NOT NULL,
 first_name VARCHAR(80) NOT NULL,
 last_name VARCHAR(80) NOT NULL,
 phone VARCHAR(12) NOT NULL,
 email VARCHAR(250) NOT NULL,
 user_name VARCHAR(80) REFERENCES user_log(user_name)
);

CREATE TABLE survey(
 survey_id SERIAL PRIMARY KEY,
 first_name VARCHAR(80) NOT NULL,
 last_name VARCHAR(80) NOT NULL,
 phone VARCHAR(12) NOT NULL,
 email VARCHAR(250) NOT NULL,
 country VARCHAR(250) NOT NULL
);



CREATE TABLE message(
 message_id SERIAL PRIMARY KEY,
 first_name VARCHAR(80) NOT NULL,
 last_name VARCHAR(80) NOT NULL,
 phone VARCHAR(12) NOT NULL,
 email VARCHAR(250) NOT NULL,
 date DATE NOT NULL,
 content VARCHAR(1000) NOT NULL
);


CREATE TABLE discussion(
 id SERIAL PRIMARY KEY,
 Country VARCHAR(50) NOT NULL UNIQUE
);


CREATE TABLE thread(
 thread_id SERIAL PRIMARY KEY,
 discussion_country VARCHAR(50) references discussion(country),
 title VARCHAR(250) NOT NULL,
 content VARCHAR(3000) NOT NULL,
 date DATE NOT NULL
);

CREATE TABLE reply(
 reply_id SERIAL PRIMARY KEY,
 thread_id INT REFERENCES thread(thread_id),
 content VARCHAR(3000) NOT NULL,
 date DATE NOT NULL
);
 