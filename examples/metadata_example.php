<?php

require_once __DIR__ . '/common.php';

use BambooHR\SDK\Model\Field;
use BambooHR\SDK\Model\Table;

try {
    // Create a BambooHR client
    $client = createBambooHRClient();

    echo "=== Metadata Resource Examples ===\n\n";

    // Example 1: Get all available fields
    echo "1. Getting all available fields...\n";
    try {
        $fields = $client->metadata()->getFields();
        
        echo "Found " . count($fields) . " available fields\n";
        
        // Display a few sample fields
        $sampleFields = array_slice($fields, 0, 5);
        echo "Sample fields:\n";
        
        foreach ($sampleFields as $field) {
            echo "- {$field->name} (ID: {$field->id}, Type: {$field->type})\n";
        }
    } catch (\Exception $e) {
        echo "Error getting fields: " . $e->getMessage() . "\n";
    }
    
    // Example 2: Get details about a specific field
    echo "\n2. Getting details about a specific field...\n";
    try {
        // Use the first field from our previous results
        $fieldId = $fields[0]->id;
        echo "Getting details for field ID: {$fieldId}\n";
        
        $field = $client->metadata()->getField($fieldId);
        
        echo "Field details:\n";
        echo "- Name: {$field->name}\n";
        echo "- Type: {$field->type}\n";
        echo "- Required: " . ($field->required ? 'Yes' : 'No') . "\n";
        echo "- Read Only: " . ($field->readOnly ? 'Yes' : 'No') . "\n";
        
        // Show options if available
        if (!empty($field->options)) {
            echo "- Options:\n";
            foreach (array_slice($field->options, 0, 3) as $option) {
                echo "  * {$option['label']} (ID: {$option['id']})\n";
            }
            if (count($field->options) > 3) {
                echo "  * ... and " . (count($field->options) - 3) . " more options\n";
            }
        }
    } catch (\Exception $e) {
        echo "Error getting field details: " . $e->getMessage() . "\n";
    }
    
    // Example 3: Get all available tables
    echo "\n3. Getting all available tables...\n";
    try {
        $tables = $client->metadata()->getTables();
        
        echo "Found " . count($tables) . " available tables\n";
        
        // Display a few sample tables
        $sampleTables = array_slice($tables, 0, 5);
        echo "Sample tables:\n";
        
        foreach ($sampleTables as $table) {
            echo "- {$table->alias} (ID: {$table->id})\n";
        }
    } catch (\Exception $e) {
        echo "Error getting tables: " . $e->getMessage() . "\n";
    }
    
    // Example 4: Get details about a specific table
    echo "\n4. Getting details about a specific table...\n";
    try {
        // Use the first table from our previous results
        $tableId = $tables[0]->id;
        echo "Getting details for table ID: {$tableId}\n";
        
        $table = $client->metadata()->getTable($tableId);
        
        echo "Table details:\n";
        echo "- Name: {$table->alias}\n";
        echo "- Singular: " . ($table->singular ? 'Yes' : 'No') . "\n";
        
        if ($table->fields) {
            echo "- Fields: " . count($table->fields) . " fields\n";
            echo "  Sample fields:\n";
            
            foreach (array_slice($table->fields, 0, 3) as $field) {
                echo "  * {$field->name} (ID: {$field->id})\n";
            }
            
            if (count($table->fields) > 3) {
                echo "  * ... and " . (count($table->fields) - 3) . " more fields\n";
            }
        }
    } catch (\Exception $e) {
        echo "Error getting table details: " . $e->getMessage() . "\n";
    }
    
    // Example 5: Get lists (for dropdown fields)
    echo "\n5. Getting lists (for dropdown fields)...\n";
    try {
        $lists = $client->metadata()->getLists();
        
        echo "Found " . count($lists) . " available lists\n";
        
        // Display a few sample lists
        $sampleLists = array_slice($lists, 0, 3, true); // Keep keys
        echo "Sample lists:\n";
        
        foreach ($sampleLists as $listId => $list) {
            $listName = $list['name'] ?? $listId;
            echo "- {$listName} (ID: {$listId})\n";
            
            // Show sample options if available
            if (!empty($list['options'])) {
                echo "  Sample options:\n";
                $sampleOptions = array_slice($list['options'], 0, 2, true); // Keep keys
                
                foreach ($sampleOptions as $optionId => $option) {
                    $optionName = $option['name'] ?? $optionId;
                    echo "  * {$optionName} (ID: {$optionId})\n";
                }
                
                if (count($list['options']) > 2) {
                    echo "  * ... and " . (count($list['options']) - 2) . " more options\n";
                }
            }
        }
    } catch (\Exception $e) {
        echo "Error getting lists: " . $e->getMessage() . "\n";
    }

} catch (\Throwable $e) {
    handleException($e);
}
