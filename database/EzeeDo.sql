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
	todo_title VARCHAR NOT NULL,
	todo_category VARCHAR,
	todo_color INTEGER, --Dictionary needed to convert int to color
	todo_creator INTEGER REFERENCES user NOT NULL,
	todo_project INTEGER REFERENCES project
);

CREATE TABLE item (
	item_id INTEGER PRIMARY KEY,
	item_datedue DATE,
	item_dependency INTEGER REFERENCES item,
	item_color INTEGER, --Dictionary needed to convert int to color
	item_assigneduser INTEGER REFERENCES user,
	item_todolist INTEGER REFERENCES todolist NOT NULL,
	item_description VARCHAR NOT NULL
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

INSERT INTO project VALUES (1, 'Revolutionary', 'tech', NULL, NULL, 6);
INSERT INTO project VALUES (2, 'New Website', 'web development', 1, '2018-06-13', 4);
INSERT INTO project VALUES (3, 'EzeeDo', 'ltw', 4, '2017-12-11', 1);

INSERT INTO todolist VALUES (1, 'RCOM', NULL, NULL, 4, NULL);
INSERT INTO todolist VALUES (2, 'Profile Page', 'FEUP', 3, 1, 3);
INSERT INTO todolist VALUES (3, 'Login Page', 'FEUP', 3, 3, 3);
INSERT INTO todolist VALUES (4, 'Main Page', 'FEUP', 3, 1, 3);
INSERT INTO todolist VALUES (5, 'Improve AI', 'Google', 8, 6, 1);
INSERT INTO todolist VALUES (6, 'Prevent AI from killing humans', 'Google', 9, 6, 1);
INSERT INTO todolist VALUES (7, 'Supermarket List', 'shopping', 3, 5, NULL);
INSERT INTO todolist VALUES (8, 'Vacations', NULL, 6, 7, NULL);
INSERT INTO todolist VALUES (9, 'Get user Feedback', 'web development', NULL, 2, 2);

INSERT INTO item VALUES (1, '2017-12-15', 2, NULL, 4, 1, 'Implement communication protocol');
INSERT INTO item VALUES (2, '2017-12-11', NULL, 3, NULL, 1, 'Make UI user enjoyable');
INSERT INTO item VALUES (3, NULL, 1, NULL, 5, 1, 'Gather all the statistics for the report');
INSERT INTO item VALUES (4, NULL, 5, 6, 1, 2, 'Add a background for User profiles');
INSERT INTO item VALUES (5, NULL, NULL, 7, NULL, 2, 'Implment PHP reading from database for User information');
INSERT INTO item VALUES (6, '2017-12-12', NULL, NULL, NULL, 3, 'Get error message if email is repeated');
INSERT INTO item VALUES (7, NULL, NULL, NULL, NULL, 3, 'Add a animation to the page, making it more visually pleasant');
INSERT INTO item VALUES (8, '2017-12-7', 9, 8, 7, 3, 'Eror on User sign in: fix');
INSERT INTO item VALUES (9, NULL, NULL, 3, NULL, 3, 'Change page main color - CSS');
INSERT INTO item VALUES (10, '2017-12-13', 9, 2, NULL, 3, 'Change icone in the page header');
INSERT INTO item VALUES (11, '2017-12-10', NULL, NULL, NULL, 4, 'Make the flow design more smooth');
INSERT INTO item VALUES (12, '2017-12-08', 11, 1, NULL, 4, 'Error: Projects not getting their respective color correctly');
INSERT INTO item VALUES (13, NULL, NULL, NULL, NULL, 5, 'AI performance is really bad. Please look at the code boysss');
INSERT INTO item VALUES (14, NULL, NULL, NULL, 6, 6, 'AI try to murder people when they hear specific sentences');
INSERT INTO item VALUES (15, NULL, 14, NULL, 7, 6, 'Make AIs unable to harm humans, under any circumstance');
INSERT INTO item VALUES (16, NULL, NULL, NULL, NULL, 7, 'apples');
INSERT INTO item VALUES (17, NULL, NULL, NULL, NULL, 7, 'bananas');
INSERT INTO item VALUES (18, NULL, NULL, NULL, NULL, 7, 'rice');
INSERT INTO item VALUES (19, NULL, NULL, NULL, NULL, 7, 'toilet paper');
INSERT INTO item VALUES (20, NULL, NULL, NULL, NULL, 7, 'chocolate');
INSERT INTO item VALUES (21, NULL, NULL, NULL, NULL, 7, 'bread');
INSERT INTO item VALUES (22, NULL, NULL, NULL, NULL, 7, 'water');
INSERT INTO item VALUES (23, NULL, NULL, NULL, NULL, 7, 'milk');
INSERT INTO item VALUES (24, NULL, NULL, NULL, NULL, 7, 'aftershave');
INSERT INTO item VALUES (25, NULL, 26, NULL, NULL, 8, 'See price of flights to Oporto');
INSERT INTO item VALUES (26, '2018-03-01', NULL, 6, NULL, 8, 'Confirm dinner with Steve in 3rd March');
INSERT INTO item VALUES (27, '2018-02-15', NULL, 7, NULL, 9, 'Try a survey online about the site aspect');
INSERT INTO item VALUES (28, '2018-05-10', NULL, 7, NULL, 9, 'Bring people on to try the beta');
INSERT INTO item VALUES (29, '2018-06-01', NULL, 6, NULL, 9, 'Make online survey about how they would want a site like ours to look like');

INSERT INTO usertodo VALUES (1, 3);
INSERT INTO usertodo VALUES (1, 4);
INSERT INTO usertodo VALUES (2, 1);
INSERT INTO usertodo VALUES (2, 4);
INSERT INTO usertodo VALUES (3, 7);
INSERT INTO usertodo VALUES (3, 1);
INSERT INTO usertodo VALUES (3, 4);
INSERT INTO usertodo VALUES (4, 7);
INSERT INTO usertodo VALUES (4, 1);
INSERT INTO usertodo VALUES (5, 2);
INSERT INTO usertodo VALUES (5, 6);
INSERT INTO usertodo VALUES (6, 6);
INSERT INTO usertodo VALUES (6, 2);
INSERT INTO usertodo VALUES (6, 1);
INSERT INTO usertodo VALUES (7, 5);
INSERT INTO usertodo VALUES (8, 4);
INSERT INTO usertodo VALUES (9, 3);
INSERT INTO usertodo VALUES (9, 4);

INSERT INTO userproject VALUES (1, 6);
INSERT INTO userproject VALUES (1, 2);
INSERT INTO userproject VALUES (1, 3);
INSERT INTO userproject VALUES (2, 5);
INSERT INTO userproject VALUES (2, 4);
INSERT INTO userproject VALUES (3, 3);
INSERT INTO userproject VALUES (3, 1);
INSERT INTO userproject VALUES (3, 7);

