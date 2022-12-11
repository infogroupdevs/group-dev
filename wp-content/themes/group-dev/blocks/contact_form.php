<div class="px-20">
    <?php
    /*$headers = array('Content-Type: text/html; charset=UTF-8');
    $email = 'luis.penaloza@i2btech.com';
    echo wp_mail($email, 'Solicitud desarrollo de proyecto – GroupDev.', 'HOLALALALLAL', $headers);*/
    ?>
    <h2 class="text-center mb-20 fz-30">¿Cómo te podemos ayudar?</h2>
    <div class="text-center p-10 bg-gray-500 brd-2 mb-30 mx-auto wmax-394 js-message" style="display: none;">Su solicitud fue enviada con éxito</div>
    <div class="wrapper">
        <form action="" method="post" id="form_contact" name="form_contact">
            <div class="row justify-content-left ">

                <div class="d-block md:col-4 mb-20">
                    <label>Nombres *</label>
                    <input type="text" value="" name="names" class="w-full" required />
                </div>

                <div class="d-block md:col-4 mb-20">
                    <label>Apellidos *</label>
                    <input type="text" value="" name="last_name" class="w-full" required />
                </div>

                <div class="d-block md:col-4 mb-20">
                    <label>Email *</label>
                    <input type="email" value="" name="email" class="w-full" required />
                </div>

                <div class="d-block md:col-4 mb-20">
                    <label>Teléfono</label>
                    <input type="tel" value="" name="phone" class="w-full"/>
                </div>

                <div class="d-block md:col-4 mb-20">
                    <label>Empresa *</label>
                    <input type="text" value="" name="company" class="w-full"/>
                </div>

                <div class="d-block md:col-4 mb-20">
                    <label>Tipo de proyecto *</label>
                    <input type="text" value="" name="type_project" class="w-full"/>
                </div>

                <div class="d-block md:col-4 mb-20">
                    <label class="mb-20 d-block">¿Tienes un presupuesto definido para tu proyecto?</label>
                    <div class="d-flex position-relative">
                        <label>
                            <span>Si</span>
                            <input type="radio" name="project_funded" value="si">
                        </label>
                        <label>
                            <span>No</span>
                            <input type="radio" name="project_funded" value="no">
                        </label>
                    </div>
                </div>

                <div class="d-block md:col-8 mb-20">
                    <label class="form__label d-block w-full mb-10" for="">Cuéntanos sobre tu idea *</label>
                    <textarea class="w-full" name="project_description" id="customer-project-description" rows="10" cols="5" >
                </textarea>
                </div>
            </div>
            <div class="fz-14 mb-20">Al hacer clic en <strong>Enviar</strong> estás aceptando que tu información sea utilizada según nuestras <a href="/" class="text-primary d-inline-block">políticas de privacidad.</a></div>
            <div class="position-relative">
                <div class="lds-ring js-loading position-absolute l-0 r-0 t-2 mx-auto js-loading" style="display: none;"><div></div><div></div><div></div><div></div></div>
                <button class="btn btn-primary mx-auto d-block mb-20 js-send_contact">Enviar</button>
            </div>
        </form>
    </div>
</div>
