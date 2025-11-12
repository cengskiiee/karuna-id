$(document).ready(function () {
    $("#formFile").on("change", function () {
        const file = this.files[0];
        const validImageTypes = ["image/jpeg", "image/png", "image/jpg"];

        if (file) {
            if (!validImageTypes.includes(file.type)) {
                $("#errorMessage").show();
                $("#imagePreview").hide();
                $("#fileSize").hide();
                return;
            }

            $("#errorMessage").hide();

            const reader = new FileReader();
            reader.onload = function (e) {
                $("#imagePreview").attr("src", e.target.result).show();
                $("#fileSize")
                    .text(
                        "Image size: " + (file.size / 1024).toFixed(2) + " KB"
                    )
                    .show();
            };
            reader.readAsDataURL(file);
        }
    });
});
