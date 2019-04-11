jQuery(document).ready(function () {

	$("#addQuestion").validate({
		rules: {
			"question": {
				required: true,
				minlength: 3,
				maxlength: 32
			},
			"survey_id": {
				required: true
			}
		},
		messages: {
			"question": {
				required: "Please enter question",
				minlength: "Minimum 3 characters required.",
				maxlength: "Maximum 32 characters required.",
			},
			"survey_id":{
				required:"Please select survey"
			}
		}
	});

	$('input[name="answer_type"]').on('click', function () {
		if ($(this).val() == 1 || $(this).val() == 3) {
			$('#ans_options').hide();
			$('#ans_checks').hide();
			$('textarea[name="answer_A"]').val("");
			$('textarea[name="answer_B"]').val("");
			$('textarea[name="answer_C"]').val("");
			$('textarea[name="answer_D"]').val("");
			$('#answer_A').prop('checked', true);
		} else if ($(this).val() == 4) {
			$('#ans_options').hide();
			$('#ans_checks').show();
			$('textarea[name="answer_A"]').val("");
			$('textarea[name="answer_B"]').val("");
			$('textarea[name="answer_C"]').val("");
			$('textarea[name="answer_D"]').val("");
			$('#answer_A').prop('checked', true);
		} else {
			$('#ans_manuals').hide();
			$('#ans_checks').hide();
			$('#ans_options').show();
			$('textarea[name="answer_manual"]').val("");
		}
	});

});
