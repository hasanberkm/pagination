var base_url = window.location.origin; //Eg: http://localhost/

function pagination(url = "", totalPage = 1, dom = ".pagination", dom1 = ".pagination", firstBtnTxt="İlk", prevBtnTxt="Önceki", nextBtnTxt="Sonraki", lastBtnTxt="Son") {

    $(dom).twbsPagination({
        totalPages: totalPage,
        visiblePages: 5,
        first: firstBtnTxt,
        prev: prevBtnTxt,
        next: nextBtnTxt,
        last: lastBtnTxt,
        onPageClick: function(event, page) {
            $.post(base_url + url, { transaction: "pagination", page_number: page }, function(data) {
                data = JSON.parse(data);

                if (data.products.length > 0)
                    $(dom1).html(data.products);
                
                else
                    $(dom1).html("<h4 class='w-100 text-center'>" + data.message + "</h4>");
            });
        }
    });

}