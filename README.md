# Send email with query results and traversed HTML

This requires installing phpmailer library with composer
I'm not going to upload that for now.

[Demo video](https://youtu.be/PBr2qA9bHnM)

Then point the browser to (localhost:800)

##Create table.
```
CREATE TABLE `bookings` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Reservation number',
  `first_name` varchar(20) NOT NULL COMMENT 'First name',
  `last_name` varchar(20) NOT NULL COMMENT 'Lastname',
  `phone` varchar(20) NOT NULL COMMENT 'Cell or home phone number',
  `email` varchar(254) NOT NULL COMMENT 'customer email address',
  `pu_date` date NOT NULL COMMENT 'Pick-up date',
  `pu_time` time NOT NULL COMMENT 'Pick-up time',
  `pu_loc` varchar(255) NOT NULL COMMENT 'Pick-up location',
  `drop_loc` varchar(255) NOT NULL COMMENT 'Drop-off location',
  `pax_adult` tinyint(4) NOT NULL COMMENT 'Number of adults',
  `pax_child` tinyint(4) unsigned NOT NULL COMMENT 'Number of children',
  `status` tinyint(4) NOT NULL COMMENT '0= reserved, 1=paid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COMMENT='shuttle reservations';
```

- [ ] Modify testemail.php, db.php,smtp_settings.php


## The way I run this quickly is

```
php -S localhost:800
```
