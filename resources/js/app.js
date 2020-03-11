require("./bootstrap");

window.Vue = require("vue");
window.VueRouter = require("vue-router").default;

const EventBus = require("./EventBus").default;

Vue.prototype.$bus = EventBus;

Vue.prototype.$cartItem = [];

require("@fortawesome/fontawesome-free/js/all");

const VueCurrency = require("vue-currency-filter").default;

const Navbar = require("./components/NavbarComponent.vue").default;
const Footer = require("./components/FooterComponent.vue").default;

Vue.component("Navbarcomponent", Navbar);
Vue.component("Footercomponent", Footer);

Vue.use(VueRouter);
Vue.use(VueCurrency, {
    symbol: "₭",
    thousandsSeparator: ".",
    symbolPosition: "front"
});

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: require("./pages/HomePage.vue").default
        },
        {
            path: "/products",
            name: "all products",
            component: require("./pages/ProductsPage.vue").default,
            children: [
                {
                    path: ":type",
                    name: "products by type",
                    component: require("./pages/ProductsPage.vue").default
                }
            ]
        },
        {
            path: "/product/:id",
            name: "product",
            component: require("./pages/ProductPage.vue").default
        },
        {
            path: "/cart",
            name: "cart",
            component: require("./pages/CartPage.vue").default
        },
        {
            path: "/register",
            name: "register",
            component: require("./pages/RegisterPage.vue").default
        },
        {
            path: "/login",
            name: "login",
            component: require("./pages/LoginPage.vue").default
        },
        {
            path: "/admin/:username",
            name: "admin",
            component: require("./pages/AdminPage.vue").default,
            beforeEnter: (to, from, next) => {
                if (
                    !localStorage.getItem("user_id") ||
                    !localStorage.getItem("username")
                ) {
                    next("/login");
                } else {
                    next();
                }
            },
            children: [
                {
                    path: "home",
                    name: "admin-home",
                    component: require("./pages/AdminHomePage.vue").default
                },
                {
                    path: "product-management",
                    name: "admin-product-management",
                    component: require("./pages/AdminProductManagementPage.vue")
                        .default
                },
                {
                    path: "add-product",
                    name: "admin-add-product",
                    component: require("./pages/AdminProductEditPage.vue")
                        .default
                },
                {
                    path: "edit-product/:productId",
                    name: "admin-edit-product",
                    component: require("./pages/AdminProductEditPage.vue")
                        .default
                }
            ]
        },
        {
            path: "/user/:username",
            name: "user",
            component: require("./pages/UserPage.vue").default,
            beforeEnter: (to, from, next) => {
                if (
                    !localStorage.getItem("user_id") ||
                    !localStorage.getItem("username")
                ) {
                    next("/login");
                } else {
                    next();
                }
            },
            children: [
                {
                    path: "home",
                    name: "user-home",
                    component: require('./pages/UserHomePage.vue').default
                },
                {
                    path: "purchase-history",
                    name: "user-purchase-history",
                    component: require('./pages/UserPurchaseHistoryPage.vue').default
                }
            ]
        },
        {
            path: "/about",
            name: "about",
            component: require("./pages/AboutPage.vue").default
        },
        {
            path: "/contact",
            name: "contact",
            component: require("./pages/ContactPage.vue").default
        },
        {
            path: "*",
            name: "404",
            component: require("./pages/404Page.vue").default
        }
    ]
});

Vue.router = router;

const app = new Vue({
    el: "#app",
    router: Vue.router
});
