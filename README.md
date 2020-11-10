# php-export-xls
Export to XLS file from database's data

### Getting Started
This code is using header() function in PHP to get XLS file from html view.

### Installation
There is no specific instruction for installing this script. You just do that:
1. Create Database and change config.json with your MySQL configs;
2. Edit SQL Query on model.class.php;
3. Specify the columns to export to xls file in index.php;
4. Run on localhost or your host and get your XLS!

### Note
1. If you will use it on MVC, you can put the headers function in controller before view function;
2. If you will use it on procedural, put the headers function before table.

### Specification
This code was created in PHP 7.2
