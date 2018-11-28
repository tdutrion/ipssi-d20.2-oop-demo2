CREATE TABLE customer (
  id int unsigned auto_increment primary key,
  name varchar(255) not null,
  address text not null
);

CREATE TABLE invoice (
  id int unsigned auto_increment primary key,
  creation_date datetime not null,
  status enum('paid', 'sent', 'initialized') not null,
  client_id int unsigned not null,
  total_price_tax_included float not null,
  constraint invoice_customer_id_fk foreign key (client_id) references customer (id)
);

INSERT INTO customer(id, name, address) VALUES
(1, 'Carlin Bernardino', 'Vermont, USA'),
(2, 'Rubina Checo', 'Fairview, USA'),
(3, 'Dicky Swaby', 'Hudson, USA'),
(4, 'Quintana Aubery', 'Magdeline, USA'),
(5, 'Kennith Shemilt', 'Eagle Crest, USA'),
(6, 'Veronica Giraudat', 'Prairieview, USA'),
(7, 'Gherardo Cassely', 'Northland, USA'),
(8, 'Adolph Cockroft', 'Shoshone, USA'),
(9, 'Clayson Bisatt', 'School, USA'),
(10, 'Cacilie Bryce', 'Hazelcrest, USA');

INSERT INTO invoice (id, creation_date, status, client_id, total_price_tax_included) VALUES
(1, '2017-12-04 21:28:32', 'initialized', 6, 3836),
(2, '2018-10-27 15:29:07', 'initialized', 8, 5344),
(3, '2018-09-03 01:58:41', 'initialized', 1, 7870),
(4, '2018-02-04 20:53:41', 'initialized', 3, 4263),
(5, '2018-03-22 20:59:55', 'initialized', 5, 211),
(6, '2018-11-07 18:56:49', 'initialized', 5, 3960),
(7, '2018-01-24 21:09:12', 'initialized', 9, 3800),
(8, '2018-06-20 00:53:28', 'initialized', 9, 8225),
(9, '2018-11-04 09:26:30', 'initialized', 10, 3766),
(10, '2018-01-26 10:05:02', 'initialized', 10, 2244),
(11, '2018-02-26 17:05:15', 'initialized', 5, 2064),
(12, '2018-08-01 07:12:02', 'initialized', 3, 9513),
(13, '2018-11-23 11:48:09', 'initialized', 4, 9548),
(14, '2018-04-21 08:38:27', 'initialized', 5, 9941),
(15, '2018-10-16 06:14:17', 'initialized', 10, 5958),
(16, '2017-12-11 03:32:10', 'initialized', 4, 7458),
(17, '2017-11-29 08:04:23', 'initialized', 2, 9251),
(18, '2018-11-13 11:29:35', 'initialized', 10, 3385),
(19, '2017-12-25 09:54:27', 'initialized', 6, 5642),
(20, '2018-10-20 17:03:35', 'initialized', 7, 2449);
