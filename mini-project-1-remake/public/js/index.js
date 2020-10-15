$(document).ready(function(){
	//Prevent xss
	String.prototype.escape = function() {
    var tagsToReplace = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;'
    };
    return this.replace(/[&<>]/g, function(tag) {
      return tagsToReplace[tag] || tag;
    });
	};

	//Get data from form to create
	$('#create').click(function(){
		var company = $('#c-company').val().escape();
		var contact = $('#c-contact').val().escape();
		var country = $('#c-country').val().escape();

		if(company == "" || company == null){
			var company_err = "Can't null";
		} else company_err = "";
		$('#c-company-err').text(company_err);
		if(contact == "" || contact == null){
			var contact_err = "Can't null";
		} else contact_err = "";
		$('#c-contact-err').text(contact_err);
		if(country == "" || country == null){
			var country_err = "Can't null";
		} else country_err = "";
		$('#c-country-err').text(country_err);

		if(company_err == "" && contact_err == "" && country_err == ""){
			var action = "create-company";
			$.ajax({
				url: '?action=create-company',
				method: 'post',
				data: {company: company, contact: contact, country: country},
				success: function(response){
					if (response === "fail") {
						Swal.fire(
						  'Failed!',
						  'Can\'t create company',
						  'error'
						)
					} else {
						var id = parseInt(response);
						// if(isNaN(id)) console.log("id");
						var markup = "<tr id='" + id + "'><th scope='row'>" + id +"</th><td data-target='company'>" + company + "</td><td data-target='contact'>" + contact + "</td><td data-target='country'>" + country + "</td><td><a data-role='update' data-id='" + id +"' style='text-decoration: none;'><button class='btn-logout btn-info' type='button' name='update' data-toggle='modal' data-target='#exampleModal'>Update</button></a></td><td><a data-role='delete' data-id='" + id + "' style='text-decoration: none;'><button class='btn-logout btn-danger' id='delete' type='button' name='delete'>Delete</button></a></td></tr>";
						$('#crud-table-tbody').append(markup);
						$('#create-form').trigger('reset');
						$('#createModal').modal('toggle');
						Swal.fire(
						  'Created!',
						  'You created a company!',
						  'success'
						);
					}
				}
			});
		}
	});

	//Put data to form to update
	$(document).on('click', 'a[data-role=update]', function(){
		var id = $(this).data('id');
		var company = $('#' + id ).children('td[data-target=company]').text();
		var contact = $('#' + id ).children('td[data-target=contact]').text();
		var country = $('#' + id ).children('td[data-target=country]').text();

		$('#company').val(company);
		$('#contact').val(contact);
		$('#country').val(country);
		$('#id').val(id);
	});

	//Update
	$('#update').click(function(){
		var id = $('#id').val();
		var company_e = $('#company').val().escape();
		var contact_e = $('#contact').val().escape();
		var country_e = $('#country').val().escape();

		var company = $('#company').val();
		var contact = $('#contact').val();
		var country = $('#country').val();

		if(company_e == "" || company_e == null){
			var company_err = "Can't null";
		} else company_err = "";
		$('#u-company-err').text(company_err);
		if(contact_e == "" || contact_e == null){
			var contact_err = "Can't null";
		} else contact_err = "";
		$('#u-contact-err').text(contact_err);
		if(country_e == "" || country_e == null){
			var country_err = "Can't null";
		} else country_err = "";
		$('#u-country-err').text(country_err);

		if(company_err == "" && contact_err == "" && country_err == ""){
			$.ajax({
				url: '?action=update-company',
				method: 'post',
				data: {company: company_e, contact: contact_e, country: country_e, id: id},
				success: function(response){
					if (response === "fail") {
						Swal.fire(
						  'Failed!',
						  'Can\'t update company',
						  'error'
						)
					} else {
						$('#' + id ).children('td[data-target=company]').text(company);
						$('#' + id ).children('td[data-target=contact]').text(contact);
						$('#' + id ).children('td[data-target=country]').text(country);

						$('#exampleModal').modal('toggle');
						Swal.fire(
						  'Updated!',
						  'You updated a company!',
						  'success'
						);
					}
				}
			});
		}
	});

	//Delete confirm alert
	$(document).on('click', 'a[data-role=delete]', function(){
		var id = $(this).data('id');
		var company = $('#' + id ).children('td[data-target=company]').text();
		Swal.fire({
		  title: 'Delete ' + company + ', Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
					url: '?action=delete-company',
					method: 'post',
					data: {id: id},
					success: function(response){
						Swal.fire(
				      'Deleted!',
				      'Your company has been deleted.',
				      'success'
				    );
				    $('tr[id=' + id + ']').remove();
					}
				});
		  }
		})
	});
});

//Reset form when close
$(document).ready(function(){
	$("#createModal").on("hidden.bs.modal", function(){
	  $('#c-company-err').text("");
	  $('#c-contact-err').text("");
	  $('#c-country-err').text("");
	});

	$("#exampleModal").on("hidden.bs.modal", function(){
	  $('#u-company-err').text("");
	  $('#u-contact-err').text("");
	  $('#u-country-err').text("");
	});
});