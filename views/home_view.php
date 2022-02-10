<script type="text/javascript">
    window.onload = function () {
        document.getElementById('inicio').style.backgroundImage = "url('<?=Config::URL_BASE?>content/img/fondo1.jpeg')";
        var rndImages = [
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-01.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-02.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-03.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-04.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-05.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-06.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-07.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-08.jpg",
                "https://camaratoledo.com/wp-content/uploads/2020/04/vivero-empresas-toledo-09.jpg",
                "http://localhost/cursoscamara/content/img/fondo1.jpeg"];
                x=0;
        setInterval(function () {
            document.getElementById('inicio').style.transition="1s";
            document.getElementById('inicio').style.backgroundImage = "url('" + rndImages[x] + "')";
            x++;
            if(x>=rndImages.length){
                x=0;
            }
        }, 5000);
    }
</script>




<div class="inicio" id="inicio">
    <div class="principal">
        <div class="titulo">
            <h1>Cámara Oficial de Comercio, Industria y Servicios de Toledo</h1>
        </div>
        <div class="titulo2">
            <h2>OFERTAS DE CURSOS FORMATIVOS</h2>
        </div>
        <div class="opcion">
            <a href="<?php echo $this->urlCourses;?>" class="ofertaCursos">
                <h3>VER CURSOS</h3>
            </a>
        </div>
    </div>
</div>
