import '../chart'

const url = new URL(window.location.href);
initFilters(['byType', 'byStatus', 'byLibrary', 'byListType',  'search', 'perPAge'])

$('.form-filter').change(function () {
    updateUrlParameter(this.id, this.value);
})

$('#searchButton').click(function(){
    updateUrlParameter('search', $('#search').val());
})

$('#search').on('keydown', function(e){
    if (e.key === 'Enter') {
        $('#searchButton').trigger('click');
    }
})

$('.clearUrl').click(function () {
    window.location.href = window.location.origin + window.location.pathname;
})

function updateUrlParameter(key, value) {
    key ? url.searchParams.set(key, value) : '';
    window.location.href = url.toString();
}

function initFilters(elements) {
    elements.map(item => {
        url.searchParams.get(item) ? $('#' + item).val(url.searchParams.get(item)) : ''
    })

}


