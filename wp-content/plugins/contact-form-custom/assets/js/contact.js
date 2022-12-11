
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
        fn.messageAfterSendData()
      }
    },
    validateFormContact: function () {
      JQ('#form_contact').validate({
        rules: {
          'names': {
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
          },
          'company': {
            required: true,
          },
          'type_project': {
            required: true,
          },
          'project_description': {
            required: true,
          }
        },
        messages: {
          'names': 'Este campo es obligatorio',
          'last_name': 'Este campo es obligatorio',
          'email': {
            required: 'Este campo es obligatorio',
            email: 'Email no válido'
          },
          'project_funded': 'Este campo es obligatorio',
          'company': 'Este campo es obligatorio',
          'type_project': 'Este campo es obligatorio',
          'project_description': 'Este campo es obligatorio',
        }
      })
    },
    sendData: function () {
      const data = {
        'action': 'client',
        'nonce': ajax_var.nonce,
        'names': JQ('input[name=names').val(),
        'last_name': JQ('input[name=last_name').val(),
        'email': JQ('input[name=email').val(),
        'phone': JQ('input[name=phone').val(),
        'company': JQ('input[name=company').val(),
        'type_project': JQ('input[name=type_project]').val(),
        'project_funded': JQ('input[name=project_funded]').val(),
        'project_description': JQ('textarea[name=project_description').val(),
      }
      jQuery.ajax({
        type: "post",
        url: ajax_var.url,
        data: data,
        beforeSend: function () {
          JQ('.js-loading').show();
        },
        success: function(result){
          JQ('.js-loading').hide();
          const $formContact = JQ('#form_contact')
          $formContact.trigger('reset');
          $formContact.find('input').prop( "disabled", false );
          $formContact.find('button').prop( "disabled", false );
        }
      });

    },
    messageAfterSendData: function() {
      JQ('.js-message').show()
      setTimeout(function (){
        JQ('.js-message').fadeOut()
      }, 3000)
    }
  }
  fn.initialize()
  if (fn) return fn
}(jQuery)

