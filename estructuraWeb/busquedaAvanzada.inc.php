<div id="cuerpo">
<section class="sectionBusqueda">
    <form id="divFormRegistro" action="<?php echo $_SERVER["PHP_SELF"];?>?ruta=busquedaAvanzada" method="post">
        <h1>Búsqueda avanzada</h1>
        <div id="div1">
        <div id="div11"><label for="ISBN">ISBN</label>
        <input type="text" id="ISBN" name="ISBN" >
    </div>
    <div id="div12">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">
        </div>
    </div>
        <div id="div2">
        <div id="div21">
        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" >
    </div>
        <div id="div22">
        <label for="editorial">Editorial</label>
        <input type="text" id="editorial" name="editorial" >
    </div>    
    </div>
        <input type="submit" id="buscadorAvanzado" name="buscadorAvanzado" value="Buscar">
    </form>     
</section>
</div>