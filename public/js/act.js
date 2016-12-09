$("#urlAdd").droppable({
    hoverClass: 'active',
    drop: function (event, ui) {
        this.value = $(ui.draggable).href();
    }
});