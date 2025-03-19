USE sampledatabase;

CREATE TABLE billie_songs (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
album VARCHAR(255) NOT NULL,
release_date DATE,
chart_position INT
);

INSERT INTO billie_songs (title, album, release_date, chart_position) VALUES
('bad guy', 'WHEN WE ALL FALL ASLEEP, WHERE DO WE GO?', '2019-03-29', 1),
('ocean eyes', 'Don\'t Smile at Me', '2016-11-18', 84),
('Happier Than Ever', 'Happier Than Ever', '2021-07-30', 11),
('everything i wanted', 'Single', '2019-11-13', 8);