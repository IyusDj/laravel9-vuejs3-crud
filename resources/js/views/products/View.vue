<template>
    <div class="container py-4">

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Detail</h3>
                    <div class="card-tools">
                        <router-link to="/product" class="btn-sm btn-info text-white mr-4">Back</router-link>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Status</span>
                                            <span class="info-box-number text-center text-muted mb-0">Success</span>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Quantity</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{ product.quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Price</span>
                                            <span class="info-box-number text-center text-muted mb-0">Rp. {{ product.price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>{{ product.name }}</h4>
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" :src="`/storage/uploads/${product.photo}`" alt="user image">
                                            <span class="username">
                                            <a href="#">{{ product.type }} <small>Platform </small></a>
                                            </span>
                                            <span class="description">Ready Stock - 7:45 PM today</span>
                                        </div>

                                        <p>
                                        {{ product.description }}
                                        </p>
                                        <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Dj Yuz </h3>
                            <p class="text-muted">Program HRIS ini berbasis Website dengan konsep yang modern dimana Server-side (Backend Rest API) menggunakan bahasa pemograman PHP dan Framework PHP kemudian Client-side (Frontend) menggunakan SPA (Single Page Application) Javascript, HTML5, CSS3.</p>
                            <br>
                            <div class="text-muted">
                                <p class="text-sm">Client Company
                                    <b class="d-block">YJI Inc</b>
                                </p>
                            </div>
                            <h5 class="mt-5 text-muted">Project files</h5>
                            <ul class="list-unstyled">
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-29_03_2022.docx</a>
                            </li>
                            </ul>
                            <div class="text-center mt-5 mb-3">
                                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</template>

<script>
import { onMounted, reactive } from "vue"
import { useRoute } from "vue-router";
import axios from "axios"

export default {
    setup() {
        const product = reactive({
			name: "",
			description: "",
			photo: "",
			type: "",
			quantity: "",
			price: "",          
		});

        const route = useRoute();

        onMounted( async () => {
            getProducts()
        })

        const getProducts = async () => {
			//get data from api endpoint hris-laravel-9 by id
			let response = await axios.get(`/api/product/${route.params.id}`)
                    product.name = response.data.data.name;
					product.description = response.data.data.description;
					product.photo = response.data.data.photo;
					product.type = response.data.data.type;
					product.quantity = response.data.data.quantity;
					product.price = response.data.data.price;
                    console.log(response);                    
		};    

        return {
            product,
            getProducts,
        }

    }

}
</script>