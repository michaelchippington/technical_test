# Technical Test

## Tasks
1. Create an Application that connects to MySQL
2. Create a routine that receive: Range Date, Status and Location (The fields must be optional to the final user) and return the list of invoices with the following information: Location name, date, status and total invoice value.
3. Create a routine that receive the location id and return the sum of invoice values grouped by status.
4. Create a simple list page to show the result

## Info
- The structure or the DB with some examples can be find on /dump
- Use the framework of your preference
- Submit your code via pull request
- List on README.md all files with your own code

Good luck :)

-------------------------------

php spark serve

localhost:8080

localhost:8080/invoices

localhost:8080/invoicevalues

##files

app\Models\InvoicesModel.php
app\Models\InvoiceValuesModel.php

app\Controllers\Invoices.php
app\Controllers\InvoiceValues.php

app\Views\invoices.php
app\Views\invoicevalues.php

##stored procedures

DELIMITER //

CREATE PROCEDURE GetInvoices(

IN location_id_in INT,
IN start_date_in DATE,
IN end_date_in DATE,
IN status_in ENUM('draft','open','processed') CHARSET utf8

)

BEGIN

IF location_id_in IS NULL THEN 
	SET @location_id_in = 1;
ELSE
   SET @location_id_in = location_id_in; 
END IF;

IF start_date_in IS NULL THEN 
	SET @start_date_in = '1970-01-01';
ELSE
   SET @start_date_in = start_date_in; 
END IF;

IF end_date_in IS NULL THEN 
	SET @end_date_in = '2070-01-01';
ELSE
   SET @end_date_in = end_date_in; 
END IF;

IF status_in IS NULL THEN 
	SET @status_in = 'draft';
ELSE
   SET @status_in = status_in; 
END IF;

SELECT locations.name, invoice_headers.date, invoice_headers.status, invoice_lines.value
FROM invoice_lines
INNER JOIN invoice_headers ON invoice_headers.id = invoice_lines.invoice_header_id
INNER JOIN locations ON locations.id = invoice_headers.location_id
WHERE (invoice_headers.location_id = @location_id_in AND invoice_headers.date BETWEEN @start_date_in AND @end_date_in AND invoice_headers.status = @status_in); 
END //

DELIMITER ;



DELIMITER //

CREATE PROCEDURE GetInvoiceValues(

IN location_id_in INT

)
BEGIN
SELECT SUM(invoice_lines.value) AS value, invoice_headers.status
FROM invoice_headers, invoice_lines 
WHERE invoice_headers.location_id = location_id_in AND invoice_lines.invoice_header_id = invoice_headers.id            
GROUP BY status;
END //

DELIMITER ;
