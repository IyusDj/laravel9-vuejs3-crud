<template>
    <div class="container py-4">
        <section class="content">
            <div class="row">
                <div class="col-md px-5">
                    <div class="card card-gray-dark">
                        <div class="card-header">
                            <h3 class="card-title">Product | Edit</h3>
                            <div class="card-tools">
                                <router-link to="/product" class="btn-sm btn-info text-white mr-4">Back</router-link>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" id="type" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" id="quantity" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" id="price" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pb-4">
                <div class="col-12 px-5">
                    <a href="#" class="btn-sm btn-secondary">Cancel</a>
                    <input type="submit" value="Update Data" class="btn-sm btn-success float-right">
                </div>
            </div>
        </section>

    </div>
</template>