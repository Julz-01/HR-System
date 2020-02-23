$(document).ready(function(){

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

if($('.datetimepicker').length > 0 ){
    $('.datetimepicker').datetimepicker({
      format: 'DD/MM/YYYY'
    });
  } 
  
//counter default
  $('.clock').FlipClock({
  clockFace: 'TwelveHourClock',
});


  $('.reqacc').on('click',function(){
    var id = $(this).data('ids');
    var name = $(this).data('names');
    var type = $(this).data('types');

    $.confirm({
      title: '',
      content: ''+name+' is requesting '+type+'',
      type: 'blue',
      typeAnimated: true,
      buttons: {
        tryAgain: {
          text: 'Accept',
          btnClass: 'btn-blue',
          action: function(){
            $.ajax({
              url:'/admin/request/accept/'+id,
              type: 'PUT',
              success: function(res){
                console.log(res);
                $.alert({
                  title: '',
                  content: res.msg,
                });
                setInterval(function(){ location.reload(); }, 1500);
              }
            });
          }
        },
        close: function () {
        }
      }
    });
  });
  $('.reqdec').on('click',function(){
    var id = $(this).data('ids');
     var name = $(this).data('names');
    var type = $(this).data('types');

    $.confirm({
      title: '',
      content: '' +
      '<form action="" class="formName">' +
      '<div class="form-group">' +
      '<label>Decline '+type+' request of '+name+'</label>' +
      '<input type="text" placeholder="Put your reason here" class="name form-control" required />' +
      '</div>' +
      '</form>',
      buttons: {
        formSubmit: {
          text: 'Submit',
          btnClass: 'btn-red',
          action: function () {
            var name = this.$content.find('.name').val();
            if(!name){
              $.alert('provide a valid reason');
              return false;
            }
            $.ajax({
              url:'/admin/request/decline/'+id,
              type: 'PUT',
              data: {note: name},
              success: function(res){
                console.log(res);
                $.alert({
                  title: '',
                  content: res.msg,
                });
                setInterval(function(){ location.reload(); }, 1500);
              }
            });
          }
        },
        cancel: function () {
          //close
        },
      }
    });
  });

  $('#submit').click(function(){
$('.excel').tblToExcel();
});

$("#button-excel").click(function(){
  $(".table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "LinkServeSystem", //do not include extension
    fileext: ".xlxs", // file extension
    exclude_img: true,
 exclude_links: true,
 exclude_inputs: true
  });
});

const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Updated Successfully!'
      })

    });

    $('.swal-out').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Time-out Successfully!'
      })

    });

    $('.swal-in').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Time-In Successfully!'
      })

    });

    $("#table1").DataTable();

    $('.destroy_form').click(function(e){
      e.preventDefault();

        var id = $(this).data('ids');
        var name = $(this).data('names');
    
        Swal.fire({
      title: 'Delete '+name+'?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#7e7e7e',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $.ajax({

      url: '/destroy_user/'+id,
      type: 'GET',
      success:function() {
        console.log('success');
    Swal.fire({
      position: 'center',
      type: 'success',
      title: ''+name+' deleted',
      showConfirmButton: false,
      timer: 1500
    })
        setTimeout(function(){
               location.reload();
          }, 1000);
      },

      error:function(){

        }

    });

      }
      })

    });

    $('.update_form').on('click', function(){
      var id = $(this).data('ids');
      var name = $('.name'+id).val();
      var email = $('.email'+id).val();
      var number = $('.number'+id).val();
      var address = $('.address'+id).val();
      var sss = $('.sss'+id).val();
      var tin = $('.tin'+id).val();
      var philhealth = $('.philhealth'+id).val();
      var hdmf = $('.hdmf'+id).val();
      var birthdate = $('.birthdate'+id).val();
      var employment_date = $('.employment_date'+id).val();
      var nationality = $('.nationality'+id).val();
      var civil_status = $('.civil_status'+id).val();

      $.ajax({
        url : '/update/'+id,
        type: 'PUT',
        data: {
          'id' : id,
          name : name,
          email : email,
          number : number,
          address : address,
          sss : sss,
          tin : tin,
          philhealth : philhealth,
          hdmf : hdmf,
          birthdate : birthdate,
          employment_date : employment_date,
          nationality : nationality,
          civil_status : civil_status,
        },

        success:function(){
          console.log('success');
          Swal.fire({
  position: 'top',
  type: 'success',
  title: ''+name+' Updated!',
  showConfirmButton: false,
  timer: 1500})
    setTimeout(function(){
           location.reload(); 
      }, 1500);
        },
        error:function(){
          console.log('error');
        }

      });
    });

