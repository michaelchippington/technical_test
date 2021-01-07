<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
    
        table{
            margin: 20px auto;
        }
    
        td, th{
            padding: 10px;
        }
    
        th{
            text-align: left;
        }
	</style>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

	<div class="heroe">

	</div>

</header>

<!-- CONTENT -->

<section>


<?php 

if (!empty($invoices) && is_array($invoices)) : ?>

    <table>
    <th>Status</th><th>Value</th>
    <?php foreach ($invoices as $invoice): ?> 

        <tr>                    
            <td>
                <?= $invoice->status; ?>  
            </td>
            <td>
                <?= $invoice->value; ?>  
            </td>
        </tr>

     <?php endforeach; ?>

     </table>

<?php else : ?>

    <h3>No invoices</h3>

<?php endif ?>

</section>


<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>


</footer>



</body>
</html>
