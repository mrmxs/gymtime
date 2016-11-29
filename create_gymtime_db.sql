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
 * Таблица 'news'
 * новости спортзалов
 */

DROP TABLE IF EXISTS news;

CREATE TABLE news (
  gym_id integer REFERENCES gyms, -- ссылка на спортзал
  id SERIAL PRIMARY KEY,        -- идентификатор новости                                        
  title varchar(255) NOT NULL,  -- заголовок новости                                       
  content varchar NOT NULL,     -- контент новости
  publication date              -- дата публикации новости
);

-- COPY gyms FROM '/home/user/gyms.txt';
INSERT INTO news (gym_id, title, content, publication) VALUES
  (
    1,
    'Тренер Татьяна Прусакова сегодня показала класс, выполняя стойку в планке!',
    'В этом месяце упражнение месяца для женщин - стойка в планке. Татьяна задала тон и простояла 10 мин.20 сек!...пока это лучшее время! Вот это мотивация!!!...Принимайте участие! Ставьте цели и добивайтесь их!....',
    '2016-11-19'
  ),
  (
    2,
    'Тренер Кузнецов Владимир провел соревнования по отжиманиям от упоров!',
    'Дорогие друзья!!! В минувшие выходные в спортивном гипермаркете "Декатлон" прошли соревнования по отжиманиям от упоров! Проводил соревнования тренер нашего клуба Кузнецов Владимир! Поздравляем участников и победителей!',
    '2016-11-28'
  );
  
SELECT * FROM news;


/**
 * Таблица 'classes'
 * занятия спортзалов
 */

DROP TABLE IF EXISTS classes;

CREATE TABLE classes (
  gym_id integer REFERENCES gyms,     -- ссылка на спортзал
  id SERIAL PRIMARY KEY,              -- идентификатор занятия                                       
  name varchar(300) NOT NULL,         -- название занятия                                      
  description varchar(1000) NOT NULL, -- описание занятия
  price integer NOT NULL DEFAULT 0    -- цена занятия
);

-- COPY gyms FROM '/home/user/gyms.txt';
INSERT INTO classes (gym_id, name, description, price) VALUES
  (
    1,
    'Бассейн',
    'К вашим услугам работает бассейн с возможностью индивидуального отдыха и занятия плаванием. Бассейн 17х6, глубина 1,60-1,30.',
    300  
  ),
  (
    1,
    'Аква-аэробика',
    'Аква-аэробика - это одна из разновидностей аэробики, тренировки которой проходят в бассейне. На сегодняшний момент это самое эффективное средство для тех, кто хочет восстановить здоровье, похудеть и поддерживать себя в тонусе. Аква-аэробика показана людям всех возрастов и комплекций, благодаря отсутствию больших нагрузок и профилактике некоторых заболеваний. Главная составляющая этих тренировок - вода - создает благоприятные условия, при которых эффективность занятий повышается в несколько раз. При этом отсутствует такой высокий уровень нагрузки на человеческий организм как при занятиях на суше.',
    250
  ),
  (
    1,
    'Тхэквондо',
    'Занятия включают в себя как общеразвивающие физические упражнения и активные игры, так и обучение тхэквондо как восточному единоборству (техника и тактика ведения поединка, техника самозащиты,и др.).',
    250
  ),
  (
    1,
    'ТАЙ-БО',
    'Тай-бо – одна из фитнес-систем, в которых слиты воедино западный и восточный подходы к оздоровлению организма. Тай-бо – это синтез аэробики и восточных единоборств. Если Вас привлекают различные восточные единоборства и другие боевые искусства, то такая программа, как раз для Вас. В тайбо объединены такие виды спорта, как бокс, тхэквондо и карате. Кроме них в фитнес-программу тайбо включены элементы аэробики, в основном это шаги, и силовые упражнения.',
    250
  );
  
SELECT * FROM classes;


/**
 * Таблица 'events'
 * расписание занятий
 */

DROP TABLE IF EXISTS events;

CREATE TABLE events (
  class_id integer REFERENCES classes,  -- ссылка на занятие
  id SERIAL PRIMARY KEY,                -- идентификатор события                                      
  begin_date date NOT NULL,             -- дата начала занятия                                     
  begin_time time NOT NULL,             -- время начала занятия
  length interval NOT NULL DEFAULT '1 hours' -- продолжительность занятия
);

-- COPY gyms FROM '/home/user/gyms.txt';
INSERT INTO events (class_id, begin_date, begin_time, length) VALUES
  (1,'2016-12-10', '18:00', '2 hours'), --mo
  (1,'2016-12-10', '18:00', '2 hours'), --we
  (1,'2016-12-10', '18:00', '2 hours'), --fr
  (1,'2016-12-10', '09:00', '6 hours'), --sa
  (1,'2016-12-11', '09:00', '6 hours'), --su
  (2,'2016-12-06', '18:00', '2 hours'), --tu
  (2,'2016-12-08', '18:00', '2 hours'), --th
  (3,'2016-12-06', '18:00', '1 hours'), --mo
  (3,'2016-12-06', '18:30', '1 hours'), --we
  (3,'2016-12-06', '19:00', '1 hours'), --fr
  (4,'2016-12-06', '18:00', '1 hours'), --tu
  (4,'2016-12-06', '18:30', '1 hours'), --th
  (4,'2016-12-06', '19:00', '1 hours'); --sa
  
SELECT * FROM events;
  
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
  id varchar(50) PRIMARY KEY UNIQUE NOT NULL    -- идентификатор роли - уникальное название
);

-- COPY gyms FROM 'roles.txt';
INSERT INTO roles (id) VALUES
  ('admin'),
  ('content_manager'),
  ('trainer');
  
SELECT * FROM roles;


/**
 * Таблица 'users_roles'
 * роли, назначенные пользователям
 */

DROP TABLE IF EXISTS users_roles;

CREATE TABLE users_roles (
  user_id integer REFERENCES users,  -- идентификатор пользователя                                     
  role_id varchar(50) REFERENCES roles   -- идентификатор роли
);

-- COPY gyms FROM 'actions.txt';
INSERT INTO users_roles (user_id, role_id) VALUES
  (1,'admin'),
  (2,'content_manager'),
  (3,'trainer'); 

SELECT * FROM users_roles;
  
  
/**
 * Таблица 'actions'
 * список возможных операций
 */

DROP TABLE IF EXISTS actions;

CREATE TABLE actions (
  id varchar(50) PRIMARY KEY UNIQUE NOT NULL    -- идентификатор операций - уникальное название
);

-- COPY gyms FROM 'actions.txt';
INSERT INTO actions (id) VALUES
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


/**
 * Таблица 'actions_roles'
 * действия, доступные роли
 */

DROP TABLE IF EXISTS actions_roles;

CREATE TABLE actions_roles (
  action_id varchar(50) REFERENCES actions,  -- идентификатор действия                                    
  role_id varchar(50) REFERENCES roles       -- идентификатор роли
);

-- COPY gyms FROM 'actions.txt';
INSERT INTO actions_roles (role_id, action_id) VALUES
  ('trainer', 'add_classes'),
  ('trainer', 'change_classes'),
  ('admin', 'add_user'),
  ('admin', 'change_user'),
  ('admin', 'view_user'),
  ('content_manager', 'add_news'),
  ('content_manager', 'add_role'),
  ('content_manager', 'change_role'),
  ('content_manager', 'delete_role'),
  ('admin', 'add_action'),
  ('admin', 'change_action'),
  ('admin', 'delete_action');
  
SELECT * FROM actions_roles;
