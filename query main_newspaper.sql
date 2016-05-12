CREATE SCHEMA `main_newspaper` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE `main_newspaper`.`Article` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `main_newspaper`.`Image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `main_newspaper`.`Article_image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Article_id` INT NOT NULL,
  `Image_id` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

use main_newspaper;
INSERT INTO Article (title, url) VALUES
('Статья', '/statya.html');

use main_newspaper;
INSERT INTO Image (url) VALUES
('/img_1.jpeg'),
('/img_2.jpeg'),
('/img_3.jpeg');

use main_newspaper;
INSERT INTO Article_image (Article_id, Image_id) VALUES
(1, 1),
(1, 2),
(1, 3);

use main_newspaper;
SELECT a.id as aid, a.title, a.url, i.id as iid, i.url
	FROM Article_image ai
		join Article a on ai.Article_id = a.id
        join Image i on ai.Image_id = i.id;