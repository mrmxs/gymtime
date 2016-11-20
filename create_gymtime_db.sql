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
