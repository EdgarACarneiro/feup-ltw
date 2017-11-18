CREATE TABLE user (
	usr_id INTEGER PRIMARY KEY,
	usr_username VARCHAR,		-- Todo: add constraints
	usr_email VARCHAR UNIQUE,	-- Todo: add constraints
	usr_password VARCHAR NOT NULL
);

CREATE TABLE profile (
	prof_id INTEGER PRIMARY KEY REFERENCES user,
	prof_about VARCHAR
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
	todo_color INTEGER, --Dictionary needed to convert int to color
	todo_creator INTEGER REFERENCES user NOT NULL,
	todo_project INTEGER REFERENCES project
);

CREATE TABLE item (
	item_id INTEGER PRIMARY KEY,
	item_datedue DATE,
	item_dependency VARCHAR,
	item_color INTEGER, --Dictionary needed to convert int to color
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



-- POPULATE DATABASE
INSERT INTO user VALUES (1, 'SherylSandberg', 'sheryl@gmail.com', 'facebook');
INSERT INTO user VALUES (2, 'TimCook', 'timcook@hotmail.com', 'apple');
INSERT INTO user VALUES (3, 'VirginiaRometty', 'virginia@gmail.com','ibm12345');
INSERT INTO user VALUES (4, 'DennisCrowley', 'denniscrowley@gmail.com', 'foursquare');
INSERT INTO user VALUES (5, 'KevinRyan', 'kevinryan@yahoo.com', 'giltgroupe');
INSERT INTO user VALUES (6, 'LarryPage', 'larrytheboss@gmail.com', 'google');
INSERT INTO user VALUES (7, 'SteveBallmer', 'steveballmer@hotmail.com', 'microsoft');

INSERT INTO profile VALUES (1, 'COO of Facebook. Powerhouse driving the most successful company in Silicon Valley, and arguably in the world.');
INSERT INTO profile VALUES (2, 'CEO of Apple. Decision maker in a company that has revolutionized the way humans see and use technology.');
INSERT INTO profile VALUES (3, 'Chairwoman and CEO of IBM. First woman to ever lead the company. Skyrocketed to the top. 
								I also serve on the committee of the most powerful schools in the country like Columbia Business School and Northwestern University.');
INSERT INTO profile VALUES (4, 'Founder of Foursquare - one of the fastest growing companies in the last decade. 
								The application is useful for finding places to go, and seeing tips on what is good or bad when you get to where you are going.');
INSERT INTO profile VALUES (5, 'CEO of one of the biggest e-commerce sites in the world - Gilt Groupe. 
								Founded several New York-based businesses, including Business Insider, and 10gen/MongoDB, 
								and helped build DoubleClick from 1996 to 2005, first as president and later as CEO.');
INSERT INTO profile VALUES (6, 'Co-founder and CEO of the most powerful company on the Internet today. 
								My personal wealth is estimated to be $20.3 billion, ranking me #13 on the Forbes 400 list of richest Americans. 
								Active investor in alternative energy companies, such as Tesla Motors.');
INSERT INTO profile VALUES (7, 'CEO of Microsoft, joined in June 1980, becoming Microsoft’s 30th employee. Billionaire.');