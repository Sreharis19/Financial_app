    function togglechange($id, $user) {
        console.log("called");
        console.log('product',$id);
    console.log('user',$user);
        $.ajax({
            url: 'http://localhost/Financial_app/public/ProductAvailabilityChange',
            type: 'post',
            data: {product_id: $id, user_id:$user},
            dataType: 'json',
            success: function(response) {
                console.log(response);
            }
        });
        
    
    }
    