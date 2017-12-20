jQuery(document).ready(function($){

//Demo Import
$(".demo-import-button").click(function (){
    var demo_content_id = $(this).attr('id');
    $import_true = confirm('Confirm Demo import. Immporting Demo Will Overwrite Your All Contents');
    if($import_true == false) return;
    var imp = $(this).next('div');
    imp.addClass('demo-loading');

    $(".info-importing").html("Importing Demo Content May While");
    $(demo_content_id).fadeOut();
    $.ajax({
       type: "POST",
       url: ajaxurl,
       data: ({
        action: 'beetech_demo_import',
        ids_value:    demo_content_id,
       }),
       success: function(response){
        alert(response);
        imp.removeClass('demo-loading');
        alert("Demo Contents Successfully Imported");
        location.reload();
       }
    });

});









});