/**
 * Created by sht_j on 14.04.2017.
 */


$("[data-js='delete']").on("click", function () {

    if (!confirm('Удалить?')){
        return false;
    }


});