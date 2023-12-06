create DATABASE Brief7;

create table role (
    id int primary key auto_increment,
    name varchar(50)
);


create table Usere (
    id int PRIMARY key AUTO_INCREMENT,
    username varchar(100),
    email varchar(100),
    PASSWORD varchar(150),
    role_id int,
    FOREIGN KEY role_id REFERENCES role(id)
);

create table service(
    id int PRIMARY key AUTO_INCREMENT,
    title varchar(100),
    description text
);


create table order(
    id int PRIMARY key AUTO_INCREMENT,
    status int,
    user_id int,
    service_id int,
    FOREIGN KEY user_id REFERENCES user(id),
    FOREIGN KEY service_id REFERENCES service(id)
);

create table developer (
    id int primary key ,
    expertise varchar(100),
    status int ,
    user_id int,
    order_id int,
    FOREIGN KEY user_id REFERENCES user(id),
    FOREIGN KEY order_id REFERENCES order(id)
);