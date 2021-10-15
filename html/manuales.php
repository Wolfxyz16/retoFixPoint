<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Manuales</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="manuales.css">
    </head>
    <body>
        <script src="" async defer></script>
        <div>
            <div>
                <h1>Manuales</h1>
                <section class="webdesigntuts-workshop">
                    <form action="" method="">		    
                        <input type="search" placeholder="Search...">		    	
                        <button>Search</button>
                    </form>
                </section>
            </div>
            <div>
                <div>
                    <label for="herramienta">Tipo de herramienta:</label>
                    <select name="tipoHerramienta">
                        <option ></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                </div>
                <div>
                    <button id="anadirManual" onclick="">A&ntilde;adir un manual</button>
                </div>
                <div>
                    <label for="orden">Ordenar por:</label>
                    <select name="orden">
                        <option value="A-Z">A-Z</option>
                        <option value="Z-A">Z-A</option>
                        <option value="Disponible">Disponible</option>
                    </select>
                </div>
            </div>
            <div>
                <?php
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="";
                    try{
                        $conexion= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $consultaManuales=$conexion->prepare("SELECT * FROM ");
                        $consultaManuales->execute();
                        $resultado=$consultaManuales->fetchAll();
                        foreach ($resultado as $columna) {
                            echo '<div><div><img src=""></div><div><h4>'.$columna[''].'</h4></div><div><button onclick="">Descargar</button></div></div>';
                        }                                               
                } catch (PDOException $e){
                
                }    
                ?>
            </div>
        </div>
    </body>
</html>