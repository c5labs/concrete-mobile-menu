/*
    | Mobile Navigation
    */

document.addEventListener(
    "DOMContentLoaded", () => {
        new Mmenu( "#mmenu", {
            extensions: ["position-right"],
                navbar: {
                    add: true,
                    sticky: true,
                    title: CCM_SITE_NAME,
                },
               navbars: [
                  {
                     position: "top",
                     content: [
                        "prev",
                        "breadcrumbs"
                     ]
                  }
               ]
            },{
            /*offCanvas: {
                page: {
                    selector: ".ccm-page"
                }
            }*/
        });
    }
);