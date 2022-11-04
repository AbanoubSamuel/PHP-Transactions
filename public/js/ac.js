// AJAX call for autocomplete 
$(document).ready(function () {
	$("#autocomplete_text").keyup(function () {

		var text = $(this).val();

		if (text.trim() != "") {

			$.ajax({
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "word-dictionary/" + text,
				data: 'keyword=' + text,
				beforeSend: function () {
					$("#autocomplete_text").addClass("loading");
				},
				success: function (data) {
					$("#suggesstion-box").show();
					$("#suggesstion-box").html(data);
					$("#autocomplete_text").removeClass("loading");
				}
			});

		}
		else {
			$("#suggesstion-box").hide();
		}
	});

	$("#suggesstion-box").mouseleave(function () {
		$("#suggesstion-box").hide();
	});


	$("#saveWordForm").submit(function (event) {
		event.preventDefault();
		// do the extra stuff here
		$.ajax({
			type: "POST",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "words",
			data: $(this).serialize(),
			success: function (data) {
				if ($.isEmptyObject(data.error)) {
					alert(data.success);
					window.location = '/words';
				} else {
					alert(data.error);
					location.reload();
				}
			}
		});
	});

});

//To select a country name
function selectWord(val) {
	$("#autocomplete_text").val(val);
	$("#suggesstion-box").hide();
}