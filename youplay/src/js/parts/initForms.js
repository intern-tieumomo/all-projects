/*------------------------------------------------------------------

  Init Forms

-------------------------------------------------------------------*/
function initForms() {
    const self = this;

    // inputs set active
    self.inputsActive = function (item, active) {
        // activate input
        if (active) {
            $(item).parent().addClass('input-filled');

            // deactivate input
        } else {
            $(item).parent().removeClass('input-filled');
        }
    };

    // active inputs
    self.$document.on('focus', 'input, textarea', function () {
        self.inputsActive(this, true);
    });
    self.$document.on('blur', 'input, textarea', function () {
        self.inputsActive(this);
    });

    // autofocus inputs
    $('input, textarea').filter('[autofocus]:eq(0)').focus();

    // ajax form submit
    this.$document.on('submit', '.youplay-form-ajax', function (e) {
        e.preventDefault();
        const $form = $(this);
        const $button = $form.find('[type="submit"]');

        // if disabled button - stop this action
        if ($button.is('.disabled') || $button.is('[disabled]')) {
            return;
        }

        // post request
        $.post($(this).attr('action'), $(this).serialize(), (data) => {
            const response = JSON.parse(data);

            window.swal({
                type: 'success',
                title: 'Success!',
                text: response && response.response ? response.response : data,
                showConfirmButton: true,
                confirmButtonClass: 'btn-default',
            });
            $form[0].reset();
        })
            .fail((data) => {
                window.swal({
                    type: 'error',
                    title: 'Error!',
                    text: data.responseText,
                    showConfirmButton: true,
                    confirmButtonClass: 'btn-default',
                });
            });
    });
}

export { initForms };
