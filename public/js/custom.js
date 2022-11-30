$(document).ready(function () {
    $('.spinner-btn').click(function () {
        $(this).html('<span class="spinner-border spinner-border-sm mr-2"></span>Loading...').attr('disabled', true);
    });
});

$(document).ready(function(){
    $('.hideshow-radio-custom input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".onclick-radio-content").not(targetBox).hide();
        $(targetBox).show();
    });
});

$('.oncheckmodel[type="checkbox"]').on('change', function(e){
    if(e.target.checked){
      $('.oncheck-modeldetails').modal();
    }
});

 $(document).ready(function(){
    $(".onselectchnage").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".onselectchnage-box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".onselectchnage-box").hide();
            }
        });
    }).change();
});

//table checkbox js
$('.table-checkbox-main input').click(function (e) {
    $(this).closest('table.table-checked').find('td input:checkbox').prop('checked', this.checked);
});


//filter js
function toggleFilter() {
    $('.btn-filter').toggleClass('show menu-dropdown');
    $(".filter-details").toggleClass('filter-details-show');
    $(".overlay-bg").toggle();
    
}
$('.btn-filter, .overlay-bg').on("click", function (event) {
    toggleFilter();
})
