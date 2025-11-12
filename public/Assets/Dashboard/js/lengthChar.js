$(document).ready(function () {
    // Function to update character count GLOBAL
    function updateCharCountGlobal(inputField, charCountField, totalChar) {
        var charCount = inputField.val().length;
        charCountField.text(charCount + "/" + totalChar);
        // Check if character count exceeds the totalChar
        if (charCount >= totalChar) {
            // console.log(`Exceeded: ${charCount}/${totalChar}`);
            charCountField.addClass("exceeded");
        } else {
            // console.log(`Not Exceededs: ${charCount}/${totalChar}`);
            charCountField.removeClass("exceeded");
        }
    }

    // Display character count for pass new input
    $("#new_password")
        .on("input", function () {
            updateCharCountGlobal($(this), $("#new_password_char_count"), 30);
        })
        .on("focus", function () {
            $("#new_password_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#new_password_char_count").addClass("d-none");
        });

    // Display character count for renew pass input
    $("#new_password_confirmation")
        .on("input", function () {
            updateCharCountGlobal(
                $(this),
                $("#new_password_confirmation_char_count"),
                30
            );
        })
        .on("focus", function () {
            $("#new_password_confirmation_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#new_password_confirmation_char_count").addClass("d-none");
        });

    // Display character count for itwork input
    $("#title-how-it-work-input")
        .on("input", function () {
            updateCharCountGlobal(
                $(this),
                $("#title-how-it-work_char_count"),
                250
            );
        })
        .on("focus", function () {
            $("#title-how-it-work_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#title-how-it-work_char_count").addClass("d-none");
        });

    // Display character count for for itwork text area
    $("#desc-how-it-work-textarea")
        .on("input", function () {
            updateCharCountGlobal(
                $(this),
                $("#desc-how-it-work_char_count"),
                1000
            );
        })
        .on("focus", function () {
            $("#desc-how-it-work_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#desc-how-it-work_char_count").addClass("d-none");
        });

    // Display character count title slider
    $("#id-title-slider-input")
        .on("input", function () {
            updateCharCountGlobal(
                $(this),
                $("#id-title-slider_char_count"),
                155
            );
        })
        .on("focus", function () {
            $("#id-title-slider_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#id-title-slider_char_count").addClass("d-none");
        });

    // Display character count title slider
    $("#id-desc-slider-textarea")
        .on("input", function () {
            updateCharCountGlobal(
                $(this),
                $("#id-desc-slider_char_count"),
                355
            );
        })
        .on("focus", function () {
            $("#id-desc-slider_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#id-desc-slider_char_count").addClass("d-none");
        });

    // Display character count title slider
    $("#en-title-slider-input")
        .on("input", function () {
            updateCharCountGlobal(
                $(this),
                $("#en-title-slider_char_count"),
                155
            );
        })
        .on("focus", function () {
            $("#en-title-slider_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#en-title-slider_char_count").addClass("d-none");
        });

    // Display character count title slider
    $("#en-desc-slider-textarea")
        .on("input", function () {
            updateCharCountGlobal(
                $(this),
                $("#en-desc-slider_char_count"),
                355
            );
        })
        .on("focus", function () {
            $("#en-desc-slider_char_count").removeClass("d-none");
        })
        .on("blur", function () {
            $("#en-desc-slider_char_count").addClass("d-none");
        });
});
