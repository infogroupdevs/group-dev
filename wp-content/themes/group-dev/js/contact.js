const contact = function (JQ) {
    fn = {
      initialize: function () {
        fn = this;
        JQ(document).ready(fn.documentReady)
      },
      documentReady: function () {
        JQ(document).on('click', '.js-send_contact', fn.sendInfoContact)
      },
      sendInfoContact: function (e) {
        e.preventDefault()
        fn.validateFormContact()
        const $formContact = JQ('#form_contact')
        if ($formContact.valid()) {
          $formContact.find('input').prop( "disabled", true );
          $formContact.find('button').prop( "disabled", true );
          fn.sendData()
        }
      },
      validateFormContact: function () {
        JQ('#form_contact').validate({
          rules: {
            'name': {
              required: true
            },
            'last_name': {
              required: true
            },
            'email': {
              required: true,
              email: true
            },
            'project_funded': {
              required: true,
            }
          },
          messages: {
            'name': 'Este campo es obligatorio',
            'last_name': 'Este campo es obligatorio',
            'email': {
              required: 'Este campo es obligatorio',
              email: 'Email no válido'
            },
            'project_funded': 'Este campo es obligatorio',
          }
        })
      },
      sendData: function () {
        JQ.ajax({
          type: 'GET',
          url: contact_custom.rest_url + 'gd/v1/products',
          beforeSend: function (xhr) {
            xhr.setRequestHeader('X-WP-Nounce',contact_custom.rest_nose )
            JQ('.js-loading').show();
          },
          data: {
            key: 'HOLA'
          },
          success:function (response) {
            console.log('ENVIADO', response)
          }
        })
      }
    }
  fn.initialize()
  if (fn) return fn
}(jQuery)
