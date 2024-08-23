USE mainDatabase
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

CREATE TABLE comments (
  id INT(10) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  avatar VARCHAR(300),
  _text VARCHAR(3000) NOT NULL,
  _date DATE NOT NULL,
  
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE messages (
  id INT(10) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  birth_date DATE NOT NULL,

  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE doctors (
  id INT(10) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  photo VARCHAR(300) NOT NULL,
  resume VARCHAR(3000) NOT NULL,
  
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO comments (first_name, last_name, avatar, _text, _date) VALUES
(
  'Светлана',
  'Ефремова',
  'src/assets/images/commentator-photo-1.jpg', 
'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat consequatur pariatur iste a soluta alias voluptatem in suscipit minima delectus tenetur corporis, aspernatur sint voluptate quisquam accusantium error quia id.
Quo, odit illum repellat labore recusandae impedit nisi saepe ullam deleniti iure distinctio. Ut voluptatem corrupti nulla laborum blanditiis reprehenderit ab quisquam tenetur impedit doloribus repellat quo ipsam, dolorum, alias.',
'2016-09-01'
),
(
  'Николай',
  'Абрамов',
  'src/assets/images/commentator-photo-2.webp',
  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat consequatur pariatur iste a soluta alias voluptatem in suscipit minima delectus tenetur corporis, aspernatur sint voluptate quisquam accusantium error quia id.
  Quo, odit illum repellat labore recusandae impedit nisi saepe ullam deleniti iure distinctio. Ut voluptatem corrupti nulla laborum blanditiis reprehenderit ab quisquam tenetur impedit doloribus repellat quo ipsam, dolorum, alias.',
  '2012-08-16'
),
(
  'Мия',
  'Смит',
  'src/assets/images/commentator-photo-3.jpg',
  'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aliquam a, maiores, maxime consequatur praesentium, libero dicta necessitatibus expedita tempora neque autem nihil officia reiciendis? Assumenda dignissimos exercitationem, voluptates numquam.
  Omnis voluptates, eos earum laborum modi explicabo esse iusto ab quos aperiam. Saepe consequuntur illo rem ea sint, exercitationem ad fugiat culpa eaque, omnis error esse, totam illum iste nam.',
  '2021-12-11'
);

INSERT INTO doctors (first_name, last_name, photo, resume) VALUES
(
  'Виктор',
  'Городило',
  'dist/assets/images/psychologist-photo-1.webp',
  'Виктор давно занимается психотерапией. Является одним из ведущих специалистов страны. Он искренне желает, а главное может помочь вам вернуть волю к жизни'
),
(
  'Мария',
  'Селова',
  'dist/assets/images/psychologist-photo-2.jpeg',
  'Мария в психотерапии уже более 20 лет. Она владеет различными техниками помощи потерянным душам'
);

COMMIT;