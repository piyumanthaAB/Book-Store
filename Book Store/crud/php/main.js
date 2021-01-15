//bootstrap tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

var id = $("input[name='book_id']");
id.attr("readonly", "readonly");

//edit button

$(".btnEdit").click((e) => {
    var textvalues = displayData(e);
    console.log(textvalues);

    
    var book_name = $("input[name='book_name']");
    var book_publisher = $("input[name='book_publisher']");
    var book_price = $("input[name='book_price']");

    id.val(textvalues[0]);
    book_name.val(textvalues[1]);
    book_publisher.val(textvalues[2]);
    book_price.val(textvalues[3].replace('$',""));
   
})

function displayData(e) {
    var id = 0;
    const td = $("#tbody tr td ");
    var textvalues = [];

   


    for (const value of td) {
        // console.log(value);
        if (value.dataset.id ==e.target.dataset.id ) {
            // console.log(`target datase id: ${e.target.dataset.id}`);
            // console.log(`value dataset id: ${value.dataset.id}`);
            
            // textvalues[id++] = value.textContent;
            textvalues.push(value.textContent);
            
        }
    }

    return textvalues;
    
}