<template>
    <div>
        <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
            <h2 class="title">{{ product.data.name }}</h2>
        </div>
        <div class="container">
<!--            <div class="row">-->
<!--                <div class="col-md-12">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-4 product-box" v-for="(product,index) in products" @key="index">-->
<!--                            <router-link :to="{ path: '/products/'+product.id}">-->
<!--                                <img class="img-fluid" :src="'/storage/images/' + product.image_url" :alt="product.name">-->
<!--                                <h5><span v-html="product.name"></span>-->
<!--                                </h5>-->
<!--                                <button class="col-md-4 btn btn-sm btn-primary float-right">Add Order</button>-->
<!--                            </router-link>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        mounted() {
            axios
                .get("api/products/2")
                .then(response => this.product = response.data)
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
