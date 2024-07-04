<?php

namespace GoingNext\LaravelStudio\Controllers;

use GoingNext\LaravelStudio\LaravelStudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class LaravelStudioController
{
    public function __invoke(LaravelStudio $studio)
    {
        $quote = $studio->justDoIt();

        return view('laravel_studio::index', compact('quote'));
    }


    function createJsonFromDb(Request $request)
    {
        $host = $request->input('mysql_host', 'localhost');
        $port = $request->input('mysql_port', '3306');
        $dbName = $request->input('mysql_dbname', 'gn_commerce');
        $username = $request->input('mysql_username', 'root');
        $password = $request->input('mysql_password', '');
    
        try {
            // Connect to MySQL database using PDO
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbName", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Fetch tables from the database
            $stmt = $pdo->query("SHOW TABLES");
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
            $schema = [
                "app" => [
                    "modules" => [
                        "module1" => [
                            "type" => "Module",
                            "name" => "module1",
                            "entities" => []
                        ]
                    ]
                ]
            ];
    
            // Iterate through each table
            foreach ($tables as $table) {
                // Fetch columns for each table
                $stmt = $pdo->query("SHOW COLUMNS FROM $table");
                $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Count total rows for the entity (table)
                $stmtTotalRowCount = $pdo->query("SELECT COUNT(*) as total_row_count FROM $table");
                $totalRowCount = $stmtTotalRowCount->fetch(PDO::FETCH_ASSOC)['total_row_count'];
    
                // Prepare structure for table fields
                $fields = [];
                foreach ($columns as $column) {
                    // Count rows in the table for each field (use the total row count for each field)
                    $field = [
                        "type" => "Field",
                        "name" => $column['Field'],
                        "entity" => $table,
                        "table" => $table,
                        "module" => "module1", // Replace with actual module name if available
                        "null" => $column['Null'],
                        "is_pk" => $column['Key'] === 'PRI',
                        "max_length" => null, // Replace with actual max length if available
                        "precision" => null, // Replace with actual precision if available
                        "label" => $column['Field'], // Replace with actual label if available
                        "label_en" => $column['Field'], // Replace with actual English label if available
                        "rows" => $totalRowCount,
                        "data_type" => $column['Type'] // Replace with actual data type if available
                    ];
                    $fields[$column['Field']] = $field;
                }
    
                // Prepare structure for entity (table)
                $entity = [
                    "type" => "Entity",
                    "name" => $table,
                    "description" => "Description of $table", // Replace with actual description if available
                    "fields" => $fields,
                    "rows" => $totalRowCount // Add total rows count to the entity
                ];
    
                // Add entity to the module
                $schema['app']['modules']['module1']['entities'][$table] = $entity;
            }
    
            // Close the database connection
            $pdo = null;
            $filePath = base_path('packages/goingnext/laravel_studio/src/Sql/gn_commerce.json');

            //creation de dossier si n'exsite pas

            $dirPath = dirname($filePath);
            if (!file_exists($dirPath)) {
                mkdir($dirPath, 0777, true);
            }

            $schema_json=json_encode($schema, JSON_PRETTY_PRINT);

            // Save JSON to the file
            file_put_contents($filePath,  $schema_json);
    
            // Return success message
            //return "JSON schema successfully saved to LaravelStudio.php";


            // Encode schema as JSON
            return $schema_json;
    
        } catch (PDOException $e) {
            // Handle database connection error
            return "Connection failed: " . $e->getMessage();
        }
    }
    
}
