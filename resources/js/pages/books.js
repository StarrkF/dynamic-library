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

$(document).on("change", ".draw-switch", function() {
    var el = $(this)
    var name = el.attr('data-name')
    if (el.is(':checked')) {
        $("#draw-list").append('<li class="list-group-item" id="li-' + this.id + '">' + name + '</li>');
        selectedChecks.push({id:this.id ,name:name})
    } else {
        let index = selectedChecks.indexOf(name);
        $("#li-" + this.id ).remove();
        selectedChecks.splice(index, 1);
    }
    console.log(selectedChecks)
    selectedChecks.length > 0 ? $('#getDraw').attr('disabled', false) : $('#getDraw').attr('disabled', true)
});

$(document).on("click", "#getDraw", function() {
    getDraw().then(result =>{
        let keys = Object.keys(result)
        keys.map(key => {
            $("#span-" + key).remove()
            $("#li-" + key).append('<span id="span-' + key + '" > : ' + result[key] + '</span>');
            console.log("#li-" + key)
        })
    })
});

async function getType(id) {
    const response = await show('/type', id);
    $('#type_name').val(response.name);
}

async function getDraw() {
    let ids = selectedChecks.map(check => check.id);
    let types = ids.join(',');
    let response = await index('/draw?types=' + types);
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


