PRAGMA foreign_keys = false;

CREATE TABLE User (
	user_id INTEGER PRIMARY KEY,
	username VARCHAR UNIQUE,
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
	creator INTEGER REFERENCES User NOT NULL
);

CREATE TABLE TodoList (
	task_id INTEGER PRIMARY KEY REFERENCES Task NOT NULL,
	project_id INTEGER REFERENCES Task
);

CREATE TABLE Item (
	item_id INTEGER PRIMARY KEY,
	priority INTEGER,
	dependency INTEGER REFERENCES Item,
	assigneduser INTEGER REFERENCES User,
	todolist INTEGER REFERENCES TodoList NOT NULL,
	description VARCHAR NOT NULL
);

CREATE TABLE UserTask (
	user_id REFERENCES User,
	task_id REFERENCES Task,
	CONSTRAINT UserTask PRIMARY KEY (user_id, task_id)
);



-- POPULATE DATABASE
INSERT INTO User VALUES (
	1, 'SherylSandberg', 'sheryl@gmail.com', 'facebook',
	'COO of Facebook. Powerhouse driving the most successful company in Silicon Valley, and arguably in the world.'
);
INSERT INTO User VALUES (
	2, 'TimCook', 'timcook@hotmail.com', 'apple',
	'CEO of Apple. Decision maker in a company that has revolutionized the way humans see and use technology.'
);
INSERT INTO User VALUES (
	3, 'VirginiaRometty', 'virginia@gmail.com','ibm12345',
	'Chairwoman and CEO of IBM. First woman to ever lead the company. Skyrocketed to the top. I also serve on the committee of the most powerful schools in the country like Columbia Business School and Northwestern University.'
);
INSERT INTO User VALUES (
	4, 'DennisCrowley', 'denniscrowley@gmail.com', 'foursquare',
	'Founder of Foursquare - one of the fastest growing companies in the last decade. The application is useful for finding places to go, and seeing tips on what is good or bad when you get to where you are going.'
);
INSERT INTO User VALUES (
	5, 'KevinRyan', 'kevinryan@yahoo.com', 'giltgroupe',
	'CEO of one of the biggest e-commerce sites in the world - Gilt Groupe. 
	Founded several New York-based businesses, including Business Insider, and 10gen/MongoDB, 
	and helped build DoubleClick from 1996 to 2005, first as president and later as CEO.'
);
INSERT INTO User VALUES (
	6, 'LarryPage', 'larrytheboss@gmail.com', 'google',
	'Co-founder and CEO of the most powerful company on the Internet today. 
	My personal wealth is estimated to be $20.3 billion, ranking me #13 on the Forbes 400 list of richest Americans. 
	Active investor in alternative energy companies, such as Tesla Motors.'
);
INSERT INTO User VALUES (
	7, 'SteveBallmer', 'steveballmer@hotmail.com', 'microsoft',
	'CEO of Microsoft, joined in June 1980, becoming Microsoft’s 30th employee. Billionaire.'
);

INSERT INTO Task VALUES (1, 'Revolutionary', 'tech', 2, '2017-12-15', 6);
INSERT INTO Task VALUES (2, 'New Website', 'web', 1, '2018-06-13', 4);
INSERT INTO Task VALUES (3, 'EzeeDo', 'ltw', 4, '2017-12-11', 1);
INSERT INTO Task VALUES (4, 'RCOM', 'FEUP', 2, '2017-12-16', 4);

INSERT INTO Task VALUES (5, 'Profile Page', 'FEUP', 3, '2017-12-09', 3);
INSERT INTO TodoList VALUES (5, 3);

INSERT INTO Task VALUES (6, 'Login Page', 'FEUP', 3, '2017-12-05', 3);
INSERT INTO TodoList VALUES (6, 3);

INSERT INTO Task VALUES (7, 'Main Page', 'FEUP', 3, '2017-12-08', 7);
INSERT INTO TodoList VALUES (7, 3);

INSERT INTO Task VALUES (8, 'Improve AI', 'Google', 8, NULL, 1);
INSERT INTO TodoList VALUES (8, NULL);

INSERT INTO Task VALUES (9, 'Prevent AI from killing humans', 'Google', 9, NULL, 2);
INSERT INTO TodoList VALUES (9, 1);

INSERT INTO Task VALUES (10, 'Supermarket List', 'shopping', 3, NULL, 1);
INSERT INTO TodoList VALUES (10, NULL);

INSERT INTO Task VALUES (11, 'Vacations', NULL, 6, NULL, 4);
INSERT INTO TodoList VALUES (11, NULL);

