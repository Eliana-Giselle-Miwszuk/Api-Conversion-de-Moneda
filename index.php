<?php 

//print_r($_POST['valor']);


    if(isset($_POST['valor'])){
    $valor = floatval($_POST['valor']);

   // $apiUrl= "https://v6.sdasdfasdfasdfasdf/pair/USD/ARS/{$valor}";

    $iniciarCURL = curl_init($apiUrl);
    curl_setopt($iniciarCURL,CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($iniciarCURL);

    //print_r($respuesta);

    if(curl_errno($iniciarCURL)){
        echo "error al realizar la solicitud ". curl_errno($iniciarCURL);
    }

    curl_close($iniciarCURL);

    $datos = json_decode($respuesta,true);

    $costo_pesos = $datos['conversion_rate'];
    $conversion  = $datos['conversion_result'];

    //print_r($datos['result']);
    echo "{$valor} USD equivale a {$conversion} MXN ";


}


?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

<div   class="container-sm" >
<?php if(isset($conversion)){ ?>
<div     class="alert alert-info alert-dismissible fade show"    role="alert">
    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
    ></button>

    <strong>Datos de conversion: </strong> 
    <?php echo "{$valor} USD equivale a {$conversion} MXN "; ?>
</div>
<?php } ?>    

    <div class="card">
        <br>
        <div class="card-header">Aplicación para convertir pesos MXN a USD</div>
        <div class="card-body">
            <form action="#" method="post">

                <div class="mb-3">
                    <label for="" class="form-label">convertir de USD a MXN:</label>
                    <input
                        type="text"
                        class="form-control"
                        name="valor"
                        id="valor"
                        aria-describedby="helpId"
                        placeholder="Escriba la cantidad a convertir a MXN"
                    />
                </div>

                <br>
                <input type="submit" class="btn btn-success" value="convertir a MXN (Pesos mexicanos)">
        
            </form>
        </div>
        <div class="card-footer text-muted">by MiwSystem</div>
    </div>
    

</div>


        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

