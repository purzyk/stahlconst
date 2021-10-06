import $ from "jquery";

class BackToTop {
    constructor() {
        $("#ToTop").click(function () {
            $("body, html").animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    }
}

export default BackToTop;