INSERT INTO Task VALUES (12, 'Get user Feedback', 'web', NULL, NULL, 2);
INSERT INTO TodoList VALUES (12, NULL);


INSERT INTO Item VALUES (1, 2, NULL, 4, 1, 'Implement communication protocol');
INSERT INTO Item VALUES (2, NULL, NULL, NULL, 1, 'Make UI user enjoyable');
INSERT INTO Item VALUES (3, 1, 1, 5, 1, 'Gather all the statistics for the report');
INSERT INTO Item VALUES (4, 5, 6, 1, 2, 'Add a background for User profiles');
INSERT INTO Item VALUES (5, NULL, 7, NULL, 2, 'Implment PHP reading from database for User information');
INSERT INTO Item VALUES (6, NULL, NULL, NULL, 3, 'Get error message if email is repeated');
INSERT INTO Item VALUES (7, NULL, NULL, NULL, 3, 'Add a animation to the page, making it more visually pleasant');
INSERT INTO Item VALUES (8, 9, 8, 7, 3, 'Eror on User sign in: fix');
INSERT INTO Item VALUES (9, NULL, 3, NULL, 3, 'Change page main color - CSS');
INSERT INTO Item VALUES (10, 9, 2, NULL, 3, 'Change icone in the page header');
INSERT INTO Item VALUES (11, NULL, NULL, NULL, 4, 'Make the flow design more smooth');
INSERT INTO Item VALUES (12, 11, 1, NULL, 4, 'Error: Projects not getting their respective color correctly');
INSERT INTO Item VALUES (13, NULL, NULL, NULL, 5, 'AI performance is really bad. Please look at the code boysss');
INSERT INTO Item VALUES (14, NULL, NULL, 6, 6, 'AI try to murder people when they hear specific sentences');
INSERT INTO Item VALUES (15, 14, NULL, 7, 6, 'Make AIs unable to harm humans, under any circumstance');
INSERT INTO Item VALUES (16, NULL, NULL, NULL, 7, 'apples');
INSERT INTO Item VALUES (17, NULL, NULL, NULL, 7, 'bananas');
INSERT INTO Item VALUES (18, NULL, NULL, NULL, 7, 'rice');
INSERT INTO Item VALUES (19, NULL, NULL, NULL, 7, 'toilet paper');
INSERT INTO Item VALUES (20, NULL, NULL, NULL, 7, 'chocolate');
INSERT INTO Item VALUES (21, NULL, NULL, NULL, 7, 'bread');
INSERT INTO Item VALUES (22, NULL, NULL, NULL, 7, 'water');
INSERT INTO Item VALUES (23, NULL, NULL, NULL, 7, 'milk');
INSERT INTO Item VALUES (24, NULL, NULL, NULL, 7, 'aftershave');
INSERT INTO Item VALUES (25, 26, NULL, NULL, 8, 'See price of flights to Oporto');
INSERT INTO Item VALUES (26, NULL, 6, NULL, 8, 'Confirm dinner with Steve in 3rd March');
INSERT INTO Item VALUES (27, NULL, 7, NULL, 9, 'Try a survey online about the site aspect');
INSERT INTO Item VALUES (28, NULL, 7, NULL, 9, 'Bring people on to try the beta');
INSERT INTO Item VALUES (29, NULL, 6, NULL, 9, 'Make online survey about how they would want a site like ours to look like');

INSERT INTO UserTask VALUES (1, 2);
INSERT INTO UserTask VALUES (1, 3);
INSERT INTO UserTask VALUES (1, 4);
INSERT INTO UserTask VALUES (1, 6);
INSERT INTO UserTask VALUES (2, 1);
INSERT INTO UserTask VALUES (2, 4);
INSERT INTO UserTask VALUES (2, 5);
INSERT INTO UserTask VALUES (3, 1);
INSERT INTO UserTask VALUES (3, 3);
INSERT INTO UserTask VALUES (3, 4);
INSERT INTO UserTask VALUES (3, 7);
INSERT INTO UserTask VALUES (4, 1);
INSERT INTO UserTask VALUES (4, 7);
INSERT INTO UserTask VALUES (5, 2);
INSERT INTO UserTask VALUES (5, 6);
INSERT INTO UserTask VALUES (6, 1);
INSERT INTO UserTask VALUES (6, 2);
INSERT INTO UserTask VALUES (6, 8);
INSERT INTO UserTask VALUES (7, 9);
INSERT INTO UserTask VALUES (8, 10);
INSERT INTO UserTask VALUES (9, 11);
INSERT INTO UserTask VALUES (9, 12);



