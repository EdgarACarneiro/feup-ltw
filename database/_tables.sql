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
	parent_task INTEGER REFERENCES Task ON DELETE CASCADE,
	
	CHECK(priority between 0 and 3)
);

CREATE TABLE Item (
	item_id INTEGER PRIMARY KEY,
	priority INTEGER,
	dependency INTEGER REFERENCES Item ON DELETE SET NULL,
	assigneduser VARCHAR REFERENCES User ON DELETE SET NULL,
	task_id INTEGER REFERENCES Task ON DELETE CASCADE NOT NULL,
	description VARCHAR NOT NULL,
	completed BOOLEAN,
	
	CHECK(priority between 0 and 3),
	CHECK(completed between 0 and 1),
	CHECK((length(trim(description)) > 0))
);

CREATE TABLE UserTask (
	username REFERENCES User ON DELETE CASCADE,
	task_id REFERENCES Task ON DELETE CASCADE,
	CONSTRAINT UserTask PRIMARY KEY (username, task_id)
);
