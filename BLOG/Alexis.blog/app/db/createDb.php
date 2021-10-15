<?php

// Recupere la connexion à la DB
require 'dbConnect.php';

// Create USERS table
$pdo->exec("CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   username VARCHAR(255) NOT NULL,
   password CHAR(255) NOT NULL,
   role ENUM ('Author','Admin','Subscriber') NULL DEFAULT 'Subscriber',
   created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : USERS, ';



// Create ARTICLES table
$pdo->exec("CREATE TABLE articles (
   id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   user_id int DEFAULT NULL,
   title VARCHAR(255) NOT NULL,
   content text NOT NULL, 
   created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,    #Met a jour la date si modifié
   FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE NO ACTION ON UPDATE NO ACTION 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : ARTICLES, ';



// Create COMMENTS table
$pdo->exec("CREATE TABLE comments (
   id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   pseudo VARCHAR(255) NOT NULL,
   content text NOT NULL, 
   created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    #Met a jour la date si modifié
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : COMMENTS, ';



// Create CATEGORIES table
$pdo->exec("CREATE TABLE categories (
   id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   title VARCHAR(255) NOT NULL,
   content text NOT NULL                                                              
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

echo 'Tables : CATEGORIES, ';



// Create ARTICLES_COMMENTS table
$pdo->exec("CREATE TABLE articles_comments(
   article_id INT UNSIGNED NOT NULL,
   comment_id INT UNSIGNED NOT NULL,
   PRIMARY KEY(article_id,comment_id),
   CONSTRAINT fk_article 
      FOREIGN KEY(article_id)
      REFERENCES articles(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
   CONSTRAINT fk_comment 
      FOREIGN KEY(comment_id)
      REFERENCES comments(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
) DEFAULT CHARSET=utf8mb4");

echo 'Tables : ARTICLES_COMMENTS, ';



// Create USERS_ARTICLES table
$pdo->exec("CREATE TABLE users_articles(
   user_id INT UNSIGNED NOT NULL,
   article_id INT UNSIGNED NOT NULL,
   PRIMARY KEY(user_id,article_id),
   CONSTRAINT fk_user 
      FOREIGN KEY(user_id)
      REFERENCES users(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
   CONSTRAINT fk_article 
      FOREIGN KEY(article_id)
      REFERENCES articles(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
)DEFAULT CHARSET=utf8mb4");

echo 'Tables : USERS_ARTICLES, ';



// Create ARTICLES_CATEGORIES table
$pdo->exec("CREATE TABLE articles_categories(
   article_id INT UNSIGNED NOT NULL,
   category_id INT UNSIGNED NOT NULL,
   PRIMARY KEY(article_id,category_id),
   CONSTRAINT fk_article 
      FOREIGN KEY(article_id)
      REFERENCES articles(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
   CONSTRAINT fk_category 
      FOREIGN KEY(category_id)
      REFERENCES categories(id)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
) DEFAULT CHARSET=utf8mb4");
   
echo 'Tables : ARTICLES_CATEGORIES, ';
