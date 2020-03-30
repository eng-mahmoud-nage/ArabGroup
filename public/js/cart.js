function AddItem(book_id) {
    console.log(book_id);
    if (book_id) {
        $.ajax({
            url: "{{url('fronts/item')}}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'book_id': book_id,
            },
            success: function(data) {
                console.log(data.status);
                if (data.status === 1) {
                    console.log('success');
                } else {
                    console.log(data.status);
                }
            },
        });
    }
};