$('.destroy_admin').click(function(e){
      e.preventDefault();

        var id = $(this).data('ids');
        var name = $(this).data('names');
    
        Swal.fire({
      title: 'Delete '+name+'?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#7e7e7e',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $.ajax({

      url: '/destroy_admin/'+id,
      type: 'GET',
      success:function() {
        console.log('success');
    Swal.fire({
      position: 'center',
      type: 'success',
      title: ''+name+' deleted',
      showConfirmButton: false,
      timer: 1500
    })
        setTimeout(function(){
               location.reload();
          }, 1000);
      },

      error:function(){

        }

    });

      }
      })

    });

   $('.update_admin').on('click', function(){
      var id = $(this).data('ids');
      var name = $('.name'+id).val();
      var email = $('.email'+id).val();
      var number = $('.number'+id).val();
      var address = $('.address'+id).val();
      var sss = $('.sss'+id).val();
      var tin = $('.tin'+id).val();
      var philhealth = $('.philhealth'+id).val();
      var hdmf = $('.hdmf'+id).val();
      var birthdate = $('.birthdate'+id).val();
      var employment_date = $('.employment_date'+id).val();
      var nationality = $('.nationality'+id).val();
      var civil_status = $('.civil_status'+id).val();

      $.ajax({
        url : '/update_admin/'+id,
        type: 'PUT',
        data: {
          'id' : id,
          name : name,
          email : email,
          number : number,
          address : address,
          sss : sss,
          tin : tin,
          philhealth : philhealth,
          hdmf : hdmf,
          birthdate : birthdate,
          employment_date : employment_date,
          nationality : nationality,
          civil_status : civil_status,
        },

        success:function(){
          console.log('success');
          Swal.fire({
  position: 'top',
  type: 'success',
  title: ''+name+' Updated!',
  showConfirmButton: false,
  timer: 1500})
    setTimeout(function(){
           location.reload(); 
      }, 1500);
        },
        error:function(){
          console.log('error');
        }

      });
    });
 
 // toastr.success('User Added.')
    $('.truncate').click(function(e){
      e.preventDefault();
    
        Swal.fire({
      title: 'Delete all Time logs?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#7e7e7e',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $.ajax({

      url: '/truncate/',
      type: 'GET',
      success:function() {
        console.log('success');
    Swal.fire({
      position: 'center',
      type: 'success',
      title: 'Time logs deleted',
      showConfirmButton: false,
      timer: 1500
    })
        setTimeout(function(){
               location.reload();
          }, 1000);
      },

      error:function(){

        }

    });

      }
      })

    });

    $('.truncate_admin').click(function(e){
      e.preventDefault();
    
        Swal.fire({
      title: 'Delete all Time logs?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#7e7e7e',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $.ajax({

      url: '/truncate_admin',
      type: 'GET',
      success:function() {
        console.log('success');
    Swal.fire({
      position: 'center',
      type: 'success',
      title: 'Time logs deleted',
      showConfirmButton: false,
      timer: 1500
    })
        setTimeout(function(){
               location.reload();
          }, 1000);
      },

      error:function(){

        } 

    });

      }
      })

    });

    $("#button-excel").click(function(){
  $(".exceltable").table2excel({
  
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "JlzDevelopment", //do not include extension
    fileext: ".xlxs", // file extension
    exclude_img: true,
 exclude_links: true,
 exclude_inputs: true
  });
});
//admin
  $("#admin-excel").click(function(){
  $(".exceladmin").table2excel({
  
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "JlzDevelopment", //do not include extension
    fileext: ".xlxs", // file extension
    exclude_img: true,
 exclude_links: true,
 exclude_inputs: true
  });
});
});
