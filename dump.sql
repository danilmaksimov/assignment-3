CREATE TABLE `user` (
    `id` int auto_increment primary key,
    `name` varchar(128) not null,
    `email` varchar(128) not null,
    constraint uq_email unique (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` VALUES ('1', 'Existing User', 'userexist@gmail.com');