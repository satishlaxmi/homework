$("#productdata").validate({
        ignore: [],
        rules: {
            'title': {
                required: true,
                 minlength:3,
                 maxlength:20
            },
            'weight': {
                required: true,
                number: true,
                minlength:1,
                maxlength:4
            },
            'units': {
                required: true,
                number: true,
                minlength:1,
                maxlength:4
            },
            'regularPrice': {
                required: true,
                number: true,
                minlength:3,
                maxlength:50
            },
            'salePrice': {
                number: true,           
             },
            'metaTitle': {
                required: true,
            },
            'metaDescription': {
                required: true,
            },
            
            'productCode': {
                required: true,
            },
            'productSKU': {
                required: true,
            },
            'category': {
                required: true,
            },
            'image': {
                required: true,
                accept: "image/*",
                extension: "jpg|png|jpeg"
            },
        },
         messages: {
            title: {
                required: "Please enter title",
                minlength:"Please enter words between 3 to 15 digits",
                maxlength:"Please enter words between 3to 15 digits",
                
            },
            weight: {
                required: "Please enter weightVVVVV",
                number:"Please enter only number ",
                minlength:"Please enter weight between 1 to 4 digits",
                maxlength:"Please enter weight  between 8 to 15 digits",
                
            },
            image:{
                accept: "Only image  is allowed",
                extension: "Only  jpg|png|jpeg are allowed"


            }
         
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

$(document).ready(function() {
    $('#data-table').DataTable({
        order: [[1, 'asc']], // Default sorting by the 'title' column in ascending order
        lengthMenu: [10, 25, 50], // Number of records to show per page
        pageLength: 5, // Initial number of records to display
        searching: true, // Enable search feature
        info: false, // Display information about the table
        paging: true, // Enable pagination
    });
    
});


$(".delete_product").on('click', function() {
    let pid = $(this).attr('pid');
    console.log(pid);
    // Store the reference to the table row
    let row = $(this).closest('tr');
    // AJAX start
    $.ajax({
      url: site_url+"/productDelete",
      type: "POST",
      data: {
        "_token":$('meta[name="_token"]').attr('content'),
        "pid": pid
      },
      success: function(response) {
        if (response.message) {
          swalFunction(response.message);
          // Remove the table row on success
          row.remove();
        } else {
          swalFunction(response.errorMessage);
        }
      }
    });
    // AJAX end
  });
  function  swalFunction (messgae){
      Swal.fire({
      position: 'center',
      icon: 'success',
      title: messgae,
      showConfirmButton: false,
      timer: 1500
      })
    }

