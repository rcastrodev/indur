let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let tableRecorrido = $('#page_table_recorrido').DataTable({
    serverSide: true,
    ajax: `${root}/recorrido/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "content_1"},
        { data: "content_2"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let tableDescargable = $('#page_table_descargables').DataTable({
    serverSide: true,
    ajax: `${root}/descargables/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_3"},
        { data: "content_1"},
        { data: "content_2"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});


function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    CKEDITOR.instances['content_11'].setData(content.content_1)
}

function dataRecorridoContent(content)
{
    let form = document.getElementById('form-update-recorrido')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    form.querySelector('input[name="content_1"]').value = content.content_1
    form.querySelector('input[name="content_2"]').value = content.content_2
}

function dataDescargableContent(content)
{
    let form = document.getElementById('form-update-descargable')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    form.querySelector('input[name="content_1"]').value = content.content_1
    CKEDITOR.instances['content_23'].setData(content.content_2)
}

async function findContent2(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataRecorridoContent(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

async function findContent3(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataDescargableContent(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}