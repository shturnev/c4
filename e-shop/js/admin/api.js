/**
 * Created by sht_j on 05.05.2017.
 */

$("[data-js='get_types']").on("change", function () {
    
    var href = "/e-shop/api.php",
        forPost = {
                    "method_name": "get_types",
                    "cat_id": $(this).val(),
                    "limit": 150,
                    "page": 0
        };
    
    $.post(href, forPost, function(d){

        var res = JSON.parse( d );
        if(res.error){ alert(res.error); return false; }
        else if (!res){ $("[data-js='set_types']").html(''); }

        $("[data-js='set_types']").html('');

        //проходимся в цикле и собираем html
        for ( var i = 0; i < res.items.length; i++ )
        {
            var item = res.items[i];
            var htm = "<option value='"+ item["ID"] +"'>" + item["name"] + "</option>";
            $("[data-js='set_types']").append(htm);
        }

    });
    
    return false;
});
