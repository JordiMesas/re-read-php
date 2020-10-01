<!DOCTYPE html>
<html lang="es">

<head>
    <title>Nuestro proyecto Re-Read</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Estilos enlazados-->
    <link rel="stylesheet" href="../css/estilo.css" />
</head>

<body>
    <div class="logo">Re-Read</div>

    <div class="header">
        <h1>Re-Read</h1>
        <p>
            En Re-Read podrás encontrar libros de segunda mano en perfecto estado.
            También vender los tuyos. Porque siempre hay libros leídos y libros por
            leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin
            ninguno de los dos.
        </p>
    </div>

    <div class="row">
        <div class="column left">
            <div class="topnav">
                <a href="../index.php">Re-Read</a>
                <a href="./libros.php">Libros</a>
                <a href="./ebooks.php">eBook</a>
            </div>

            <h3>Toda la actualidad en eBook</h3>

            <!--Nuevo desarrollo: formulari para filtrar autor-->
            <div>
                <form class="formulario" action="ebooks.php" method="post">
                    <label for="fautor">Autor</label>
                    <input type="text" id="fautor" name="fautor" placeholder="Introduce el autor...">

                    <!--<label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    <label for="country">Country</label>
                    <select id="country" name="country">
                        <option value="australia">Australia</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                    </select>-->

                    <input type="submit" value="Buscar">
                </form>
			</div>
			
			<?php 
				if(isset($_POST['fautor'])){
					// filtrará los ebooks que se mostrarán en la página					
				}else{
					//mostrará todos los ebooks de la BD
				}
			?>
            <!--eBooks con descripción-->
            <!--<div class="ebook">
					<a
						href="https://play.google.com/store/books/details/Cube_Kid_El_gatito_que_se_perdi%C3%B3_en_el_Inframundo?id=l7jbDwAAQBAJ&gl=ES"
					>
						<img src="../img/ebook_1.jpg" alt="ebook 1" />
						<div>El gatito que se perdió en el Inframundo</div></a
					>
				</div>-->

            <?php
				//1. Conexión con la base de datos
				include '../services/connection.php';

				//2. Selección y muestra de datos de la base de datos
				$result = mysqli_query($conn, "SELECT Books.Description, Books.img, Books.Title FROM books WHERE ebook != '0'");

				if(!empty($result) && mysqli_num_rows($result)>0){
					$i=0;					
					//datos de salida de cada fila (fila = row)
					while($row = mysqli_fetch_array($result)){
						$i ++;
						echo"<div class= 'ebook'>";
						//Añadimos la imagen a la página con la etiqueta img de HTML			
											
						echo"<img src=../img/".$row['img']." alt='".$row['Title']."'>";
												
						//Añadimos el título a lapágina con la etiqueta h2 de html
						echo "<div class='desc'>".$row['Description']." </div>";
						echo "</div>";
					 if($i % 3 == 0){					
						echo "<div style='clear:both;'></div>";
					 }
					}
				}else{
					echo "0 resultados";
				}
				?>

        </div>

        <div class="column right">
            <h2>Top ventas</h2>

            <?php
			
			$result = mysqli_query($conn, "SELECT Books.Title FROM books WHERE Top = '1'");

				if(!empty($result) && mysqli_num_rows($result)>0){

						while($row = mysqli_fetch_array($result)){							
							echo"<p>";												
							echo $row['Title'];							
							echo "</p>";						
						}

				}else{
						echo "0 resultados";
					}
			 ?>
            <script src="../js/code.js"></script>
        </div>
    </div>
</body>

</html>