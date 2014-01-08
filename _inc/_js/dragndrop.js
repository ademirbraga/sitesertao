$(function() {
    // Disponiveis
    var $disp = $("#disponiveis");

    // tornar carregavel
    $("li", $disp).draggable({
        cancel: "a.ui-icon",//clicar num icone nao inicia
        revert: "invalid",//se nao for largado no lugar certo, volta pra origem
        helper: "clone",
        cursor: "move"
    });

    // transforma em receptores os divs com classes 'receptiveis'
    $('.receptiveis').droppable({
        accept: "#disponiveis > li",
        activeClass: "ui-state-highlight",
        drop: function(event, ui) {
            deleteImage(ui.draggable, this);
        }
    });

    // Apagar o item
    var recycle_icon = "<a href='javascript:void(0);' title='Disponibilizar o ramal para outro grupo' class='ui-icon ui-icon-circle-close'>Disponibilizar o Ramal</a>";

    function deleteImage($item, cont) {
        var $cont = $(cont);
        $item.fadeOut(0,function() {
            var $list = $("ul", $cont).length ?
                $("ul", $cont) :
                $("<ul class='disponiveis ui-helper-reset'/>").appendTo($cont);

            $item.find("a.ui-icon-trash").remove();
            $item.append(recycle_icon).appendTo($list).fadeIn(function() {
                $item
                    .animate({ width: "48px", height: "48px", fontSize:"6px" })
                    .addClass('ui-draggable')
                    .addClass('small')
                    .css("backgroundImage","url(../_img/phonemin.png)");
            });
            $('.ui-helper-reset h3').animate({fontSize:'8px'});
            $( ".receptiveis" ).sortable({
                items:'li'
            }).disableSelection();
        });
    }

    function recycleImage($item) {
        $item.fadeOut(function() {
            $item
                .find("a.ui-icon-circle-close")
                .remove()
                .end()
                .animate({height:"72px", width:"72px", fontSize:"12px" })
                .css("backgroundImage","url(../_img/phonegancho.png)")
                .addClass('ui-draggable')
                .appendTo($disp)
                .fadeIn(10)
                .draggable({
                    cancel: "a.ui-icon",//clicar num icone nao inicia
                    revert: "invalid",//se nao for largado no lugar certo, volta pra origem
                    helper: "clone",
                    cursor: "move"
                });
        });
    }
    
    $(".receptiveis ul.disponiveis > li").click(function(event) {
        var $item = $(this),
            $target = $(event.target);

        if ($target.is("a.ui-icon-circle-close")) {
            recycleImage($item);
        }
        return false;
    });
});