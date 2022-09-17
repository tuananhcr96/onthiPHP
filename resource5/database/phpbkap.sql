
-- Chú ý tạo DATABASE và chọn DATABASE sau đó chạy lệnh sql sưới đây hoặc sử dụng chức năng imporrt

-- Tạo bảng genre
CREATE TABLE IF NOT EXISTS genre (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL UNIQUE
);

-- Thêm mưới dữ liệu mẫu vào bảng genre
INSERT INTO genre(name) VALUES
('Hành động'),
('Hành động - hài'),
('Hài'),
('Kiếm hiệp');

-- Tạo bảng movie
CREATE TABLE IF NOT EXISTS movie (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  genre_id int(11) NOT NULL,
  avatar varchar(255) NOT NULL,
  created_date date NOT NULL COMMENT 'Ngày công chiếu',
  status tinyint(1) DEFAULT '0' COMMENT 'Trạng thái giá trị 0 là Hết hạn, 1 là Công chiếu',
  intro_text text
);
-- Tạo khóa ngoại từ bảng movie tới bảng genre
ALTER TABLE movie ADD FOREIGN KEY FK_movie_genre(genre_id) REFERENCES genre(id);