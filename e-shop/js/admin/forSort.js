$(document).ready(function () {

    var  clear_url = window.location.protocol + "//" + window.location.hostname + "/"
        , this_page = window.location.href
        , apiHref = clear_url + "e-shop/options.php"; //указать здесь правильный путь



    function sort(el) {

        $(el).sortable({onEnd: function (/**Event*/evt) {

            var parr = $(evt.item).parent();
            serializeData(parr);

        }});
    }
    function serializeData(el) {
        var data = {
            "method_name":  "sortable",
            "table":        $(el).attr("data-table"),
            "list_data":    $.map( $(el).children(), function(item){ return $(item).attr("data-id"); })
        };

        $.post(apiHref, data, function(d){
            console.log(d);
            
            var res = JSON.parse( d );
            if(res.error){ alert(res.error); return false; }
        });

    }


    /**
     * Названия класса для сортирующихся элементов .sortable
     * также контейнер должен иметь атрибут data-table в котором будет имя таблицы
     * элементы внутри контейнера должны иметь атрибут data-id где значение id в таблице
     */
    sort($(".sortable"));


}); //Конец Ready