<?php if (user_can('view_users')) : ?>
    <div class="table-responsive">

        <form class="input-group mb-3 mx-auto">
            <input type="text" name="find" value="<?= old_value('find', '', 'get') ?>" class="form-control" aria-label="Amount (to the nearest dollar)">
            <button class="input-group-text  text-white" style="background-color: #191C1F;  color:white;">Search</button>
        </form>

        <table class="table caption-top">
      <caption>Reports</caption>
      <thead>
        <tr>
          <th scope="col">Reference</th>
          <th scope="col">Status</th>
          <th scope="col">Category</th>
          <th scope="col">Comment</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($reports)) : ?>
          <?php foreach ($reports as $report) : ?>
            <tr>
              <td><?= $report->reference ?></td>
              <td><?= $report->status ?></td>
              <td><?= $report->category ?></td>
              <td><?= $report->comment ?></td>
              <td><?= get_date($report->date_created) ?></td>
              

            </tr>
          <?php endforeach ?>
        <?php endif ?>


      </tbody>
    </table>

        
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete your account? This action cannot be undone and you will be unable
                            to recover any data.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancle</button>
                        <button type="button" id="true" data-bs-dismiss="modal" class="confirm btn btn-danger">Yes, delete
                            it!</button>
                    </div>
                </div>
            </div>
        </div>
<?php else : ?>
    <div class="alert alert-danger text-center">
        Access denied! Please contact admin to view this page
    </div>

<?php endif ?>



<script>
function send_data(formdata, obj) {
            for (key in obj) {
                formdata.append(key, obj[key])
            }

            $.ajax({
                url: '<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?>/ajax',
                method: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    var db = JSON.parse(response);                    
                    handel_result(db)


                }

            })

        }

        function handel_result(obj) {
            if (typeof obj == 'object') {
                if (obj.statusCode == 200) {
                    if (obj.form_id == 'row') {
                        var row = obj.row
                        for (key in row) {
                            if (key == 'comment') {
                                $(`textarea#${key}`).text(row[key])                            }
                            $(`#${key}`).val(row[key])
                        }
                    } else {
                        var message = obj.message
                        newModal.hide()
                        $('.alert').removeClass('d-none')
                        $('.alert').text(message)
                        $("#table").load("<?= ROOT ?>/<?= $admin_route ?>/<?= $plugin_route ?> #table");
                        message = ''
                        $('.alert').addClass('d-none')
                    }

                } else
                if (obj.statusCode == 400) {
                    var errors = obj.errors;                   
                    $('.alert').removeClass('d-none')                   
                        $('.alert').text(errors )
                        errors = '';
                    

                }
            }


        }


    $(document).on('click', '.delete', function(e) {
        var id = $(this).attr('id');
        var formdata = new FormData();
        formdata.append("form_id", "delete")
        var obj = {
            id: id
        }

        $('.confirm').click(function() {
            var ok = $(this).attr('id')
            console.log(ok)
            if (ok) {
                send_data(formdata, obj)

            }
        })



    })
</script>