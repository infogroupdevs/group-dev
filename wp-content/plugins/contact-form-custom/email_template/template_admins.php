<style>

  .bd-1 {
    border: solid 1px;
  }
  
  .bd-gray-10 {
    border-color: #DADADA !important;
  }

  .brd-15 {
    border-radius: 15px;
  }

  .m-15 {
    margin: 15px;
  }
  
  .font {
    font-family: 'Barlow', sans-serif;
  }
  @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&display=swap');
</style>

<div class="bd-1 bd-gray-10 brd-15 m-15 font">
    Se ha realizado la solicitud de un proyecto por parte de un potencial cliente a través del portal GroupDev:<br /><br />
    <span style="display: block:"><span style="font-weight: bold">Nombres: </span><?php echo $data['names']; ?></span><br />
    <span style="display: block:"><span style="font-weight: bold">Apellidos: </span><?php echo $data['last_name']; ?></span><br />
    <span style="display: block:"><span style="font-weight: bold">Email: </span><?php echo $data['email']; ?></span><br />
    <span style="display: block:"><span style="font-weight: bold">Teléfono: </span><?php echo $data['phone']; ?></span><br />
    <span style="display: block:"><span style="font-weight: bold">Empresa: </span><?php echo $data['company']; ?></span><br />
    <span style="display: block:"><span style="font-weight: bold">Tipo proyecto: </span><?php echo $data['type_project']; ?></span><br />
    <span style="display: block:"><span style="font-weight: bold">¿Tienes un presupuesto definido para tu proyecto?: </span><?php echo $data['project_funded']; ?></span><br /><br />
    <span style="display: block:"><span style="font-weight: bold">Descripción del proyecto: </span><?php echo $data['project_description']; ?></span>
</div>
