class CRUD {
  address;
  instance;

  obj;
  result;
  updateModal;
  newModal;
  instanceUpdateModal;
  instanceNewModal;

  constructor(url = "", instance) {
    this.address = url + instance;
    instance = this.converter(instance);

    this.newModal = new bootstrap.Modal(
      document.getElementById(`new${instance}`),
      {}
    );
    this.instanceNewModal = bootstrap.Modal.getInstance(
      document.getElementById(`new${instance}`)
    );

    this.updateModal = new bootstrap.Modal(
      document.getElementById(`update${instance}`),
      {}
    );
    this.instanceUpdateModal = bootstrap.Modal.getInstance(
      document.getElementById(`update${instance}`)
    );
  }
  converter(string) {
    string = string.charAt(0).toUpperCase() + string.slice(1);

    return string;
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

    return JSON.parse(result);

    // console.log(this.result)
  }

  create(data) {
    let obj = { form_id: "new" };
    let form = new FormData(data);
    this.sendData(form, obj);
    this.instanceNewModal.hide();
  }
  async row(id = "") {
    let obj = {
      form_id: "row",
      id: id,
    };
    let form = new FormData();
    let result = await this.sendData(form, obj);
    // console.log(result.data)

    for (let key in result) {
      if (key == "description" || key == "comment") {
        $(`textarea#${key}`).text(result[key]);
      }
      $(`#${key}`).val(result[key]);
    }
    this.instanceUpdateModal.show();
  }
  update(data) {
    let obj = { form_id: "update" };
    let form = new FormData(data);
    this.sendData(form, obj);
    this.instanceUpdateModal.hide();
  }

  delete(id) {
    let obj = {
      form_id: "delete",
      id: id,
    };
    let form = new FormData();

    $(".confirm").click(function () {
      var ok = $(this).attr("id");
      if (ok) {
        console.log(obj);
        this.sendData(form, obj);
      }
    });
  }
}
