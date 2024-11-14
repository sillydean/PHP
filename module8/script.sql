--create categories table
CREATE TABLE categories (
    id INTEGER PRIMARY KEY, -- this column is the primary key and is of the type INTEGER
    name VARCHAR(255) NOT NULL --this column is the type VARCHAR(255) and cant be NULL
);

--create the products table
CREATE TABLE products(
    id INTEGER PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category_id INTEGER NOT NULL,
    FOREIGN KEY(category_id) REFERENCES categories(id)
);

--insert data into the categories table

INSERT INTO categories(id, name) VALUES
(1, 'Fruit'),
(2, 'Bakery'),
(3, 'Dry Goods'),
(4, 'Vegetables');

--insert data into the products table

INSERT INTO products(id, name, category_id) VALUES
(1,'Apples', 1),
(2,'Bananas', 1),
(3,'Oranges', 1),
(4,'Strawberries', 1),
(5,'Bread', 2),
(6,'Cake', 2),
(7,'Cookies', 2),
(8,'Pasta', 3),
(9,'Rice', 3),
(10,'Cereal', 3);