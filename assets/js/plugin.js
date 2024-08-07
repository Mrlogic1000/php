    class CRUD {
      address;
      instance;
      updateForm
      obj;
      result;
      updateModal;
      newModal;
      instanceUpdateModal;
      instanceNewModal;

      constructor(url = "", instance) {
        this.instance = instance
        this.updateForm = `${this.instance}UpdateForm`
        this.address = url + instance;
        instance = this.converter(instance);

        this.newModal = new bootstrap.Modal( document.getElementById(`new${instance}`),{} );
        this.instanceNewModal = bootstrap.Modal.getInstance(document.getElementById(`new${instance}`));

        this.updateModal = new bootstrap.Modal( document.getElementById(`update${instance}`), {} );
        this.instanceUpdateModal = bootstrap.Modal.getInstance(document.getElementById(`update${instance}`));
        
        console.log(this.instance)
      }

      converter(string) {
        string = string.charAt(0).toUpperCase() + string.slice(1);

        return string;
      }
      title(){
        return this.converter(this.instance)
      }

      display(modal = "new") {
        if (modal == "new") {        
          this.instanceNewModal.show();
        } else {
          this.instanceUpdateModal.show();
        }
      }

      hide(modal='update'){
        if (modal == "update") {
          this.instanceUpdateModal.hid();
        } else {
          this.instanceNewModal.hid();
        }
      
      }

      async sendData(form, obj) {
        for (let key in obj) {
          form.append(key, obj[key]);
        }
        let result = await $.ajax({
          url: this.address,
          method: "POST",
          data: form,
          processData: false,
          contentType: false,
        });

        // console.log(result)
        return JSON.parse(result);

      }

      create(data) {
        let obj = { form_id: "new" };
        console.log(this.address);
        let form = new FormData(data);
        this.sendData(form, obj);
        this.instanceNewModal.hide();
        location.reload();
        var triggerEl = document.querySelector(`#myTab a[href="#${this.instance}"]`)
bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
      }

      async row(id = "") {
        let obj = {
          form_id: "row",
          id: id,
        };
        // console.log(id)
        let form = new FormData();
        let result = await this.sendData(form, obj);
        let row = result.data;
        
        for (let key in row) { 
          // console.log(row[key])
                
                  if (key == 'description'|| key=='comment') {
                  
                    $(`textarea#${key}`).text(row[key])
                  }
                  $(`#${this.updateForm} div`).children(`#${key}`).val(`${row[key]}`)
                }
              

                this.instanceUpdateModal.show();
              
        
      }

       update(data) {
        let obj = { form_id: "update" };
        let form = new FormData(data);
        let result = this.sendData(form, obj);
        this.instanceUpdateModal.hide();
        // console.log(this.updateModal)
        $('#updateOutlet').on('show.bs.modal', function (event) {
          console.log('The modal closed')


        })
        // location.reload();
        var someTabTriggerEl = document.querySelector('#report')
        var tab = new bootstrap.Tab(someTabTriggerEl)
      
        tab.show()
      }

      delete(id) {
        // let form = new FormData();
        let obj = {
          form_id: "delete",
          id: id,
        };
        let form = new FormData();
        let addr = this.address;

        $(".confirm").click(function () {
          var confirm = $(this).attr("boolean");
          if (confirm) {
            for (let key in obj) {
              form.append(key, obj[key]);
            }
            $.ajax({
              url: addr,
              method: "POST",
              data: form,
              processData: false,
              contentType: false,
              success: function (resp) {
                var result = JSON.parse(resp);
                console.log(result);
                // location.reload();


                var table = $('#report').DataTable();
table.ajax.reload();
              },
            });
          }
        });
      }
    }
