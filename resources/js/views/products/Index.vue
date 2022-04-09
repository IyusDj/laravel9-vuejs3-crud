<template>
    <div class="container">
        <div class="py-4">
            
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <router-link to="/product/add" class="product-add btn-sm btn-warning text-white mr-4">Add</router-link>
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
                                            <img alt="Avatar" class="table-avatar" :src="`/storage/uploads/${product.photo}`">                                            
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
                                    <router-link 
                                        :to="{
                                                name: 'product-view', 
                                                params: { id: product.id }
                                            }" 
                                        class="btn btn-primary btn-sm">
                                        <i class="fas fa-folder"></i>
                                        View
                                    </router-link>
                                    <router-link 
                                        :to="{
                                            name: 'product-edit', 
                                            params: { id: product.id }
                                        }" 
                                        class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </router-link>
                                    <button 
                                        class="btn btn-danger btn-sm"
                                        @click.prevent="destroy(product.id, index)">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </button>
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
import axios from "axios"
    
export default {
    setup() {
        let products = ref([])
        onMounted( async () => {
            getProducts()
        })        

        const getProducts = async () => {
            let response = await axios.get("/api/product") 
                products.value = response.data.products  
                // console.log(products.value)
        }        

        // Get img dari public
        const productImg = (img) => {
            return img
        }

        const destroy = (id, index) => {
			// Show confirmation before delete
			confirm("Anda yakin akan menghapus data ini ?")

			// Delete data to api endpoint hris-laravel-9
			axios.delete(`/api/product/${id}`)
				.then((res) => {
					console.log(res.data.message)
                    toast.fire({
                        icon: "warning",
                        title: "Product deleted successfully",
                    })

                    products.value.splice(index, 1)

					setTimeout(
						this.message = res.data.message, 2000
					)
				})
				.catch((err) => {
					console.log(err.res)
				});
		}

        return {
            products,
            getProducts,
            productImg,
            destroy,
        }
    },
   
}
</script>
