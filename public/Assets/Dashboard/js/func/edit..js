$(document).ready(function () {
    // Function to edit service category
    function editCategory(category) {
        $("#edit_service_category_title").val(category.service_category_title);
        $("#edit_description").val(category.description);
        $("#editCategoryForm").attr(
            "action",
            "/services-category/" + category.id
        );
    }
});
