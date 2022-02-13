INSERT INTO CATEGORY (CATEGORY_NAME)
VALUES ('Restaurant'),
	('Shopping'),
	('Nightlife'),
	('Auto repair');


INSERT INTO SERVICE (SERVICE_NAME,
	 CATEGORY_ID)
VALUES ('Thai food', 1),
	('Chinese food', 1),
	('Comfort food', 1),
	('Macedonian traditional', 1),
	('Mediteranian', 1),
	('Seafood', 1);


INSERT INTO SERVICE (SERVICE_NAME,
	 CATEGORY_ID)
VALUES ('Music venues', 3),
	('DJ', 3),
	('Live music', 3),
	('Dance clubs', 3),
	('Lounges', 3),
	('Performing arts', 3),
	('Coctail bars', 3);


INSERT INTO SERVICE (SERVICE_NAME,
	 CATEGORY_ID)
VALUES ('Tires', 4),
	('Oil change stations', 4),
	('Body shop', 4),
	('Auto parts and supplies', 4),
	('Car rental', 4);


INSERT INTO SERVICE (SERVICE_NAME,
	 CATEGORY_ID)
VALUES ('Sport equipment', 2),
	('Womens clothing', 2),
	('Mens clothing', 2),
	('Supermarket', 2),
	('Home decor', 2),
	('Cosmetics and beauty supply', 2),
	('Stationary', 2),
	('Furniture', 2);


INSERT INTO BUSINESS (BUSINESS_NAME,
	BUSINESS_PHONE,
	BUSINESS_DESCR,
	BUSINESS_HOURS,
	CATEGORY_ID)
VALUES ('Sport M', '02-222-3339', 'Best pieces of sport eqipment from the brands Adidas, Nike, Puma, Salomon, 4F etc.', 'Pon-Sab 09-21', 2),
	('Royal View', '046-555-666', 'While dining, enjoy the view of the ancient old town, the picturesque mountain tops and the ever so gracious Ohrid Lake that has enchanted many for centuries.', 'Pon-Ned 08-00', 1);


INSERT INTO BUSINESS (BUSINESS_NAME,
	BUSINESS_PHONE,
	BUSINESS_DESCR,
	BUSINESS_HOURS,
	CATEGORY_ID)
VALUES ('Tino', '046-898-969', 'Dine-in with amazing lake view and pleasant personell.', 'Pon-Sab 09-00', 1),
	('Su', '046-522-126', 'Hotel with a restaurant on the third floor, offering dining at a cozy atmosphere, overlooking the Ohrid lake.', 'Pon-Ned 08-00', 1);


INSERT INTO BUSINESS (BUSINESS_NAME,
	BUSINESS_PHONE,
	BUSINESS_DESCR,
	BUSINESS_HOURS,
	CATEGORY_ID)
VALUES ('Skopje City Mall', '02-232-232', 'Local staple for shopping & dining, with multiple levels of name-brand stores, cafes & a cinema.', 'Pon-Ned 10-22', 2),
	('Akademska kniga', '02-312-5510', 'Primary business of our company is to offer foreighn professional literature from well-known world publishers and renowned university printing houses. At the moment Akademska Kniga offers more than 70.000 different book titles with the greatest prices in the region.', 'Pon-Ned 08-00', 2);


INSERT INTO BUSINESS (BUSINESS_NAME,
	BUSINESS_PHONE,
	BUSINESS_DESCR,
	BUSINESS_HOURS,
	CATEGORY_ID)
VALUES ('Stanica26', '070-111-111', 'Stanica 26 is one of the main nightclubs where locals go to have fun. They promise good time for everyone and quality music.', 'Chet-Ned 00-05', 3),
	('Epicentar', '02-321-4061', 'Electronic music venue with local DJ performances.', 'Chet-Sab 00-05', 3),
	('Minus Eden', '02-333-333', 'Minus Eden is an alternative night club well known for its techno and house parties.', 'Chet-Sab 00-05', 3);


INSERT INTO BUSINESS (BUSINESS_NAME,
	BUSINESS_PHONE,
	BUSINESS_DESCR,
	BUSINESS_HOURS,
	CATEGORY_ID)
VALUES ('Diagnostic Auto Service Kire', '076-555-666', 'Auto machine shop in Skopje', 'Pon-Pet 10-17', 4),
	('AMSM Avto Moto Sojuz na Makedonija', '02-355-9999', 'We are modern organization with long tradition. We strive for uncompromising quality for all our services, through continuative implementation of the latest technologies and the best business practices, while constantly investing in development and advancement of our employees. We strive to rise through constant creating of additional value for our members and customers.', 'Pon-Sre 12-18', 4),
	('BMW Repair Toni', '02-333-1111', 'Quality service for all types of cars, with BMW speciality.', 'Pon-Ned 12-17', 4);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID, SERVICE_ID)
VALUES (1, 19),
	(1, 20),
	(1, 21);


INSERT INTO SERVICE (SERVICE_NAME, CATEGORY_ID)
VALUES ('Bookstore', 2);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID, SERVICE_ID)
VALUES (2, 2),
	(2,3),
	(2,5);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID, SERVICE_ID)
VALUES (3, 1),
	(3, 3),
	(3, 4),
	(3, 5);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID, SERVICE_ID)
VALUES (4, 1),
	(4, 3),
	(4, 5),
	(4, 11),
	(5, 12),
	(5,13);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID, SERVICE_ID)
VALUES (5, 19),
	(5, 20),
	(5, 21),
	(5, 22),
	(5, 23),
	(5, 24),
	(5, 25);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (6, 25),
	(6, 27);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (7, 9),
	(7, 10),
	(7, 12);


