CREATE TABLE categories (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(255) NOT NULL,
                            description TEXT,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        );
                        
                        CREATE TABLE products (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(255) NOT NULL,
                            description TEXT,
                            price DECIMAL(10, 2) NOT NULL,
                            category_id INT,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
                        );
                        
                        
                        INSERT INTO categories (name, description) VALUES
                            ('Electronics', 'Electronic products and gadgets'),
                            ('Clothing', 'Clothing for men, women, and children'),
                            ('Books', 'Books of various genres'),
                            ('Home and Garden', 'Home and garden items'),
                            ('Sports and Outdoors', 'Sports equipment and leisure items');
                        
                        INSERT INTO products (name, description, price, category_id) VALUES
                            ('Smartphone XYZ', 'A powerful smartphone with advanced features.', 599.99, 1),
                            ('Laptop ABC', 'Lightweight and powerful laptop for daily use.', 899.99, 1),
                            ('SmartFit Smartwatch', 'Smartwatch with health and activity tracking.', 129.99, 1),
                            ('Cotton Shirt', 'Casual cotton shirt for men.', 39.99, 2),
                            ('Elegant Evening Dress', 'Long evening dress for women.', 149.99, 2),
                            ('Book "The Lord of the Rings"', 'Epic fantasy novel by J.R.R. Tolkien.', 29.99, 3),
                            ('Non-stick Cookware Set', 'Set of non-stick kitchen cookware.', 79.99, 4),
                            ('4-Person Camping Tent', 'Spacious tent for outdoor adventures.', 199.99, 5);
                        
                        
