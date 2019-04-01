-- Добавление данных в БД

INSERT INTO  categories
  (name)
  VALUES
  ('Доски и лыжи'),
  ('Крпепления'),
  ('Ботинки'),
  ('Одежда'),
  ('Инструменты'),
  ('Разное');
  INSERT INTO  users
  (email, name, password, avatar)
  VALUES
  ('stan@mail.com', 'Stan', '123qwe', 'img/stan.jpg'),
  ('kyle@mail.com', 'Kyle', 'qwe123', 'img/kyle.jpg'),
  ('eric@mail.com', 'Eric', '123123', 'img/eric.jpg'),
  ('kenny@mail.com', 'Kenny', 'qweqwe', 'img/kenny.jpg');
  INSERT INTO bets
  (add_date, price, user_id, lot_id)
  VALUES
  ('2019-01-30 10:24:00', 10200, 2, 1),
  ('2019-03-10 16:22:00', 1200, 1, 3),
  ('2019-01-25 12:21:00', 5600, 4, 4),
  ('2019-02-22 11:20:00', 4500, 3, 2);
  INSERT INTO lots
  (add_date, name, description, end_date, start_price, user_id, category_id, image, bet_step, winner_id)
  VALUES
  ('2019-03-10 00:00:00','2014 Rossignol District Snowboard','Хорошая доска','2019-03-20 00:00:00', 10999, 1, 1, 'img/lot-1.img', 200, null),
  ('2019-03-10 00:00:00','DC Ply Mens 2016/2017 Snowboard','Хорошая доска','2019-03-20 00:00:00', 59999, 1, 1, 'img/lot-2.img', 300, null),
  ('2019-03-10 00:00:00','Крепления Union Contact Pro 2015 года размер L/XL','Хорошие крепления','2019-03-20 00:00:00', 8000, 3, 2, 'img/lot-3.img', 400, null),
  ('2019-03-10 00:00:00','Ботинки для сноуборда DC Mutiny Charocal','Хорошие ботинки','2019-03-20 00:00:00', 4500, 2, 3, 'img/lot-4.img', 100, null),
  ('2019-03-10 00:00:00','Куртка для сноуборда DC Mutiny Charocal','Хорошая куртка','2019-03-20 00:00:00', 3990, 4, 4, 'img/lot-5.img', 100, null),
  ('2019-03-10 00:00:00','Маска Oakley Canopy','Хорошая маска','2019-03-20 00:00:00', 7999, 4, 6, 'img/lot-6.img', 300, null);
