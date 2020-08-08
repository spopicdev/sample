<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link :to="{name: 'home'}" class="navbar-brand">Big Store</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="btn btn-primary" v-if="cartItems" > Cart</li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <router-view @loggedIn="change"></router-view>
        </main>
    </div>
    <modal
        v-show="isModalVisible"
        @close="closeModal"
    />
</template>

<script>
    import ShoppingCart from "./ShoppingCart";

    export default {
        components: [
            ShoppingCart
        ],
        data() {
            return {
                cartItems: [],
                isModalVisible: false,
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods: {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('sampleStore.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('sampleStore.jwt') != null
                this.setDefaults()
            },
            addToCart(itemToAdd) {
                let found = false;

                // Add the item or increase qty
                let itemInCart = this.cartItems.filter(item => item.id === itemToAdd.id);
                let isItemInCart = itemInCart.length > 0;

                if (isItemInCart === false) {
                    this.cartItems.push(Vue.util.extend({}, itemToAdd));
                } else {
                    itemInCart[0].qty += itemToAdd.qty;
                }

                itemToAdd.qty = 1;
            },
            showModal() {
                this.isModalVisible = true;
            },
            closeModal() {
                this.isModalVisible = false;
            }
        }
    }
</script>
