-- PRAGMA foreign_keys = OFF;

CREATE TABLE User (
	username VARCHAR PRIMARY KEY,
	email VARCHAR UNIQUE,
	password VARCHAR NOT NULL, -- Hashed
	about VARCHAR
);

CREATE TABLE Task (
	task_id INTEGER PRIMARY KEY,
	title VARCHAR,
	category VARCHAR,
	priority INTEGER,
	duedate DATE,
	parent_task INTEGER REFERENCES Task,
	
	CHECK(priority between 0 and 3)
);

CREATE TABLE Item (
	item_id INTEGER PRIMARY KEY,
	priority INTEGER,
	dependency INTEGER REFERENCES Item,
	assigneduser VARCHAR REFERENCES User,
	task_id INTEGER REFERENCES Task NOT NULL,
	description VARCHAR NOT NULL,
	completed BOOLEAN,
	
	CHECK(priority between 0 and 3),
	CHECK(completed between 0 and 1),
	CHECK((length(trim(description)) > 0))
);

CREATE TABLE UserTask (
	username REFERENCES User,
	task_id REFERENCES Task,
	CONSTRAINT UserTask PRIMARY KEY (username, task_id)
);
