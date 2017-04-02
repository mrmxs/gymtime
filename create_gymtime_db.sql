-- Cоздание базы данных 'gymtime' --

/*
 * gyms
 * news
 * classes
 * shedule
 * users
 * users_roles
 * roles
 * actions
 * actions_roles
 */

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
 
CREATE TYPE class_type AS ENUM ('class', 'event');

DROP TABLE IF EXISTS classes;

CREATE TABLE classes (
  id SERIAL PRIMARY KEY,                    -- идентификатор занятия  
  gym_id integer REFERENCES gyms,           -- ссылка на спортзал  
  type class_type NOT NULL DEFAULT 'class', -- тип занятия                                   
  name varchar(300) NOT NULL,               -- название занятия                                      
  description varchar(2000) NOT NULL,       -- описание занятия
  date varchar(150) NOT NULL,               -- дата проведения
  isactive boolean NOT NULL DEFAULT 'yes'   -- активность занятия
);

-- COPY gyms FROM '/home/user/gyms.txt';
INSERT INTO classes (gym_id, name, description, date, isactive, type) VALUES
  (
    1,
    'Бассейн',
    'К вашим услугам работает бассейн с возможностью индивидуального отдыха и занятия плаванием. Бассейн 17х6, глубина 1,60-1,30.',
    'Понедельник, среда, пятница с 18:00 до 20:00; суббота, воскресенье с 9:00 до 15:00',
    'yes',
    'class'  
  ),
  (
    1,
    'Аква-аэробика',
    'Аква-аэробика - это одна из разновидностей аэробики, тренировки которой проходят в бассейне. На сегодняшний момент это самое эффективное средство для тех, кто хочет восстановить здоровье, похудеть и поддерживать себя в тонусе. Аква-аэробика показана людям всех возрастов и комплекций, благодаря отсутствию больших нагрузок и профилактике некоторых заболеваний. Главная составляющая этих тренировок - вода - создает благоприятные условия, при которых эффективность занятий повышается в несколько раз. При этом отсутствует такой высокий уровень нагрузки на человеческий организм как при занятиях на суше.',
    'Вторник, четверг с 18:00 до 20:00',
    'yes',
    'class'
  ),
  (
    1,
    'Тхэквондо',
    'Занятия включают в себя как общеразвивающие физические упражнения и активные игры, так и обучение тхэквондо как восточному единоборству (техника и тактика ведения поединка, техника самозащиты,и др.).',
    'Понедельник с 18:00 до 19:00; среда с 18:30 до 19:30; пятница с 19:00 до 20:00',
    'yes',
    'class'
  ),
  (
    1,
    'ТАЙ-БО',
    'Тай-бо – одна из фитнес-систем, в которых слиты воедино западный и восточный подходы к оздоровлению организма. Тай-бо – это синтез аэробики и восточных единоборств. Если Вас привлекают различные восточные единоборства и другие боевые искусства, то такая программа, как раз для Вас. В тайбо объединены такие виды спорта, как бокс, тхэквондо и карате. Кроме них в фитнес-программу тайбо включены элементы аэробики, в основном это шаги, и силовые упражнения.',
    'Вторник с 18:00 до 19:00; четверг с 18:30 до 19:30; суббота с 10:00 до 11:00',
    'no',
    'class'
  ),
  (
    1,
    'Открытая тренировка "Как накачать ягодичные мышцы"',
    'Милые девушки и женщины!🌷👗👠👙 
В тренажерном зале "Синяя птица" 1 апреля в 12-00 состоится открытая тренировка💪💪💪
В свете подготовки к пляжному сезону, мы посвящаем тренировку теме"как накачать ягодичные мышцы"🌰🌰🌰
Тренировку проводит инструктор тренажёрного зала Смирнов Анатолий, в рамках тренировки будут показаны базовые упражнения для ног и разобраны типичные ошибки!💪💪💪
Вы ещё думаете как сделать "орешек" к лету!🌰🌰🌰Не думайте, а приходите и смотрите!👀👀👀Ждём вас 1 апреля в 12-00 в тренажерном зале "Синяя птица"!💪👍 (2017/03/27 https://vk.com/wall-43443915_1953)',
    '1 апреля 2017 в 12:00',
    'yes',
    'event'
  ),
  (
    1,
    'Открытая силовая тренировка с Дарьей Бухаревой в рамках фестиваля спорт',
    'В рамках фестиваля спорта СРЦ "Синяя птица" проводит открытую силовую тренировку с Дарьей Бухаревой! Мы приглашаем всех желающих завтра в субботу 27 августа на площадку ТЦ "Экспострой". Время начала тренировки -12.20 час. При себе иметь спортивную форму и хорошее настроение!
Независимо от погоды -БУДЕТ ЖАРКО!!!👍💪💪💪 (26/08/2016 https://vk.com/wall-43443915_1133)',
    '27 августа 2016 в 12:20',
    'no',
    'event'
  ),
  (
    3,
    'Сайкл: бесплатное занятие в ТРЦ Коллаж',
    'Друзья все кто не пробовал Сайкл и хочет попробовать данное направление приглашаем в Коллаж на бесплатное занятие- 16 июля в 15-00.
"просьба записаться в группе Трц Коллаж" (16/07/2016 https://vk.com/wall-80272742_2107)',
    '16 июля 2016 в 15:00',
    'no',
    'event'
  ),
  (
    4,
    'Открытая тренировка с Денисом Соковым по жиму штанги лежа',
    'Дорогие друзья, сегодня состоится открытая тренировка с Денисом Соковым по жиму штанги лежа. Тренировка пройдет в фитнес-клубе "Апельсин" в 19.00. Ждем всех желающих!💪 Вход свободный!!! (https://vk.com/wall-115625784_1279)',
    '22 марта 2017 в 19.00',
    'yes',
    'event'
  );
  
SELECT * FROM classes;


/**
 * Таблица 'schedule'
 * расписание занятий
 */

DROP TABLE IF EXISTS schedule;

CREATE TABLE schedule (
  class_id integer REFERENCES classes,  -- ссылка на занятие
  id SERIAL PRIMARY KEY,                -- идентификатор события                                      
  begin_date date NOT NULL,             -- дата начала занятия                                     
  begin_time time NOT NULL,             -- время начала занятия
  length interval NOT NULL DEFAULT '1 hours' -- продолжительность занятия
);

-- COPY gyms FROM '/home/user/gyms.txt';
INSERT INTO schedule (class_id, begin_date, begin_time, length) VALUES
  (1,'2016-12-10', '18:00', '2 hours'), --mo
  (1,'2016-12-10', '18:00', '2 hours'), --we
  (1,'2016-12-10', '18:00', '2 hours'), --fr
  (1,'2016-12-10', '09:00', '6 hours'), --sa
  (1,'2016-12-11', '09:00', '6 hours'), --su
  (2,'2016-12-06', '18:00', '2 hours'), --tu
  (2,'2016-12-08', '18:00', '2 hours'), --th
  (3,'2016-12-05', '18:00', '1 hours'), --mo
  (3,'2016-12-07', '18:30', '1 hours'), --we
  (3,'2016-12-09', '19:00', '1 hours'), --fr
  (4,'2016-12-06', '18:00', '1 hours'), --tu
  (4,'2016-12-08', '18:30', '1 hours'), --th
  (4,'2016-12-10', '10:00', '1 hours'), --sa
  --events
  (5,'2017-04-01', '12:00', '2 hours'), 
  (6,'2016-08-27', '12:20', '2 hours'), 
  (7,'2016-07-16', '15:00', '2 hours'), 
  (8,'2017-03-22', '19:00', '2 hours'); 
  
SELECT * FROM schedule;
  
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
 * Таблица 'users_registered_on_classes'
 * пользователи, зарегистрированные на занятии
 */

DROP TABLE IF EXISTS users_registered_on_classes;

CREATE TABLE users_registered_on_classes (
  user_id integer REFERENCES users,     -- идентификатор пользователя                                     
  class_id integer REFERENCES classes   -- идентификатор класса
);

-- COPY gyms FROM 'actions.txt';
INSERT INTO users_registered_on_classes (user_id, class_id) VALUES
  (1,1), (2,2), (3,3), (4,4), (5,1), (6,2); 

SELECT * FROM users_registered_on_classes;


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
