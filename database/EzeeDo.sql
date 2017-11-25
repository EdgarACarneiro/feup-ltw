-- PRAGMA foreign_keys = false;

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
	creator VARCHAR REFERENCES User NOT NULL,
	parent_task INTEGER REFERENCES Task
);

CREATE TABLE Item (
	item_id INTEGER PRIMARY KEY,
	priority INTEGER,
	dependency INTEGER REFERENCES Item,
	assigneduser VARCHAR REFERENCES User,
	task_id INTEGER REFERENCES Task NOT NULL,
	description VARCHAR NOT NULL
);

CREATE TABLE UserTask (
	username REFERENCES User,
	task_id REFERENCES Task,
	CONSTRAINT UserTask PRIMARY KEY (username, task_id)
);



-- POPULATE DATABASE
INSERT INTO User VALUES (
	'SherylSandberg', 'sheryl@gmail.com', 'cbe648909034c0624c205fe219d3fbd10052c715', -- facebook
	'COO of Facebook. Powerhouse driving the most successful company in Silicon Valley, and arguably in the world.'
);
INSERT INTO User VALUES (
	'TimCook', 'timcook@hotmail.com', 'd0be2dc421be4fcd0172e5afceea3970e2f3d940', -- apple
	'CEO of Apple. Decision maker in a company that has revolutionized the way humans see and use technology.'
);
INSERT INTO User VALUES (
	'VirginiaRometty', 'virginia@gmail.com','02787ebebbea13ee3626505886387719ac010417', -- ibm12345
	'Chairwoman and CEO of IBM. First woman to ever lead the company. Skyrocketed to the top. I also serve on the committee of the most powerful schools in the country like Columbia Business School and Northwestern University.'
);
INSERT INTO User VALUES (
	'DennisCrowley', 'denniscrowley@gmail.com', '8dcf877727d58ec3f704d246396cdf612758d8f8', -- foursquare
	'Founder of Foursquare - one of the fastest growing companies in the last decade. The application is useful for finding places to go, and seeing tips on what is good or bad when you get to where you are going.'
);
INSERT INTO User VALUES (
	'KevinRyan', 'kevinryan@yahoo.com', '2e15a2c5f0af679bfc38ffcb30d3c4f013405870', -- giltgroupe
	'CEO of one of the biggest e-commerce sites in the world - Gilt Groupe. 
	Founded several New York-based businesses, including Business Insider, and 10gen/MongoDB, 
	and helped build DoubleClick from 1996 to 2005, first as president and later as CEO.'
);
INSERT INTO User VALUES (
	'LarryPage', 'larrytheboss@gmail.com', '759730a97e4373f3a0ee12805db065e3a4a649a5', -- google
	'Co-founder and CEO of the most powerful company on the Internet today. 
	My personal wealth is estimated to be $20.3 billion, ranking me #13 on the Forbes 400 list of richest Americans. 
	Active investor in alternative energy companies, such as Tesla Motors.'
);
INSERT INTO User VALUES (
	'SteveBallmer', 'steveballmer@hotmail.com', '64814a3b7fd8444a56ad3641fd3451c6deaf0757', -- microsoft
	'CEO of Microsoft, joined in June 1980, becoming Microsoft’s 30th employee. Billionaire.'
);

INSERT INTO Task VALUES (1, 'Revolutionary', 'tech', 2, '2017-12-15', 6, NULL);
INSERT INTO Task VALUES (2, 'New Website', 'web', 1, '2018-06-13', 4, NULL);
INSERT INTO Task VALUES (3, 'EzeeDo', 'ltw', 4, '2017-12-11', 1, NULL);
INSERT INTO Task VALUES (4, 'RCOM', 'FEUP', 2, '2017-12-16', 4, NULL);
INSERT INTO Task VALUES (5, 'Profile Page', 'FEUP', 3, '2017-12-09', 3, 3);
INSERT INTO Task VALUES (6, 'Login Page', 'FEUP', 3, '2017-12-05', 3, 3);
INSERT INTO Task VALUES (7, 'Main Page', 'FEUP', 3, '2017-12-08', 7, 3);
INSERT INTO Task VALUES (8, 'Improve AI', 'Google', 8, NULL, 1, NULL);
INSERT INTO Task VALUES (9, 'Prevent AI from killing humans', 'Google', 9, NULL, 2, 1);
INSERT INTO Task VALUES (10, 'Supermarket List', 'shopping', 3, NULL, 1, NULL);
INSERT INTO Task VALUES (11, 'Vacations', NULL, 6, NULL, 4, NULL);
INSERT INTO Task VALUES (12, 'Get user Feedback', 'web', NULL, NULL, 2, NULL);

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

INSERT INTO UserTask VALUES ('SherylSandberg', 2);
INSERT INTO UserTask VALUES ('SherylSandberg', 3);
INSERT INTO UserTask VALUES ('SherylSandberg', 4);
INSERT INTO UserTask VALUES ('SherylSandberg', 6);
INSERT INTO UserTask VALUES ('TimCook', 1);
INSERT INTO UserTask VALUES ('TimCook', 4);
INSERT INTO UserTask VALUES ('TimCook', 5);
INSERT INTO UserTask VALUES ('VirginiaRometty', 1);
INSERT INTO UserTask VALUES ('VirginiaRometty', 3);
INSERT INTO UserTask VALUES ('VirginiaRometty', 4);
INSERT INTO UserTask VALUES ('VirginiaRometty', 7);
INSERT INTO UserTask VALUES ('DennisCrowley', 1);
INSERT INTO UserTask VALUES ('DennisCrowley', 7);
INSERT INTO UserTask VALUES ('DennisCrowley', 2);
INSERT INTO UserTask VALUES ('DennisCrowley', 6);
INSERT INTO UserTask VALUES ('LarryPage', 1);
INSERT INTO UserTask VALUES ('LarryPage', 2);
INSERT INTO UserTask VALUES ('LarryPage', 8);
INSERT INTO UserTask VALUES ('SteveBallmer', 9);
INSERT INTO UserTask VALUES ('SteveBallmer', 10);
INSERT INTO UserTask VALUES ('SteveBallmer', 11);
INSERT INTO UserTask VALUES ('SteveBallmer', 12);



