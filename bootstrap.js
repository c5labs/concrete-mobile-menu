/*
    | Mobile Navigation
    */
window.concreteMobileMenu = Object.assign({ options: {}, config: {}, instance: null }, window.concreteMobileMenu ? window.concreteMobileMenu : {})

window.concreteMobileMenu.options = Object.assign({
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
}, window.concreteMobileMenu.options)

document.addEventListener(
    "DOMContentLoaded", () => {
        window.concreteMobileMenu.instance = new Mmenu(
            "#mmenu",
            window.concreteMobileMenu.options, 
            window.concreteMobileMenu.config
        );
    }
);