create DATABASE Brief7;

create table role (
    id int primary key auto_increment,
    name varchar(50)
);

create table permission (
    id int primary key auto_increment,
    name varchar(50)
);



create table permission_role(
    role_id int;
    permission_id int,
    FOREIGN KEY role_id REFERENCES role(id)
    FOREIGN KEY permission_id REFERENCES permission(id)
);


create table User (
    id PRIMARY key AUTO_INCREMENT,
    username varchar(100),
    email varchar(100),
    PASSWORD varchar(150),
    role_id int,
    FOREIGN KEY role_id REFERENCES role(id)
);

create table service(
    id PRIMARY key AUTO_INCREMENT,
    title varchar(100),
    description text
);


create table order(
    id PRIMARY key AUTO_INCREMENT,
    status int,
    user_id int,
    service_id int,
    FOREIGN KEY user_id REFERENCES user(id),
    FOREIGN KEY service_id REFERENCES service(id)
);

create table developer (
    id primary key ,
    expertise varchar(100),
    status int ,
    user_id int,
    order_id int,
    FOREIGN KEY user_id REFERENCES user(id),
    FOREIGN KEY order_id REFERENCES order(id)
);