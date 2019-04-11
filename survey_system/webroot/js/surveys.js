
jQuery(document).ready(function () {

    $("#add").validate({
        rules: {
            "title": {
                required: true,
            }
        },
        messages: {
            "title": {
                required: "Please enter the title."
            }
        }
    });
    
});
