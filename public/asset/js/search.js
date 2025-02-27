$(document).ready(function () {
    $("#search-box").on("input", function () {
        let query = $(this).val();

        if (query.length > 0) {
            $.ajax({
                url: "/search",
                type: "GET",
                data: { query: query },
                success: function (response) {
                    console.log(response);

                    let searchResults = $("#search-results");
                    searchResults.empty();

                    if (response.length > 0) {
                        response.forEach(function (item) {
                            let resultItem = `
                                <div class="search-result-item" data-id="${item.id}">
                                    <div class="food-image">
                                        <img src="${item.image}" alt="${item.name}">
                                    </div>
                                    <div class="food-info">
                                        <strong>${item.name} - $${parseFloat(item.price).toFixed(2)}</strong>
                                        <div class="stars">${'★'.repeat(Math.round(item.rating))}</div>
                                    </div>
                                </div>
                            `;
                            searchResults.append(resultItem);
                        });

                        searchResults.show();
                    } else {
                        searchResults.html("<div class='search-result-item'>Không có kết quả</div>");
                        searchResults.show();
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Lỗi AJAX: ", error);
                }
            });
        } else {
            $("#search-results").hide();
        }
    });

    $(document).on("click", function (e) {
        if (!$(e.target).closest("#search-box, #search-results").length) {
            $("#search-results").hide();
        }
    });

    $(document).on("click", ".search-result-item", function () {
        let foodId = $(this).data("id");
        window.location.href = `/order/${foodId}`;
    });
});