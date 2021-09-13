console.log('veikia');

$(document).ready(function() {
  $('#new_parcel').submit(function(e) {
    e.preventDefault()

    let formData = new FormData(this);

    $.ajax({
      url: 'function.php?action=save_new_parcel',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(resp) {
        alert('Data successfully saved', "success");
        setTimeout(function() {
          location.href = `complete.php?parcel_id=${resp}`
        }, 1000)
      }
    })
  })

  $('#parcel_search_btn').click(function() {
    $('.bad-request').fadeOut(10)
    $('.good-request').fadeOut(10)
    let tracking_num = $('#parcel_search').val()
    if (tracking_num != '') {
      $.ajax({
        url: 'function.php?action=get_parcel_heistory',
        data: { parcel_search: tracking_num },
        method: 'POST',
        success: function(resp) {
          if (resp == 2) {
            $('.bad-request').fadeIn(300)
          } else {
            resp = JSON.parse(resp)
            $('.good-request__sender').html(resp.sender_name)
            $('.good-request__city--from').html(resp.from_city_id)
            $('.good-request__recipient').html(resp.recipient_name)
            $('.good-request__city--to').html(resp.to_city_id)
            $('.good-request__status').html(resp.status)
            $('.good-request').fadeIn(300)
          }
        }
      })
    }
  })

  $('.delete_parcel_btn').click(function() {
    let post_id = $(this).attr('data-id')

    $.ajax({
      url: 'function.php?action=delete_parcel',
      data: { id: post_id },
      method: 'POST',
      success: function(resp) {
        if (resp == 1) {
          alert("Data successfully deleted")
          setTimeout(function() {
            location.reload()
          }, 1000)

        }
      }
    })
  })

  $('.view_parcel_btn').click(function() {
    let post_id = $(this).attr('data-id')
    let full_info_table
    $('.full_info_table').fadeOut(30)
    $('.full_info_table--inner').remove()

    $.ajax({
      url: 'function.php?action=view_parcel',
      data: { id: post_id },
      method: 'POST',
      success: function(resp) {
        resp = JSON.parse(resp)
        console.log(resp);
        full_info_table = `
        <table class="full_info_table--inner" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Siuntos numeris</th>
            <th>Siuntejo vardas</th>
            <th>Siuntejo tel.</th>
            <th>Gavejo vardas</th>
            <th>Gavejo tel.</th>
            <th>Issiuntimo miestas</th>
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
            <td>${resp.from_city_id}</td>
            <td>${resp.to_city_id}</td>
            <td>${resp.status}</td>
            <td>${resp.weigth_id}</td>
            <td>${resp.size_id}</td>
            <td>${resp.price}</td>
          </tr>
        </tbody>
      </table>
        `
        $('.full_info_table').append(full_info_table)
        $('.full_info_table').fadeIn(400)
      }
    })

  })

  $('#new_worker').submit(function(e) {
    e.preventDefault()

    let formData = new FormData(this);

    $.ajax({
      url: 'function.php?action=save_new_worker',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      method: 'POST',
      type: 'POST',
      success: function(resp) {
        console.log(resp);
        alert('Data successfully saved', "success");
        setTimeout(function() {
          location.reload(true)
        }, 1000)
      }
    })
  })

  $('.delete_worker_btn').click(function() {
    let post_id = $(this).attr('data-id')

    $.ajax({
      url: 'function.php?action=delete_worker',
      data: { id: post_id },
      method: 'POST',
      success: function(resp) {
        if (resp == 1) {
          alert("Data successfully deleted")
          setTimeout(function() {
            location.reload(true)
          }, 1000)

        }
      }
    })
  })

  $('.add_courier').click(function() {
    console.log('nuuu');
    $(this).hide()
    $(this).next().fadeIn(200)
  })


  $('.set_parcel_worker').click(function() {
    let post_id_but = $(this).attr('data-id')
    $(`#parcel_worker_id--${post_id_but}`).submit(function(e) {
      e.preventDefault()
      console.log('esi?');
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
        success: function(resp) {
          if (resp == 1) {
            alert("Kurjeris pridetas")
            setTimeout(function() {
              location.reload(true)
            }, 1000)
          }
        }
      })
    })
  })

  $('.view_worker_parcels').click(function() {
    let post_id = $(this).attr('data-id')
    let full_info_table
    $('.full_info_table').fadeOut(30)
    $('.full_info_table--inner').remove()

    $.ajax({
      url: 'function.php?action=view_worker_parcels',
      data: { id: post_id },
      method: 'POST',
      success: function(resp) {
        resp = JSON.parse(resp)
          // console.log(resp[0]);
        for (let i = 0; i < resp.length; i++) {

          full_info_table = `
        <table class="full_info_table--inner" style="width:100%">
        <thead>
          <tr>
            <th>Siuntos numeris</th>
            <th>Siuntejo vardas</th>
            <th>Siuntejo tel.</th>
            <th>Gavejo vardas</th>
            <th>Gavejo tel.</th>
            <th>Issiuntimo miestas</th>
            <th>Gavimo miestas</th>
            <th>Svoris</th>
            <th>Dydis</th>
            <th>Statusas</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>${resp[i].reference_number}</td>
            <td>${resp[i].sender_name}</td>
            <td>${resp[i].sender_contact}</td>
            <td>${resp[i].recipient_name}</td>
            <td>${resp[i].recipient_contact}</td>
            <td>${resp[i].from_city_id}</td>
            <td>${resp[i].to_city_id}</td>
            <td>${resp[i].weigth_id}</td>
            <td>${resp[i].size_id}</td>
            <td id="status">
              ${resp[i].status}
              <button class="add_courier" type="button">Keisti statusa</button>
              <form id="" class="parcel_worker" data-id="">
                <select name="status" id="new_status">
                    <option value="1">
                          opcija 1
                    </option>
                    <option value="2">
                          opcija 2
                    </option>
                    <option value="3">
                          opcija 3
                    </option>
                    <option value="4">
                          opcija 4
                    </option>
                </select>
                <button data-id="${resp[i].id}" class="set_parcel_status" type="submit">Issaugoti</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
        `
          $('.full_info_table').append(full_info_table)


        }
        $('.full_info_table').fadeIn(400)

        $('.add_courier').click(function() {
          console.log('nuuu');
          $(this).hide()
          $(this).next().fadeIn(200)
        })

        $('.set_parcel_status').click(function(e) {
          e.preventDefault()
          let post_id = $(this).attr('data-id')
          let new_status = $('#new_status').val()

          $.ajax({
            url: 'function.php?action=change_parcel_status',
            data: {id: post_id, status: new_status},
            method: 'POST',
            success: function(resp) {
              console.log(resp)
              if (resp == 1) {
                alert("Status successfully updated")
                setTimeout(function() {
                  location.reload()
                }, 1000)
      
              }
            }
          })

        })
      }
    })

  })


  $('.back_btn').click(function(){
    window.history.back();
  })


})