INSERT INTO SERVICE (SERVICE_NAME,
	CATEGORY_ID)
VALUES ('BMW repair', 4);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (8, 12);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (8, 7),
	(8, 8),
	(8, 9),
	(8, 10);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (9, 7),
	(9,8),
	(9,10);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (10, 16),
	(10, 17),
	(10, 18),
	(10, 14);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (11, 14),
	(11, 15),
	(11, 16);


INSERT INTO BUSINESS_SERVICE(BUSINESS_ID,
	SERVICE_ID)
VALUES (12, 14),
	(12, 15),
	(12, 16),
	(12, 17),
	(12, 28);


INSERT INTO REVIEWER (REVIEWER_NAME,
	REVIEWER_VERIFIED,
	REVIEWER_EMAIL,
	REVIEWER_PASSWORD)
VALUES ('Sara S', TRUE,'sara.stalevska@finki.ukim.mk', 'sarasara'),
	('Spase S',FALSE, 'spase.spaseski@yahoo.com', 'spasespase'),
	('Martin M',FALSE, 'martin.martinoski@hotmail.com', 'martinmartin'),
	('Martina M',FALSE, 'martinam@gmail.com', 'martinamartina'),
	('Goce G',FALSE,'gocegoceski@gmail.com', 'gocegoce'),
	('Katerina K', FALSE,'katerinak@students.finki.ukim.mk', 'katekate'),
	('Klimentina L',TRUE, 'klimentinal123@gmail.com', 'klimentinal');


INSERT INTO ADDRESS (ADDRESS_STREET,
	ADDRESS_POSTAL_CODE,
	ADDRESS_CITY,
	BUSINESS_ID)
VALUES ('Ljubljanska 4 ', '1000', 'Skopje', 1) ,
	('Teodosij Gologanov 77', '1000', 'Skopje',2) ,
	('Porta Bunjakovec', '1000', 'Skopje',2) ,
	('Jordan Mijalkov 26', '1000', 'Skopje', 3),
	('Boulevard Saint Clement of Ohrid 60a', '1000', 'Skopje', 4) ,
	('Branislav Nushikj', '1000', 'Skopje', 5) ,
	('Radishanska 159-а', '1000', 'Skopje', 6) ,
	('Grigor Prlichev 87', '7000', 'Kichevo', 7) ,
	('Jane Sandanski 66', '6000', 'Ohrid', 7) ,
	('Petar Pop Arsov 12', '4000', 'Bitola', 7) ,
	('Mihail Chakov 4', '1000', 'Skopje', 8) ,
	('Pitu Guli 55', '1000', 'Skopje',9) ,
	('Goce Delchev 66', '3550', 'Kavadarci',9) ,
	('Dimo Hadzhi Dimov 88', '2000', 'Kumanovo', 9),
	('Abas Emin 56', '6000', 'Ohrid', 10) ,
	('Pitu Guli 89', '6000', 'Ohrid', 11) ,
	('Kej Makedonija 88', '6000', 'Ohrid', 12) ,
	('Jane Sandanski 74', '6000', 'Ohrid', 12);


INSERT INTO REVIEW (REVIEW_TITLE,
	REVIEW_TEXT,
	REVIEW_STARS,
	BUSINESS_ID,
	ADDRESS_ID,
	REVIEWER_ID)
VALUES ('Not satisfied','Small selection of products at a very high price. At least the staff was nice. ', 4, 1, 1, 2),
	('Expensive','Good brands and nice outfits, but very expensive', 2, 1,1, 6),
	('Superb','Good brands and nice selection.', 2, 1,1, 1),
	('Staff is nice','Variety of quality books offered, very satisfied with the customer service, the staff is helpful and informed.', 5, 6,7, 1),
	('Quality time', 'Very nice staff and quality time spent there with friends and coffee.', 5, 6,7, 1),
	('Good nightclub','Great nightclub, but unfriendly staff.', 3, 7, 9, 1),
	('Extra','The best one ', 5, 7, 10, 1),
	('Amazing','Amazing parties, but not sure if going there again because of how rude the staff was and how expensive and mediocre the drinks were', 2, 7,8, 7),
	('Excelent','Excelent selection of DJs, best party place in Skopje', 5, 8,11, 3),
	('Crowd','Good parties but too crowded. They should let in less people at a time.', 3, 8,11, 5),
	('Expensive','Expensive drinks and terrible alcohol, rude staff. ', 1, 9, 12, 4),
	('Rude staff','One of the few nightclus of this kind, but very rude staff and very expensive, from entry fee to drinks.', 2, 9, 13, 1),
	('Amazingly fun','One of the best ones', 5, 9, 14, 1),
	('Pricey','Nice and helpful staff, got the job done, but a little too pricey. ', 4, 10,15, 5),
	('Average','Staff is neither helpful nor rude, service is somewhat satisfactory.', 3, 12,17, 5),
	('Satisfied','Staff was nice. It got the job done.', 5, 12,18, 5),
	('Slow','They finished the job well, but I had to wait a lot more than I wanted to.', 2, 12,18, 5),
	('Excelent service','Very nice personnel, excellent service at a good price', 5, 11,16, 6),
	('Affordable food','Nice staff. Good food, but not the best. Affordable. ', 4, 3,4, 6),
	('Slow, but good food','Slow service, but good food at a reasonable price. ',4, 2, 2, 7),
	('Average','Adequate service and food ', 3, 2, 3, 2),
	('Good but not amazing','Great service but very very expensive.', 3, 4, 5, 7),
	('Amazing and worth it','Amazingly experienced handyman, worth the cost.', 5,4, 5, 7);