$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $( '#ajax_form' ).submit(function(event) {
        event.preventDefault();
        let form = $('#ajax_form');
        let formData = new FormData();
        let data = form.serializeArray();
        let fullPath = $("#fileInput").val();
        let filename = fullPath.replace(/^.*[\\\/]/, '');
        data.forEach(function (currentValue, index, array) {
            formData.append(currentValue.name, currentValue.value)
        });
        formData.append(filename, $('#fileInput').prop('files')[0]);

        $.ajax({
            type: "POST",
            url: "/store",
            data: formData,
            processData: false,
            contentType: false,
            success:function (data) {
                alert('Данные успешно отправлены')
            },
            error: function(data)
            {
                if (data.status == 422) {
                    let obj = JSON.parse(data.responseText).errors;
                    let errorsHtml = '<div class="alert alert-danger"><ul>';

                    for (let prop in obj) {
                        if (obj.hasOwnProperty(prop) && typeof(prop) !== 'function') {
                            errorsHtml += '<li>'+ obj[prop] + '</li>';
                            break;
                        }
                    }
                    errorsHtml += '</ul></div>';
                    $( '#form-errors' ).html( errorsHtml );
                }
            },
            dataType: 'json'
        });
        return false;
    });
});
