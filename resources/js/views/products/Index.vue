<template>
    <div class="container">
        <div class=p-1>
            
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <router-link to="/product/add" class="product-add text-gray mr-4">Add</router-link>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
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
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <a>
                                    HRIS App
                                </a>
                                <br/>
                                <small>
                                    Platform Website
                                </small>
                            </td>
                            <td>
                                <p>Program Aplikasi HRIS berbasis Web</p>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../assets/avatar.png">
                                    </li>
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../assets/avatar2.png">
                                    </li>
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../assets/avatar3.png">
                                    </li>
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../assets/avatar04.png">
                                    </li>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <p>Software</p>
                            </td>
                            <td class="project-state">
                                <p>1</p>
                            </td>
                            <td class="project-state">
                                <p>Rp. 200.000.000,00</p>
                            </td>
                            <td class="project-state">
                                <span class="badge badge-success">Success</span>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
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
