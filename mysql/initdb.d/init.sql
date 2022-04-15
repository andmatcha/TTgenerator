DROP DATABASE IF EXISTS tt;

CREATE DATABASE tt;

USE tt;

DROP TABLE IF EXISTS rights;

CREATE TABLE rights(
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `right_name` VARCHAR(50)
);

DROP TABLE IF EXISTS parts;

CREATE TABLE parts (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `part_name` VARCHAR(50)
);

DROP TABLE IF EXISTS members;

CREATE TABLE members (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `member_name` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50),
  `password` VARCHAR(50),
  `right_id` INT NOT NULL DEFAULT 0 --アクセス権 一般メンバー:0, 共同管理者:1, 管理者:2
);

DROP TABLE IF EXISTS lives;

CREATE TABLE lives(
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `live_name` VARCHAR(50)
);

DROP TABLE IF EXISTS timeframes;

CREATE TABLE timeframes (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `live_id` INT NOT NULL,
  `start_time` DATETIME,
  `length` INT NOT NULL DEFAULT 30
);

DROP TABLE IF EXISTS bands;

CREATE TABLE bands (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `live_id` INT NOT NULL,
  `band_name` VARCHAR(50)
);

DROP TABLE IF EXISTS band_members;

CREATE TABLE band_members (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `band_id` INT NOT NULL,
  `member_id` INT NOT NULL,
  `part_id` INT NOT NULL,
  `priority` INT NOT NULL DEFAULT 0 -- 優先度　普通:0, 高い:1, 必須:2
);

DROP TABLE IF EXISTS attendances;

CREATE TABLE attendances (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `member_id` INT NOT NULL,
  `timeframe_id` INT NOT NULL,
  attendance INT NOT NULL -- 不参加:0, 参加:1
);
