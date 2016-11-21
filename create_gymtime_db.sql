-- Cоздание базы данных 'gymtime' --

/**
 * Таблица 'gyms'
 * спортзалы
 */

DROP TABLE IF EXISTS gyms;

CREATE TABLE gyms (
  id SERIAL PRIMARY KEY,        -- идентификатор спортзала                                         
  name varchar(150) NOT NULL,   -- название спортзала
  about varchar(1000)           -- описание спортзала
);

-- COPY gyms FROM '/home/user/gyms.txt';
INSERT INTO gyms (name, about) VALUES
  ('СРЦ "Синяя птица"', 'https://vk.com/club43443915'),
  ('Фитнес клуб "Олимпик Холл"', 'https://vk.com/kostromaolympichall'),
  ('Аура_Фитнес-клуб_Кострома', 'https://vk.com/aurakostroma'),
  ('Фитнес клуб "АПЕЛЬСИН" Кострома', 'https://vk.com/fc.apelsin');
  
SELECT * FROM gyms;
  
  
/**
 * Таблица 'users'
 * пользователи
 */

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id SERIAL PRIMARY KEY,            -- идентификатор пользователя
  name varchar(100) NOT NULL,       -- ФИ пользователя
  -- first_name varchar(50) NOT NULL,  -- имя пользователя         
  -- last_name varchar(50) NOT NULL,   -- фамилия пользователя
  sex char(1),                      -- пол: 'F' for female, 'M' for male
  birthday date,                    -- дата рождения
  e_mail varchar(50) NOT NULL,      -- адрес электронной почты
  phone varchar(10),                -- телефон
  avatar varchar(100)               -- название файла аватара
);

-- COPY users FROM 'users.txt';
INSERT INTO users (birthday, e_mail, name) VALUES 
  ('1982-02-03', 'jjivjuthyid@xaker.ru', 'Шалимов Игорь'),
  ('1993-04-23', 'ruchiashyich@usa.net', 'Купревича Ольга'),
  ('1990-01-16', 'chehy@mail.ru', 'Касьяненко Владимир'),
  ('1982-11-05', 'routhe@softhome.com', 'Белова Юлия'),
  ('1993-04-17', 'pyasy@umr.ru', 'Пронин Евгений');
INSERT INTO users (birthday, e_mail, name, sex) VALUES 
  ('1982-09-01', 'nixu@email.ru', 'Федулова Оксана', 'F'),
  ('1992-11-05', 'shjivya@rol.ru', 'Янчуров Дмитрий', 'M'),
  ('1981-10-19', 'xjuvyeziex@rin.ru', 'Полунина Лидия', 'F'),
  ('1978-03-19', 'fjihyexio@email.ru', 'Контеенко Василий', 'M'),
  ('1984-10-15', 'shjiqu@land.ru', 'Наумова Кристина', 'F');
  
SELECT * FROM users;


/**
 * Таблица 'roles'
 * роли
 */

DROP TABLE IF EXISTS roles;

CREATE TABLE roles (
  id SERIAL PRIMARY KEY,       -- идентификатор роли                                      
  name varchar(50) NOT NULL    -- название роли
);

-- COPY gyms FROM 'roles.txt';
INSERT INTO roles (name) VALUES
  ('admin'),
  ('content_manager'),
  ('trainer');
  
SELECT * FROM roles;
  
  
/**
 * Таблица 'actions'
 * список возможных операций
 */

DROP TABLE IF EXISTS actions;

CREATE TABLE actions (
  id SERIAL PRIMARY KEY,       -- идентификатор операций                                     
  name varchar(50) NOT NULL    -- название операции
);

-- COPY gyms FROM 'actions.txt';
INSERT INTO actions (name) VALUES
  ('add_classes'),
  ('change_classes'),
  ('add_user'),
  ('change_user'),
  ('view_user'),
  ('add_news'),
  ('add_role'),
  ('change_role'),
  ('delete_role'),
  ('add_action'),
  ('change_action'),
  ('delete_action');
  
SELECT * FROM actions;
