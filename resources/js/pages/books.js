import '../chart'
import useConfig from '../config';

const { show, update } = useConfig();

const url = new URL(window.location.href);

initFilters(['byType', 'byStatus', 'byLibrary', 'byListType',  'search', 'perPage'])

$('.form-filter').change(function () {
    updateUrlParameter(this.id, this.value);
})

$('#searchButton').click(function(){
    updateUrlParameter('search', $('#search').val());
})

$(document).on("click", ".orderBy", function() {
    updateUrlParameter('orderBy', this.id);
});

$('#search').on('keydown', function(e){
    if (e.key === 'Enter') {
        $('#searchButton').trigger('click');
    }
})

$('.clearUrl').click(function () {
    window.location.href = window.location.origin + window.location.pathname;
})

$(document).on("click", "#editType", function() {
    $('.storeType').attr('hidden' ,true)
    $('.updateType').attr('hidden' ,false)
    $('.updateType').attr('data-typeid' ,$(this).data('typeid'))
    getType($(this).data('typeid'))
});

$(document).on("click", ".updateType", function() {
    updateType($(this).data('typeid'))
    location.reload()
});

async function getType(id) {
    const response = await show('/type', id);
    $('#type_name').val(response.name);
    console.log(name)
}

async function updateType(id) {
    await update('/type', id,{name: $('#type_name').val()});
}

function updateUrlParameter(key, value) {
    key ? url.searchParams.set(key, value) : '';
    window.location.href = url.toString();
}


function initFilters(elements) {
    elements.map(item => {
        url.searchParams.get(item) ? $('#' + item).val(url.searchParams.get(item)) : ''
    })
}


