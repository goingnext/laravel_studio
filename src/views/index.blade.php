<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        {{-- <h1>{{ $quote }}</h1> --}}
        <h1>Hello Studio</h1>
        <p>Cette interface va vous assister pour créer votre projet en 3 étapes</p>
        <ol>

            <li>
                <ol>
                    <li>Se connecter à une base Mysql (pour lire son schéma) </li>
                    <li>Ou choisir la base exemple <b>gn_commerce</b></li>
{{--                     <code><?php include("gn_commerce.sql");?></code>
 --}}
                    <code>
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
                        
                        

                    </code>
                    <form action="{{ route('createJsonFromDb') }}" method="POST">
                        @csrf
                        MySQL Server: <input type="text" name="mysql_server" value="localhost"><br>
                        MySQL Port: <input type="text" name="mysql_port" value="3306"><br>
                        MySQL Database Name: <input type="text" name="mysql_database" value="gn_commerce"><br>
                        MySQL Username: <input type="text" name="mysql_username" value="root"><br>
                        MySQL Password: <input type="password" name="mysql_password" value=""><br>
                        <button class="btn btn-success" type="submit">Import gn_commerce Database</button>
                    </form>
                    Ouvrir le studio pour visualiser le modèle de données et raffiner son paramétrage
                </ol>

            </li>
            <li>GN App Designer :
                Paramétrer les entités
                Manuellement (grauit)
                Automatiquement (payant)
                Créer la spec d’un écran manuellement
                1 - en mode json (grauit)
                2- avec le studio en drag n drop (grauit ???)
                Générer les Specs des Ecrans backoffice d’une entité
                Automatiquement (payant)
                Générer les Specs des Ecrans Front office
                Visualiser l’appli générée directement dans une nouvelle fenêtre localhost/laravel/demo_app/studio/
                Démontrer les fonctionnalités du Backoffice</li>
            <li>
                GN Developer : Démontrer le studio pour
                visualiser les écrans et raffiner leur paramétrage
                Visualiser et Editer le code généré (blades, controllers, etc..)
                Démontrer l’ajout d’une custom action dans le studio et le résultat final ds l’appli créée
            </li>
        </ol>



    </div>
</body>

</html>
