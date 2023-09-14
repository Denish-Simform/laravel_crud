$(document).ready(function () {
    setTimeout(function() {
        $("#success-alert").remove();
    }, 5000);

    $("#profile_picture").change(function () {
        if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('#showImage').attr('src', e.target.result).removeClass("hide");
        };
        reader.readAsDataURL(this.files[0]);
    }

})
});
