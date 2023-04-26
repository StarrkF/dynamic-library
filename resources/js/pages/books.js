import '../chart'
import useConfig from '../config';

const { index, show, update } = useConfig();

const url = new URL(window.location.href);
const selectedChecks = [];
const drawResult = null;

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

$(document).on("change", ".draw-select", function() {
    var draw_id =  this.id.replace("draw_", "");
    selectedChecks[draw_id] = this.value
});

$(document).on("click", "#getDraw", function() {
    getDraw().then(result =>{
        $('.card-result').attr('hidden', false);
        $('.card-result h2').text(result.name);
        $('.card-result h4').text(result.author);
        $('.draw-select').val('');
    })
});

async function getType(id) {
    const response = await show('/type', id);
    $('#type_name').val(response.name);
}

async function getDraw() {
    var params = Object.assign({}, selectedChecks)
    let response = await index('/draw?' + $.param(params));
    return response.data
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


