$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( "form" ).submit(function(event) {
        event.preventDefault();
        let formData = new FormData();
        $.ajax({
            type: "POST",
            url: "/store",
            data: formData,
            success:function (formData) {
                console.log(formData)
            },
            error: function(data)
            {
                console.log(data);
            },
            dataType: 'json'
        });
    });

    // $( ".delete" ).click(function(e) {
    //     el = $(e.target)
    //     console.log(el.attr("favorite_id"))
    //     $.ajax({
    //         type: "POST",
    //         url: "/delete",
    //         data: {cid:el.attr("favorite_id")},
    //         success:function (data) {
    //             el.parents(".deleted").detach()
    //         },
    //         dataType: 'json'
    //     });
    // });
});
