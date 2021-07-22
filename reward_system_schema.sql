
-- ************************************** `Customers`

CREATE TABLE `Customers`
(
 `id`              int NOT NULL ,
 `username`        varchar(45) NOT NULL ,
 `email`           varchar(45) NOT NULL ,
 `mobile`          varchar(45) NOT NULL ,
 `status`          enum('y','n') NOT NULL ,
 `created_at`      date NOT NULL ,
 `updated_at`      date NOT NULL ,
 `last_login_date` date NOT NULL ,

PRIMARY KEY (`id`)
);


-- ************************************** `order_list`

CREATE TABLE `order_list`
(
 `id`               int NOT NULL ,
 `product_id`       int NOT NULL ,
 `created_at`       date NOT NULL ,
 `updated_at`       date NOT NULL ,
 `product_amount`   float NOT NULL ,
 `product_discount` float NOT NULL ,
 `order_id`         int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_64` (`order_id`),
CONSTRAINT `FK_63` FOREIGN KEY `fkIdx_64` (`order_id`) REFERENCES `Orders` (`id`)
);




-- ************************************** `Orders`

CREATE TABLE `Orders`
(
 `id`           int NOT NULL ,
 `created_at`   date NOT NULL ,
 `updated_at`   date NOT NULL ,
 `status`       enum('pending','failed','complete') NOT NULL ,
 `total_amount` float NOT NULL ,
 `customer_id`  int NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_57` (`customer_id`),
CONSTRAINT `FK_56` FOREIGN KEY `fkIdx_57` (`customer_id`) REFERENCES `Customers` (`id`)
);



-- ************************************** `reward_conversion_detail`

CREATE TABLE `reward_conversion_detail`
(
 `id`                    int NOT NULL ,
 `currency`              varchar(45) NOT NULL ,
 `symbol`                varchar(45) NOT NULL ,
 `equivalent_point_rate` float NOT NULL ,
 `created_at`            date NOT NULL ,
 `updated_at`            date NOT NULL ,

PRIMARY KEY (`id`)
);



-- ************************************** `rewards`

CREATE TABLE `rewards`
(
 `id`             int NOT NULL ,
 `point`          float NOT NULL ,
 `customer_id`    int NOT NULL ,
 `order_id`       int NOT NULL ,
 `current_status` enum('enable','disable') NOT NULL ,
 `created_at`     date NOT NULL ,
 `updated_at`     date NOT NULL ,
 `expiry_at`      date NOT NULL ,

PRIMARY KEY (`id`),
KEY `fkIdx_67` (`order_id`),
CONSTRAINT `FK_66` FOREIGN KEY `fkIdx_67` (`order_id`) REFERENCES `Orders` (`id`),
KEY `fkIdx_70` (`customer_id`),
CONSTRAINT `FK_69` FOREIGN KEY `fkIdx_70` (`customer_id`) REFERENCES `Customers` (`id`)
);
