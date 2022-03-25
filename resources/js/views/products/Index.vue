<template>
    <div class="container">
        <div class="py-4">
            
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <router-link to="/product/add" class="product-add btn-sm btn-success text-white mr-4">Add</router-link>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Product Name
                                </th>
                                <th style="width: 20%">
                                    Desc
                                </th>
                                <th style="width: 30%">
                                    Photo
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Qty
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in products" :key="index">
                                <td>
                                    1
                                </td>
                                <td>
                                    <a>
                                        {{ product.name }}
                                    </a>
                                    <br/>
                                    <small>
                                        Platform Website
                                    </small>
                                </td>
                                <td>
                                    <p>{{ product.description }}</p>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" :src="productImg(product.photo)">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" :src="productImg(product.photo)">
                                        </li>
                                    </ul>
                                </td>
                                <td class="project_progress">
                                    <p>{{ product.type }}</p>
                                </td>
                                <td class="project-state">
                                    <p>{{ product.quantity }}</p>
                                </td>
                                <td class="project-state">
                                    <p>Rp. {{ product.price }}</p>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">Success</span>
                                </td>
                                <td class="project-actions text-right">
                                    <router-link to="/product/view" class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </router-link>
                                    <router-link to="/product/edit/" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </router-link>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>  
    </div>
</template>

<script>
    import { onMounted, ref } from "vue"
    import { useRouter } from "vue-router"
    // import axios from "axios"

    export default {
        setup() {
            // reactive state
            let products = ref([])

            onMounted( async () => {
                getProducts()
            })

            const getProducts = async () => {
                let response = await axios.get("/api/get_all_product") 
                products.value = response.data.products  
                console.log('products', products.value)
            }

            const addProduct = () => {
                router.push('/product/add')
            }

            // Ambil img dari public
            const productImg = (img) => {
                return "/images/" + img
            }

            return {
                products,
                addProduct,
                productImg
            }
        }     
    }
</script>
