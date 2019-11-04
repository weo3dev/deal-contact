$(function() {

    function formSubmitted(data) {

        let _data = JSON.parse(data);

        // no json received; more than likely mail/server error
        if(_data === '') {

            $('#contact-messages').empty();
            $('#contact-messages').addClass('active-message alert-warning');
            // for dev work
            //$('#contact-messages').html(_data);

            // below is public messaging to users
            // ideally this would toggle off/on based on 
            // self-management by observing global var
            // determining whether in dev or prod env

            $('#contact-messages').html('<strong>We apologize for the inconvenience, but our system is down at the moment.<br><br>Please try again later.</strong>');

            $('#contact-messages').show();
            setButtonOriginalState();
            return;
        }

        // success! show confirm message
        if(_data.status === 'success') {
            // transition from form view to confirm view
            $('#contact-form').hide();

            // show confirmation message
            $('#contact-messages').empty();
            $('.smiley-title').empty().text('You have contacted Guy Smiley');
            $('.smiley-message').empty().text('Excellent! They will get back to you as soon as they can!');

            $('#contact-messages').addClass('active-message alert-success');
            $('#contact-messages').append('<strong>' + _data.message + '</strong>');
            $('#contact-messages').show();

        } else {
            // failure! show error messages
            // *** may not be first time for errors
            // *** clean up possible previous
            $('#contact-messages').empty();

            $('#contact-messages').addClass('active-message alert-danger');
            $('#contact-messages').append('<strong>' + _data.message + '</strong>');
            $('#contact-messages').append('<ul class="error-messages">');

            if(_data.errors && _data.errors.length > 0) {
                // add list items
                for(let i=0; i<_data.errors.length; i++) {
                    $('.error-messages').append('<li>' + _data.errors[i] + '</li>');
                }
            }

            $('#contact-messages').show();

            // revert submit button to original state
            setButtonOriginalState();

        }
    }

	$('#contact-form').on('submit', function(e) {

        e.preventDefault();

        // anytime clicking send/submit
        // assume possible multiple times (errors sequence)
        // hide and remove content from #contact-messages
        $('#contact-messages').removeClass('active-message alert-danger');
        $('#contact-messages').empty();

        $form = $(this);

        // set submit button to sending state
        setButtonSendState();

        $.ajax({
            type: "POST",
            url: 'php/formHandler.php',
            data: $form.serialize(),
            success: formSubmitted,
            error: function(xhr, status, error) {
                let errorMessage = xhr.status + ': ' + xhr.statusText;
            }
        });
    });

    function setButtonOriginalState() {
        $('button[type="button"]', $form).each(function() {
            $btn = $(this);
            label = $btn.prop('orig_label');
            if(label) {
                $btn.prop('type','submit' ); 
                $btn.text(label);
                $btn.prop('orig_label','');
            }
        });
    }

    function setButtonSendState() {
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type','button' ); 
            $btn.prop('orig_label',$btn.text());
            $btn.text('Sending ');
        });        
    }
});
