
$(document).ready(function () {
  function citySelectOptions(id) {
    if (id !== '') {
      switch (id) {
        case '1':
          return 'Vilnius';
          break;
        case '2':
          return 'Kaunas';
          break;
        case '3':
          return 'Klaipėda';
          break;
        case '4':
          return 'Šiauliai';
          break;
        case '5':
          return 'Panevėžys';
          break;
        case '6':
          return 'Alytus';
          break;
        case '7':
          return 'Marijampolė';
          break;
        case '8':
          return 'Mažeikiai';
          break;
        case '9':
          return 'Jonava';
          break;
        case '10':
          return 'Utena';
          break;
        default:
          return;
      }
    }
  }
  function getParcelStatus(id) {
    if (id !== '') {
      switch (id) {
        case '1':
          return 'Priimta';
          break;
        case '2':
          return 'Paskirstymo vietoje';
          break;
        case '3':
          return 'Kurjerio vežama';
          break;
        case '4':
          return 'Pristatyta';
          break;
        default:
          return 'Statusas nerastas';
      }
    } else {
      return 'Statusas nerastas';
    }
  }
  function getWeigtOptions(id) {
    if (id !== '') {
      switch (id) {
        case '1':
          return 'Iki 10kg';
          break;
        case '2':
          return 'Iki 20kg';
          break;
        case '3':
          return 'Iki 30kg';
          break;
        default:
          return 'Statusas nerastas';
      }
    }
  }
  function getSizeOptions(id) {
    if (id !== '') {
      switch (id) {
        case '1':
          return '0.5m*0.5m';
          break;
        case '2':
          return '1.0m*1.0m';
          break;
        case '3':
          return '1.5m*1.5m';
          break;
        default:
          return 'Statusas nerastas';
      }
    }
  }


  var forms = document.querySelectorAll('.needs-validation')
  var forms_staff = document.querySelectorAll('.needs-validation-staff')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()

        } else {
          event.preventDefault()


          let formData = new FormData(this);
          $.ajax({
            url: 'function.php?action=save_new_parcel',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function (resp) {
              myModal.toggle()
              var modalOnClose = document.getElementById('exampleModal')
              modalOnClose.addEventListener('hide.bs.modal', function (event) {
                setTimeout(function () {
                  location.href = `complete.php?parcel_id=${resp}`
                }, 500)
              })
            }
          })
        }
        form.classList.add('was-validated')
      }, false)
    })


  Array.prototype.slice.call(forms_staff)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()

        } else {
          event.preventDefault()


          let formData = new FormData(this);
          $.ajax({
            url: 'function.php?action=save_new_worker',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success: function (resp) {
              $('.modal-body-courier').html('Kurjeris sekminai pridetas')
              myModal2.toggle()
              var modalOnClose = document.getElementById('exampleModal2')
              modalOnClose.addEventListener('hide.bs.modal', function (event) {
                setTimeout(function () {
                  location.reload(true)
                }, 500)
              })
            }
          })
        }
        form.classList.add('was-validated')
      }, false)
    })


  $('#parcel_search_btn').click(function () {
    $('.bad-request').fadeOut(10)
    $('.good-request').fadeOut(10)
    let tracking_num = $('#parcel_search').val().replace(/\s/g, "")
    if (tracking_num != '') {
      $.ajax({
        url: 'function.php?action=get_parcel_heistory',
        data: { parcel_search: tracking_num },
        method: 'POST',
        success: function (resp) {
          if (resp == 2) {
            $('.bad-request').fadeIn(300)
          } else {
            resp = JSON.parse(resp)
            $('.good-request__sender').html(resp.sender_name)
            $('.good-request__city--from').html(citySelectOptions(resp.from_city_id))
            $('.good-request__recipient').html(resp.recipient_name)
            $('.good-request__city--to').html(citySelectOptions(resp.to_city_id))
            $('.good-request__status').html(getParcelStatus(resp.status))
            $('.good-request').fadeIn(300)
          }
        }
      })
    }
  })


  if ($('#exampleModal').length != 0) {
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
  }
  if ($('#exampleModal2').length != 0) {
    var myModal2 = new bootstrap.Modal(document.getElementById('exampleModal2'))
  }


  $('.delete_parcel_btn').click(function () {
    let post_id = $(this).attr('data-id')
    myModal.toggle()

    $('.modal-cta').click(function () {
      myModal.hide()

      $.ajax({
        url: 'function.php?action=delete_parcel',
        data: { id: post_id },
        method: 'POST',
        success: function (resp) {
          if (resp == 1) {

            myModal2.show()

            var modalOnClose = document.getElementById('exampleModal2')
            modalOnClose.addEventListener('hide.bs.modal', function (event) {
              setTimeout(function () {
                location.reload()
              }, 500)
            })

          }
        }
      })
    })
  })


  $('.delete_worker_btn').click(function () {
    let post_id = $(this).attr('data-id')
    myModal.toggle()

    $('.modal-cta').click(function () {
      myModal.hide()

      $.ajax({
        url: 'function.php?action=delete_worker',
        data: { id: post_id },
        method: 'POST',
        success: function (resp) {
          if (resp == 1) {

            myModal2.show()

            var modalOnClose = document.getElementById('exampleModal2')
            modalOnClose.addEventListener('hide.bs.modal', function (event) {
              setTimeout(function () {
                location.reload()
              }, 500)
            })

          }
        }
      })

    })
  })


  $('.set_parcel_worker').click(function () {
    let post_id_but = $(this).attr('data-id')
    $(`#parcel_worker_id--${post_id_but}`).submit(function (e) {
      e.preventDefault()
      let post_id = $(this).attr('data-id')

      let formData = new FormData(this);
      formData.append('id', post_id)

      $.ajax({
        url: 'function.php?action=parcel_worker_id',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function (resp) {
          if (resp == 1) {
            myModal2.show()

            $('.modal-body-courier').html('Kurjeris sėkmingai priskirtas')

            var modalOnClose = document.getElementById('exampleModal2')
            modalOnClose.addEventListener('hide.bs.modal', function (event) {
              setTimeout(function () {
                location.reload()
              }, 500)
            })
          }
        }
      })
    })
  })


  $('.view_parcel_btn').click(function () {
    let post_id = $(this).attr('data-id')
    let full_info_table
    $('.full_info_table').fadeOut(30)
    $('.full_info_table--inner').remove()

    $.ajax({
      url: 'function.php?action=view_parcel',
      data: { id: post_id },
      method: 'POST',
      success: function (resp) {
        resp = JSON.parse(resp)
        full_info_table = `
        <table class="full_info_table--inner table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Siuntos numeris</th>
            <th>Siuntėjo vardas</th>
            <th>Siuntėjo tel.</th>
            <th>Gavėjo vardas</th>
            <th>Gavėjo tel.</th>
            <th>Išsiuntimo miestas</th>
            <th>Gavimo miestas</th>
            <th>Statusas</th>
            <th>Svoris</th>
            <th>Dydis</th>
            <th>Kaina</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>${resp.id}</td>
            <td>${resp.reference_number}</td>
            <td>${resp.sender_name}</td>
            <td>${resp.sender_contact}</td>
            <td>${resp.recipient_name}</td>
            <td>${resp.recipient_contact}</td>
            <td>${citySelectOptions(resp.from_city_id)}</td>
            <td>${citySelectOptions(resp.to_city_id)}</td>
            <td>${getParcelStatus(resp.status)}</td>
            <td>${getWeigtOptions(resp.weigth_id)}</td>
            <td>${getSizeOptions(resp.size_id)}</td>
            <td>${resp.price}</td>
          </tr>
        </tbody>
      </table>
        `
        setTimeout(function () {
          $('.full_info_table').append(full_info_table)
        }, 100)

        $('.full_info_table').fadeIn(400)
      }
    })

  })


  $('.add_courier').click(function () {
    $(this).hide()
    $(this).next().fadeIn(200)
  })


  $('.view_worker_parcels').click(function () {
    let post_id = $(this).attr('data-id')
    let full_info_table
    $('.full_info_table').fadeOut(30)
    $('.full_info_table--inner').remove()

    $.ajax({
      url: 'function.php?action=view_worker_parcels',
      data: { id: post_id },
      method: 'POST',
      success: function (resp) {
        resp = JSON.parse(resp)
        for (let i = 0; i < resp.length; i++) {

          full_info_table = `
        <table class="full_info_table--inner table table-striped" style="width:100%">
        <thead>
          <tr style="height: 100%;">
            <th>Siuntos numeris</th>
            <th>Siuntėjo vardas</th>
            <th>Siuntėjo tel.</th>
            <th>Gavėjo vardas</th>
            <th>Gavėjo tel.</th>
            <th>Išsiuntimo miestas</th>
            <th>Gavimo miestas</th>
            <th>Svoris</th>
            <th>Dydis</th>
            <th>Statusas</th>
            <th style="height: 100%;">Veiksmai</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>${resp[i].reference_number}</td>
            <td>${resp[i].sender_name}</td>
            <td>${resp[i].sender_contact}</td>
            <td>${resp[i].recipient_name}</td>
            <td>${resp[i].recipient_contact}</td>
            <td>${citySelectOptions(resp[i].from_city_id)}</td>
            <td>${citySelectOptions(resp[i].to_city_id)}</td>
            <td>${getWeigtOptions(resp[i].weigth_id)}</td>
            <td>${getSizeOptions(resp[i].size_id)}</td>
            <td id="status">
              ${getParcelStatus(resp[i].status)}
            </td>
            <td>
            
            <button class="add_courier btn btn-main" type="button">Keisti statusą</button>
            <form id="" class="parcel_worker" data-id="">
            <div class="flex">
              <select class="form-select" name="status" id="new_status">
                  <option value="1">
                      Priimta
                  </option>
                  <option value="2">
                      Paskirstymo vietoje
                  </option>
                  <option value="3">
                      Kurjerio vežama
                  </option>
                  <option value="4">
                      Pristatyta
                  </option>
              </select>
              <button data-id="${resp[i].id}" class="set_parcel_status btn btn-main" type="submit">Išsaugoti</button>
              </div>
            </form>
            
            </td>
          </tr>
        </tbody>
      </table>
        `
          $('.full_info_table').append(full_info_table)


        }
        $('.full_info_table').fadeIn(400)

        $('.add_courier').click(function () {
          $(this).hide()
          $(this).next().fadeIn(200)
        })

        $('.set_parcel_status').click(function (e) {
          e.preventDefault()
          let post_id = $(this).attr('data-id')
          let new_status = $('#new_status').val()

          $.ajax({
            url: 'function.php?action=change_parcel_status',
            data: { id: post_id, status: new_status },
            method: 'POST',
            success: function (resp) {
              if (resp == 1) {

                $('.modal-body-courier').html('Siuntos statusas sekmingai atnaujintas')
                myModal2.toggle()
                var modalOnClose = document.getElementById('exampleModal2')
                modalOnClose.addEventListener('hide.bs.modal', function (event) {
                  setTimeout(function () {
                    location.reload(true)
                  }, 500)
                })

              }
            }
          })

        })
      }
    })

  })


  $('.back_btn').click(function () {
    window.history.back();
  })


  $('.select-for-price').change(function () {

    $('#price').val(

      5 +
      (parseInt($('.form-select-weight').val()) *
        5) +
      (parseInt($('.form-select-size').val()) *
        5)
    )
  })


  if ($('#new_parcel').length != 0) {

    if ($('.new_parcel_id').val() == '') {
      function setValues() {
        $('#price').val(
          5 +
          (parseInt($('.form-select-weight').val()) *
            5) +
          (parseInt($('.form-select-size').val()) *
            5)
        )
      }

      setValues()
    }

  }


})

