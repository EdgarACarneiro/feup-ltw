CREATE TABLE user (
	usr_id INTEGER PRIMARY KEY,
	usr_username VARCHAR UNIQUE,
	usr_password VARCHAR NOT NULL,
	usr_profile INTEGER REFERENCES profile UNIQUE 
);

CREATE TABLE profile (
	prof_id INTEGER PRIMARY KEY,
	prof_age INTEGER,
	prof_profession VARCHAR,
	prof_studyPlace VARCHAR,
	prof_locality VARCHAR
	-- Locality sounds bad. Add more fields if needed
);

CREATE TABLE project (
	proj_id INTEGER PRIMARY KEY,
	proj_title VARCHAR,
	proj_category VARCHAR,
	proj_color INTEGER, --Function needed to convert int to hex and reverse
	proj_datedue DATE,
	proj_creator INTEGER REFERENCES user NOT NULL
);

CREATE TABLE todolist (
	todo_id INTEGER PRIMARY KEY,
	todo_title VARCHAR,
	todo_category VARCHAR,
	todo_color INTEGER, --Function needed to convert int to hex and reverse
	todo_creator INTEGER REFERENCES user NOT NULL,
	todo_project INTEGER REFERENCES project
);

CREATE TABLE item (
	item_id INTEGER PRIMARY KEY,
	item_datedue DATE,
	item_dependency VARCHAR,
	item_color INTEGER, --Function needed to convert int to hex and reverse
	item_assigneduser INTEGER REFERENCES user,
	item_todolist INTEGER REFERENCES todolist NOT NULL
);

-- Tables Based on Associations
CREATE TABLE usertodo (
	usr_id REFERENCES user,
	todo_id REFERENCES todolist,
	CONSTRAINT usertodo PRIMARY KEY (usr_id, todo_id)
);

CREATE TABLE userproject (
	usr_id REFERENCES user,
	proj_id REFERENCES project,
	CONSTRAINT userproject PRIMARY KEY (usr_id, proj_id)
);