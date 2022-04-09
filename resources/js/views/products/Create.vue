<template>
    <div class="container py-4">
        <section class="content">
            <div class="row">
                <div class="col-md px-5">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h3 class="card-title">Product | Add</h3>
                            <div class="card-tools">
                                <router-link to="/product" class="btn-sm btn-info text-white mr-4">Back</router-link>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="store()" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" id="name" class="form-control" v-model="product.name">
                					<div v-if="validation.name" class="text-danger">
                                        {{ validation.name[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" rows="4" v-model="product.description"></textarea>
                    				<div v-if="validation.description" class="text-danger">
                                        {{ validation.description[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <img :src="product.getPhoto" alt="" height="100" width="100"/>
                                    <input ref="fileInput" type="file" id="photo" class="form-control" accept="image/*" @change="updatePhoto">                             
                                    <div v-if="validation.photo" class="text-danger">
                                        {{ validation.photo[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" id="type" class="form-control" v-model="product.type">
                                    <div v-if="validation.type" class="text-danger">
                                        {{ validation.type[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" id="quantity" class="form-control" v-model="product.quantity">
                                    <div v-if="validation.quantity" class="text-danger">
                                        {{ validation.quantity[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="price" class="form-control" v-model="product.price">
                                    <div v-if="validation.price" class="text-danger">
                                        {{ validation.price[0] }}
                                    </div>
                                </div>

                                <div class="row pb-4">
                                    <div class="col-12 px-5">
                                        <a href="#" class="btn-sm btn-secondary">Cancel</a>
                                        <button class="btn-sm btn-success float-right">Add Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import { reactive, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default {
    data() {
		return {
	
		};
    },
    setup() {
		// Data binding
		const product = reactive({
			name: "",
			description: "",
			photo: "",
			type: "",
			quantity: "",
			price: "",          
            getPhoto: "",
		})

        const validation = ref([])
        const router = useRouter()

        const updatePhoto = (event) => {
            product.photo = event.target.files[0];
            product.getPhoto = URL.createObjectURL(event.target.files[0]);
        }

        const store = () => {          
            let formData = new FormData();
            formData.append('name', product.name);
            formData.append('description', product.description);
            formData.append('photo', product.photo);
            formData.append('type', product.type);
            formData.append('quantity', product.quantity);
            formData.append('price', product.price);

            // Create data to api endpoint hris-laravel-9
            axios.post("http://127.0.0.1:8000/api/product", formData)
				.then((response) => {
					// console.log(response.data)
                    router.push({
                        name: 'product'
                    })

                    toast.fire({
                        icon: "success",
                        title: "Product add successfully",
                    })
				})
                .catch((err) => {
                    validation.value = err.response.data
                })
        }

		return {
			product,
            router,
            validation,
            updatePhoto,
            store,
		}
	},    
}
</script>