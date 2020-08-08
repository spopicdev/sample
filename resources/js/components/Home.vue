<template>
    <div>
        <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
            <h2 class="title">Sample</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 product-box" v-for="(product,index) in products" @key="index">
                            <img class="img-fluid" :src="'/storage/images/' + product.image_url" :alt="product.name">
                            <h5><span v-html="product.name"></span>
                            </h5>
                            <button class="col-md-4 btn btn-sm btn-primary float-right"
                                    v-on:click="addToCart(product)">Add Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        data() {
            return {
                products: [],
                cartItems: []
            }
        },
        mounted() {
            axios.get("api/products/").then(response => this.products = response.data)
        },
        methods: {
            addToCart(itemToAdd) {
                let found = false;

                // Add the item or increase qty
                let itemInCart = this.cartItems.filter(item => item.id === itemToAdd.id);
                let isItemInCart = itemInCart.length > 0;

                if (isItemInCart === false) {
                    this.cartItems.push(itemToAdd);
                } else {
                    itemInCart[0].qty += 1;
                }
                itemToAdd.qty = 1;
            }

        }
    }
</script>

<style scoped>
    .small-text {
        font-size: 14px;
    }

    .product-box {
        border: 1px solid #cccccc;
        padding: 10px 15px;
    }

    .hero-section {
        height: 30vh;
        background: #ababab;
        align-items: center;
        margin-bottom: 20px;
        margin-top: -20px;
    }

    .title {
        font-size: 60px;
        color: #ffffff;
    }


</style>
