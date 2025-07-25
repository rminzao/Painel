const parameters = {
  pve: {
    params: {
      sid: null,
      page: 1,
      limit: 5,
      search: '',
      type: 0,
    }
  }
}

const pve = {
  list: (page = 1) => {
    parameters.pve.params.page = page
    helper.loader('#pve_body', true);
    axios.get(`${baseUrl}/api/admin/game/pve`, parameters.pve).then(res => {
      pve.populate(res?.data);
    });
  },
  create: () => {
    const data = $("#md_pve_create form").serializeObject();
    data.sid = parameters.pve.params.sid;

    var button = document.querySelector("#btn_pve_create");
    changeButtonState(button, true);

    axios.post(`${baseUrl}/api/admin/game/pve`, data).then(res => {
      var su = res.data;
      swMessage(su.state ? "success" : "warning", su.message);
      changeButtonState(button, false);
      if (su.state)
        pve.list(parameters.pve.params.page)
    })
  },
  update: () => {
    const data = $("#pve_data form").serializeObject();
    data.sid = parameters.pve.params.sid;

    var button = document.querySelector("#btn_pve_update");
    changeButtonState(button, true);

    axios.put(`${baseUrl}/api/admin/game/pve`, data).then(res => {
      var su = res.data;
      swMessage(su.state ? "success" : "warning", su.message);
      changeButtonState(button, false);
      if (su.state)
        pve.list(parameters.pve.params.page)
    })
  },
  delete: (id) => {
    Swal.fire({
      icon: "error",
      html: "Você tem certeza que deseja apagar essa instancia? essa alteração não pode ser desfeita e pode ocorrer erros imprevistos no servidor.",
      buttonsStyling: false,
      showCancelButton: true,
      confirmButtonText: "Sim, delete isso!",
      cancelButtonText: "Não, cancele!",
      customClass: {
        confirmButton: "btn btn-danger",
        cancelButton: "btn btn-light",
      },
    }).then((result) => {
      if (result.isConfirmed) {
        axios.delete(`${baseUrl}/api/admin/game/pve`, {
          params: {
            id: id,
            sid: parameters.pve.params.sid
          }
        }).then((results) => {
          var su = results.data;
          swMessage(su.state ? "success" : "warning", su.message ?? 'mensagem desconhecida');
          if (su.state) {
            pve.list(parameters.pve.params.page)
          }
        })
      }
    })
  },
  populate: (data) => {
    const list = $('#pve_list'),
      no_result = $('#no_result'),
      paginator = $('#paginator'),
      footer = $('#pve_list_footer');

    if (data?.data.length <= 0) {
      no_result.show();
      list.hide();
      footer.hide();
      helper.loader('#pve_body', false);
      return;
    }

    const pveItem = (info, last = false) => {
      return `<div class="d-flex flex-stack pt-2" id="pve-${info.ID}">
          <div class="d-flex align-items-center">
              <div class="w-60px h-40px min-w-60px me-3 rounded bg-light">
                  <img src="${info.Image}" onerror="this.src='${info.ImageDefault}';" class="w-100 h-100 rounded" style="object-fit: cover;" />
              </div>
              <div>
                  <a href="javascript:;" id="edit_name" class="fs-8 fw-bolder text-gray-900 text-hover-primary mb-2">
                    ${info.Name}
                  </a>
                  <div class="text-muted fs-7 mb-1">🌍 ID: ${info.ID}</div>
              </div>
          </div>
          <div class="d-flex align-items-end ms-2">
              <button type="button" class="btn btn-icon btn-color-gray-400 btn-sm btn-active-color-primary" id="edit">
                  <span class="svg-icon svg-icon-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path
                              opacity="0.3"
                              d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                              fill="currentColor"
                          ></path>
                          <path
                              d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                              fill="currentColor"
                          ></path>
                      </svg>
                  </span>
              </button>
              <button type="button" class="btn btn-icon btn-color-gray-400 btn-sm btn-active-color-danger" id="delete">
                  <span class="svg-icon svg-icon-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                          <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                          <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                      </svg>
                  </span>
              </button>
          </div>
      </div>
      ${last ? '' : '<div class="pt-2 separator separator-dashed"></div>'}`
    }

    list.empty();
    paginator.empty();

    (data.paginator.rendered == null) ? paginator.hide() : paginator.show();
    (data.paginator.rendered == null) ? footer.hide() : footer.show();

    $.each(data.data, (_, info) => {
      list.append(pveItem(info, (_ == data.data.length - 1)));
      $(`#pve-${info.ID} #edit`).click(() => {
        pve.detail(info);
      });
      $(`#pve-${info.ID} #delete`).click(() => {
        pve.delete(info.ID);
      });
    });

    paginator.html(data.paginator.rendered)

    list.show();
    no_result.hide();
    helper.loader('#pve_body', false);
  },
  detail: (data) => {
    $('#pve_data form input[name="OriginalID"]').val(data.ID);
    $.each(data, (key, value) => {
      const input = $('#pve_data form').find(`[name="${key}"]`);

      input.val(value)
    });

    $('#no_selected').hide();
    $('#pve_data').show();
  },
}

const controls = {
  listeners: () => {
    parameters.pve.params.sid = $('select[name="sid"]').val();

    $('select[name="sid"]').on('change', function () {
      parameters.pve.params.sid = $(this).val();
      pve.list();
    });

    $('#pve_list_footer select[name="limit"]').on('change', function () {
      parameters.pve.params.limit = $(this).val();
      pve.list();
    });

    $('select[name="type_filter"]').on('change', function () {
      parameters.pve.params.type = $(this).val();
      pve.list();
    });

    $('#search').on('change', function () {
      parameters.pve.params.search = $(this).val();
      pve.list();
    });
  },
  init: () => {
    controls.listeners();
    pve.list();
  }
}

controls.init();
